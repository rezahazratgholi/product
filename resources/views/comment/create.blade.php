@extends('layouts.master')
@section('title')
    add comment
@endsection
@section('content')

    {!! Form::open(['route'=>['comment.storeComment',$id ],'method'=>'post','files'=>false]) !!}
    <section class="form-group">

        {!! Form::label('fullname','full name',['class'=>'text-capitalize font-weight-bold']) !!}
        {!! Form::text('fullname',null,['class'=>'form-control formClass']) !!}
        @error('fullname')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </section>
    <section class="form-group">
        {!! Form::label('email','email',['class'=>'text-capitalize font-weight-bold']) !!}
        {!! Form::email('email',null,['class'=>'form-control formClass']) !!}
        @error('email')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </section>
    <section class="form-group">
        {!! Form::label('comment','comment',['class'=>'text-capitalize font-weight-bold']) !!}
        {!! Form::textarea('comment',null,['class'=>'form-control formClass']) !!}
        @error('comment')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </section>
    <section class="form-group">
        {!! Form::submit('add comment',['class'=>'btn btn-success']) !!}
    </section>
    {!! Form::close() !!}


@endsection
