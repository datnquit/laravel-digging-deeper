<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create multi lang</title>
</head>
<body>
Lang:
@foreach(LaravelLocalization::getLocalesOrder() as $localeCode => $properties)
    @if(get_current_edit_locale() == $localeCode)
        <strong>
            {{ $properties['native'] }}
        </strong>
        ( Editting )
    @endif
@endforeach
<br> <br>
Other: <br>
@foreach(LaravelLocalization::getLocalesOrder() as $localeCode => $properties)
    @if(get_current_edit_locale() != $localeCode)
        <a href="{{ Request::fullUrlWithQuery(['edit_locale' => $localeCode]) }}">
            {{ $properties['native'] }} add
        </a> <br>
    @endif
@endforeach

<br>
<form action="{{ route('admin.multi.store') }}" method="post">
    @csrf
    <input type="hidden" name="save_locale" value="{{ request('edit_locale') }}">

    <input type="text" name="name" placeholder="Name"><br>
    <input type="text" name="description" placeholder="Description"><br>
    <input type="text" name="content" placeholder="Content"><br>
    <input type="text" name="type" placeholder="Type"><br>
    <button type="submit">Create</button>
</form>
</body>
</html>
