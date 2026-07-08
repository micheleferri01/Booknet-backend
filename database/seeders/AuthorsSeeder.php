<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            'J.R.R. Tolkien',
            'J.K. Rowling',
            'Frank Herbert',
            'George Orwell',
            'Umberto Eco',
            'Jane Austen',
            'Alexandre Dumas',
            'Ray Bradbury',
            'Bram Stoker',
            'Mary Shelley',
            'Antoine de Saint-Exupéry',
            'Herman Melville',
            'Stephen King',
            'Cormac McCarthy',
            'Haruki Murakami',
            'Dan Brown',
            'Khaled Hosseini',
            'Paula Hawkins',
            'Thomas Harris',
            'Michael Crichton',
            'Ernest Cline',
            'William Gibson',
            'Isaac Asimov',
            'Jack London',
            'C.S. Lewis'
        ];

        foreach($authors as $author){
            $newAuthor = new Author();
            $newAuthor->name = $author;
            $newAuthor->save();
        }
    }
}
