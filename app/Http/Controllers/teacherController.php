<?php

namespace App\Http\Controllers;

use App\Models\class_number;
use App\Models\Lesson;
use App\Models\Schedual;
use App\Models\Student;
use App\Models\Teacher_subject;
use App\Models\Token;
use App\Models\Type;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;
class teacherController extends Controller
{
    public function showSchedualeTeacher(){
        $scheduales = auth()->user()->teacher;
        $lessons = collect();
                foreach ($scheduales->teacherSubject as $teacherSubject){
                    foreach ($teacherSubject->lesson as $le){
                        $lessons->push([
                            'subject_name'=> $teacherSubject->subject_name,
                            'lesson'=>$le->lesson_number,
                            'lesson_id'=>$le->id,
                            'day_od_week'=>$le->week_s_day->day,
                            'day_id'=>$le->week_s_day->id,
                            'class_number'=>$le->week_s_day->schedual->classNumber->ClassNumber,
                            'class'=>$le->week_s_day->schedual->classNumber->classs->name,
                        ]);
                    }

                }

            return response()->json($lessons);
    }

    public function addToken(Request $request){
        Validator::make($request->all(), [
            'lesson_id'=>'required',
            'week_s_day_id'=>'required',
            'activity'=>'required|string',
            'type_id'=>'required|integer',
            'date' => 'required|date_format:Y-m-d'
        ])->validate();

            $lesson_id=$request->lesson_id;
            $day_id=$request->week_s_day_id;
            $type_id=$request->type_id;
        $date = Carbon::createFromFormat('Y-m-d', $request->date)->startOfDay(); // Parse the date
        if(Lesson::query()->where('id',$lesson_id)->
                where('week_s_day_id',$day_id)->exists()&&
                        Type::where('id',$type_id)->exists())
        {
            $type=Token::query()->create([
                'lesson_id'=>$lesson_id,
                'token'=>$request->activity,
                'type_id'=>$type_id,
                 'date' => $date,
            ]);

            return response()->json(['status'=>1,'message'=>'added successfully']);
        }
        else{
            return response()->json([
                'status'=>0,
                'message'=>'lesson doesn\'t existe']);
        }



    }

    public function showSubjects(){
        $teacher=auth()->user()->teacher;
            $subjects=collect();
            foreach ($teacher->teacherSubject as $teacherSubject){
                $subjects->push([
                    'subject_name'=>$teacherSubject->subject_name,
                    'subject_id'=>$teacherSubject->id
                ]);
            }
        return response()->json($subjects);
    }

    public function showClasses($subject_id){

        $collect=collect();
        $subject=Teacher_subject::query()->findOrFail($subject_id);

        foreach ($subject->lesson as $le){

            $classNumber = $le->week_s_day->Schedual->classNumber;
            if (!$collect->pluck('classnumber_id')->contains($classNumber->id)) {
                    $collect->push([
                        'classnumber_id' => $classNumber->id,
                        'class_number' => $classNumber->ClassNumber,
                        'class' => $classNumber->classs->name,
                        'class_id' => $classNumber->classs->id,

                    ]);}

            }
            return response()->json($collect);
    }

    public function showStudents($class_id){
        $scheduals = Schedual::where('classNumber_id', $class_id)->with('student.user')->first();
        $students=collect();
            foreach ($scheduals->student as $student){
                $students->push([
                    'first name'=>$student->user->first_name,
                    'last name'=>$student->user->last_name,
                    'student id'=>$student->id,
                ]);
            }
            return response()->json($students);
    }

    public function showStudentDetails($id){

            $user = Student::query()->findOrFail($id)->load('user');

            return response()->json($user, 200);

    }
}
