<?php
use App\Student;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // $students = Student::all();
    //     return view('components.content')->with('students', $students);

    return view('welcome');
});
Route::resource('/students', 'StudentsController');
Auth::routes();

 Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/students', 'StudentsController');
// Route::get('/students/{ id }', 'StudentsController@edit');
Route::post('/students/update', 'StudentsController@update');
Route::get('/students/{ id }', 'StudentsController@destroy');



