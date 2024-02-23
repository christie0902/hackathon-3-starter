<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Owner Details</title>
</head>
<body>
    <h1>{{$owner_detail->first_name}}'s details</h1>
    Name: {{$owner_detail->first_name . " " . $owner_detail->surname}}<br>
    Email: {{$owner_detail->email}}<br>
    Phone: {{$owner_detail->phone}}<br>
    Address: {{$owner_detail->address}}<br>

    <a href="{{route('owner.display')}}">Back</a>
</body>
</html>