<?php

// Route::middleware('jwt.auth')->get('users', function(Request $request) {
//     return auth()->user();
// });

Route::post('user/register', 'APIRegisterController@register');
Route::post('user/login', 'APILoginController@login');


Route::group(['middleware' => ['jwt.auth']], function() {
    Route::post('save-recipe', 'RecipeController@store');
    Route::get('saved', 'RecipeController@getSavedRecipes');
    Route::delete('saved-recipe/delete/{id}', 'RecipeController@destroy');
});
