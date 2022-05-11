<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        Hi, i am <strong>{{ $data['name'] }}</strong>,

        <h4>Subject: {{ $data['subject'] }}</h4>

        <p>{{ $data['message'] }}</p>
    </body>
</html>
