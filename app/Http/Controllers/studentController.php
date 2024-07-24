<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use App\Models\week_s_day;
use GPBMetadata\Google\Api\Auth;
use Illuminate\Http\Request;
use function Beste\Cache\get;
use function League\Uri\UriTemplate\first;

use Illuminate\Support\Facades\Validator;

class studentController extends Controller
{

   public function studentDetails(){

       $user = auth()->user()->load('student');

       return response()->json($user, 200);
   }

    public function showTeachers(){
        $schedual = auth()->user()->student->schedual
            ->with('week_s_day.lessons.teacherSubject.teacher')->first();
        $teachers = collect();

        foreach ($schedual->week_s_day as $week_s_day) {
            foreach ($week_s_day->lessons as $lesson) {

                $teachers->push([
                    'first name'=>$lesson->teacherSubject->teacher->user->first_name,
                    'last name'=>$lesson->teacherSubject->teacher->user->last_name,
                    'subject_name'=> $lesson->teacherSubject->subject_name,
                    'teacher_id'=>$lesson->teacherSubject->teacher->id

                ]);
            }
                }


        return response()->json([
            'teachers' => $teachers
        ]);
    }

    public function teacherDetails($id){
        $teacher=Teacher::query()->findOrFail($id)->load('user');
        return response()->json($teacher);
    }

    public function showToken(Request $request){
        Validator::make($request->all(), [
            'lesson_id'=>'required',
            'day_id'=>'required'
        ])->validate();

        $id=$request->lesson_id;
        $lesson=Lesson::where('id',$id)->
                where('week_s_day_id',$request->day_id)
                ->with('token')->first();
        if (!$lesson) {
            return response()->json(['status' => 0, 'message' => 'Lesson not found']);
        }
        $tokens = collect();
        foreach ($lesson->token as $token) {
            $tokens->push([
                'token' => $token->token,
                'date' => $token->date,
                'type' => $token->type->type,
            ]);
        }

        $sortedTokens = $tokens->sortByDesc('date')->values();

        return response()->json( $sortedTokens);}

    public function showScheduale(){
        $scheduales = auth()->user()->student->schedual->
        with('week_s_day.lessons.teacherSubject')->first();
        $lessons = collect();
        foreach ($scheduales->week_s_day as $week){
            foreach ($week->lessons as $le){
                $lessons->push([
                    'subject_name'=> $le->teacherSubject->subject_name,
                    'lesson'=>$le->lesson_number,
                    'lesson_id'=>$le->id,
                    'day_of_week'=>$week->day,
                    'day_id'=>$week->id,
                    'class_number'=>$scheduales->classNumber->ClassNumber,
                    'class'=>$scheduales->classNumber->classs->name,
                ]);
            }

        }
       return response()->json($lessons);
    }

    public function attendanceAndAbsence(){
       $id=auth()->user()->id;
       $days=Student::query()->where('user_id',$id)->get(['attendance_days','absence_days']);
       return response()->json($days);

    }
}
