<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
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
        $categories = Category::all();
        return view('admin.create', compact('user', 'categories'));
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
            'cat_id' => ['required'],
            'tags'=> ['required']
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
            'cat_id'=> $attributes['cat_id'],
            'author'=> \Auth::user()->name,
            'img'=> '/images/'.str2url($attributes['title']).'.jpg',
            'preview'=> '/images/'.str2url($attributes['title']).'-mini'.'.jpg',
            'tags' => $attributes['tags'],
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
        $article = Article::find($id);
        $categories = Category::all();
        $user = \Auth::user();
        return view('admin.edit', compact('article','user', 'categories'));
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
        Article::where('id', $id)->update(request(['title', 'description', 'content', 'cat_id', 'tags']));

        return redirect("admin/articles/{$id}/edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Article::find($id)->img;
        $imagemini = Article::find($id)->preview;
        if($image !== NULL && isset($image) && file_exists($image)) {
            unlink(public_path().$image);
         }

         if($imagemini !== NULL && isset($imagemini) && file_exists($imagemini)) {
            unlink(public_path().$imagemini);
         }
         Article::find($id)->delete();
        return redirect('/admin/articles');
    }
}
