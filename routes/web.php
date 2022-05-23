<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ContactController;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', function () {
    $results = App\Models\Student::with('course')->get();
    $response = Http::get('https://api.openweathermap.org/data/2.5/weather?q=genk&appid=0404c984d549fe4cdedaf43613488470&units=metric');
    $weather = $response->json();
    //dd($weather);
    $nowtime = Carbon::now();
    //$time = Carbon::create('first day of december 2022')->addDays(30)->format('d/m/Y');
    
    $time_one = Carbon::create('25 december 2022');
    $time_two = Carbon::now();

    $time = $time_one->diffInSeconds($time_two);


    return view('welcome',compact('results','weather','time'));
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
Route::get('/students',[StudentController::class,'showAll'])->middleware('auth');
Route::get('/student/{id}',[StudentController::class,'showStudent']);

Route::post('/students',[StudentController::class,'store']);

Route::get('/signup', function () {
    $courses = App\Models\Course::all();
    
    return view('signup',compact('courses'));
});


// Mail::raw -> use case: internal notification system...
Route::get('/mailtest', function () {
   $test =  Mail::raw('bonjour', function ($message){
        $message->subject('Email de test')
        ->to('test@YayPXL.be');
    });
    dd($test);
});

// Expose a public API

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
Route::post('/contact',[ContactController::class,'store']);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});