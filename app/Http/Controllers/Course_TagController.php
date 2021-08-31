<?php

namespace App\Http\Controllers;

use App\Models\Course_Tag;
use App\Models\Course;
use App\Models\Tag;
use Illuminate\Http\Request;

class Course_TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (view()->exists('course_tag.list'))

        {
            $course_tag=Course_Tag::all();
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('course_tag.list')->with('course_tag',$course_tag);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (view()->exists('course_tag.new'))

        {
            $tag=Tag::where('tag_type','course')->get();

            $course=Course::all();
            return view('course_tag.new')->with('course',$course)->with('tag',$tag);
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
            'tag_id' => 'required',
            'course_id' => 'required',

       ]);


        $course_tag=Course_Tag::create([
            'tag_id' => $request['tag_id'],
            'course_id' => $request['course_id'],

        ]);

            if($course_tag)
            {
                session()->flash('alert-type', 'success');
                session()->flash('message', 'Record added successfully');
                return redirect()->route('course_tag.index');
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
        if (view()->exists('course_tag.new'))

        {
            $tag=Tag::where('tag_type','course')->get();

            $course=Course::all();

            $course_tag=Course_Tag::findOrFail($id);
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('course_tag.new')->with('course_tag',$course_tag)->with('course',$course)->with('tag',$tag);
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
            'tag_id' => 'required',
            'course_id' => 'required',

       ]);

        $course_tag=Course_Tag::whereId($id)->update([
            'tag_id' => $request['tag_id'],
            'course_id' => $request['course_id'],

            ]);

            if($course_tag)
            {
                    session()->flash('alert-type', 'success');
                    session()->flash('message', 'Record Updated Successfully.');
                    return redirect()->route('course_tag.index');
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
        $course_tag = Course_Tag::findOrFail($id);
        $course_tag->delete();

        session()->flash('alert-type', 'success');
        session()->flash('message', 'Record deleted successfully');

        return redirect()->route('course_tag.index');
    }


    public function multiplecourse_quizdelete(Request $request)
	{
		$id = $request->id;
		foreach ($id as $user) 
		{
			Course_Tag::where('id', $user)->delete();
		}
        session()->flash('alert-type', 'success');
        session()->flash('message', 'Record deleted successfully');

        return redirect()->route('course_tag.index');
	}
}
