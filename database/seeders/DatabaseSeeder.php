<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Movie::factory()->create([
            'title' => 'Gladiator',
            'description' => "Le général romain Maximus est le plus fidèle soutien de l'empereur Marc Aurèle, qu'il a conduit de victoire en victoire. Jaloux du prestige de Maximus, et plus encore de l'amour que lui voue l'empereur, le fils de Marc Aurèle, Commode, s'arroge brutalement le pouvoir, puis ordonne l'arrestation du général et son exécution. Maximus échappe à ses assassins, mais ne peut empêcher le massacre de sa famille. Capturé par un marchand d'esclaves, il devient gladiateur et prépare sa vengeance.",
            'image' => ''
        ]);

        \App\Models\Movie::factory()->create([
            'title' => 'Django Unchained',
            'description' => "Deux ans avant la Guerre civile, un ancien esclave du nom de Django s'associe avec un chasseur de primes d'origine allemande qui l'a libéré: il accepte de traquer avec lui des criminels recherchés. En échange, il l'aidera à retrouver sa femme perdue depuis longtemps et esclave elle aussi.",
            'image' => ''
        ]);
    }
}
