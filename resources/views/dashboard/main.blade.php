<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Learnify</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1>Ini Adalah Dashboard</h1>

    <form method="POST" action="{{ route('handle-logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
    
</body>
</html>