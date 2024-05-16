<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('region')->delete();
        
        \DB::table('region')->insert(array (
            0 => 
            array (
                'region_id' => 21,
                'nom_region' => 'bourgogne-franche-comté',
                'created_at' => '2023-12-09 09:44:53',
                'updated_at' => '2023-12-09 09:44:53',
            ),
            1 => 
            array (
                'region_id' => 22,
                'nom_region' => 'hauts-de-france',
                'created_at' => '2023-12-09 09:44:53',
                'updated_at' => '2023-12-09 09:44:53',
            ),
            2 => 
            array (
                'region_id' => 23,
                'nom_region' => 'provence-alpes-côte d\'azur',
                'created_at' => '2023-12-09 09:44:53',
                'updated_at' => '2023-12-09 09:44:53',
            ),
            3 => 
            array (
                'region_id' => 24,
                'nom_region' => 'auvergne-rhône-alpes',
                'created_at' => '2023-12-09 09:44:53',
                'updated_at' => '2023-12-09 09:44:53',
            ),
            4 => 
            array (
                'region_id' => 25,
                'nom_region' => 'occitanie',
                'created_at' => '2023-12-09 09:44:53',
                'updated_at' => '2023-12-09 09:44:53',
            ),
            5 => 
            array (
                'region_id' => 26,
                'nom_region' => 'normandie',
                'created_at' => '2023-12-09 09:45:06',
                'updated_at' => '2023-12-09 09:45:06',
            ),
            6 => 
            array (
                'region_id' => 27,
                'nom_region' => 'centre-val de loire',
                'created_at' => '2023-12-09 09:45:12',
                'updated_at' => '2023-12-09 09:45:12',
            ),
            7 => 
            array (
                'region_id' => 28,
                'nom_region' => 'bretagne',
                'created_at' => '2023-12-09 09:45:15',
                'updated_at' => '2023-12-09 09:45:15',
            ),
            8 => 
            array (
                'region_id' => 29,
                'nom_region' => 'nouvelle-aquitaine',
                'created_at' => '2023-12-09 09:45:18',
                'updated_at' => '2023-12-09 09:45:18',
            ),
            9 => 
            array (
                'region_id' => 30,
                'nom_region' => 'grand est',
                'created_at' => '2023-12-09 09:45:18',
                'updated_at' => '2023-12-09 09:45:18',
            ),
            10 => 
            array (
                'region_id' => 31,
                'nom_region' => 'corse',
                'created_at' => '2023-12-09 09:45:37',
                'updated_at' => '2023-12-09 09:45:37',
            ),
            11 => 
            array (
                'region_id' => 32,
                'nom_region' => 'pays de la loire',
                'created_at' => '2023-12-09 09:45:54',
                'updated_at' => '2023-12-09 09:45:54',
            ),
            12 => 
            array (
                'region_id' => 33,
                'nom_region' => 'île-de-france',
                'created_at' => '2023-12-09 09:45:58',
                'updated_at' => '2023-12-09 09:45:58',
            ),
            13 => 
            array (
                'region_id' => 34,
                'nom_region' => 'guadeloupe',
                'created_at' => '2023-12-09 09:46:01',
                'updated_at' => '2023-12-09 09:46:01',
            ),
            14 => 
            array (
                'region_id' => 35,
                'nom_region' => 'martinique',
                'created_at' => '2023-12-09 09:46:01',
                'updated_at' => '2023-12-09 09:46:01',
            ),
            15 => 
            array (
                'region_id' => 36,
                'nom_region' => 'guyane',
                'created_at' => '2023-12-09 09:46:01',
                'updated_at' => '2023-12-09 09:46:01',
            ),
            16 => 
            array (
                'region_id' => 37,
                'nom_region' => 'la réunion',
                'created_at' => '2023-12-09 09:46:01',
                'updated_at' => '2023-12-09 09:46:01',
            ),
            17 => 
            array (
                'region_id' => 38,
                'nom_region' => 'saint-pierre-et-miquelon',
                'created_at' => '2023-12-09 09:46:02',
                'updated_at' => '2023-12-09 09:46:02',
            ),
            18 => 
            array (
                'region_id' => 39,
                'nom_region' => 'mayotte',
                'created_at' => '2023-12-09 09:46:02',
                'updated_at' => '2023-12-09 09:46:02',
            ),
            19 => 
            array (
                'region_id' => 40,
                'nom_region' => 'polynésie-française',
                'created_at' => '2023-12-09 09:46:02',
                'updated_at' => '2023-12-09 09:46:02',
            ),
            20 => 
            array (
                'region_id' => 41,
                'nom_region' => 'wallis-et-futuna',
                'created_at' => '2023-12-09 09:46:02',
                'updated_at' => '2023-12-09 09:46:02',
            ),
        ));
        
        
    }
}