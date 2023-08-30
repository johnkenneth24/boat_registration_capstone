<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bs5/css/bootstrap.min.css') }}">
    <style>
        body {
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .animation {
            animation: fade-in 2s ease-in-out;
        }

        @keyframes fade-in {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        figcaption a {
            text-decoration: none;
            /* color: #4b4b4b; */
            font-family: 'Open Sans', sans-serif;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="animation">
        <div class="row">
            <div class="col-md-6 text-center">
                <figure>
                    <img src="{{ asset('images/captain-lost.gif') }}" alt="boat-animation" class="img-fluid">
                    <figcaption>
                        <a class="text-center text-muted font-italic small" href="https://storyset.com/nature"
                            referrerpolicy="no-referrer">Nature
                            illustrations
                            by Storyset</a>
                    </figcaption>
                </figure>
            </div>
            <div class="col-md-6">
                <div class="animation">
                    <h1 class="text-secondary display-1 fw-bolder">404</h1>
                    <h2 class="display-4 fw-bolder text-warning">Page not Found</h2>
                    <p class="error mb-5">Lost at Sea? We're sorry, that page doesn't exist.</p>

                    @if (url()->previous() == url()->current())
                        <a href="{{ route('home') }}" class="btn btn-outline-warning px-5">Go Back</a>
                    @else
                        <a href="{{ url()->previous() }}" class="btn btn-outline-warning px-5">Go Back</a>
                    @endif
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('bs5/js/bootstrap.min.js') }}"></script>

</body>

</html>
