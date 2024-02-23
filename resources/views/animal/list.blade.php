<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Animal list</title>
</head>
<body>
    <ul>
        @foreach ($animal_list as $animal)
            <li>
                name:{{$animal->name}} <br>
                species:{{$animal->species}} <br>
                breed:{{$animal->breed}}
                age:{{$animal->age}}
                weight:{{$animal->weight}} <br><br>
            </li>
            @endforeach
            
        </ul>
        <a href="{{route('home')}}">Back to Home</a>
</body>
</html>