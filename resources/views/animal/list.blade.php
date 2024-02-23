<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Animal list</title>
</head>
<body>
    <h1>LIST OF ANIMALS</h1>
    <ul>

        @foreach ($animal_list as $animal)
            <li>
                <h3>{{$animal->name}}</h3> <br>
                <img src="/images/pets/{{ $animal->path }}" alt="photoOfDog" style="width:400px"><br>
                Owner: {{$animal->owner->first_name}}<br>
                Species:{{$animal->species}} <br>

                <a href="{{route('animal.detail',['id' => $animal->id])}}">See details</a>
            </li>
            @endforeach
            
        </ul>
        <a href="{{route('home')}}">Back to Home</a>
</body>
</html>