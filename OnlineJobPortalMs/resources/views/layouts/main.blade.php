<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('../partials.head')
    <style>
        #header {
            height: 60px;
            transition: all 0.5s;
            z-index: 997;
            transition: all 0.5s;
            background: rgb(56, 3, 178);
            /* background: rgb(81, 8, 247, 0.9);*/
        }

        #header.header-transparent {
            /*background: transparent;*/
            background: rgb(56, 3, 178);
        }

        #header.header-scrolled {
            background: rgb(56, 3, 178);
            height: 60px;
        }
    </style>
</head>
<body>
@include('../partials.nav')


<div id="main">
    @yield('content')


</div>

@include('../partials.footer')
@include('../partials.bottom')
</body>
</html>
