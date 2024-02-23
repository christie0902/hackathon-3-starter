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
    <a href="{{ route('owner.add') }}">Add new owner</a>
    <ul>
        {{-- @dd($owner_list) --}}
        @foreach ($owner_list as $owner)
        <li>{{$owner->first_name . " " . $owner->surname}}</li>
        <a href="{{route('owner.detail', ['id'=>$owner->id])}}">See details</a>
        <a href="{{route('owner.edit',['id'=>$owner->id])}}">Edit</a>


       <form  action="{{route('owner.delete', ['id'=>$owner->id])}}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit" onclick="return confirm('Are you sure you want to delete this owner?')">Delete</button>
       </form>
       <br>
        @endforeach

    </ul>
    <a href="{{route('home')}}">Back to Home</a>
</body>
</html>