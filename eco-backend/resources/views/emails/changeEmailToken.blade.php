<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
</head>
<body>
    <h2>{{__('Hello, here is your link to prove email!')}}</h2>
    <a href="{{config('app.url')}}/user/email/validate?token={{$token}}">Tap here</a>
</body>
</html>
