<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; auth Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, auth, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="shortcut icon" href="auth/img/icons/icon-48x48.png" />

    <title>Вхід | Особистий кабінет</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="auth/css/app.css" rel="stylesheet">
    <link href="auth/css/custom.css" rel="stylesheet">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="auth/plugins/country-picker-flags/build/css/countrySelect.css">
    <link rel="stylesheet" href="auth/plugins/country-picker-flags/build/css/demo.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
</head>

<body>


    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Реєстрація</h1>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
        
                                
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" placeholder="введіть ваше email" value="{{ old('email') }}" required autocomplete="email"/>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Ім'я</label>
                                            <input class="form-control form-control-lg" type="text" name="name" placeholder="введіть ваше ім'я" />
                                        </div>
                                    
                                        <div class="mb-3">
                                            <label class="form-label">Пароль</label>
                                            <input class="form-control form-control-lg" type="password" name="password" placeholder="введіть пароль" />
                                        </div>
                                       
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-primary">
                                                        {{ __('Зареєструватися') }}
                                            </button>
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
    <!-- Load jQuery from CDN so can run demo immediately -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="auth/plugins/country-picker-flags/build/js/countrySelect.js"></script>
    <script>
        $("#country_selector").countrySelect({
            preferredCountries: ['ua', 'pl', 'us']
        });
    </script>
    <script>
        try {
            fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
                return true;
            }).catch(function(e) {
                var carbonScript = document.createElement("script");
                carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
                carbonScript.id = "_carbonads_js";
                document.getElementById("carbon-block").appendChild(carbonScript);
            });
        } catch (error) {
            console.log(error);
        }
    </script>
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker({
                dateFormat: "yy-mm-dd",
                yearRange: "1920:2021",
                changeMonth: true,
                changeYear: true,
                
            });
        } );
    </script>
    </body>

    </html>


