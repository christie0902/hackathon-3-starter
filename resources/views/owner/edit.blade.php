<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit owner</title>
</head>
<body>
    <h1>Edit owner #{{ $owner->id }}</h1>
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
    
    <form action="{{ route('owner.update', ['id' => $owner->id]) }}" method="post">
        @method('PUT')
        @csrf
        <div>
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" placeholder="Enter first name" value="{{ old('first_name', $owner->first_name) }}" required>
        </div>
        <br>
        <div>
            <label for="surname">Surname:</label>
            <input type="text" id="surname" name="surname" placeholder="Enter surname" value="{{ old('surname', $owner->surname) }}" required>
        </div>
        <br>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter email" value="{{ old('email', $owner->email) }}" required>
        </div>
        <br>
        <div>
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" placeholder="Enter phone number" value="{{ old('phone', $owner->phone) }}" required>
        </div>
        <br>
        <div>
            <label for="pet_name">Pet Name:</label>
            <input type="text" id="pet_name" name="pet_name" placeholder="Enter pet name" value="{{ old('pet_name, , $owner->animal->name)') }}" required>
        </div>
        <br>
        <button type="submit">Add</button>
    </form>
    <br>
    <a href="{{route('owner.display')}}">Back to list</a>
</body>
</html>