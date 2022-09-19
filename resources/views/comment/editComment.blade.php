@extends('layouts.master')
@section('title')
    edit comment
@endsection
@section('content')
    {!! Form::model($id,['route'=>['comment.update',$id],'method'=>'put','files'=>false]) !!}
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
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

@endsection
