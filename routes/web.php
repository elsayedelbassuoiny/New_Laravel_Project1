<?php

use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DeparmentController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DoctorController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/studentwelcome', function () {
    return view('studentwelcome');
});



Route::get('/adminwelcome', function () {
    return view('adminwelcome');
});

Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);


Route::get('/confirm_subject', [SubjectController::class, 'desplay'] );


Route::get('/login/adding_department',  [DeparmentController::class,'index']);
Route::post('/create',  [DeparmentController::class,'dataInsert']);


Route::resource('/subjects', SubjectController::class);
Route::get('/subjects/{id}/subscribe', [SubjectController::class, 'subscribe'] );
Route::get('/subjects/{id}/files/create', [ SubjectController::class, 'create_file' ]);
Route::post('/subjects/{id}/files', [ SubjectController::class, 'store_file' ]);

Route::resource('/departments',DeparmentController::class);

Route::resource('/attendences',AttendenceController::class);
Route::get("/attendences/{subjectId}/subscribe", [AttendenceController::class, 'subscribe' ]);


Route::get('/doctorwelcome', function () {
    return view('doctorwelcome');
});
Route::resource('/doctors', DoctorsController::class);


Route::resource('/students',StudentController::class);
Route::resource('/doctors',DoctorController::class);


Route::get('/subjectsDoctor',[DoctorController::class , 'display']);
