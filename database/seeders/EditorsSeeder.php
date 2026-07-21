<?php

namespace Database\Seeders;

use App\Models\Editor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EditorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $editors = [
            'Bompiani',
            'Salani',
            'Fanucci',
            'Mondadori',
            'Einaudi',
            'Rizzoli',
            'Newton Compton',
            'Feltrinelli',
            'Sperling & Kupfer',
            'Piemme',
            'Garzanti',
            'De Agostini',
            'La Nave di Teseo',
            'Edizioni e/o',
        ];

        foreach($editors as $editor){
            $newEditor = new Editor();
            $newEditor->name = $editor;
            $newEditor->save();
        }
    }
}
