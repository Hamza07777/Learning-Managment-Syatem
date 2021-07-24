<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Course_Location;
use App\Models\Location;
use Illuminate\Http\Request;

class Course_LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (view()->exists('course_location.list'))

        {
            $course_location=Course_Location::all();
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('course_location.list')->with('course_location',$course_location);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (view()->exists('course_location.new'))

        {
            $location=Location::all();

            $course=Course::all();
            return view('course_location.new')->with('course',$course)->with('location',$location);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'location_id' => 'required',
            'course_id' => 'required',

       ]);


        $course_location=Course_Location::create([
            'location_id' => $request['location_id'],
            'course_id' => $request['course_id'],

        ]);

            if($course_location)
            {
                session()->flash('alert-type', 'success');
                session()->flash('message', 'Record added successfully');
                return redirect()->route('course_location.index');
            }
            else{
                session()->flash('alert-type', 'error');
                session()->flash('message', 'Record Not Added.');
                return redirect()->back();
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (view()->exists('course_location.new'))

        {    
            $location=Location::all();

            $course=Course::all();
     
            $course_location=Course_Location::findOrFail($id);
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('course_location.new')->with('course_location',$course_location)->with('course',$course)->with('location',$location);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'location_id' => 'required',
            'course_id' => 'required',

       ]);

        $course_location=Course_Location::whereId($id)->update([
            'location_id' => $request['location_id'],
            'course_id' => $request['course_id'],

            ]);

            if($course_location)
            {                             
                    session()->flash('alert-type', 'success');
                    session()->flash('message', 'Record Updated Successfully.');
                    return redirect()->route('course_location.index');
            }
            else{
                session()->flash('alert-type', 'error');
                session()->flash('message', 'Record Not Updated.');
                return redirect()->back();
            } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course_location = Course_Location::findOrFail($id);
        $course_location->delete();

        session()->flash('alert-type', 'success');
        session()->flash('message', 'Record deleted successfully');

        return redirect()->route('course_location.index');
    }

    public function multiplecourse_quizdelete(Request $request)
	{
		$id = $request->id;
		foreach ($id as $user) 
		{
			Course_Location::where('id', $user)->delete();
		}
        session()->flash('alert-type', 'success');
        session()->flash('message', 'Record deleted successfully');

        return redirect()->route('course_location.index');
	}
}