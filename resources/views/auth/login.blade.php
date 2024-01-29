<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>Cyber DefX</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">
</head>
<body>



<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
        <a class="navbar-brand" href="#"><span class="text-primary">Cyber</span>DefX</a>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

    

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
            <a href="{{ url('auth/google') }}" style="display: inline-flex; align-items: center; justify-content: center; background-color: #4285F4; color: #ffffff; border: 1px solid #4285F4; border-radius: 4px; padding: 4px 8px; text-decoration: none; font-family: 'Roboto', sans-serif; font-size: 12px; font-weight: bold; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); text-align: center; margin-top: 20px;"
    onmouseover="this.style.backgroundColor='#3367D6'; this.style.borderColor='#3367D6';"
    onmouseout="this.style.backgroundColor='#4285F4'; this.style.borderColor='#4285F4';">
    <span style="font-size: 14px; margin-right: 4px; display: flex; align-items: center;">&#xe8f1;</span>
    <span style="vertical-align: middle;">Sign in with Google</span>
</a>

        </form>
    </x-authentication-card>
</x-guest-layout>
