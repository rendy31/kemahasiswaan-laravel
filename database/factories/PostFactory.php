<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6, true), // Judul artikel
            'slug' => Str::slug($this->faker->sentence(6, true)), // Slug dari judul
            'thumbnail' => 'thumbnails/' . $this->faker->image(
                storage_path('app/public/thumbnails'), // Path folder untuk menyimpan gambar
                640, // Lebar gambar
                480, // Tinggi gambar
                null, // Kategori (opsional)
                false // Hanya nama file
            ),
            'category_id' => $this->faker->randomElement([1, 2, 3]), // ID kategori
            'content' => $this->faker->paragraphs(5, true), // Konten artikel
            'isPublish' => 1, // Status publish
            'user_id' => 1 // ID user
        ];
    }
}
