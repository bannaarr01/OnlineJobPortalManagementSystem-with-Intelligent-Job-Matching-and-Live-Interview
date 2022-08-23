<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   //faker malaysia address
        $this->faker->addProvider(new \Faker\Provider\ms_MY\Address($this->faker));

        return [
            'user_id' =>User::all()->random()->id,
            'company_id'=>Company::all()->random()->id,
            'title'=>$title=$this->faker->text,
            'slug'=>str_slug($title),
            'position'=>$this->faker->jobTitle,
            'address'=>$this->faker->township,
            'state'=>$this->faker->townState,
            'category_id'=> rand(1,5),
            'type'=>'fulltime',
            'experience'=>rand(1,20),
            'number_of_vacancy'=>rand(1,10),
            'salary'=>rand(500,15000),
            'status'=>rand(0,1),
            'qualification'=>'BSC/Masters Degree',
            'description'=>$this->faker->paragraph(rand(2,10)),
            'roles'=>$this->faker->text,
            'last_date'=>$this->faker->dateTimeBetween('now', '+6 months')
        ];



    }
}
