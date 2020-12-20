<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PatientSeeder extends Seeder
{
	public function run()
	{
        $faker = \Faker\Factory::create('pt_BR');

        $data = [];
        for ($i = 0; $i < 30; $i++) {
            $data[] = [
                'fullname' => $faker->name,
                'mother_fullname' => $faker->name('female'),
                'birthday' => $faker->date('Y-m-d', '-10 years'),
                'cpf' => $faker->cpf,
                'address' => $faker->streetName,
                'number' => $faker->buildingNumber,
                'complement' => $faker->secondaryAddress,
                'neighborhood' => $faker->citySuffix,
                'city' => $faker->city,
                'state' => $faker->stateAbbr,
                'cep' => $faker->randomNumber(8),
            ];
        }

        // Using Query Builder
        $this->db->table('patients')->insertBatch($data);
	}
}
