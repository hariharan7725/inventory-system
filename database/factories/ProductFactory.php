<?php
namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $name = $this->faker->words(3, true);
        return [
            'name' => ucfirst($name),
            'sku' => strtoupper($this->faker->bothify('SKU-???-#####')),
            'description' => $this->faker->sentence(10),
            'price' => $this->faker->randomFloat(2, 10, 2000),
            'stock' => $this->faker->numberBetween(0, 300),
            'min_stock' => $this->faker->numberBetween(0, 20),
        ];
    }
}
