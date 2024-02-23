<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Owner List</title>
</head>
<body>
    <h1>LIST OF OWNERS</h1>
    <ul>
        {{-- @dd($owner_list) --}}
        @foreach ($owner_list as $owner)
        <li>{{$owner->first_name . " " . $owner->surname}}</li>
        <a href="{{route('owner.detail', ['id'=>$owner->id])}}">See details</a>
        @endforeach
    </ul>
    <a href="{{route('home')}}">Back to Home</a>
</body>
</html>