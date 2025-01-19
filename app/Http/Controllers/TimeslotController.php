<?php

namespace App\Http\Controllers;

use App\Models\Timeslot;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TimeslotController extends Controller
{
    public function create(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'dateTime' => 'required',
                'duration' => 'required|numeric|min:1|max:60'
            ]);
            if($validator->fails()){
                return redirect()->back()->with('error',$validator->errors()->first());
            }

            $timeslot = new Timeslot();
            $timeslot->dateTime = ($request->dateTime) ? date('Y-m-d H:i:s',strtotime($request->dateTime)) : null ;
            $timeslot->duration = $request->input('duration');
            $timeslot->doctor_id = auth()->guard('doctor')->user()->id;
            $timeslot->save();

            return redirect()->back()->with('success','Timeslot created successfully.');
        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage().$e->getLine().$e->getFile());
        }
    }

    public function destroy($timeslot_id)
    {
        try{
            $timeslot = Timeslot::query()->where('id',$timeslot_id)->first();
            if(!$timeslot) throw new Exception("Timeslot not found.");
            $timeslot->delete();
            return redirect()->back()->with('success','Timeslot deleted successfully.');
        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage().$e->getLine().$e->getFile());
        }
    }
}
