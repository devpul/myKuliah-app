<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>📙 Mykuliah App</title>
    <!-- CDN TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 ">

    <div class="flex relative">
        <!-- sidebar -->
        @include('partials.sidebar')        

        <!-- header -->

        <!-- content -->
        <div class="pl-5 pt-5 pr-2 flex flex-col gap-y-10  w-full">
            @yield('content')
        </div>


        
        <!-- chat -->
       @include('partials.chatbot') 
    </div>

</body>
</html>