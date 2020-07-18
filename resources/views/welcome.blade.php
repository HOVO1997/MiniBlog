<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            @if (Route::has('login'))
                <div class="top-right links">
                    <a  href="{{route('locale',__('main.set_lang'))}}">{{ __('main.set_lang') }}</a>
                    @auth
                        <a href="{{ url('/home') }}">{{ __('main.home') }}</a>
                    @else
                        <a href="{{ route('login') }}">{{ __('main.login') }}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">{{ __('main.register') }}</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                   {{ __('main.welcome') }}
                </div>

            </div>
        </div>
    </body>
</html>
