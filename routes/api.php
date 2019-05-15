<?php

Route::middleware('jwt.auth')->get('users', function(Request $request) {
    return auth()->user();
});

Route::post('user/register', 'APIRegisterController@register');
Route::post('user/login', 'APILoginController@login');
Route::post('user/save-recipe', 'RecipeController@store');
Route::get('user/saved', 'RecipeController@getSavedRecipes');

Route::post('user/saved-recipe/{id}', 'RecipeController@destroy');

