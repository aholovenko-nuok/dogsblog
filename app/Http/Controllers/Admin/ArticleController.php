<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Gate;
use App\Models\User;
use Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $user = \Auth::user();
            $articles = Article::all();
            return view('admin.index', compact('user', 'articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = \Auth::user();
        return view('admin.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
            'content' => ['required', 'min:3'],
            'img' => ['required'],
        ]);
        // dd($attributes['img']->getPathName());
        $img = \Image::make($attributes['img']->getPathName());
        $imgmini = \Image::make($attributes['img']->getPathName())->fit(350, 233);
        $img->save(public_path().'/images/'.str2url($attributes['title']).'.jpg');
        $imgmini->save(public_path().'/images/'.str2url($attributes['title']).'-mini'.'.jpg');
        Article::create([
            'title'=> $attributes['title'],
            'description'=> $attributes['description'],
            'content'=> $attributes['content'],
            'cat_id'=> 1,
            'author'=> \Auth::user()->name,
            'img'=> 'public/images/'.str2url($attributes['title']).'.jpg',
            'preview'=> 'public/images/'.str2url($attributes['title']).'-mini'.'.jpg',
        ]);

        return redirect('/admin/articles');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
