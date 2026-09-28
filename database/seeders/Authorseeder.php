<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        $image = 'https://codeit.com.np/storage/01KKTTSY50WXVXMB3AWJTFJSPA.avif';

        $names = [
            'Ramesh Sharma',
            'Sita Adhikari',
            'Bikash Thapa',
            'Anita Gurung',
            'Prakash Karki',
            'Sunita Rai',
            'Dipak Neupane',
            'Manisha Shrestha',
            'Suresh Bhandari',
            'Kabita Poudel',
        ];

        $now = now();

        foreach ($names as $name) {
            DB::table('authors')->insert([
                'name'       => $name,
                'image'      => $image,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
