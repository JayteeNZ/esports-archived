<?php

use App\Tournament;
use Illuminate\Http\Request;

Route::get('users', function () {
	return \App\User::all();
});