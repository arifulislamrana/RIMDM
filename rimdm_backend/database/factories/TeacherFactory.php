<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teacher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $role = DB::table('roles')->count();
        return [

            'name' => $this->faker->name(),
            'designation' => $this->faker->name(),
            'qualification' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'role_id' => rand(1,$role-1),
            'password' => bcrypt('123456'),
            'img' => 'dasda/sad.jpg',

        ];
    }
}
