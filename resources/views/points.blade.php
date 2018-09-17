  <!doctype html>
    <html lang="{{ app()->getLocale() }}">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <title>Points</title>

            <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        </head>
        <body>
            <div id="app">
                <points :options="{ fill: false, animationDuration: 1000, intersect:false, responsive: true, maintainAspectRatio: false}"></points>
                <gender :options="{ fill: false, animationDuration: 1000, intersect:false, responsive: true, maintainAspectRatio: false}"></gender>
                <missions :options="{ fill: false, animationDuration: 1000, intersect:false, responsive: true, maintainAspectRatio: false}"></missions>
            </div>
            <script type="text/javascript" src="js/app.js"></script>
        </body>
    </html>