<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmployeSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('employe')->delete();
        
        \DB::table('employe')->insert(array (
            0 => 
            array (
                'code_employe' => 1,
                'prenom' => 'Ilyas',
                'nom' => 'Mohetna',
                'utilisateur' => 'admin',
                'mot_de_passe' => '$2y$10$j6banzcJrbm5/pKcQWMSKu5Z5GUhoijTEICk3bHWyQeA2YK23hUUe',
                'email' => 'ilyas.mohetna@hotmail.com',
                'date_naissance' => '2023-12-08',
                'date_embauche' => '2023-12-08',
                'derniere_connexion' => NULL,
                'id_agence' => 1,
                'code_fonction' => 1,
                'created_at' => '2023-12-09 10:35:19',
                'updated_at' => '2023-12-09 10:35:19',
            ),
            1 => 
            array (
                'code_employe' => 2,
                'prenom' => 'Lionel',
                'nom' => 'Messi',
                'utilisateur' => 'goat',
                'mot_de_passe' => '$2y$10$j6banzcJrbm5/pKcQWMSKu5Z5GUhoijTEICk3bHWyQeA2YK23hUUe',
                'email' => 'lionel.messi@gsb.com',
                'date_naissance' => '2023-12-24',
                'date_embauche' => '2023-12-24',
                'derniere_connexion' => NULL,
                'id_agence' => 7,
                'code_fonction' => 2,
                'created_at' => '2023-12-24 11:02:22',
                'updated_at' => '2023-12-24 11:02:22',
            ),
            3 => 
            array (
                'code_employe' => 3,
                'prenom' => 'Critiano',
                'nom' => 'Ronaldo',
                'utilisateur' => 'cr7',
                'mot_de_passe' => '$2y$10$j6banzcJrbm5/pKcQWMSKu5Z5GUhoijTEICk3bHWyQeA2YK23hUUe',
                'email' => 'cristiano.ronaldo@gsb.com',
                'date_naissance' => '2023-12-24',
                'date_embauche' => '2023-12-24',
                'derniere_connexion' => NULL,
                'id_agence' => 7,
                'code_fonction' => 2,
                'created_at' => '2023-12-24 11:02:22',
                'updated_at' => '2023-12-24 11:02:22',
            )
        ));
        
        
    }
}