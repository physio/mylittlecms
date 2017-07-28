
<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>

    <meta charset="utf-8" />

<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
    Remove this if you use the .htaccess -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>{{ $title }} - {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5" />

    <link href='//fonts.googleapis.com/css?family=Raleway:300,700|Open+Sans:300,400' rel='stylesheet' type='text/css'>
    <link href="/css/style.css" rel="stylesheet">


    @yield('css')

    <!-- Some JS that need to be loaded in this head section -->
    <script src="/js/custom.modernizr.js"></script>

    <!-- Favicons -->
    <link rel="shortcut icon" href="/images/favicon.png" />
    <link rel="apple-touch-icon" href="/images/apple-touch-icon.png" />

</head>

<body>

@include('MyLittleCMS::includes.topmenu')             
