<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (view()->exists('tag.list'))

        {
            $tag=Tag::all();
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('tag.list')->with('tag',$tag);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (view()->exists('tag.new'))

        {
           
            return view('tag.new');
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
            'description' => 'required|string|max:255',
            'tag_type' => 'required',
       ]);


        $tag=Tag::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'tag_type' => $request['tag_type'],
        ]);

            if($tag)
            {
                session()->flash('alert-type', 'success');
                session()->flash('message', 'Tag added successfully');
                return redirect()->route('tag.index');
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
        if (view()->exists('tag.new'))

        {    
            $tag=Tag::findOrFail($id);
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('tag.new')->with('tag',$tag);
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
            'description' => 'required|string|max:255',
            'tag_type' => 'required',
       ]);

        $tag=Tag::whereId($id)->update([
            'name' => $request['name'],
            'description' => $request['description'],
            'tag_type' => $request['tag_type'],
            ]);

            if($tag)
            {                             
                    session()->flash('alert-type', 'success');
                    session()->flash('message', 'Tag Updated Successfully.');
                    return redirect()->route('tag.index');
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
        $tag = Tag::findOrFail($id);
        $tag->delete();

        session()->flash('alert-type', 'success');
        session()->flash('message', 'Tag deleted successfully');

        return redirect()->route('tag.index');
    }


    public function multiplecourse_quizdelete(Request $request)
	{
		$id = $request->id;
		foreach ($id as $user) 
		{
			Tag::where('id', $user)->delete();
		}
		session()->flash('alert-type', 'success');
        session()->flash('message', 'Tag deleted successfully');

        return redirect()->route('tag.index');
	}
}
