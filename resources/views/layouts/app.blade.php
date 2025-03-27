<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 10 Task List App</title>
    @yield('styles')
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    <style type="text/tailwindcss">
        .btn{
            @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50
        }
        .link{
            @apply font-medium text-gray-700 underline decoration-pink-500
        }

        label{
            @apply block uppercase text-slate-700 mb-2
        }
        input, textarea {
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
        }
        .error{
            @apply text-red-500 text-sm
        }
    </style>
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <h1 class="text-2xl mb-4">@yield('title')</h1>
    <div x-data="{ flash: true }">
        @if (session()->has('success'))
            <div x-show="flash" role="alert" class="relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700">
                <strong class="font-bold">Success</strong>
                <div>
                    {{session('success')}}
                </div>
                <span
                class="cursor-pointer text-green-700 text-lg absolute top-0 bottom-0 px-4 py-3 right-0" @click="flash=false"
                >⨯</span>
            </div>
       @endif
        @yield('content')
    </div>
</body>
</html>
