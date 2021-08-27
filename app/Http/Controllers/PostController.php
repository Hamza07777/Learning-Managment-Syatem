<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (view()->exists('posts.list'))

        {
            $post=Post::all();
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Post is Loading .......');
            return view('posts.list')->with('post',$post);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (view()->exists('posts.new'))
        {
            $category=Category::where('category_type','post')->get();
            return view('posts.new')->with('category',$category);
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
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'category_id' => 'required',
            'description' => 'required',
       ]);

       if ($request->hasFile('file')) {
            $extension=$request->file->extension();
            $filename=time()."_.".$extension;
            $request->file->move(public_path('posts'), $filename);

            $post=Post::create([
                'title' => $request['title'],
                'slug' => $request['slug'],
                'category_id' => $request['category_id'],
                'description' => $request['description'],
                'file' => $filename,
                'status' => 'active',
            ]);
        }
        else{
            $post=Post::create([
                'title' => $request['title'],
                'slug' => $request['slug'],
                'category_id' => $request['category_id'],
                'description' => $request['description'],
                'status' => 'active',
            ]);
        }


        if($post)
        {
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Post added successfully');
            return redirect()->route('post.index');
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
        if (view()->exists('posts.new'))

        {

            $post=Post::findOrFail($id);
            $category=Category::where('category_type','post')->get();
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Post is Loading .......');
            return view('posts.new')->with('post',$post)->with('category',$category);;
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
        $post = Post::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'category_id' => 'required',
            'description' => 'required',
       ]);
       if ($request->hasFile('file')) {
            $extension=$request->file->extension();
            $filename=time()."_.".$extension;
            $request->file->move(public_path('posts'), $filename);

            if (isset($post->file) && file_exists(public_path('posts/'.$post->file))) {
                unlink(public_path('posts/'.$post->file));
            }

        $post=Post::whereId($id)->update([
            'title' => $request['title'],
            'slug' => $request['slug'],
            'category_id' => $request['category_id'],
            'description' => $request['description'],
            ]);
        }
        else{
            $post=Post::whereId($id)->update([
                'title' => $request['title'],
                'slug' => $request['slug'],
                'category_id' => $request['category_id'],
                'description' => $request['description'],
                ]);
        }
        if($post)
        {
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Post Updated Successfully.');
            return redirect()->route('post.index');
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
        $post = Post::findOrFail($id);
        if (isset($post->file) && file_exists(public_path('posts/'.$post->file))) {
            unlink(public_path('posts/'.$post->file));
        }
        $post->delete();

        session()->flash('alert-type', 'success');
        session()->flash('message', 'Post deleted successfully');

        return redirect()->route('post.index');
    }

    public function check_slug(Request $request)
    {

        $slug = Str::slug($request->title);
        if (Post::where('slug',$slug)->exists()) {
                    $random = rand(0, 99999);
                  echo json_encode($slug.'-'.$random);
                    exit;
                }
                else{

                  echo json_encode($slug);
                    exit;

                }

    }
}
