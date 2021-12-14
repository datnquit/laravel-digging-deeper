<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach($posts as $post)
        {{ $post->name }} - {{ $post->user->name }} - {{ $post->user->image->url }}  <br>
{{--        @foreach($post->categories as $category)--}}
{{--            {{ $category->name }} ---}}
{{--        @endforeach--}}
{{--        {{ $post->categories->count() }}--}}
{{--        {{ $post->categories_count }}--}}
        <br><br>
    @endforeach
</body>
</html>
