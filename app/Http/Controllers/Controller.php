<?php

namespace App\Http\Controllers;
use App\Models\SuperTeacher;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

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
        $role_id=auth()->user()->role_id;
        return response()->json([
            'status' => 1,
            'message' => 'User Logged In Successfully',
            'role id'=>$role_id,
            'access_token' => $token
        ]);
    }


    public function createStudent(){

        $user = new User($this->validationUser());
        $user->password = Hash::make(request('password'));
        $user->role_id = 3;
        $token = $user->createToken('auth_token')->accessToken;
        $user->save();
        $student=new Student($this->validationStudent());
        $student->user_id=$user->id;
        $student->bus_id=1;
        $student->schedual_id=1;
        $student->save();

        return response()->json([
            'status' => 1,
            'data' => $user,
            'data2'=>$student,
            'message' => 'Registered successfully',
            'token' => $token
        ]);

    }

    public function logout()
    {
        $user = request()->user();
        $token = $user->token();
        $token->revoke();

        return response()->json([
            'status' => 1,
            'message' => 'User Logged Out Successfully']);

    }

    public function createUserr(){
        $user = new User($this->validationUser());
        $user->password = Hash::make(request('password'));

        $token = $user->createToken('auth_token')->accessToken;
        $user->save();


        return response()->json([$user]);
    }

    public function createSuperTeacher(){
        $user = new User($this->validationUser());
        $user->password = Hash::make(request('password'));

        $token = $user->createToken('auth_token')->accessToken;
        $user->save();
        $superteacher=new SuperTeacher();
        $superteacher->user_id=$user->id;
        $superteacher->save();

        return response()->json([
            'status' => 1,
            'data' => $user,
            'data2'=>$superteacher,
            'message' => 'Registered successfully',
            'token' => $token
        ]);
    }


    public function createTeacher(){
        $user = new User($this->validationUser());
        $user->password = Hash::make(request('password'));

        $token = $user->createToken('auth_token')->accessToken;
        $user->save();
        $teacher=new Teacher($this->validationTeacher());
        $teacher->user_id=$user->id;
        $teacher->save();

        return response()->json([
            'status' => 1,
            'data' => $user,
            'data2'=>$teacher,
            'message' => 'Registered successfully',

        ]);

    }

    public function validationUser()
    {
        return request()->validate([
            'user_name' => ['required', 'string', 'max:30'],
            'password' => ['required', 'string', 'min:8'],
            'first_name' => ['required', 'string', 'max:30'],
            'last_name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'email', 'unique:users'],
            'mobile' => ['required', 'string', 'max:13', 'unique:users'],
            'role_id'=>['required']
        ]);

    }

    public function validationStudent()
    {
        return request()->validate([
            'father_name' => ['required', 'string', 'max:30'],
            'mother_name' => ['required', 'string', 'max:30'],

        ]);

    }
    public function validationTeacher()
    {
        return request()->validate([
            'salary' => ['required']

        ]);

    }


}
