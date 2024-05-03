<form method="post" action="{{ route('comments.store') }}">
    @csrf
    <input type="hidden" name="myblog_id" value="{{$myblog->id}}">
    <input type="hidden" name="user_id" value="1">
    <div class="form-group">
        <label>Comments Please: </label>
        <textarea class="form-control" name="content" rows="3"></textarea>
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
