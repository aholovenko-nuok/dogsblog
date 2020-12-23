<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

           
            Reply::create([
                'comment_id' => $request->input('comment_id'),
                'name' => $request->input('guest_name'),   
                'reply' => '<a href="#comment-'.$request->input('comment_id').'">'.$request->input('guest_name').'</a>, '.$request->input('reply'),
            ]);

            return back()->withInput();
        
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
     public function replysaver(Request $request)
    {
            Reply::create([
                'reply_id' => $request->input('reply_id'),
                'comment_id' => $request->input('comment_id'),
                'name' => $request->input('guest_name'),
                'reply' => '<a href="#reply-'.$request->input('reply_id').'">'.$request->input('reply_name').'</a>, '.$request->input('reply'),
            ]);

            return back()->withInput();
        
    }
}
