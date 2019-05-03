<?php

Route::post('user/register', 'APIRegisterController@register');
Route::post('user/login', 'APILoginController@login');