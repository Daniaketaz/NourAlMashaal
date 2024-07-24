<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class SuperTeacherController extends Controller
{

        public function login(){
            $credentials = request()->validate([
                'user_name' => ['required'],
                'password' => ['required'],
            ]);

            if (!auth()->attempt($credentials)) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Invalid Credentials'
                ]);
            }
            $token = auth()->user()->createToken('auth_token')->accessToken;
            $user_role_id=auth()->user()->role_id;
            return response()->json([
                'status' => 1,
                'message' => 'User Logged In Successfully',
                'access_token' => $token
            ]);
        }

        public function SuperTeacherDetails(){
            $data=['First Name'=>auth()->user()->first_name,
                    'Last Name'=>auth()->user()->last_name,
                    'Photo '=> auth()->user()->photo,
                    'Class '=>auth()->user()->superTeacher->classs->name];
            return response()->json($data);
        }

        public function ShowClassesNumber(){
            $classedNumber=auth()->user()->superTeacher->classs;
            $classses=collect();
            foreach ($classedNumber->classNumber as $item){
                $classses->push([
                    'Class Number'=>$item->ClassNumber,
                    'Class Number id'=>$item->id
                ]);
            }
            return response()->json($classses);
        }

//        public function showClassStudents($id){
//            $data=auth()->user()->superTeacher->classs->classNumber->find($id);
//                $schedual = Schedual::where('classNumber_id', $id)->with('students.user')->first();
//
//                if (!$schedual) {
//                    return response()->json(['status' => 0, 'message' => 'Schedual not found']);
//                }
//
//
//                $students = collect();
//                foreach ($schedual->students as $student) {
//                    $students->push([
//                        'first_name' => $student->user->first_name,
//                        'last_name' => $student->user->last_name,
//                        'student_id' => $student->id,
//                    ]);
//                }
//
//                return response()->json(['status' => 1, 'students' => $students]);
//            }




}
