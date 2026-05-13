<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">

    <script>
        (() => {
            const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');

            const syncTheme = () => {
                const isDark = mediaQuery.matches;
                document.documentElement.classList.toggle('dark', isDark);
                document.documentElement.style.colorScheme = isDark ? 'dark' : 'light';
            };

            syncTheme();

            if (typeof mediaQuery.addEventListener === 'function') {
                mediaQuery.addEventListener('change', syncTheme);
            } else if (typeof mediaQuery.addListener === 'function') {
                mediaQuery.addListener(syncTheme);
            }

            window.addEventListener('pageshow', syncTheme);
            document.addEventListener('visibilitychange', () => {
                if (!document.hidden) syncTheme();
            });
        })();
    </script>

    <title>{{ config("app.name", "Laravel") }}</title>

    @routes()
    @vite(["resources/css/app.css", "resources/js/app.js"])
    @inertiaHead

    @fonts
</head>

<body class="bg-white text-gray-900 dark:bg-gray-900  dark:text-gray-300">
    @inertia
</body>

</html>
