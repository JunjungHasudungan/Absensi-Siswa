<?php

use App\Http\Controllers\{
    ProfileController,
    HomeController,
};

use App\Http\Controllers\Admin\{
    SubjectController,
    ClassroomController,
    PostController,
    AdministrationController,
    TeacherAdministrationController as TeacherAdministrationsController,
    UserController,
};

use App\Http\Controllers\Teacher\{
    AdministrationController as TeacherAdministrationController,
    AttendanceController as TeacherAttendanceController,
    PresationController
};

use App\Http\Controllers\Student\{
    SubjectController as StudentSubjectController,
    AttendanceController as StudentAttendanceController,
};

use Illuminate\Support\Facades\Route;


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

Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route admin
    Route::group(['middleware'  => 'role:admin', 'prefix' => 'admin',  'as' => 'admin.'], function(){
        Route::resources([
            'subjects'  => SubjectController::class,
            'classrooms'        => ClassroomController::class,
            'posts'             => PostController::class,
            'administrations'   => TeacherAdministrationsController::class,
            'users'             => UserController::class,
        ]);

    });

    Route::group(['middleware' => 'role:teacher', 'prefix'  => 'teacher', 'as' => 'teacher.'], function(){
        Route::get('presantions/coreIndex', [PresationController::class, 'coreIndex']);

        Route::resources([
            'administrations'      =>  TeacherAdministrationController::class,
            'attendances'          =>  TeacherAttendanceController::class,
            'presations'            => PresationController::class,
        ]);
    });

    Route::group(['middleware'  => 'role:student', 'prefix' => 'student', 'as'  => 'student.'], function(){
        Route::resources([
            'subjects'              => StudentSubjectController::class,
            'attendances'           => StudentAttendanceController::class,
        ]);
    });
});

// Route::get('/presations', [ PresationController::class, 'coreIndex' ])->middleware('role:teacher');
require __DIR__.'/auth.php';
