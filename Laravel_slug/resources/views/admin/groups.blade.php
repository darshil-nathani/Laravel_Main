@extends('template.layout')

@section('content')
<h1>Group and user information</h1>
<table>
@forelse($ug as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        @foreach($user->getGroup as $group)

        <td>{{$group->category}}</td>
        @endforeach

    </tr>
@empty
No Data found
@endforelse
</table>

@endsection
