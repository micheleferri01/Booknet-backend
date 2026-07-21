<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Editor;
use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = Author::pluck('id', 'name');

        $editors = Editor::pluck('id', 'name');

        $genres = Genre::pluck('id', 'name');

        $books = [
            [
                'title' => 'Il Signore degli Anelli',
                'publication_year' => 1954,
                'plot' => 'Frodo intraprende un viaggio per distruggere l\'Unico Anello e salvare la Terra di Mezzo.',
                'price' => 24.90,
                'author' => 'J.R.R. Tolkien',
                'editor' => 'Bompiani',
                'genres' => [
                    'Fantasy',
                    'Avventura',
                ],
            ],
            [
                'title' => 'Harry Potter e la Pietra Filosofale',
                'publication_year' => 1997,
                'plot' => 'Un giovane mago scopre il proprio destino nella scuola di Hogwarts.',
                'price' => 18.50,
                'author' => 'J.K. Rowling',
                'editor' => 'Salani',
                'genres' => [
                    'Fantasy',
                    'Young Adult',
                ],
            ],
            [
                'title' => 'Dune',
                'publication_year' => 1965,
                'plot' => 'Paul Atreides affronta intrighi politici e guerre sul pianeta desertico Arrakis.',
                'price' => 22.00,
                'author' => 'Frank Herbert',
                'editor' => 'Fanucci',
                'genres' => [
                    'Fantascienza',
                    'Avventura',
                ],
            ],
            [
                'title' => '1984',
                'publication_year' => 1949,
                'plot' => 'Un uomo vive sotto il controllo di un regime totalitario che sorveglia ogni aspetto della vita.',
                'price' => 14.90,
                'author' => 'George Orwell',
                'editor' => 'Mondadori',
                'genres' => [
                    'Distopico',
                    'Classico',
                ],
            ],
            [
                'title' => 'Il Nome della Rosa',
                'publication_year' => 1980,
                'plot' => 'Un frate francescano indaga su una serie di misteriosi omicidi in un\'abbazia medievale.',
                'price' => 19.90,
                'author' => 'Umberto Eco',
                'editor' => 'Bompiani',
                'genres' => [
                    'Giallo',
                    'Storico',
                ],
            ],
            [
                'title' => 'La Verità sul Caso Harry Quebert',
                'publication_year' => 2012,
                'plot' => 'Uno scrittore indaga sulla scomparsa di una ragazza e sul passato del suo mentore.',
                'price' => 19.90,
                'author' => 'Joël Dicker',
                'editor' => 'La Nave di Teseo',
                'genres' => [
                    'Thriller',
                    'Mistero',
                ],
            ],
            [
                'title' => 'L\'Ombra del Vento',
                'publication_year' => 2001,
                'plot' => 'Un ragazzo scopre un misterioso libro che lo conduce in una storia fatta di segreti e vendette.',
                'price' => 18.90,
                'author' => 'Carlos Ruiz Zafón',
                'editor' => 'Mondadori',
                'genres' => [
                    'Mistero',
                    'Storico',
                ],
            ],
            [
                'title' => 'Fahrenheit 451',
                'publication_year' => 1953,
                'plot' => 'In un futuro distopico i libri vengono bruciati per impedire il libero pensiero.',
                'price' => 15.90,
                'author' => 'Ray Bradbury',
                'editor' => 'Mondadori',
                'genres' => [
                    'Distopico',
                    'Fantascienza',
                ],
            ],
            [
                'title' => 'Gone Girl',
                'publication_year' => 2012,
                'plot' => 'La misteriosa scomparsa di una donna trasforma il marito nel principale sospettato.',
                'price' => 17.90,
                'author' => 'Gillian Flynn',
                'editor' => 'Rizzoli',
                'genres' => [
                    'Thriller',
                    'Crime',
                ],
            ],
            [
                'title' => 'Il Problema dei Tre Corpi',
                'publication_year' => 2008,
                'plot' => 'Un primo contatto con una civiltà aliena mette in discussione il futuro dell\'umanità.',
                'price' => 21.90,
                'author' => 'Liu Cixin',
                'editor' => 'Mondadori',
                'genres' => [
                    'Fantascienza',
                ],
            ],
            [
                'title' => 'Lo Hobbit',
                'publication_year' => 1937,
                'plot' => 'Bilbo Baggins parte per un\'avventura alla ricerca di un tesoro custodito da un drago.',
                'price' => 17.90,
                'author' => 'J.R.R. Tolkien',
                'editor' => 'Bompiani',
                'genres' => [
                    'Fantasy',
                    'Avventura',
                ],
            ],
            [
                'title' => 'Il Piccolo Principe',
                'publication_year' => 1943,
                'plot' => 'Un bambino proveniente da un altro pianeta insegna il valore dell\'amicizia e dell\'amore.',
                'price' => 12.50,
                'author' => 'Antoine de Saint-Exupéry',
                'editor' => 'Bompiani',
                'genres' => [
                    'Favola',
                    'Classico',
                ],
            ],
            [
                'title' => 'La Biblioteca di Mezzanotte',
                'publication_year' => 2020,
                'plot' => 'Una donna esplora vite alternative attraverso una biblioteca sospesa tra vita e morte.',
                'price' => 17.90,
                'author' => 'Matt Haig',
                'editor' => 'Edizioni e/o',
                'genres' => [
                    'Drammatico',
                    'Fantasy',
                ],
            ],
            [
                'title' => 'Shining',
                'publication_year' => 1977,
                'plot' => 'Una famiglia rimane isolata in un hotel infestato durante l\'inverno.',
                'price' => 20.90,
                'author' => 'Stephen King',
                'editor' => 'Sperling & Kupfer',
                'genres' => [
                    'Horror',
                    'Thriller',
                ],
            ],
            [
                'title' => 'It',
                'publication_year' => 1986,
                'plot' => 'Un gruppo di amici affronta un\'antica entità malvagia che assume la forma delle paure più profonde.',
                'price' => 26.90,
                'author' => 'Stephen King',
                'editor' => 'Sperling & Kupfer',
                'genres' => [
                    'Horror',
                ],
            ],
            [
                'title' => 'La Strada',
                'publication_year' => 2006,
                'plot' => 'Padre e figlio attraversano un mondo devastato da un\'apocalisse.',
                'price' => 17.50,
                'author' => 'Cormac McCarthy',
                'editor' => 'Einaudi',
                'genres' => [
                    'Distopico',
                    'Drammatico',
                ],
            ],
            [
                'title' => 'Norwegian Wood',
                'publication_year' => 1987,
                'plot' => 'Un giovane affronta il dolore, l\'amore e la crescita personale nella Tokyo degli anni Sessanta.',
                'price' => 18.00,
                'author' => 'Haruki Murakami',
                'editor' => 'Einaudi',
                'genres' => [
                    'Romanzo',
                    'Drammatico',
                ],
            ],
            [
                'title' => 'Il Codice Da Vinci',
                'publication_year' => 2003,
                'plot' => 'Un professore segue indizi nascosti in celebri opere d\'arte per svelare un antico segreto.',
                'price' => 16.90,
                'author' => 'Dan Brown',
                'editor' => 'Mondadori',
                'genres' => [
                    'Thriller',
                    'Mistero',
                ],
            ],
            [
                'title' => 'Angeli e Demoni',
                'publication_year' => 2000,
                'plot' => 'Robert Langdon cerca di fermare una minaccia contro il Vaticano.',
                'price' => 16.50,
                'author' => 'Dan Brown',
                'editor' => 'Mondadori',
                'genres' => [
                    'Thriller',
                ],
            ],
            [
                'title' => 'Il Cacciatore di Aquiloni',
                'publication_year' => 2003,
                'plot' => 'Due amici crescono nell\'Afghanistan sconvolto dalla guerra.',
                'price' => 18.90,
                'author' => 'Khaled Hosseini',
                'editor' => 'Piemme',
                'genres' => [
                    'Drammatico',
                    'Storico',
                ],
            ],
            [
                'title' => 'Mille Splendidi Soli',
                'publication_year' => 2007,
                'plot' => 'Due donne intrecciano le proprie vite affrontando guerre e oppressione.',
                'price' => 18.50,
                'author' => 'Khaled Hosseini',
                'editor' => 'Piemme',
                'genres' => [
                    'Drammatico',
                ],
            ],
            [
                'title' => 'La Ragazza del Treno',
                'publication_year' => 2015,
                'plot' => 'Una donna diventa testimone inconsapevole di un misterioso crimine.',
                'price' => 15.90,
                'author' => 'Paula Hawkins',
                'editor' => 'Piemme',
                'genres' => [
                    'Thriller',
                    'Giallo',
                ],
            ],
            [
                'title' => 'Il Silenzio degli Innocenti',
                'publication_year' => 1988,
                'plot' => 'Una giovane agente dell\'FBI chiede aiuto a un serial killer per catturarne un altro.',
                'price' => 17.90,
                'author' => 'Thomas Harris',
                'editor' => 'Mondadori',
                'genres' => [
                    'Thriller',
                    'Crime',
                ],
            ],
            [
                'title' => 'Jurassic Park',
                'publication_year' => 1990,
                'plot' => 'Un parco popolato da dinosauri clonati si trasforma in un incubo.',
                'price' => 19.00,
                'author' => 'Michael Crichton',
                'editor' => 'Garzanti',
                'genres' => [
                    'Fantascienza',
                    'Avventura',
                ],
            ],
            [
                'title' => 'Ready Player One',
                'publication_year' => 2011,
                'plot' => 'Un adolescente partecipa a una caccia al tesoro in un enorme mondo virtuale.',
                'price' => 18.90,
                'author' => 'Ernest Cline',
                'editor' => 'De Agostini',
                'genres' => [
                    'Fantascienza',
                    'Young Adult',
                ],
            ],
            [
                'title' => 'Neuromante',
                'publication_year' => 1984,
                'plot' => 'Un hacker viene coinvolto in una missione che cambierà il futuro dell\'intelligenza artificiale.',
                'price' => 17.50,
                'author' => 'William Gibson',
                'editor' => 'Mondadori',
                'genres' => [
                    'Cyberpunk',
                    'Fantascienza',
                ],
            ],
            [
                'title' => 'Foundation',
                'publication_year' => 1951,
                'plot' => 'Uno scienziato tenta di salvare la conoscenza umana dal collasso dell\'Impero Galattico.',
                'price' => 19.90,
                'author' => 'Isaac Asimov',
                'editor' => 'Mondadori',
                'genres' => [
                    'Fantascienza',
                ],
            ],
            [
                'title' => 'Io, Robot',
                'publication_year' => 1950,
                'plot' => 'Una raccolta di racconti esplora il rapporto tra uomini e robot governati dalle Tre Leggi.',
                'price' => 16.90,
                'author' => 'Isaac Asimov',
                'editor' => 'Mondadori',
                'genres' => [
                    'Fantascienza',
                ],
            ],
            [
                'title' => 'Il Richiamo della Foresta',
                'publication_year' => 1903,
                'plot' => 'Un cane domestico riscopre il proprio istinto selvaggio nei ghiacci del Nord.',
                'price' => 13.90,
                'author' => 'Jack London',
                'editor' => 'Feltrinelli',
                'genres' => [
                    'Avventura',
                    'Classico',
                ],
            ],
            [
                'title' => 'Le Cronache di Narnia: Il Leone, la Strega e l\'Armadio',
                'publication_year' => 1950,
                'plot' => 'Quattro fratelli scoprono un mondo magico minacciato da una potente strega.',
                'price' => 17.00,
                'author' => 'C.S. Lewis',
                'editor' => 'Mondadori',
                'genres' => [
                    'Fantasy',
                    'Young Adult',
                ],
            ],
        ];

        foreach($books as $book){
            $newBook = new Book();
            $newBook->title = $book['title'];
            $newBook->publication_year = $book['publication_year'];
            $newBook->plot = $book['plot'];
            $newBook->price = $book['price'];
            $newBook->author_id = $authors[$book['author']];
            $newBook->editor_id = $editors[$book['editor']];
            $newBook->save();
            $newBook->genres()->attach(
                collect($book['genres'])
                    ->map(fn ($genre) => $genres[$genre])
                    ->all()
            );
            
        }
    }
}
