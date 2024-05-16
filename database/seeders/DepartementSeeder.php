<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DepartementSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('departement')->delete();
        
        \DB::table('departement')->insert(array (
            0 => 
            array (
                'departement_id' => 104,
                'nom_departement' => 'doubs',
                'region_id' => 21,
                'created_at' => '2023-12-09 09:44:53',
                'updated_at' => '2023-12-09 09:44:53',
            ),
            1 => 
            array (
                'departement_id' => 105,
                'nom_departement' => 'aisne',
                'region_id' => 22,
                'created_at' => '2023-12-09 09:44:53',
                'updated_at' => '2023-12-09 09:44:53',
            ),
            2 => 
            array (
                'departement_id' => 106,
                'nom_departement' => 'hautes-alpes',
                'region_id' => 23,
                'created_at' => '2023-12-09 09:44:53',
                'updated_at' => '2023-12-09 09:44:53',
            ),
            3 => 
            array (
                'departement_id' => 107,
                'nom_departement' => 'ardèche',
                'region_id' => 24,
                'created_at' => '2023-12-09 09:44:53',
                'updated_at' => '2023-12-09 09:44:53',
            ),
            4 => 
            array (
                'departement_id' => 108,
                'nom_departement' => 'ariège',
                'region_id' => 25,
                'created_at' => '2023-12-09 09:44:53',
                'updated_at' => '2023-12-09 09:44:53',
            ),
            5 => 
            array (
                'departement_id' => 109,
                'nom_departement' => 'jura',
                'region_id' => 21,
                'created_at' => '2023-12-09 09:44:53',
                'updated_at' => '2023-12-09 09:44:53',
            ),
            6 => 
            array (
                'departement_id' => 110,
                'nom_departement' => 'nièvre',
                'region_id' => 21,
                'created_at' => '2023-12-09 09:44:53',
                'updated_at' => '2023-12-09 09:44:53',
            ),
            7 => 
            array (
                'departement_id' => 111,
                'nom_departement' => 'côte-d\'or',
                'region_id' => 21,
                'created_at' => '2023-12-09 09:44:54',
                'updated_at' => '2023-12-09 09:44:54',
            ),
            8 => 
            array (
                'departement_id' => 112,
                'nom_departement' => 'haute-saône',
                'region_id' => 21,
                'created_at' => '2023-12-09 09:44:56',
                'updated_at' => '2023-12-09 09:44:56',
            ),
            9 => 
            array (
                'departement_id' => 113,
                'nom_departement' => 'saône-et-loire',
                'region_id' => 21,
                'created_at' => '2023-12-09 09:44:56',
                'updated_at' => '2023-12-09 09:44:56',
            ),
            10 => 
            array (
                'departement_id' => 114,
                'nom_departement' => 'yonne',
                'region_id' => 21,
                'created_at' => '2023-12-09 09:44:57',
                'updated_at' => '2023-12-09 09:44:57',
            ),
            11 => 
            array (
                'departement_id' => 115,
                'nom_departement' => 'territoire-de-belfort',
                'region_id' => 21,
                'created_at' => '2023-12-09 09:44:57',
                'updated_at' => '2023-12-09 09:44:57',
            ),
            12 => 
            array (
                'departement_id' => 116,
                'nom_departement' => 'drôme',
                'region_id' => 24,
                'created_at' => '2023-12-09 09:45:00',
                'updated_at' => '2023-12-09 09:45:00',
            ),
            13 => 
            array (
                'departement_id' => 117,
                'nom_departement' => 'ain',
                'region_id' => 24,
                'created_at' => '2023-12-09 09:45:00',
                'updated_at' => '2023-12-09 09:45:00',
            ),
            14 => 
            array (
                'departement_id' => 118,
                'nom_departement' => 'allier',
                'region_id' => 24,
                'created_at' => '2023-12-09 09:45:00',
                'updated_at' => '2023-12-09 09:45:00',
            ),
            15 => 
            array (
                'departement_id' => 119,
                'nom_departement' => 'alpes-de-haute-provence',
                'region_id' => 23,
                'created_at' => '2023-12-09 09:45:00',
                'updated_at' => '2023-12-09 09:45:00',
            ),
            16 => 
            array (
                'departement_id' => 120,
                'nom_departement' => 'alpes-maritimes',
                'region_id' => 23,
                'created_at' => '2023-12-09 09:45:00',
                'updated_at' => '2023-12-09 09:45:00',
            ),
            17 => 
            array (
                'departement_id' => 121,
                'nom_departement' => 'isère',
                'region_id' => 24,
                'created_at' => '2023-12-09 09:45:00',
                'updated_at' => '2023-12-09 09:45:00',
            ),
            18 => 
            array (
                'departement_id' => 122,
                'nom_departement' => 'cantal',
                'region_id' => 24,
                'created_at' => '2023-12-09 09:45:01',
                'updated_at' => '2023-12-09 09:45:01',
            ),
            19 => 
            array (
                'departement_id' => 123,
                'nom_departement' => 'loire',
                'region_id' => 24,
                'created_at' => '2023-12-09 09:45:01',
                'updated_at' => '2023-12-09 09:45:01',
            ),
            20 => 
            array (
                'departement_id' => 124,
                'nom_departement' => 'haute-loire',
                'region_id' => 24,
                'created_at' => '2023-12-09 09:45:01',
                'updated_at' => '2023-12-09 09:45:01',
            ),
            21 => 
            array (
                'departement_id' => 125,
                'nom_departement' => 'puy-de-dôme',
                'region_id' => 24,
                'created_at' => '2023-12-09 09:45:01',
                'updated_at' => '2023-12-09 09:45:01',
            ),
            22 => 
            array (
                'departement_id' => 126,
                'nom_departement' => 'rhône',
                'region_id' => 24,
                'created_at' => '2023-12-09 09:45:03',
                'updated_at' => '2023-12-09 09:45:03',
            ),
            23 => 
            array (
                'departement_id' => 127,
                'nom_departement' => 'savoie',
                'region_id' => 24,
                'created_at' => '2023-12-09 09:45:03',
                'updated_at' => '2023-12-09 09:45:03',
            ),
            24 => 
            array (
                'departement_id' => 128,
                'nom_departement' => 'haute-savoie',
                'region_id' => 24,
                'created_at' => '2023-12-09 09:45:03',
                'updated_at' => '2023-12-09 09:45:03',
            ),
            25 => 
            array (
                'departement_id' => 129,
                'nom_departement' => 'eure',
                'region_id' => 26,
                'created_at' => '2023-12-09 09:45:06',
                'updated_at' => '2023-12-09 09:45:06',
            ),
            26 => 
            array (
                'departement_id' => 130,
                'nom_departement' => 'manche',
                'region_id' => 26,
                'created_at' => '2023-12-09 09:45:07',
                'updated_at' => '2023-12-09 09:45:07',
            ),
            27 => 
            array (
                'departement_id' => 131,
                'nom_departement' => 'calvados',
                'region_id' => 26,
                'created_at' => '2023-12-09 09:45:07',
                'updated_at' => '2023-12-09 09:45:07',
            ),
            28 => 
            array (
                'departement_id' => 132,
                'nom_departement' => 'orne',
                'region_id' => 26,
                'created_at' => '2023-12-09 09:45:07',
                'updated_at' => '2023-12-09 09:45:07',
            ),
            29 => 
            array (
                'departement_id' => 133,
                'nom_departement' => 'seine-maritime',
                'region_id' => 26,
                'created_at' => '2023-12-09 09:45:09',
                'updated_at' => '2023-12-09 09:45:09',
            ),
            30 => 
            array (
                'departement_id' => 134,
                'nom_departement' => 'eure-et-loir',
                'region_id' => 27,
                'created_at' => '2023-12-09 09:45:12',
                'updated_at' => '2023-12-09 09:45:12',
            ),
            31 => 
            array (
                'departement_id' => 135,
                'nom_departement' => 'indre',
                'region_id' => 27,
                'created_at' => '2023-12-09 09:45:12',
                'updated_at' => '2023-12-09 09:45:12',
            ),
            32 => 
            array (
                'departement_id' => 136,
                'nom_departement' => 'indre-et-loire',
                'region_id' => 27,
                'created_at' => '2023-12-09 09:45:12',
                'updated_at' => '2023-12-09 09:45:12',
            ),
            33 => 
            array (
                'departement_id' => 137,
                'nom_departement' => 'loir-et-cher',
                'region_id' => 27,
                'created_at' => '2023-12-09 09:45:12',
                'updated_at' => '2023-12-09 09:45:12',
            ),
            34 => 
            array (
                'departement_id' => 138,
                'nom_departement' => 'loiret',
                'region_id' => 27,
                'created_at' => '2023-12-09 09:45:13',
                'updated_at' => '2023-12-09 09:45:13',
            ),
            35 => 
            array (
                'departement_id' => 139,
                'nom_departement' => 'cher',
                'region_id' => 27,
                'created_at' => '2023-12-09 09:45:13',
                'updated_at' => '2023-12-09 09:45:13',
            ),
            36 => 
            array (
                'departement_id' => 140,
                'nom_departement' => 'finistère',
                'region_id' => 28,
                'created_at' => '2023-12-09 09:45:15',
                'updated_at' => '2023-12-09 09:45:15',
            ),
            37 => 
            array (
                'departement_id' => 141,
                'nom_departement' => 'ille-et-vilaine',
                'region_id' => 28,
                'created_at' => '2023-12-09 09:45:15',
                'updated_at' => '2023-12-09 09:45:15',
            ),
            38 => 
            array (
                'departement_id' => 142,
                'nom_departement' => 'morbihan',
                'region_id' => 28,
                'created_at' => '2023-12-09 09:45:16',
                'updated_at' => '2023-12-09 09:45:16',
            ),
            39 => 
            array (
                'departement_id' => 143,
                'nom_departement' => 'côtes-d\'armor',
                'region_id' => 28,
                'created_at' => '2023-12-09 09:45:16',
                'updated_at' => '2023-12-09 09:45:16',
            ),
            40 => 
            array (
                'departement_id' => 144,
                'nom_departement' => 'gironde',
                'region_id' => 29,
                'created_at' => '2023-12-09 09:45:18',
                'updated_at' => '2023-12-09 09:45:18',
            ),
            41 => 
            array (
                'departement_id' => 145,
                'nom_departement' => 'ardennes',
                'region_id' => 30,
                'created_at' => '2023-12-09 09:45:18',
                'updated_at' => '2023-12-09 09:45:18',
            ),
            42 => 
            array (
                'departement_id' => 146,
                'nom_departement' => 'landes',
                'region_id' => 29,
                'created_at' => '2023-12-09 09:45:18',
                'updated_at' => '2023-12-09 09:45:18',
            ),
            43 => 
            array (
                'departement_id' => 147,
                'nom_departement' => 'charente',
                'region_id' => 29,
                'created_at' => '2023-12-09 09:45:18',
                'updated_at' => '2023-12-09 09:45:18',
            ),
            44 => 
            array (
                'departement_id' => 148,
                'nom_departement' => 'charente-maritime',
                'region_id' => 29,
                'created_at' => '2023-12-09 09:45:19',
                'updated_at' => '2023-12-09 09:45:19',
            ),
            45 => 
            array (
                'departement_id' => 149,
                'nom_departement' => 'corrèze',
                'region_id' => 29,
                'created_at' => '2023-12-09 09:45:19',
                'updated_at' => '2023-12-09 09:45:19',
            ),
            46 => 
            array (
                'departement_id' => 150,
                'nom_departement' => 'lot-et-garonne',
                'region_id' => 29,
                'created_at' => '2023-12-09 09:45:19',
                'updated_at' => '2023-12-09 09:45:19',
            ),
            47 => 
            array (
                'departement_id' => 151,
                'nom_departement' => 'creuse',
                'region_id' => 29,
                'created_at' => '2023-12-09 09:45:19',
                'updated_at' => '2023-12-09 09:45:19',
            ),
            48 => 
            array (
                'departement_id' => 152,
                'nom_departement' => 'pyrénées-atlantiques',
                'region_id' => 29,
                'created_at' => '2023-12-09 09:45:20',
                'updated_at' => '2023-12-09 09:45:20',
            ),
            49 => 
            array (
                'departement_id' => 153,
                'nom_departement' => 'dordogne',
                'region_id' => 29,
                'created_at' => '2023-12-09 09:45:20',
                'updated_at' => '2023-12-09 09:45:20',
            ),
            50 => 
            array (
                'departement_id' => 154,
                'nom_departement' => 'deux-sèvres',
                'region_id' => 29,
                'created_at' => '2023-12-09 09:45:23',
                'updated_at' => '2023-12-09 09:45:23',
            ),
            51 => 
            array (
                'departement_id' => 155,
                'nom_departement' => 'vienne',
                'region_id' => 29,
                'created_at' => '2023-12-09 09:45:24',
                'updated_at' => '2023-12-09 09:45:24',
            ),
            52 => 
            array (
                'departement_id' => 156,
                'nom_departement' => 'haute-vienne',
                'region_id' => 29,
                'created_at' => '2023-12-09 09:45:24',
                'updated_at' => '2023-12-09 09:45:24',
            ),
            53 => 
            array (
                'departement_id' => 157,
                'nom_departement' => 'bouches-du-rhône',
                'region_id' => 23,
                'created_at' => '2023-12-09 09:45:26',
                'updated_at' => '2023-12-09 09:45:26',
            ),
            54 => 
            array (
                'departement_id' => 158,
                'nom_departement' => 'var',
                'region_id' => 23,
                'created_at' => '2023-12-09 09:45:27',
                'updated_at' => '2023-12-09 09:45:27',
            ),
            55 => 
            array (
                'departement_id' => 159,
                'nom_departement' => 'vaucluse',
                'region_id' => 23,
                'created_at' => '2023-12-09 09:45:27',
                'updated_at' => '2023-12-09 09:45:27',
            ),
            56 => 
            array (
                'departement_id' => 160,
                'nom_departement' => 'gard',
                'region_id' => 25,
                'created_at' => '2023-12-09 09:45:28',
                'updated_at' => '2023-12-09 09:45:28',
            ),
            57 => 
            array (
                'departement_id' => 161,
                'nom_departement' => 'haute-garonne',
                'region_id' => 25,
                'created_at' => '2023-12-09 09:45:28',
                'updated_at' => '2023-12-09 09:45:28',
            ),
            58 => 
            array (
                'departement_id' => 162,
                'nom_departement' => 'gers',
                'region_id' => 25,
                'created_at' => '2023-12-09 09:45:28',
                'updated_at' => '2023-12-09 09:45:28',
            ),
            59 => 
            array (
                'departement_id' => 163,
                'nom_departement' => 'hérault',
                'region_id' => 25,
                'created_at' => '2023-12-09 09:45:29',
                'updated_at' => '2023-12-09 09:45:29',
            ),
            60 => 
            array (
                'departement_id' => 164,
                'nom_departement' => 'aude',
                'region_id' => 25,
                'created_at' => '2023-12-09 09:45:29',
                'updated_at' => '2023-12-09 09:45:29',
            ),
            61 => 
            array (
                'departement_id' => 165,
                'nom_departement' => 'aveyron',
                'region_id' => 25,
                'created_at' => '2023-12-09 09:45:30',
                'updated_at' => '2023-12-09 09:45:30',
            ),
            62 => 
            array (
                'departement_id' => 166,
                'nom_departement' => 'lot',
                'region_id' => 25,
                'created_at' => '2023-12-09 09:45:30',
                'updated_at' => '2023-12-09 09:45:30',
            ),
            63 => 
            array (
                'departement_id' => 167,
                'nom_departement' => 'lozère',
                'region_id' => 25,
                'created_at' => '2023-12-09 09:45:30',
                'updated_at' => '2023-12-09 09:45:30',
            ),
            64 => 
            array (
                'departement_id' => 168,
                'nom_departement' => 'hautes-pyrénées',
                'region_id' => 25,
                'created_at' => '2023-12-09 09:45:31',
                'updated_at' => '2023-12-09 09:45:31',
            ),
            65 => 
            array (
                'departement_id' => 169,
                'nom_departement' => 'pyrénées-orientales',
                'region_id' => 25,
                'created_at' => '2023-12-09 09:45:31',
                'updated_at' => '2023-12-09 09:45:31',
            ),
            66 => 
            array (
                'departement_id' => 170,
                'nom_departement' => 'tarn',
                'region_id' => 25,
                'created_at' => '2023-12-09 09:45:34',
                'updated_at' => '2023-12-09 09:45:34',
            ),
            67 => 
            array (
                'departement_id' => 171,
                'nom_departement' => 'tarn-et-garonne',
                'region_id' => 25,
                'created_at' => '2023-12-09 09:45:34',
                'updated_at' => '2023-12-09 09:45:34',
            ),
            68 => 
            array (
                'departement_id' => 172,
                'nom_departement' => 'corse-du-sud',
                'region_id' => 31,
                'created_at' => '2023-12-09 09:45:37',
                'updated_at' => '2023-12-09 09:45:37',
            ),
            69 => 
            array (
                'departement_id' => 173,
                'nom_departement' => 'haute-corse',
                'region_id' => 31,
                'created_at' => '2023-12-09 09:45:37',
                'updated_at' => '2023-12-09 09:45:37',
            ),
            70 => 
            array (
                'departement_id' => 174,
                'nom_departement' => 'marne',
                'region_id' => 30,
                'created_at' => '2023-12-09 09:45:38',
                'updated_at' => '2023-12-09 09:45:38',
            ),
            71 => 
            array (
                'departement_id' => 175,
                'nom_departement' => 'haute-marne',
                'region_id' => 30,
                'created_at' => '2023-12-09 09:45:38',
                'updated_at' => '2023-12-09 09:45:38',
            ),
            72 => 
            array (
                'departement_id' => 176,
                'nom_departement' => 'meurthe-et-moselle',
                'region_id' => 30,
                'created_at' => '2023-12-09 09:45:38',
                'updated_at' => '2023-12-09 09:45:38',
            ),
            73 => 
            array (
                'departement_id' => 177,
                'nom_departement' => 'aube',
                'region_id' => 30,
                'created_at' => '2023-12-09 09:45:38',
                'updated_at' => '2023-12-09 09:45:38',
            ),
            74 => 
            array (
                'departement_id' => 178,
                'nom_departement' => 'meuse',
                'region_id' => 30,
                'created_at' => '2023-12-09 09:45:38',
                'updated_at' => '2023-12-09 09:45:38',
            ),
            75 => 
            array (
                'departement_id' => 179,
                'nom_departement' => 'moselle',
                'region_id' => 30,
                'created_at' => '2023-12-09 09:45:39',
                'updated_at' => '2023-12-09 09:45:39',
            ),
            76 => 
            array (
                'departement_id' => 180,
                'nom_departement' => 'bas-rhin',
                'region_id' => 30,
                'created_at' => '2023-12-09 09:45:39',
                'updated_at' => '2023-12-09 09:45:39',
            ),
            77 => 
            array (
                'departement_id' => 181,
                'nom_departement' => 'haut-rhin',
                'region_id' => 30,
                'created_at' => '2023-12-09 09:45:40',
                'updated_at' => '2023-12-09 09:45:40',
            ),
            78 => 
            array (
                'departement_id' => 182,
                'nom_departement' => 'vosges',
                'region_id' => 30,
                'created_at' => '2023-12-09 09:45:46',
                'updated_at' => '2023-12-09 09:45:46',
            ),
            79 => 
            array (
                'departement_id' => 183,
                'nom_departement' => 'nord',
                'region_id' => 22,
                'created_at' => '2023-12-09 09:45:48',
                'updated_at' => '2023-12-09 09:45:48',
            ),
            80 => 
            array (
                'departement_id' => 184,
                'nom_departement' => 'oise',
                'region_id' => 22,
                'created_at' => '2023-12-09 09:45:48',
                'updated_at' => '2023-12-09 09:45:48',
            ),
            81 => 
            array (
                'departement_id' => 185,
                'nom_departement' => 'pas-de-calais',
                'region_id' => 22,
                'created_at' => '2023-12-09 09:45:49',
                'updated_at' => '2023-12-09 09:45:49',
            ),
            82 => 
            array (
                'departement_id' => 186,
                'nom_departement' => 'somme',
                'region_id' => 22,
                'created_at' => '2023-12-09 09:45:52',
                'updated_at' => '2023-12-09 09:45:52',
            ),
            83 => 
            array (
                'departement_id' => 187,
                'nom_departement' => 'mayenne',
                'region_id' => 32,
                'created_at' => '2023-12-09 09:45:54',
                'updated_at' => '2023-12-09 09:45:54',
            ),
            84 => 
            array (
                'departement_id' => 188,
                'nom_departement' => 'loire-atlantique',
                'region_id' => 32,
                'created_at' => '2023-12-09 09:45:55',
                'updated_at' => '2023-12-09 09:45:55',
            ),
            85 => 
            array (
                'departement_id' => 189,
                'nom_departement' => 'maine-et-loire',
                'region_id' => 32,
                'created_at' => '2023-12-09 09:45:55',
                'updated_at' => '2023-12-09 09:45:55',
            ),
            86 => 
            array (
                'departement_id' => 190,
                'nom_departement' => 'sarthe',
                'region_id' => 32,
                'created_at' => '2023-12-09 09:45:56',
                'updated_at' => '2023-12-09 09:45:56',
            ),
            87 => 
            array (
                'departement_id' => 191,
                'nom_departement' => 'vendée',
                'region_id' => 32,
                'created_at' => '2023-12-09 09:45:56',
                'updated_at' => '2023-12-09 09:45:56',
            ),
            88 => 
            array (
                'departement_id' => 192,
                'nom_departement' => 'paris',
                'region_id' => 33,
                'created_at' => '2023-12-09 09:45:58',
                'updated_at' => '2023-12-09 09:45:58',
            ),
            89 => 
            array (
                'departement_id' => 193,
                'nom_departement' => 'seine-et-marne',
                'region_id' => 33,
                'created_at' => '2023-12-09 09:45:58',
                'updated_at' => '2023-12-09 09:45:58',
            ),
            90 => 
            array (
                'departement_id' => 194,
                'nom_departement' => 'yvelines',
                'region_id' => 33,
                'created_at' => '2023-12-09 09:45:59',
                'updated_at' => '2023-12-09 09:45:59',
            ),
            91 => 
            array (
                'departement_id' => 195,
                'nom_departement' => 'essonne',
                'region_id' => 33,
                'created_at' => '2023-12-09 09:45:59',
                'updated_at' => '2023-12-09 09:45:59',
            ),
            92 => 
            array (
                'departement_id' => 196,
                'nom_departement' => 'hauts-de-seine',
                'region_id' => 33,
                'created_at' => '2023-12-09 09:45:59',
                'updated_at' => '2023-12-09 09:45:59',
            ),
            93 => 
            array (
                'departement_id' => 197,
                'nom_departement' => 'seine-saint-denis',
                'region_id' => 33,
                'created_at' => '2023-12-09 09:45:59',
                'updated_at' => '2023-12-09 09:45:59',
            ),
            94 => 
            array (
                'departement_id' => 198,
                'nom_departement' => 'val-de-marne',
                'region_id' => 33,
                'created_at' => '2023-12-09 09:45:59',
                'updated_at' => '2023-12-09 09:45:59',
            ),
            95 => 
            array (
                'departement_id' => 199,
                'nom_departement' => 'val-d\'oise',
                'region_id' => 33,
                'created_at' => '2023-12-09 09:45:59',
                'updated_at' => '2023-12-09 09:45:59',
            ),
            96 => 
            array (
                'departement_id' => 200,
                'nom_departement' => 'guadeloupe',
                'region_id' => 34,
                'created_at' => '2023-12-09 09:46:01',
                'updated_at' => '2023-12-09 09:46:01',
            ),
            97 => 
            array (
                'departement_id' => 201,
                'nom_departement' => 'martinique',
                'region_id' => 35,
                'created_at' => '2023-12-09 09:46:01',
                'updated_at' => '2023-12-09 09:46:01',
            ),
            98 => 
            array (
                'departement_id' => 202,
                'nom_departement' => 'guyane',
                'region_id' => 36,
                'created_at' => '2023-12-09 09:46:01',
                'updated_at' => '2023-12-09 09:46:01',
            ),
            99 => 
            array (
                'departement_id' => 203,
                'nom_departement' => 'la réunion',
                'region_id' => 37,
                'created_at' => '2023-12-09 09:46:01',
                'updated_at' => '2023-12-09 09:46:01',
            ),
            100 => 
            array (
                'departement_id' => 204,
                'nom_departement' => 'saint-pierre-et-miquelon',
                'region_id' => 38,
                'created_at' => '2023-12-09 09:46:02',
                'updated_at' => '2023-12-09 09:46:02',
            ),
            101 => 
            array (
                'departement_id' => 205,
                'nom_departement' => 'mayotte',
                'region_id' => 39,
                'created_at' => '2023-12-09 09:46:02',
                'updated_at' => '2023-12-09 09:46:02',
            ),
            102 => 
            array (
                'departement_id' => 206,
                'nom_departement' => 'polynésie-française',
                'region_id' => 40,
                'created_at' => '2023-12-09 09:46:02',
                'updated_at' => '2023-12-09 09:46:02',
            ),
            103 => 
            array (
                'departement_id' => 207,
                'nom_departement' => 'wallis-et-futuna',
                'region_id' => 41,
                'created_at' => '2023-12-09 09:46:02',
                'updated_at' => '2023-12-09 09:46:02',
            ),
        ));
        
        
    }
}