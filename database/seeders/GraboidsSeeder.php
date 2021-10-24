<?php

namespace Database\Seeders;

use App\Models\Graboid;
use Illuminate\Database\Seeder;

class GraboidsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $graboids = [
            [
                'src' => '/assets/images/grab1.jpg',
            ],
            [
                'src' => '/assets/images/grab2.jpg',
            ],
            [
                'src' => '/assets/images/grab3.jpg',
            ],
            [
                'src' => '/assets/images/grab4.jpg',
            ],
            [
                'src' => '/assets/images/grab5.jpg',
            ],
            [
                'src' => '/assets/images/grab6.jpg',
            ],
            [
                'src' => '/assets/images/grab7.jpg',
            ],
            [
                'src' => '/assets/images/grab8.jpg',
            ],
            [
                'src' => '/assets/images/grab9.jpg',
            ],
        ];

        foreach ($graboids as $graboid) {
            Graboid::create([
                'src' => $graboid['src'],
            ]);
        }
    }
}
