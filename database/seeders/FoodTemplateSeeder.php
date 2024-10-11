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
                "category" => FoodCategory::IRANIAN
            ],
            [
                "name" => "کباب",
                "image" => "image",
                "description" => "گوشت  گوساله. نوش جونت:)",
                "type" => FoodType::FOOD,
                "category" => FoodCategory::IRANIAN
            ],
            [
                "name" => "جوجه",
                "image" => "image",
                "description" => "جوجه دا دای چی بگم :/. نوش جونت:)",
                "type" => FoodType::FOOD,
                "category" => FoodCategory::FRIED_FOOD
            ],
            [
                "name" => "قیمه",
                "image" => "image",
                "description" => "گوشت و لبه و سیب زمینی . بخور نوش جونت:)",
                "type" => FoodType::FOOD,
                "category" => FoodCategory::IRANIAN
            ],
            [
                "name" => "همبرگر",
                "image" => "image",
                "description" => "اجغ وجغ . بخور نوش جونت:)",
                "type" => FoodType::FOOD,
                "category" => FoodCategory::BURGER
            ],
            [
                "name" => "بندری",
                "image" => "image",
                "description" => "اجغ وجغ تند . بخور نوش جونت:)",
                "type" => FoodType::FOOD,
                "category" => FoodCategory::BURGER
            ],
            [
                "name" => "فلافل",
                "image" => "image",
                "description" => "اجغ وجغ جنوب . بخور نوش جونت:)",
                "type" => FoodType::FOOD,
                "category" => FoodCategory::BURGER
            ],
            [
                "name" => "نوشابه",
                "image" => "image",
                "description" => "ساری نوشابه",
                "type" => FoodType::PRODUCT,
                "category" => FoodCategory::PRODUCT
            ],
            [
                "name" => "آب",
                "image" => "image",
                "description" => "یزیده لعنت",
                "type" => FoodType::PRODUCT,
                "category" => FoodCategory::PRODUCT
            ],
        ];
        foreach ($templates as $template) {
            FoodTemplate::factory()->create($template);
        }
    }
}
