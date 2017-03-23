<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Student;

class ScoreController extends Controller
{
    public function getFormScore(){
    	$IDs=Student::select('id')->get();
    	return view('ajax.score', compact('IDs'));
    }

    public function getDataScore(Request $request){
    	if($request->ajax()){
    		$student=Student::find($request->studentid);
    		$studies=$student->studies;
    		$total=$studies->sum('score');
    		return response(['studies'=>$studies,'total'=>$total]);
    	}
    }
}
