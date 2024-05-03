@extends('template.layout')

@section('content')
<h1>Add your Blog Post Here....</h1>
@php
    if($errors->any()){
        echo "<ul>";
        foreach($errors->all() as $error){
            echo "<li>$error</li>";
        }
        echo "<ul>";
    }
@endphp

<hr>
@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('myblog.store') }}" method="post">
    @csrf
    <div class="form-group">
      <label>Title</label>
      <input value="{{ old('title') }}" type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter title">
      @error('title')
        <span>{{$message}}</span>
      @enderror
    </div>
    <div class="form-group">
        <input type="hidden" name="user_id" value="1">
        <label>Subtitle</label>
        <input value={{ old('subtitle') }}"" type="text" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror" placeholder="Enter subtitle">
        @error('subtitle')
            <span>{{$message}}</span>
        @enderror
    </div>
    <div class="form-group">
        <label>Body Content</label>
        <textarea class="form-control @error('body_content') is-invalid @enderror" name="body_content" placeholder="Leave a comment here" id="editor">{{ old('body_content') }}</textarea>
        @error('body_content')
            <span>{{$message}}</span>
        @enderror
        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection

@section('script-tags')
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
@endsection
