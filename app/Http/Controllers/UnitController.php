<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Course;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (view()->exists('unit.list'))

        {
            $unit=Unit::all();
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('unit.list')->with('unit',$unit);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (view()->exists('unit.new'))

        {
            $course=Course::all();

           
            return view('unit.new')->with('course',$course);
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
            'name' => 'required|string|max:255',
            'unit_description' => 'required|string|max:255',
            'unit_type' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'access_date' => 'required|string|max:255',
            'access_time' => 'required|string|max:255',
            'course_id' => 'required',
       ]);


        $unit=Unit::create([
            'name' => $request['name'],
            'unit_description' => $request['unit_description'],
            'unit_type' => $request['unit_type'],
            'duration' => $request['duration'],
            'access_date' => $request['access_date'],
            'access_time' => $request['access_time'],
            'course_id' => $request['course_id'],

        ]);

            if($unit)
            {

 
                    session()->flash('alert-type', 'success');
                    session()->flash('message', 'Unit added successfully');
                    return redirect()->route('unit.index');
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
        if (view()->exists('unit.new'))

        {
           
            $unit=Unit::findOrFail($id);
            $course=Course::all();
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
           // $course=Course::where('id',$unit->course_id)->firstOrFail();
            return view('unit.new')->with('unit',$unit)->with('course',$course);
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
            'name' => 'required|string|max:255',
            'unit_description' => 'required|string|max:255',
            'unit_type' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'access_date' => 'required|string|max:255',
            'access_time' => 'required|string|max:255',
            'course_id' => 'required',
       ]);

        $unit=Unit::whereId($id)->update([
            'name' => $request['name'],
            'unit_description' => $request['unit_description'],
            'unit_type' => $request['unit_type'],
            'duration' => $request['duration'],
            'access_date' => $request['access_date'],
            'access_time' => $request['access_time'],
            'course_id' => $request['course_id'],

            ]);

            if($unit)
            {                             
                    session()->flash('alert-type', 'success');
                    session()->flash('message', 'Unit Updated Successfully.');
                    return redirect()->route('unit.index');
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
        $unit = Unit::findOrFail($id);
        $unit->delete();

        session()->flash('alert-type', 'success');
        session()->flash('message', 'Unit deleted successfully');

        return redirect()->route('unit.index');
    }



    public function multiplecourse_quizdelete(Request $request)
	{
		$id = $request->id;
		foreach ($id as $user) 
		{
			Unit::where('id', $user)->delete();
		}
		session()->flash('alert-type', 'success');
        session()->flash('message', 'Unit deleted successfully');

        return redirect()->route('unit.index');
	}
}
