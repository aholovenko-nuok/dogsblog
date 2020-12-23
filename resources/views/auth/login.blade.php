<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <title>Авторизація</title>

    <link href="/auth/css/app.css" rel="stylesheet">
    <link href="/auth/css/custom.css" rel="stylesheet">
</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Привіт, Автор</h1>
                            <p class="lead">
                                Увійдіть до аккаунту, щоб продовжити
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-lg" type="email" name="email" placeholder="Введіть ваш email" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Пароль</label>
                                            <input class="form-control form-control-lg" type="password" name="password" placeholder="Введіть ваш пароль" />
                                            <small>
                                                 @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}">Забули пароль?</a> 
                                                @endif
                                            </small>
                                        </div>
                                        <div>
                                            <label class="form-check-label" for="remember">
                                                <input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
                                                {{ __("Запам'ятати мене") }}
                                            </label>
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">
                                                 {{ __('Увійти') }}
                                            </button>

                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Забули пароль?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="auth/js/app.js"></script>

</body>

</html>