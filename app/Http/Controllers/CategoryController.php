<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (view()->exists('category.list'))

        {
            $category=Category::all();
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('category.list')->with('category',$category);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (view()->exists('category.new'))

        {
           
            return view('category.new');
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
            'note' => 'required|string|max:255',
            'category_type' => 'required',
       ]);


        $category=Category::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'note' => $request['note'],
            'category_type' => $request['category_type'],            
        ]);

            if($category)
            {
                session()->flash('alert-type', 'success');
                session()->flash('message', 'Category added successfully');
                return redirect()->route('category.index');
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
        if (view()->exists('category.new'))

        {    
            $category=Category::findOrFail($id);
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('category.new')->with('category',$category);
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
            'note' => 'required|string|max:255',
            'category_type' => 'required',
       ]);

        $category=Category::whereId($id)->update([
            'name' => $request['name'],
            'description' => $request['description'],
            'note' => $request['note'],
            'category_type' => $request['category_type'],
            ]);

            if($category)
            {                             
                    session()->flash('alert-type', 'success');
                    session()->flash('message', 'Category Updated Successfully.');
                    return redirect()->route('category.index');
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
        $category = Category::findOrFail($id);
        $category->delete();

        session()->flash('alert-type', 'success');
        session()->flash('message', 'Category deleted successfully');

        return redirect()->route('category.index');
    }

    public function multiplecourse_quizdelete(Request $request)
	{
		$id = $request->id;
		foreach ($id as $user) 
		{
			Category::where('id', $user)->delete();
		}
        session()->flash('alert-type', 'success');
        session()->flash('message', 'Category deleted successfully');

        return redirect()->route('category.index');
	}
}
