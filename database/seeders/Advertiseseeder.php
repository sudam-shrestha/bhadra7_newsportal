<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdvertiseSeeder extends Seeder
{
    public function run(): void
    {
        // No banner URL was specified, so the shared site image is reused. Change if needed.
        $banner = 'https://jawaaf.com/storage/01M3KH801XZ5D5FZ7N5CPZ5PZC.jpg';

        $companies = [
            ['Himalayan Bank Ltd',       '9801000001', 'https://example.com/himalayan-bank'],
            ['Ncell Axiata',             '9801000002', 'https://example.com/ncell'],
            ['Nepal Telecom',            '9801000003', 'https://example.com/nepal-telecom'],
            ['Daraz Nepal',              '9801000004', 'https://example.com/daraz'],
            ['Yeti Airlines',            '9801000005', 'https://example.com/yeti-airlines'],
            ['Chaudhary Group',          '9801000006', 'https://example.com/chaudhary-group'],
            ['Kumari Bank',              '9801000007', 'https://example.com/kumari-bank'],
            ['Foodmandu',                '9801000008', 'https://example.com/foodmandu'],
            ['Pathao Nepal',             '9801000009', 'https://example.com/pathao'],
            ['Sipradi Trading',          '9801000010', 'https://example.com/sipradi'],
        ];

        $now = now();

        foreach ($companies as $i => [$name, $contact, $link]) {
            DB::table('advertises')->insert([
                'company_name'  => $name,
                'contact_no'    => $contact,
                'banner'        => $banner,
                'expire_date'   => $now->copy()->addDays(30 * ($i + 1))->toDateString(),
                'redirect_link' => $link,
                'created_at'    => $now,
                'updated_at'    => $now,
            ]);
        }
    }
}
