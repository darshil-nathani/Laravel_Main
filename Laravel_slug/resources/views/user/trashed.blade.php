@extends('template.layout')

@section('content')
<h1>All Trashed Data is here...</h1>
<table class="table table-hover table-stripped table-sm table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Subtitle</th>
            <th>Recover</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
@forelse($mytrashes as $trashed)
<tr>
    <td>{{$trashed->id}}</td>
    <td>{{$trashed->title}}</td>
    <td>{{$trashed->subtitle}}</td>
    <td>
        <a href="{{ route('myblog.show', $trashed->id) }}">View</a>
    </td>
    <td>
        <form action="{{ route('myblog.recover', $trashed->id) }}" method="post">
            @csrf
            <input type="submit" class="btn btn-danger" value="Recover">
        </form>
    </td>
    <td>
        <form action="{{ route('myblog.destroy', $trashed->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="Permanent Delete">
        </form>
    </td>
</tr>
@empty
<tr>
<td colspan=6>No Data Avaialble</td>
</tr>
@endforelse
@endsection
