<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add owner</title>
</head>
<body>
    <h1>Add new owner</h1>

    {{-- Here will be a new movie request from --}}
    {{-- movie_type_id (select), name (string), full_name (string), email (string)--}}

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

    <form action="{{ route('owner.store') }}" method="POST">
        @csrf
        <div>
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" placeholder="Enter first name" value="{{ old('first_name') }}" required>
        </div>
        <br>
        <div>
            <label for="surname">Surname:</label>
            <input type="text" id="surname" name="surname" placeholder="Enter surname" value="{{ old('surname') }}" required>
        </div>
        <br>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}" required>
        </div>
        <br>
        <div>
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" placeholder="Enter phone number" value="{{ old('phone') }}" required>
        </div>
        <br>
        <div>
            <label for="pet_name">Pet Name:</label>
            <input type="text" id="pet_name" name="pet_name" placeholder="Enter pet name" value="{{ old('pet_name') }}" required>
        </div>

        {{-- <div>
            <label for="pet_names">Pet Names (Separated by ',' if you have more than one):</label>
            <input type="text" id="pet_names" name="pet_names" placeholder="Enter pet names" value="{{ old('pet_names') }}" required>
        </div>
            <br>
        <button type="submit">Add</button> --}}

        <br>
        <button type="submit">Add</button>
    </form>
    <br>
    <a href="{{route('owner.display')}}">Back to list</a>
</body>
</html>