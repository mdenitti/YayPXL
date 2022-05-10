<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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
    return view('welcome');
});

Route::get('/test', function () {
    $a = 2;
    $b = 3;
    $c = $a + $b;
    return $c;
});

Route::get('/test/{id}',function ($id) {
    $student = App\Models\Student::find($id);
    if ($student) {
        return $student;
    } else {
        return response()->json(['data' => 'Resource not found'], 404);
    }
});

// routes students
Route::get('/students',[StudentController::class,'showAll']);
Route::get('/student/{id}',[StudentController::class,'showStudent']);

Route::post('/students',[StudentController::class,'store']);

Route::get('/signup', function () {
    $courses = App\Models\Course::all();
    
    return view('signup',compact('courses'));
});



// routes courses
Route::get('/courses', function () {
    return view('courses');
});

// routes teachers
Route::get('/teachers', function () {
    return view('teachers');
});

// routes locations
Route::get('/locations', function () {
    return view('locations');
});

// routes contact
Route::get('/contact', function () {
    return view('contact');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
