<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAP</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    <link rel="shortcut icon" href="assets/images/logo/logo.png" type="image/x-icon">
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <div class="row">
                            <div class="col-4">
                                <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a>
                            </div>
                            <div class="col-8 mt-2">
                                <small style="font-size: 35px; color: black; font-weight: 800;">Kecamatan</small><br>
                                <p style="font-size: 50px; margin-top: -20px; color: black; font-weight: 800">Purwosari</p>
                            </div>
                        </div>
                    </div>
                    <small style="font-size: 24px; color: #25396f; font-weight: 900">Masuk</small>
                    <p class="auth-subtitle mb-2" style="font-size: 15px">Sistem Informasi Aplikasi Perkantoran</p>

                    @if (session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
                            {{ session('loginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="/login" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="nip" class="form-control form-control-xl" placeholder="NIP" autofocus required>
                            <div class="form-control-icon">
                                <i class="bi bi-card-heading"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-xl"
                                placeholder="Password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Masuk</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>
