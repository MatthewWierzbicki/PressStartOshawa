<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A website designed for Press Start Oshawa to handle internal functions.">
    <meta name="author" content="PressStartOshawa">
    <link rel="icon" href="../../../../favicon.ico">
    <title>Press Start Oshawa</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="/css/app.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                @if (Auth::check())
                    <a class="navbar-brand" href="/">{{ Auth::user()->userName }}</a>
                @else
                    <a class="navbar-brand" href="/">PressStart</a>
                @endif
            </div>

            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    @if (Auth::check())
                        <li><a href="/customer">Customers</a></li>
                        @if (Auth::user()->type == 'A')
                            <li><a href="/employee">Employees</a></li>
                        @endif
                        <li><a href="/item">Items</a></li>
                        <li><a href="/preorder">Pre-orders</a></li>
                        <li><a href="/ticket">Tickets</a></li>
                        <li><a href="/logout">Logout</a></li>
                    @endif
                </ul>

            </div>
        </div>
    </nav>
