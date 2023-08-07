
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>CRM | PHI TOOLS</title>

        <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
        <link rel="manifest" href="/favicon/site.webmanifest">

        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" media="screen" href="/assets/css/perfect-scrollbar.min.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="/assets/css/style.css" />
        <link defer rel="stylesheet" type="text/css" media="screen" href="/assets/css/animate.css" />
        <script src="/assets/js/perfect-scrollbar.min.js"></script>
        <script defer src="/assets/js/popper.min.js"></script>
        <script defer src="/assets/js/tippy-bundle.umd.min.js"></script>
        <script defer src="/assets/js/sweetalert.min.js"></script>
    </head>

    <body
        x-data="main"
        class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
    >

        <div class="main-container min-h-screen text-black dark:text-white-dark">
            <!-- start main content section -->
            <div class="flex min-h-screen items-center justify-center bg-[url('../images/map.svg')] bg-cover bg-center dark:bg-[url('../images/map-dark.svg')]">
                <div class="panel m-6 w-full max-w-lg sm:w-[480px]">
                    <h2 class="mb-3 text-2xl font-bold">Login</h2>
                    <p class="mb-7">Escribe tu email y contraseña</p>
                    <form action="" method="POST" class="space-y-5">
                        @csrf
                        <div>
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" class="form-input" placeholder="Escribe tu email" value="{{ old('email') }}" />
                        </div>
                        <div>
                            <label for="password">Password</label>
                            <input id="password" name="password" type="password" class="form-input" placeholder="Escribe tu contraseña" />
                        </div>
                        @if($errors->any())
                        <p class="text-danger">{{$errors->first()}}</p>
                        @endif
                        <button type="submit" class="btn btn-primary w-full">Login</button>
                    </form>
                </div>
            </div>
            <!-- end main content section -->
        </div>
    </body>
</html>
