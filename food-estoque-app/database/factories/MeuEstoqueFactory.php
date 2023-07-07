<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cesta;
use App\Models\MeuEstoque;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MeuEstoque>
 */
class MeuEstoqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = MeuEstoque::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->realText(rand(10, 30)),
            'descricao' => $this->faker->realText(rand(10, 100)),
            'categoria' => $this->faker->randomElement(['Frutas', 'Legumes', 'Carnes', 'Bebidas']),
            'unidade_medida' => $this->faker->randomElement(['kg', 'g', 'unidade']),
            'quantidade' => $this->faker->randomElement([
                $this->faker->numberBetween(1, 20), 
                $this->faker->randomFloat(2, 0.1, 20)
            ]),
            'foto' => $this->faker->imageUrl(),
            'validade' => $this->faker->dateTimeBetween('now', '+1 week'),
            'cesta_id' => $this->faker->randomElement([
                Cesta::inRandomOrder()->first()->id ?? Cesta::factory()->create()->id, null
            ]),
        ];
    }
}
