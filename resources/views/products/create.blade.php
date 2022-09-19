@extends('layouts.master')
@section('title')
    create product
@endsection
@section('content')

    {!! Form::open(['route'=>'product.store','method'=>'post','files'=>true]) !!}
    <section class="form-group">
        @csrf
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
        @error('image')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </section>
    <section class="form-group">
        {!! Form::label('available','available',['class'=>'text-capitalize font-weight-bold']) !!}
        {!! Form::select('available',[1=>'available',0=>'unavailable'],1,['class'=>'form-control formClass']) !!}
        {{--        {!! Form::label('image','image',['class'=>'text-capitalize font-weight-bold']) !!}--}}
        {{--        {!! Form::text('image',null,['class'=>'form-control formClass']) !!}--}}
        @error('available')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </section>
    <section class="form-group">
        {!! Form::submit('register',['class'=>'btn btn-success']) !!}
    </section>
    {!! Form::close() !!}
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif


@endsection
