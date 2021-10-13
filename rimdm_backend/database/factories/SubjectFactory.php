<?php

namespace Database\Factories;
use Illuminate\Support\Facades\DB;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subject::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $classes = DB::table('class_levels')->count();
        return [
            'name' => $this->faker->name(),
            'class_level_id' => rand(1,$classes-1),
        ];
    }
}
