<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config("app.name", "Laravel") }}</title>

    @routes()
    @vite(["resources/css/app.css", "resources/js/app.js"])
    @inertiaHead

    @fonts
</head>

<body class="text-gray-900 bg-white  dark:text-gray-100 dark:bg-gray-900">
    @inertia
</body>

</html>
