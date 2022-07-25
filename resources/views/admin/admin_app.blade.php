<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Есть еда') }}</title>

    <!-- Scripts -->
    @routes
    @vite('resources/scripts/admin/adminApp.js')
    @inertiaHead

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/pronia/assets/images/favicon.ico" />

</head>
<body>
    @inertia
</body>
</html>