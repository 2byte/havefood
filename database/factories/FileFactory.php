<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'filename' => uniqid('', true) .'.jpg',
            'type' => 'img',
            'size_img_x' => 300,
            'size_img_y' => 300,
            'filesize' => mt_rand(300, 1024) * 1024,
        ];
    }
}
