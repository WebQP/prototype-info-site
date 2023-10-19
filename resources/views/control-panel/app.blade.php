<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png"/>
    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html"/>
    <title>Blank Page | AdminKit Demo</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/admin/css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<body>
<div class="wrapper">
    @include('control-panel.layouts.sidebar.sidebar-work')
    <div class="main">
        @include('control-panel.layouts.header.header')
        <main class="content">
            <div id="app"></div>
        </main>
    </div>
</div>

<script src="{{ mix('assets/admin/js/admin.js') }}"></script>
<script src="{{ mix('assets/admin/js/app.js') }}"></script>
</body>
</html>
