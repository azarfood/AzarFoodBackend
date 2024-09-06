<?php

namespace Database\Seeders;

use App\Enums\FoodCategory;
use App\Enums\FoodType;
use App\Models\FoodTemplate;
use Illuminate\Database\Seeder;

class FoodTemplateSeeder extends Seeder
{
    public function run(): void
    {
        $templates = [
            [
                "name" => "قرمه سبزی",
                "image" => "image",
                "description" => "گوشت و سبزی و لوبیا . بخور نوش جونت:)",
                "type" => FoodType::FOOD,
                "category" => FoodCategory::SONNATI
            ],
            [
                "name" => "قیمه",
                "image" => "image",
                "description" => "گوشت و لبه و سیب زمینی . بخور نوش جونت:)",
                "type" => FoodType::FOOD,
                "category" => FoodCategory::SONNATI
            ],
            [
                "name" => "همبرگر",
                "image" => "image",
                "description" => "اجغ وجغ . بخور نوش جونت:)",
                "type" => FoodType::FOOD,
                "category" => FoodCategory::FASTFOOD
            ],
            [
                "name" => "نوشابه",
                "image" => "image",
                "description" => "ساری نوشابه",
                "type" => FoodType::PRODUCT,
                "category" => FoodCategory::FASTFOOD
            ],
        ];
        foreach ($templates as $template) {
            FoodTemplate::factory()->create($template);
        }
    }
}
