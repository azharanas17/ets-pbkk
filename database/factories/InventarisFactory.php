<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InventarisFactory extends Factory
{
    public function definition(): array
    {
        return [
            'jenis' => $this->faker->randomElement(['Meja', 'Kursi', 'Lemari', 'Komputer', 'Laptop']),
            'kondisi' => $this->faker->randomElement(['baik', 'layak', 'rusak']),
            'keterangan' => $this->faker->text(100),
            'kecacatan' => $this->faker->text(100),
            'jumlah' => $this->faker->numberBetween(1, 100),
        ];
    }

}
