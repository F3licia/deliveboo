<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

    </style>

    {{-- link boostrap --}}

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- link cli vue --}}
    <script src="{{ asset('js/app.js') }}" defer></script>


</head>

<body>
    <div id="app" class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="align-self-start">

            <h1>Scegli il tuo ristorante </h1>


            @foreach ($types as $type)
                <type-filter-button name="{{ $type->name }}"></type-filter-button>
            @endforeach

            @foreach($users as $user)
                <a href="{{ route('orders.create', ['slug' => $user->slug]) }}">
                    <restaurant-card name="{{$user->name}}" email="{{$user->email}}" address="{{$user->address}}"></restaurant-card>
                </a>
            @endforeach
            
            {{-- @foreach ($users as $user)
                <div class="d-flex flex-row">
                    <a href="{{ route('orders.create', ['slug' => $user->slug]) }}">
                        <div class="card" style="width: 18rem; margin: 5px">

                            @foreach ($user->types as $type)
                                <type-user name="{{ $type->name }}">
                                </type-user>
                            @endforeach

                            <div class="card-body">
                                <user-registered name="{{ $user->name }}"
                                    email="{{ $user->email }}" address="{{ $user->address }}">
                                </user-registered>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach --}}
        </div>
    </div>
</body>

</html>
