<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Seeds the `article_category` pivot table as a many-to-many relation:
 * every article belongs to 2-3 categories, and every category has several articles.
 *
 * Safe to run again: it clears the pivot table first, so no duplicate rows.
 * Run AFTER CategorySeeder and ArticleSeeder.
 */
class ArticleCategorySeeder extends Seeder
{
    public function run(): void
    {
        $articleIds  = DB::table('articles')->orderBy('id')->pluck('id')->values();
        $categoryIds = DB::table('categories')->orderBy('id')->pluck('id')->values();

        $categoryCount = $categoryIds->count();

        if ($articleIds->isEmpty() || $categoryCount === 0) {
            return;
        }

        // Remove rows from the earlier one-category-per-article run.
        DB::table('article_category')->delete();

        $now  = now();
        $rows = [];

        foreach ($articleIds as $i => $articleId) {
            // Every article: its main category + the next one.
            $picked = [$i % $categoryCount, ($i + 1) % $categoryCount];

            // Every 2nd article gets a third category too.
            if ($i % 2 === 0) {
                $picked[] = ($i + 4) % $categoryCount;
            }

            foreach (array_unique($picked) as $index) {
                $rows[] = [
                    'article_id'  => $articleId,
                    'category_id' => $categoryIds[$index],
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ];
            }
        }

        DB::table('article_category')->insert($rows);
    }
}
