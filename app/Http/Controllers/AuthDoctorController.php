<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthDoctorController extends Controller
{
    public function regForm()
    {
        $departments = Department::query()->latest()->get();

        return view('Doctor.register',["departments" => $departments]);
    }

    public function register(Request $request)
    {
        try{
            dd($request->toArray());
            $validator = Validator::make($request->all(),[
                "image" => "required",
                "first_name" => "required",
                "last_name" => "required",
                "phone" => "required",
                "email" => "required|unique:doctors,email,",
                "password" => "required|same:confirm-password",
                "confirm-password" => "required",
                "gender" => "required",
                "dob" => "required",
                "fee" => "required|min:200",
                "bio" => "required",
                "address1" => "required",
                "city" => "required",
                "state" => "required",
                "country" => "required",
                "zip_code" => "required",
                "services" => "required",
                "specialization" => "required",
                "edu_degree" => "required",
                "edu_institute" => "required",
                "edu_from" => "required",
                "edu_to" => "required",
                "exp_designation" => "required",
                "exp_hospital" => "required",
                "exp_from" => "required",
                "exp_to" => "required",
                "dept_id" => "required",
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if($request->hasFile('image')){
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('doctors/',$filename);
            }else{
                $filename = (strtolower($request->gender) == "female") ? "female-dump.png" : "male-dump.png";
            }

            $doctor = new doctor();
            $doctor->first_name = $request->input("first_name");
            $doctor->last_name = $request->input("last_name");
            $doctor->phone = $request->input("phone");
            $doctor->email = $request->input("email");
            $doctor->password = Hash::make($request->input("password"));
            $doctor->gender = $request->input("gender");
            $doctor->dob = $request->input("dob");
            $doctor->fee = $request->input("fee");
            $doctor->image = $filename;
            $doctor->bio = $request->input("bio");
            $doctor->services = $request->input("services");
            $doctor->specialization = $request->input("specialization");
            $doctor->education = $request->input("education");
            $doctor->experience = $request->input("first_name");
            $doctor->department_id = $request->input("first_name");
            $doctor->status = $request->input("first_name");
            $doctor->save();

            if(Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password]))
            {
                return redirect()->route('doctor.dashboard');
            }else{
                return redirect()->route('doctor.login');
            }
        }catch(\Exception $e){
            dd($e->getMessage().$e->getLine().$e->getFile());
        }
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if(Auth::guard('doctor')->attempt(['email' => $request->email , 'password' => $request->password]))
        {
            return redirect()->route('doctor.dashboard');
        }else{
            return redirect()->route('doctor.login')->withInput();
        }
    }

    public function logout()
    {
        Auth::guard('doctor')->logout();
        return redirect('/');
    }
}
