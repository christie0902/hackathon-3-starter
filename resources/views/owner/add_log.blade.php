<!DOCTYPE html>
<html lang=“en”>
<head>
    <meta charset=“UTF-8">
    <meta name=“viewport” content=“width=device-width, initial-scale=1.0">
    <meta http-equiv=“X-UA-Compatible” content=“ie=edge”>
    <title>Add log</title>
</head>
<body>
    <h1>Add log</h1>
    @if (Session::has('success_message'))
        <div>
            {{ Session::get('success_message') }}
        </div>
    @endif
    @if (count($errors) > 0)
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form action="{{ route('log.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter owner name" value="{{ old('name') }}" required>
        </div>
        <br>
        <div>
            <label for="pet_name">Pet name:</label>
            <input type="text" id="pet_name" name="pet_name" placeholder="Enter pet name" value="{{ old('pet_name') }}" required>
        </div>
        <br>
        <div>
            <label for="visit_day"></label>
            <input type="date" name="visit_day">
        </div>
        <br>
        <div>
            <label for="comment">Comment</label>
            <input type="text" id="comment" name="comment" placeholder="Enter comment" value="{{ old('comment') }}" required>
        </div>
        <button type="submit">Add</button>
    </form>
    <br>
    <a href="{{route('owner.display')}}">Back to list</a>
</body>
</html>









