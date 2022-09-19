<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;
use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =  Product::withoutTrashed()->with('comments')->orderBy('id','desc')->paginate(6);
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreproductRequest $request)
    {
        $file = $request->file('image');
        $image = "";
        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
        if (!empty($file)){
            $image=time().rand(1,10000).$file->getClientOriginalName();
            $file->move('images/products',$image);
        }
        Product::create([
            'product_name'=>$request->product_name,
            'color'=>$request->color,
            'image'=>$image,
            'price'=>$request->price,
            'available'=>$request->available,
        ]);
        return redirect()->back()->with('message', 'عملایت موفقیت امیز ');
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
    public function edit(product $id)
    {

        return view('products.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateproductRequest $request,product $id)
    {

        $file = $request->file('image');
        $image = '';
        if (!empty($file)){
//            dd('ok');
            if (file_exists('images/products/'.$id->image)){
                unlink('images/products/'.$id->image);
            }

            $image=time().rand(1,10000).$file->getClientOriginalName();
            $file->move('images/products',$image);
        }else{
            $image=$id->image;
        }
//        dd("ok");
        product::where('id','=',$id->id)->update([

            'product_name'=>$request->product_name,
            'color'=>$request->color,
            'image'=>$image,
            'price'=>$request->price,
            'available'=>$request->available,
        ]);
        return \redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $id)
    {

        product::destroy($id->id);


        return Redirect()->back();
    }
    public function Product($id){
        $posts = product::where('id','=',$id)->get();
        $comments = comment::where('product_id','=',$id)->with('subcomments')->get();
        return view('products.singleProduct',compact('posts','comments'));
    }
}
