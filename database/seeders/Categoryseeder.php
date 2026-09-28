<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['Politics',      'Latest political news, government decisions and party updates from across Nepal.'],
            ['Sports',        'Match results, player news and sports coverage from Nepal and around the world.'],
            ['Business',      'Market updates, economy, banking and business news that matter to you.'],
            ['Technology',    'Gadgets, startups, AI and the latest technology news.'],
            ['Entertainment', 'Movies, music, celebrity news and entertainment updates.'],
            ['Health',        'Health tips, medical news and wellness guidance for everyday life.'],
            ['Education',     'Exam results, admissions, scholarships and education news.'],
            ['World',         'Important international news and global developments.'],
            ['Travel',        'Travel destinations, trekking guides and tourism updates.'],
            ['Opinion',       'Editorials, columns and expert opinions on current affairs.'],
        ];

        $now = now();
// SudamShrestha->sudam-shrestha
        foreach ($categories as [$title, $description]) {
            DB::table('categories')->insert([
                'title'            => $title,
                'slug'             => Str::slug($title),
                'meta_title'       => $title . ' News | Jawaaf',
                'meta_description' => $description,
                'created_at'       => $now,
                'updated_at'       => $now,
            ]);
        }
    }
}
