<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>📙 Mykuliah App</title>
    <!-- CDN TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- pake library fullcalendar -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>

    <!-- external css -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/calendar-custom.css') }}">
</head>
<body class="bg-gray-100 ">

    <div class="flex relative">
        <!-- sidebar -->
        @include('partials.sidebar')        

        <!-- header -->

        <!-- content -->
        <div class="pl-10 pr-5 pt-5 flex flex-col gap-y-10  w-full">
            @if (session('error'))
                <div class="bg-red-500 text-white px-5 py-3">{{ session('error') }}</div>
            @elseif (session('success'))
                <div class="bg-green-500 text-white px-5 py-3">{{ session('success') }}</div>
            @endif
            
            @yield('content')
        </div>


            
        <!-- chat -->
       @include('partials.chatbot') 
    </div>

</body>
</html>