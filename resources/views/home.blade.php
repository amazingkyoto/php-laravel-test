<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bandingin Library</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .title {
            font-size: 42px;
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
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/admin') }}">Admin</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            {{-- @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif --}}
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title">
                Welcome to Bandingin Library
            </div>

            {{-- <div class="links">
                <a href="{{ url('/login') }}">Please Login First!</a>
        </div> --}}
        <div class="container">
            <div class="row">
                @foreach($library as $libraries)
                <div class="col-3 text-center" style="background-color: #7ce025">
                    <span class="font-weight-bold">{{ $libraries->libraryName }}</span>

                    <div class="row">
                        <?php
                        if(isset($libraries->books_id)) {
                            if ($libraries->books_id == NULL) {
                                $books_id = '';
                            } else {
                                $books_id = explode(',', $libraries->books_id);
                                foreach($books_id as $booksid) {
                                echo "<div class='col-4'>";
                                echo $booksid;
                                echo "</div>";
                                }
                            }
                        }
                        ?>
                    </div>
                </div>

                <div class="col-1 bg-transparent"></div>
                @endforeach
            </div>
        </div>
    </div>
    </div>

    <!-- Styles -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
