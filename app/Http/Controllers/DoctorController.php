<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\doctor;
use App\Models\Timeslot;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class DoctorController extends Controller
{
    public function search_doctor()
    {

        $doctors = doctor::query()->where('status',1)->inRandomOrder()->with("department", "address:doctor_id,country,city","timeslots:doctor_id,dateTime")->paginate(10)->transform(function($doctor){
            $_doctor = $doctor->toArray();
            dd($doctor->education);
            $_doctor['timeslots'] = Timeslot::where('doctor_id',$_doctor['id'])->limit(5)->get()->transform(function($timeslot){
                $_timeslot = $timeslot->toArray();
                $_timeslot['dateTime'] = date('Y-m-d h:i a',strtotime($_timeslot['dateTime']));
                return Arr::only($_timeslot,[
                    'id',
                    'dateTime',
                ]);
            })->toArray();
            return $_doctor;
        });
        // dd($doctors);
        return view('Front.search-doctor',["doctors" => $doctors]);
    }
    public function searchResultDoctor(Request $request)
    {
        try{
            $specialtyArr = $request->input('speciality');
            $from = $request->input('from') ? date('Y-m-d H:i:s',strtotime($request->input('from'))) : null;
            $to = $request->input('to') ? date('Y-m-d H:i:s',strtotime($request->input('to'))) : null;
            $gender = $request->input('gender');

            $doctorQuery = doctor::with('department')->where('status',1);

            if($from){
                $doctorIds = Timeslot::whereDate('dateTime','>=',$from)->whereDate('dateTime','<=',$to)->pluck('doctor_id')->unique();
                $doctorQuery->whereIn('id',$doctorIds);
            }
            if($specialtyArr && count($specialtyArr) > 0){
                $specialityIds = Department::query()->whereIn('name',$specialtyArr)->pluck('id');
                $doctorQuery->whereIn('department_id',$specialityIds);
            }
            if($gender && count($gender) > 0){
                $doctorQuery->whereIn('gender',$gender);
            }
            // dd($doctorQuery->get());
            $doctors = $doctorQuery->paginate(10)->transform(function($doctors){
                $_doctor = $doctors->toArray();
                $_doctor['timeslots'] = Timeslot::where('doctor_id',$_doctor['id'])->limit(5)->get()->transform(function($timeslot){
                    $_timeslot = $timeslot->toArray();
                    $_timeslot['dateTime'] = date('Y-m-d h:i a',strtotime($_timeslot['dateTime']));
                    return Arr::only($_timeslot,[
                        'id',
                        'dateTime',
                    ]);
                })->toArray();
                return $_doctor;
            });
            $search = [
                "from" => ($from) ? date('Y-m-d',strtotime($from)) : $from,
                "to" => ($to) ? date('Y-m-d',strtotime($to)) : $to,
                "speciality" => $specialtyArr,
                "gender" => $gender,
            ];
            return view('Front.search-doctor',["doctors" => $doctors,"searchData" => $search]);

        }catch(Exception $e){
            error_log($e->getMessage().$e->getLine());
            return $e->getMessage().$e->getLine().$e->getFile();
            return redirect()->back()->with('error',$e->getMessage().$e->getLine().$e->getFile());
        }
    }
    public function dashboard()
    {
        return view('Doctor.dashboard');
    }
    public function schedule_timings()
    {
        $timeslots = Timeslot::query()->where('doctor_id',auth()->guard('doctor')->user()->id)->paginate(10);
        return view('Doctor.schedule-timing',["timeslots" => $timeslots]);
    }
    public function appointment_links()
    {
        return view('Doctor.appointment-links');
    }
    public function profile()
    {
        $doctor_id = auth('doctor')->user()->id;
        $doctor = doctor::find($doctor_id);
        return view('Doctor.profile-setting',["doctor" => $doctor]);
    }
}
