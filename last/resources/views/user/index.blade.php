<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>This is my all details.......</h1>
    @auth
        <p>Welcome : {{$user->name}} to my blog</p>
    @endauth

    @guest
        <p>Welcome,guest !! please login for more information . <a href="">Login link</a></p>
    @endguest

    <table>
    @forelse($page as $p)
    <tr>
        <td>{{$p->title}}</td>
        <td>{{$p->subtitle}}</td>
        <td>{{$p->getUser->name}}</td>
        @auth
        <td><input type="button" value="Edit"></td>
        <td><input type="button" value="Delete"></td>
        @endauth
    </tr>

    @empty

    @endforelse
</table>
</body>
</html>
