@extends('template.layout')


@section('content')
<h1>My Post goes here...</h1>

<h3>Title</h3>
<h3>{{$myblog->title}}</h3>

<h5>Subtitle</h5>
<h5>{{$myblog->subtitle}}</h5>

<p>{{$myblog->body_content}}</p>

@include('user.disp-comments')
@include('user.comments')

@endsection
