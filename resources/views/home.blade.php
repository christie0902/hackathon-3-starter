<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h1 ><a href="{{ route('owner.display')}}" style="color: black">Owners</a></h1>
    <h1><a href="{{ route('animal.display')}}" style="color: black">Animals</a></h1>

    <form action="/home/search" method="get">
        <label for="search-owner">Search by owner</label>
        <input type="text" name="search-owner">
        <button type="submit">Search</button>
    </form>

    <?php if(isset($search_result)) : ?>
    <h2>Search Results:</h2>
    <ul>
        <?php foreach ($search_result as $owner) : ?>
            <li>{{$owner->first_name . " " . $owner->surname}}</li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>

</body>
</html>