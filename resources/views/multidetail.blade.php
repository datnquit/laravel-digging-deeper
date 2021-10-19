<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Multi detail</title>
</head>
<body>

@foreach(LaravelLocalization::getLocalesOrder() as $localeCode => $properties)
    <li>
        <a href="{{ LaravelLocalization::localizeURL(Request::path(), $localeCode) }}">
            {{ $properties['native'] }}
        </a>
    </li>
@endforeach
<br><br>
{{ $item->name }} <br>
{{ $item->description }} <br>
{{ $item->content }} <br>
{{ $item->type }} <br>
</body>
</html>
