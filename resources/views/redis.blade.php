<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Redis ex</title>
</head>
<body>
    Hello Redis!
    <script src="/js/app.js"></script>
    <script>
        // Echo.channel('presence-user.3')
        // Echo.channel('private-user.3')
        Echo.channel('user.3')
            .listen('UserEvent', e => {
                console.log(e);
            })
        // Echo.join('user.3')
        //     .here( data => {
        //         console.log('dataH: ', data)
        //     })
        //     .joining( dataJ => {
        //         console.log('dataJ: ', dataJ)
        //     })
        //     .leaving( dataL => {
        //         console.log('dataL: ', dataL)
        //     })
        //     .listen('UserEvent', e => {
        //         console.log(e);
        //     });
    </script>
</body>
</html>
