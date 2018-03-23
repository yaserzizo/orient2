<?php

//use jeremykenedy\LaravelRoles\Models\Role;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/* @var \Illuminate\Database\Eloquent\Factory $factory */
/*$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;
    $userRole = Role::whereName('User')->first();

    return [
        'name'                           => $faker->unique()->userName,
        'first_name'                     => $faker->firstName,
        'last_name'                      => $faker->lastName,
        'email'                          => $faker->unique()->safeEmail,
        'password'                       => $password ?: $password = bcrypt('secret'),
        'token'                          => str_random(64),
        'activated'                      => true,
        'remember_token'                 => str_random(10),
        'signup_ip_address'              => $faker->ipv4,
        'signup_confirmation_ip_address' => $faker->ipv4,
    ];
});

$factory->define(App\Models\Profile::class, function (Faker\Generator $faker) {
    return [
        'user_id'          => factory(App\Models\User::class)->create()->id,
        'theme_id'         => 1,
        'location'         => $faker->streetAddress,
        'bio'              => $faker->paragraph(2, true),
        'twitter_username' => $faker->userName,
        'github_username'  => $faker->userName,
    ];
});
*/

$factory->define(App\Models\Products\Brand::class, function (Faker\Generator $faker) {
    return [
        'brand' => $faker->word,
        'description' => $faker->word,
        'created_by' => $faker->numberBetween(1,4),
        'updated_by' => $faker->numberBetween(1,4),

    ];
});

$factory->define(App\Models\Products\ProductPrerequisite::class, function (Faker\Generator $faker) {


    return [
        'product_id' => $faker->numberBetween(1,50),
        'prerequisites' => function ()use($faker) {
            $evenValidator = function($digit) {
                return $digit <= 50 && $digit >0;
    };
            $values = array();
        $rnd = $faker->randomDigit;
            for ($i=0; $i < $rnd; $i++) {
                $values []= $faker->unique()->numberBetween(1, 50);
            }
            $faker->unique($reset = true);
            return $values;
        },
        'description' => $faker->word,
        'created_by' => $faker->numberBetween(1,4),
        'updated_by' => $faker->numberBetween(1,4),

    ];
});

$factory->define(App\Models\Products\Product::class, function (Faker\Generator $faker) {
    return [
        'code' => $faker->unique()->text(10),
        'name' => $faker->name,
        'description' => $faker->word,
        'model' => $faker->word,
        'product_type_id' =>$faker->numberBetween(1,3),
        'brand_id' => $faker->numberBetween(1,6),
        'sub_category_id' => $faker->numberBetween(1,6),
        'uom_id' => $faker->numberBetween(1,3),
        'is_active' => $faker->boolean,
        'options' => $faker->words,
        'created_by' => $faker->numberBetween(1,4),
        'updated_by' => $faker->numberBetween(1,4),

    ];
});

$factory->define(App\Models\Products\SubCategory::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->word,
        'category_id' => $faker->numberBetween(1,4),
        'created_by' => $faker->numberBetween(1,4),
        'updated_by' => $faker->numberBetween(1,4),

    ];
});

$factory->define(App\Models\Products\Uom::class, function (Faker\Generator $faker) {
    return [
        'uom' => $faker->word,
        'description' => $faker->word,
        'created_by' => $faker->numberBetween(1,4),
        'updated_by' => $faker->numberBetween(1,4),

    ];
});

$factory->define(App\Models\Products\ProductType::class, function (Faker\Generator $faker) {
    return [
        'type' => $faker->word,
        'description' => $faker->word,
        'created_by' => $faker->numberBetween(1,4),
        'updated_by' => $faker->numberBetween(1,4),

    ];
});

$factory->define(App\Models\Products\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->word,
        'created_by' => $faker->numberBetween(1,4),
        'updated_by' => $faker->numberBetween(1,4),

    ];
});

$factory->define(App\Models\Suppliers\Supplier::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->company,
        'address' => $faker->address,
        'notes' =>$faker->paragraph,
        'created_by' => $faker->numberBetween(1,4),
        'updated_by' => $faker->numberBetween(1,4),

    ];
});

$factory->define(App\Models\Suppliers\SupplierContact::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'supplier_id' => $faker->numberBetween(1,20),
        'phone'=>$faker->unique()->phoneNumber,
        'phone2'=>$faker->unique()->phoneNumber,
        'email'=>$faker->unique()->email,
        'notes' =>$faker->paragraph,
        'created_by' => $faker->numberBetween(1,4),
        'updated_by' => $faker->numberBetween(1,4),

    ];
});



