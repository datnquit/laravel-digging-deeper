<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Config</title>
</head>
<body>
@if(session('success'))
    {{ session('success') }} <br>
@endif
<form action="/test-mail" method="post">
    @csrf
    <input type="text" name="host" value="smtp.googlemail.com" placeholder="Host"> <br>
    <input type="text" name="port" value="465" placeholder="Port"><br>
    <input type="text" name="username" value="datnquit@gmail.com" placeholder="Username"><br>
    <input type="text" name="password" value="" placeholder="Password"><br>
    <input type="text" name="encryption" value="ssl" placeholder="Encryption"><br>
    <button type="submit">Test</button>
</form>
</body>
</html>
