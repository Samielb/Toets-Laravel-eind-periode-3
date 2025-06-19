<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        return [
            'name' => fake()->unique()->word(),
            'description' => fake()->paragraph(),
            'teacher_id' => Teacher::factory(),
        ];
    }
}
