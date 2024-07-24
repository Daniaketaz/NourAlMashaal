<?php

use App\Http\Controllers\studentController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\teacherController;
use App\Http\Controllers\SuperTeacherController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//-----------------------------student-------------------
Route::middleware(['auth:api','isStudent'])->group(function (){
    Route::get('attendanceAndAbsence',[studentController::class,'attendanceAndAbsence']);
    Route::get('teacherDetails/{id}',[studentController::class,'teacherDetails']);
    Route::get('showScheduale',[studentController::class,'showScheduale']);
    Route::get('token',[studentController::class,'showToken']);
    Route::get('showTeachers',[studentController::class,'showTeachers']);
    Route::get('studentDetails',[studentController::class,'studentDetails']);
    Route::post('logout',[Controller::class,'logout']);
});


Route::post('studentlogin',[studentController::class,'login']);
Route::post('createStudent',[Controller::class,'createStudent']);
Route::post('createTeacher',[Controller::class,'createTeacher']);
Route::post('createSuperTeacher',[Controller::class,'createSuperTeacher']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//------------------teacher-----------------
Route::middleware(['auth:api','isTeacher'])->group(function (){
   Route::post('addToken',[teacherController::class,'addToken']);
    Route::get('showSchedualeTeacher',[teacherController::class,'showSchedualeTeacher']);
    Route::get('showSubjects',[teacherController::class,'showSubjects']);
    Route::get('showClasses/{subject_id}',[teacherController::class,'showClasses']);
    Route::get('showStudent/{classNumber_id}',[teacherController::class,'showStudents']);
    Route::get('showStudentDetails/{id}',[teacherController::class,'showStudentDetails']);
});
//------------------------------Rania'spart--------------------------
Route::middleware(['auth:api'])->group(function (){
   Route::get('SuperTeacherDetails',[SuperTeacherController::class,'SuperTeacherDetails']);
   Route::get('ShowClassesNumber',[SuperTeacherController::class,'ShowClassesNumber']);
   Route::get('showStudents/{id}',[SuperTeacherController::class,'showClassStudents']);
});
