<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="{{url("assets/static/images/logo.png")}}">
    <title>{{ env('APP_NAME') }} - PASIEN - @yield('title', 'Page')</title>
    @include('templates.components.header')
</head>

<body class="app">
    @include('templates.components.loader')
    @include('templates.components.sidebar_pasien')
    <div>
        <div class="page-container">
            @include('templates.components.topbar')
            <main class="main-content bgc-grey-100">
                <div id="mainContent">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    @include('templates.components.footer')
</body>
</html>
