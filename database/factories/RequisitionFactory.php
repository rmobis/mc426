<?php

use Faker\Generator as Faker;

$factory->define(App\Requisition::class, function (Faker $faker) {
	return [
		'topic' => $faker->sentence,
		'category_id' => function () {
			return App\Category::inRandomOrder()->first()->id;
		},
		'description' => $faker->paragraph
	];
});
