<?php

namespace App\Http\Controllers;

use App\Models\patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthPatientController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|unique:doctors,email,',
            'password' => 'required|same:password_confirmation',
            'phone' => 'required',
            'gender' => 'required',
            'photo' => 'required|mimes:png,jpeg',
            'city' => 'required',
            'address' => 'required',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('patients/',$filename);
            $imageID = $filename;
        }

        $patient = new patient();
        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->password = Hash::make($request->password);
        $patient->phone = $request->phone;
        $patient->gender = $request->gender;
        $patient->photo = $imageID ?? 0;
        $patient->city = $request->city;
        $patient->address = $request->address;
        $patient->save();

        if(Auth::guard('patient')->attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect()->route('patient.dashboard');
        }else{
            return redirect()->route('patient.login');
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

        if(Auth::guard('patient')->attempt(['email' => $request->email , 'password' => $request->password]))
        {
            return redirect()->route('patient.dashboard');
        }else{
            return redirect()->route('patient.login')->withInput();
        }
    }

    public function logout()
    {
        Auth::guard('patient')->logout();
        return redirect('/');
    }
}
