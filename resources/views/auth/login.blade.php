<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="copyright" content="{{ env('APP_NAME') }}"/>

    <!-- Robots -->
    <meta name="robots" content="noindex,nofollow,nosnippet,noarchive,noimageindex">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('storage/images/fav.png') }}" />

    <title>{{ config('app.name') }} - Login</title>

</head>

<body>
<div class="min-h-screen bg-white flex">
    <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
        <div class="mx-auto w-full max-w-sm lg:w-96">
            <div>
                <a href="#" target="_blank">
                    <img class="h-16 w-auto mx-auto" src="{{ asset('storage/images/logo.png') }}" alt="{{ env('APP_NAME') }}">
                </a>
            </div>

            <div class="mt-8">
                <div class="mt-6">

                    @if(count($errors) > 0)
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                            <p class="font-bold">An error occurred</p>
                            <p>{{ $errors->first() }}</p>
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                Email Address
                            </label>
                            <div class="mt-1">
                                <input id="email" name="email" type="email" autocomplete="email" required
                                       value="{{ old('email') }}"
                                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>

                        </div>

                        <div class="space-y-1">
                            <label for="password" class="block text-sm font-medium text-gray-700">
                                Password
                            </label>
                            <div class="mt-1">
                                <input id="password" name="password" type="password" autocomplete="current-password"
                                       required
                                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>

                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember_me" name="remember_me" type="checkbox"
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="remember_me" name="remember_me"
                                       class="ml-2 block text-sm text-gray-900">
                                    Remember Me
                                </label>
                            </div>

                            <div class="text-sm">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                       class="font-medium text-blue-600 hover:text-blue-500 hover:underline">Forgot
                                        Password?</a>
                                @endif
                            </div>
                        </div>
                        <div>
                            <button type="submit"
                                    class="w-full flex justify-center py-2 px-4 focus:outline-none rounded-full shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                                Login
                            </button>

                            <div style="padding-top: 5%;" class="text-sm text-center">
                                <p>Copyright &copy; 2021 <a class="font-medium text-blue-600 hover:text-blue-500 hover:underline" target="_blank">Recruiting</a>.<br />All rights reserved.</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden lg:block relative w-0 flex-1">
        <img class="absolute inset-0 h-full w-full object-cover" src="{{ asset('storage/images/recruiting.jpg') }}" alt="">
    </div>
</div>
</body>

</html>
