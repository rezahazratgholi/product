<?php

namespace App\Http\Controllers;

use App\Models\comment;

use App\Models\subComment;
use Illuminate\Http\Request;

class subCommentController extends Controller
{
    public function addSubComment(Request $request , $id){
        $post_id = comment::where('id','=',$id)->value('product_id');
//        dd($post_id);
        subComment::create([
            'sub_comment'=>$request->sub_comment,
            'comment_id'=>$id,
            'product_id'=>$post_id,
        ]);
        return redirect()->to('/product/singleProduct/'.$post_id);
    }
    public function destroy($id){
        subComment::destroy($id);
        return redirect()->back();
    }
}
