<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $articles = Article::all();  
            $categories = Category::all();
            return view('frontpage.blog', compact('articles', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $social = \Share::page('http://'.\Request::getHost().'/articles/'.$id)->facebook()->twitter()->whatsapp()->telegram();
        $articles = Article::all();
        $tags = explode(",", Article::find($id)->tags);
        $article = Article::find($id);
        $categories = Category::all();
        $user = \Auth::user();
        return view('frontpage.show', compact('article','user', 'categories', 'articles', 'tags', 'social'));
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

    public function search(Request $request)
    {
            $search = $request->input('search');
            $articles = Article::where('tags', 'LIKE', "%".$search."%")->get();   
            
            $categories = Category::all();
            return view('frontpage.search', compact('articles', 'categories', 'search'));   
    }
}
