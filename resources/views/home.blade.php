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

    <form action="/home/search-owner" method="get">
        <label for="search-owner">Search by owner</label><br>
        <input type="text" name="search-owner"><br>
        <button type="submit">Search 👤</button><br><br>
    </form>
    
    
    @if (isset($messageOwner))
       {{$messageOwner}}
    @endif

    <br><br>

    <?php if(isset($search_owner)) : ?>
    <h2>Search Results:</h2>
    
    <ul>
        <?php foreach ($search_owner as $owner) : ?>
            <li>{{$owner->first_name . " " . $owner->surname}}</li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>

   
    <br><br>
    <form action="/home/search-animal" method="get">
        <label for="search-animal">Search by animal</label><br>
        <input type="text" name="search-animal"><br>
        <button type="submit">Search 🐶</button>
    </form>

    <br>


    @if (isset($messageAnimal))
      {{$messageAnimal}}
    @endif

    <br><br>


    @if (isset($search_animal))
        <h2>Search Results</h2>
        <ul>
        @foreach ($search_animal as $animal)
            <li>{{$animal->name}}</li>
        @endforeach
        </ul>
    @endif

    
    
</body>
</html>