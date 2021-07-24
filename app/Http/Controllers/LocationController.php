<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (view()->exists('location.list'))

        {
            $location=Location::all();
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('location.list')->with('location',$location);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (view()->exists('location.new'))

        {
           
            return view('location.new');
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
            'location' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'file' => 'required',
       ]);

       if ($request->hasFile('file')) {
        $extension=$request->file->extension();
        $filename=time()."_.".$extension;
        $request->file->move(public_path('location'), $filename);
    }
        $location=Location::create([
            'location' => $request['location'],
            'description' => $request['description'],
            'file' => $filename,

        ]);

            if($location)
            {

 
                    session()->flash('alert-type', 'success');
                    session()->flash('message', 'Location added successfully');
                    return redirect()->route('location.index');
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
        if (view()->exists('location.new'))

        {
           
            $location=Location::findOrFail($id);
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('location.new')->with('location',$location);
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
        $location = Location::findOrFail($id);
        $validatedData = $request->validate([
            'location' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'file' => 'required',
       ]);
       if ($request->hasFile('file')) {

        if (isset($location->file) && file_exists(public_path('location/'.$location->file))) {
            unlink(public_path('location/'.$location->file));
        }


        $extension=$request->file->extension();
        $filename=time()."_.".$extension;
        $request->file->move(public_path('location'), $filename);

        $location=Location::whereId($id)->update([
            'location' => $request['location'],
            'description' => $request['description'],
            'file' => $filename,
            ]);
        }
        else{
            $location=Location::whereId($id)->update([
                'location' => $request['location'],
                'description' => $request['description'],
                ]);
        }
            if($location)
            {                             
                    session()->flash('alert-type', 'success');
                    session()->flash('message', 'Location Updated Successfully.');
                    return redirect()->route('location.index');
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
        $location = Location::findOrFail($id);
        if (isset($location->file) && file_exists(public_path('location/'.$location->file))) {
            unlink(public_path('location/'.$location->file));
        }
        $location->delete();

        session()->flash('alert-type', 'success');
        session()->flash('message', 'Location deleted successfully');

        return redirect()->route('location.index');
    }

    public function multiplecourse_quizdelete(Request $request)
	{
		$id = $request->id;
		foreach ($id as $user) 
		{
            $location = Location::findOrFail($user);
            if (isset($location->file) && file_exists(public_path('location/'.$location->file))) {
                unlink(public_path('location/'.$location->file));
            }
            $location->delete();
		}
        session()->flash('alert-type', 'success');
        session()->flash('message', 'Location deleted successfully');

        return redirect()->route('location.index');
	}
}
