<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Group::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            //
            'name'=>$this->faker->unique()->randomDigitNotNull,
            'days'=>'{"su":null,"mo":"15:40","tu":null,"we":"20:00","th":null,"fr":null,"sa":null}',
            'course_id' => $this->faker->numberBetween(1,Course::count()),
            'status'=>'current'
        ];
    }
}
