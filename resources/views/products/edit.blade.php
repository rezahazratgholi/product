@extends('layouts.master')
@section('title')
    edit product
@endsection
@section('content')

    {!! Form::model($id,['route'=>['product.update',$id->id],'method'=>'put','files'=>true]) !!}
    <section class="form-group">
        {!! Form::label('product_name','product name',['class'=>'text-capitalize font-weight-bold']) !!}
        {!! Form::text('product_name',null,['class'=>'form-control formClass']) !!}
        @error('product_name')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </section>
    <section class="form-group">
        {!! Form::label('color','color',['class'=>'text-capitalize font-weight-bold']) !!}
        {!! Form::text('color',null,['class'=>'form-control formClass']) !!}
        @error('color')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </section>

    <section class="form-group">
        {!! Form::label('price','price',['class'=>'text-capitalize font-weight-bold']) !!}<span>between 1000 to 9999999</span>
        {!! Form::number('price',null,['class'=>'form-control formClass']) !!}
        @error('price')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </section>
    <section class="form-group">
        {!! Form::label('image','image',['class'=>'text-capitalize font-weight-bold']) !!}
        {!! Form::file('image',['class'=>'form-control form-control-file formClass']) !!}
        <img src="{{asset('images/firstdata/'.$id->image)}}" width="50px" alt="">
        @error('image')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </section>
    <section class="form-group">
        {!! Form::label('available','available',['class'=>'text-capitalize font-weight-bold']) !!}
        {!! Form::select('available',[1=>'available',0=>'unAvailable'],$id->available,['class'=>'form-control formClass']) !!}
        {{--        {!! Form::label('image','image',['class'=>'text-capitalize font-weight-bold']) !!}--}}
        {{--        {!! Form::text('image',null,['class'=>'form-control formClass']) !!}--}}
        @error('available')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </section>
    <section class="form-group">
        {!! Form::submit('update',['class'=>'btn btn-success']) !!}
    </section>
    {!! Form::close() !!}
    <a href="{{route('product.index')}}" class="btn btn-success">home page</a>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif



@endsection
