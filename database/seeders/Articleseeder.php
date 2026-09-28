<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Note: `content` and `meta_description` are string (VARCHAR 255) columns,
     * so every text below is kept under 255 characters.
     */
    public function run(): void
    {
        $image = 'https://jawaaf.com/storage/01M3KH801XZ5D5FZ7N5CPZ5PZC.jpg';

        $authorIds = DB::table('authors')->pluck('id')->values();

        $articles = [
            [
                'Parliament passes new budget bill after long debate',
                'Lawmakers approved the annual budget bill after two days of debate, with focus on infrastructure, health and education spending.',
                'Parliament approves annual budget bill with focus on infrastructure, health and education.',
            ],
            [
                'Nepal cricket team wins thrilling series opener',
                'Nepal edged out the opposition in a last-over thriller, with the top order delivering a solid batting performance at the stadium.',
                'Nepal win a last-over thriller in the opening match of the cricket series.',
            ],
            [
                'Stock market index gains as banking shares rally',
                'The benchmark index closed higher today as commercial bank shares led the rally, boosting investor confidence in the market.',
                'NEPSE closes higher as banking sector shares lead the daily market rally.',
            ],
            [
                'Local startup launches AI tool for Nepali language',
                'A Kathmandu-based startup has released an AI-powered tool that helps users write, translate and summarize content in Nepali.',
                'Kathmandu startup launches AI tool that supports writing and translating Nepali.',
            ],
            [
                'New film breaks box office records in first week',
                'The latest Nepali release has crossed major box office milestones in its first week, drawing large crowds in theatres nationwide.',
                'Latest Nepali film breaks box office records during its opening week.',
            ],
            [
                'Health ministry urges precautions as dengue cases rise',
                'Health officials advise residents to remove stagnant water, use mosquito nets and seek early treatment as dengue cases increase.',
                'Health ministry issues dengue prevention advice as reported cases go up.',
            ],
            [
                'SEE results published, thousands of students pass',
                'The examination board published the results today. Students can check their grades online or through SMS service.',
                'SEE results are out. Check how students can view their grades online and by SMS.',
            ],
            [
                'World leaders meet to discuss climate action plan',
                'Leaders gathered for a global summit to discuss emissions targets, clean energy funding and support for climate-vulnerable nations.',
                'Global summit brings world leaders together to discuss climate action and funding.',
            ],
            [
                'Annapurna trekking season opens with record visitors',
                'Tourism officials report a surge in trekkers this season, boosting local lodges, guides and small businesses along the trail.',
                'Annapurna trekking season starts with record visitors and a boost for local business.',
            ],
            [
                'Editorial: Why local governments need stronger budgets',
                'Local governments deliver services closest to citizens, yet many struggle with limited funds and staff. Reform is long overdue.',
                'Opinion on why local governments need better funding, staff and accountability.',
            ],
        ];

        $now = now();

        foreach ($articles as $i => [$title, $content, $metaDescription]) {
            DB::table('articles')->insert([
                'title'            => $title,
                'slug'             => Str::slug($title),
                'content'          => $content,
                'image'            => $image,
                'meta_title'       => Str::limit($title, 60, ''),
                'meta_description' => $metaDescription,
                'author_id'        => $authorIds[$i % max($authorIds->count(), 1)] ?? null,
                'created_at'       => $now->copy()->subDays(10 - $i),
                'updated_at'       => $now,
            ]);
        }
    }
}
