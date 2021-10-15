<?php

namespace Database\Factories;

use App\Models\Result;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ResultFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Result::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = DB::table('users')->count();
        $subject = DB::table('subjects')->count();
        $marks = [43.32, 45.00, 100.00];

        return [

            'user_id' => rand(3,$user-1),
            'subject_id' => rand(1,$subject-1),
            'term' => rand(1,3),
            'marks' => $marks[rand(0,2)],
            'comments' => $this->faker->text($maxNbChars = 20),
            'year' => '2021',


        ];
    }
}
