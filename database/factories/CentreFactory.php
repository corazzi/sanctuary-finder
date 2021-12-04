<?php

namespace Database\Factories;

use App\Models\Centre;
use Illuminate\Database\Eloquent\Factories\Factory;

class CentreFactory extends Factory
{
    protected $model = Centre::class;

    public function definition(): array
    {
        $randomAnimal = $this->faker->randomElement([
            'Animal',
            'Cat',
            'Dog',
            'Bird',
            'Cat & Dog',
            'Exotic Animals',
        ]);

        $randomType = $this->faker->randomElement(['sanctuary', 'rescue']);

        return [
            'name' => "{$this->faker->company} {$randomAnimal} {$randomType}",
            'description' => $this->faker->paragraphs(3, true),
            'social_media' => [
                'facebook' => 'https://facebook.com/not-a-real-sanctuary',
                'twitter' => 'https://twitter.com/@notarealsanctuary',
                'instagram' => 'https://instagram.com/@notarealsanctuary',
            ],
            'web_address' => $this->faker->url,
            'volunteering_info' => $this->faker->randomElement(['', $this->faker->paragraph()]),
            'financial_support_info' => $this->faker->randomElement(['', $this->faker->paragraph()]),
            'is_vegan' => $this->faker->boolean,
            'type' => $randomType,
        ];
    }
}
