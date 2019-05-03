<?php

Route::middleware('jwt.auth')->get('users', function(Request $request) {
    return auth()->user();
});
Route::post('user/register', 'APIRegisterController@register');
Route::post('user/login', 'APILoginController@login');