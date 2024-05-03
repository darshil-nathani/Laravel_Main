@extends('template.layout')


@section('content')
<h1>All the information will be displayed here....</h1>
<table class="table table-hover table-stripped table-sm table">
<thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Subtitle</th>
        <th>View</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody>
    @forelse($myblogs as $myblog)
        <tr>
            <td>{{$myblog->id}}</td>
            <td>{{$myblog->title}}</td>
            <td>{{$myblog->subtitle}}</td>
            <td>
                <a href="{{ route('myblog.show', $myblog->id) }}">View</a>
            </td>
            <td>
                <a class="btn btn-sm btn-warning" href="{{route('myblog.edit', $myblog->id)}}">Edit Me!</a>
            </td>
            <td>
                <form action="{{ route('myblog.destroy', $myblog->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-danger" value="Trash">
                </form>
            </td>
        </tr>
    @empty
    <tr>
        <td colspan=6>No Data Avaialble</td>
    </tr>
    @endforelse
</tbody>
</table>
@endsection
