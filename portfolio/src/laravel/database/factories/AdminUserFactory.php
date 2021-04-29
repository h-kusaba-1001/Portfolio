<?php

namespace Database\Factories;

use App\Models\AdminUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdminUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => config('const.admin_user.name'),
            'email' => config('const.admin_user.email'),
            'email_verified_at' => now(),
            'password' => Hash::make(config('const.admin_user.password')), // password
            'remember_token' => Str::random(10),
        ];
    }
}
