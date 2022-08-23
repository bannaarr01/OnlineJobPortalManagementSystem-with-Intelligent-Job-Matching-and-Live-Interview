<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    { //Malaysia address and phone number
      $this->faker->addProvider(new \Faker\Provider\ms_MY\Address($this->faker));

      $this->faker->addProvider(new \Faker\Provider\ms_MY\PhoneNumber($this->faker));

        return [
          //Get d users we have at random
          'user_id'=> User::all()->random()->id,
          'cname' => $name=$this->faker->company,
          'slug' => str_slug($name),
          'address'=>$this->faker->townState,
          'phone'=> $this->faker->fixedLineNumber($countryCodePrefix = null|true|false, $formatting = null|true|false),
          'website'=> $this->faker->domainName,
          'slogan'=> 'learn-earn and grow',
          'description'=> $this->faker->paragraph(rand(2,10))
        ];
    }
}
