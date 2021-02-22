<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(PostSeeder::class);
        $this->call(PostInformationSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(PostTagSeeder::class);
    }
}


// se richiamo qui dentro tutte le tabelle non ho bisogno di salvare l'id dell'elemento nel seed
// Facendo la chiamata in ordine di tabelle mi salva anche cronologicamente le chiavi e dipendenze 
// lancio dal terminale solo il db seeder che imposta già l'ordine delle tabelle 
// php artisan:seed prende automaticamente da db seed