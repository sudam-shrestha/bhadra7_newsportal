<!DOCTYPE html>
<html lang="en">
@props(['title', 'description', 'image'])

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jawaaf Newsportal - {{ $title ?? '' }}</title>
    <meta name="description" content="{{ $description ?? '' }}">
    <meta property="og:title" content="Jawaaf Newsportal - {{ $title ?? '' }}" />
    <meta property="og:image" content="{{ $image ?? asset('frontend/images/ogimg.png') }}" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css"
        integrity="sha512-QeR2VH+lsBE5LSAe1Q5EnTBbe7XTBubt8dG93Y7gidSgdMCr8nVqKcfKAMyN96SV8KDbZVTDXChatu5G2KQGzg=="
        crossorigin="anonymous" referrerpolicy="no-referrer">

    <script src="https://cdn.jsdelivr.net/gh/sudam-shrestha/nepali-calender@main/src/nepali-calendar.js"></script>
</head>

<body>

    <x-frontend-header />

    <main>
        {{ $slot }}
    </main>

    <x-frontend-footer />


    <script>
        const bs = NepaliCalendar.adToBs(new Date());
        const np = NepaliCalendar.formatBs(bs, 'ne');
        // console.log(np)
        const date = document.getElementById('date');
        date.innerText = np;
    </script>

</body>

</html>
