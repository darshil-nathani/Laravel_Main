@extends('template.layout')

@section('content')
<h1>Edit your Blog Post Here....</h1>
<form action="{{ route('myblog.update', $myblog->id) }}" method="post">
    @csrf
    @method('patch')
    <div class="form-group">
      <label>Title</label>
      <input type="text" value="{{$myblog->title}}" name="title" class="form-control" placeholder="Enter title">
    </div>
    <div class="form-group">
        <input type="hidden" name="user_id" value="1">
        <label>Subtitle</label>
        <input type="text" value="{{$myblog->subtitle}}" name="subtitle" class="form-control" placeholder="Enter subtitle">
    </div>
    <div class="form-group">
        <label>Body Content</label>
        <textarea class="form-control" name="body_content" placeholder="Leave a comment here" id="editor">
            {{$myblog->body_content}}
        </textarea>
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
