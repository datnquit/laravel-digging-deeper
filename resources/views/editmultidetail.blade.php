<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update multi lang</title>
</head>
<body>
<strong>"{{ get_current_edit_locale_name() }}"</strong> <br>
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
            {{ $properties['native'] }} edit
        </a> <br>
    @endif
@endforeach

<br>
<form action="{{ route('admin.multi.update', $item->id) }}" method="post">
    @csrf
    @method('put')
    <input type="hidden" name="save_locale" value="{{ request('edit_locale') }}">

    <input type="text" name="name" value="{{ $item->name }}" placeholder="Name"><br>
    <input type="text" name="description" value="{{ $item->description }}" placeholder="Description"><br>
    <input type="text" name="content" value="{{ $item->content }}" placeholder="Content"><br>
    <input type="text" name="type" value="{{ $item->type }}" placeholder="Type"><br>
    <button type="submit">Update</button>
</form>
</body>
</html>
