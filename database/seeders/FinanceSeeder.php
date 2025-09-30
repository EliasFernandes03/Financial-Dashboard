<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FinanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('pt_BR');

        // Verificar se o usuário com id 1 existe
        $user = User::find(1);
        if (!$user) {
            throw new \Exception('Usuário com ID 1 não encontrado. Crie o usuário antes de rodar o seeder.');
        }

        // Criar categorias
        $categories = [
            ['name' => 'Alimentação'],
            ['name' => 'Transporte'],
            ['name' => 'Saúde'],
            ['name' => 'Educação'],
            ['name' => 'Lazer'],
            ['name' => 'Moradia'],
            ['name' => 'Outros'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['name' => $category['name']],
                ['created_at' => now(), 'updated_at' => now()]
            );
        }

        // Criar transações para o usuário com id 1
        $categoryIds = Category::pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) {
            Transaction::create([
                'user_id' => 1,
                'category_id' => $faker->randomElement($categoryIds),
                'amount' => $faker->randomFloat(2, 50, 5000),
                'type' => $faker->randomElement(['income', 'expense']),
                'description' => $faker->sentence(3),
                'date' => $faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}