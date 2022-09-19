@extends('layouts.master')
@section('title')
    products
@endsection
@section('content')

    @forelse($products as $product)
        <a href="{{route('product.singleProduct' , ["id"=> $product->id])}}" class="text-decoration-none text-dark">
            <div class="font-weight-bold badge-dark text-white">{{$product->product_name}}</div>
            <div>{{$product->color}}</div>
            @if($product->available == 1)
                <div class="text-success">Available</div>
            @else
                <div class="text-danger">unAvailable</div>
            @endif

            <div><img src="{{asset('images/products/'.$product->image)}}" width="100px" height="100px" alt=""></div>
            <div>price: {{$product->price}}t</div>
            <div class="mb-5">
            {!! Form::open(['route'=>['product.destroy',$product->id],'method'=>'delete']) !!}
            {!! Form::submit('delete',['class'=>'btn btn-danger float-lg-left']) !!}
            {!! Form::close() !!}
            <a href="{{route('product.edit', ["id"=> $product->id]) }}" class="ml-2 btn btn-warning float-lg-right">update</a>
            </div>
            <hr>
        </a>
    @empty
        <h2>there is no data</h2>
    @endforelse
    {{$products->links('pagination::bootstrap-4')}}


@endsection
