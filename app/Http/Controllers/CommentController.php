<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorecommentRequest;
use App\Http\Requests\UpdatecommentRequest;
use App\Models\comment;
use App\Models\product;
use Illuminate\Http\Request;

class CommentController extends Controller
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
    public function addComment($id){

        return view('comment.create',compact('id') );
    }
    public function storeComment(StorecommentRequest $request,$id){

        comment::create([
            'fullname'=>$request->fullname,
            'email'=>$request->email,
            'comment'=>$request->comment,
            'product_id'=>$id,
        ]);
        return redirect()->to('/product/singleProduct/'.$id);
    }
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

        return view('comment.editComment',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecommentRequest $request, $id)
    {
        $redirect  = comment::where('id','=',$id)->value('product_id');

        comment::where('id','=',$id)->update([

            'comment'=>$request->comment,
        ]);

        return redirect()->to('/product/singleProduct/'.$redirect);
//        return \redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(comment $id)
    {
//        dd($id);
        comment::destroy($id->id);


        return Redirect()->back();
    }
}
