@extends('layouts.master')
@section('title')
    single product
@endsection
@section('content')
    @forelse($posts as $item)
        <a href="{{route('comment.addComment', ["id"=> $item->id])}}" class="btn btn-success float-lg-right"> add comment </a>
        <div>
            {{$item->product_name}}
        </div>
        @if($item->available == 1)
        <div class ='text-success'>available</div>
        @else
            <div class ='text-danger'>Unavailable</div>
        @endif
        <img src="{{asset('images/products/'.$item->image)}}" width="100px" height="100px" alt="">
        <div>
            color: {{$item->color}}
        </div>
        <div>
            price: {{$item->price}}t
        </div>
        <span class="btn btn-dark mt-3">comments:</span> <br>
        <hr>

    @empty
        <h2>no data</h2>
    @endforelse
    @forelse($comments as $comment)

        <div class="float-lg-right"><a href="{{route('comment.edit',['id'=>$comment->id])}}" class="btn btn-warning"> edit comment</a></div>
        <div class="float-lg-right">
            {!! Form::open(['route'=>['comment.destroy',$comment->id],'method'=>'delete']) !!}
            {!! Form::submit('delete comment',['class'=>'btn btn-danger mr-3 float-lg-left']) !!}
            {!! Form::close() !!}</div>
        <div class="">
            <span>name: {{$comment->fullname}}</span>
            <div>email: {{$comment->email}}</div>
            <span>comment: {{$comment->comment}}</span>
{{--            @forelse()--}}
{{--            @if()--}}
{{--                --}}
{{--            @endif--}}
            <br>
            @if($comment->subcomments != '[]')

                <span class="text-warning bg-dark p-1">replays:</span>
                <br>
                @forelse($comment->subcomments as $subcomment)
                    <span class="text-info">{{$subcomment->sub_comment}}</span><span>==></span>
                <span>
                    {!! Form::open(['route'=>['subcomment.destroy',$subcomment->id],'method'=>'delete']) !!}
                    {!! Form::submit('delete replay',['class'=>'text-danger ml-3']) !!}
                    {!! Form::close() !!}
                </span>


                    <br>

                @empty
                    <h2>moz</h2>
                @endforelse

                @if (count($comment->subcomments) <= 1)

                    {!! Form::open(['route'=>['add-sub-comment',$subcomment->comment_id ],'method'=>'post','files'=>false]) !!}
                    <section class="form-group">

                        {!! Form::label('sub_comment','add comment',['class'=>'text-capitalize font-weight-bold']) !!}
                        {!! Form::text('sub_comment',null,['class'=>'form-control formClass']) !!}
                    </section>
                    <section class="form-group">
                        {!! Form::submit('add comment',['class'=>'text-danger']) !!}
                    </section>
                    {!! Form::close() !!}
                @endif

            @else

                {!! Form::open(['route'=>['add-sub-comment',$comment->id],'method'=>'post','files'=>false]) !!}
                <section class="form-group">

                    {!! Form::label('sub_comment','add comment',['class'=>'text-capitalize font-weight-bold']) !!}
                    {!! Form::text('sub_comment',null,['class'=>'form-control formClass']) !!}
                </section>
                <section class="form-group">
                    {!! Form::submit('replay comment',['class'=>'text-danger']) !!}
                </section>
                {!! Form::close() !!}
            @endif
        </div>
        <hr>
    @empty
    @endforelse
@endsection
