<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Film;
use App\Models\Genre;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $film1 = Film::create([
            'title' => 'Film 1',
            'publication_status' => true,
            'poster_link' => 'poster1.jpg',
        ]);

        $film2 = Film::create([
            'title' => 'Film 2',
            'publication_status' => true,
            'poster_link' => 'poster2.jpg',
        ]);

        $film3 = Film::create([
            'title' => 'Film 3',
            'publication_status' => true,
            'poster_link' => 'poster3.jpg',
        ]);

        $film4 = Film::create([
            'title' => 'Film 4',
            'publication_status' => true,
            'poster_link' => 'poster4.jpg',
        ]);

        $film5 = Film::create([
            'title' => 'Film 5',
            'publication_status' => true,
            'poster_link' => 'poster5.jpg',
        ]);

        $actionGenre = Genre::where('name', 'Action')->first();
        $comedyGenre = Genre::where('name', 'Comedy')->first();
        $detectiveGenre = Genre::where('name', 'Detective')->first();
        $fantasyGenre = Genre::where('name', 'Fantasy')->first();
        $romanceGenre = Genre::where('name', 'Romance')->first();

        $film1->genres()->attach([$actionGenre->id, $comedyGenre->id]);
        $film2->genres()->attach([$fantasyGenre->id, $actionGenre->id, $romanceGenre->id]);
        $film3->genres()->attach([$romanceGenre->id, $comedyGenre->id]);
        $film4->genres()->attach([$detectiveGenre->id]);
        $film5->genres()->attach([$detectiveGenre->id, $romanceGenre->id,]);
    }
}