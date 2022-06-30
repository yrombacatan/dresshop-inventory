<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'mfg_date' => $this->faker->word,
        'exp_date' => $this->faker->word,
        'quantity' => $this->faker->randomDigitNotNull,
        'sell_price' => $this->faker->randomDigitNotNull,
        'supplier_price' => $this->faker->randomDigitNotNull,
        'model' => $this->faker->word,
        'sku' => $this->faker->word,
        'img' => $this->faker->word,
        'description' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'product_category_id' => $this->faker->word,
        'supplier_id' => $this->faker->word,
        'warehouse_id' => $this->faker->word
        ];
    }
}
