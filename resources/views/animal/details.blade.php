<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Animal Details</title>
</head>
<body>
    <h1>Details of {{$animal_detail->name}}</h1>
    Breed:{{$animal_detail->breed}}<br>
    Age:{{$animal_detail->age}}<br>
    Weight:{{$animal_detail->weight}} <br><br>
    <a href="{{route('owner.display')}}">Back</a>
</body>
</html>