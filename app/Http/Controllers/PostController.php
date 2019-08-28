<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home() 
    {
        return view('vueApp');
    }

    public function index()
    {
        return Post::orderBy('id','DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'min:3','unique:posts'],
            'body' => ['required', 'min:5']
        ]);

        // $request->validate([
        //     'title' => 'required|min:3|unique:posts',
        //     'body' => 'required|min:5'
        // ]);

        $create = Post::create($request->all());
        return response()->json(['status' => 'success','msg'=>'post created successfully.']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Post::find($id);
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
        $this->validate($request, [
            'title' => ['required', 'min:3'],
            'body' => ['required', 'min:5']
        ]);

        $post = Post::find($id);
        if ($post->count()) {
            $post->update($request->all());
            return response()->json(['status'=>'success', 'msg'=>'Successfully updated.']);
        } else {
            return response()->json(['status'=>'error', 'msg'=>'Unsuccessfully updated.']);
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
        $post = Post::find($id);
        if ($post->count()) {
            $post->delete();
            return response()->json(['status'=>'success', 'msg'=>'Successfully deleted.']);
        } else {
            return response()->json(['status'=>'error', 'msg'=>'Unsuccessfully deleted.']);
        }
    }
}
