<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connexion | Gecap</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL:: to('school-management/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    
    <link rel="stylesheet" href="{{ URL:: to('school-management/assets/plugins/feather/feather.css') }}">
    
    <link rel="stylesheet" href="{{ URL:: to('school-management/assets/plugins/icons/flags/flags.css') }}">
    
    <link rel="stylesheet" href="{{ URL:: to('school-management/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL:: to('school-management/assets/plugins/fontawesome/css/all.min.css') }}">
    
    <link rel="stylesheet" href="{{ URL:: to('school-management/assets/css/style.css') }}"></head>

<body>
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
        <div class="container">
        <div class="loginbox">
        <div class="login-left col-md-6">
        <img class="img-fluid" src="{{ URL:: to('Arsha/assets/img/log.png') }}" alt="Logo">
        </div>
        <div class="login-right">
        <div class="login-right-wrap">
        <h1>Bienvenue !!</h1>
        <p>Chère Ecole</p>
        {{-- <p class="account-subtitle">Need an account? <a href="register.html">Sign Up</a></p> --}}
        <h2>Authentifiez-vous pour continuer</h2>
                                    <form method="POST" action="{{ route('login.ecole') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                               autocomplete="off" >

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Mot de passe</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">
                                            

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="d-grid gap-2 mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">Se connecter</button>
                                            	
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

    <script src="{{ URL:: to('assets/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ URL:: to('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
    <script src="{{ URL:: to('assets/js/feather.min.js') }}"></script>
    
    <script src="{{ URL:: to('assets/js/script.js') }}"></script>
</body>

</html>
