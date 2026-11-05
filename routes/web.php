<?php

use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';


Route::get('/about', function (){
    $name = 'Motaz';
    // return view ('about')->with('name',$name);
    // return view ('about', ['name' => $name]);
    return view ('about', compact('name'));
    $department = [
        '1' => 'Technical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];
});
Route::post('/about', function (){
    $name = request('name');
    $department = request('department');
    return view ('about', compact('name', 'department'));
});
Route::get('tasks', function (){
    return view ('tasks');
});
Route::post('create', function (){
    $name = $_POST['name'];
    DB::table('tasks')->insert(['name' => $task_name]);
    return view ('tasks');
});