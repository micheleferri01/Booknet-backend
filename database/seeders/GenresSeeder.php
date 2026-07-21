<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres=[
            'Fantasy',
            'Avventura',
            'Young Adult',
            'Fantascienza',
            'Distopico',
            'Classico',
            'Giallo',
            'Storico',
            'Romanzo',
            'Horror',
            'Favola',
            'Thriller',
            'Drammatico',
            'Crime',
            'Cyberpunk',
            'Mistero'
        ];

        foreach($genres as $genre){
            $newGenre = new Genre();
            $newGenre->name = $genre;
            $newGenre->save();

        }
    }
}
