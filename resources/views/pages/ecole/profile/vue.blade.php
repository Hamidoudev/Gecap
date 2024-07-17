@extends('pages.ecole.interfaces.interfaceprofile')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Mon Profile</h4>
        </div>

    </div>
    <div class="card">
        <div class="card-body">
           
            <form action="{{ route('pages.ecole.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="profile-set">
                    <div class="profile-head">
                    </div>
                    <div class="profile-top">
                        <div class="profile-content">
                            <div class="profile-contentimg">
                                <img src="" alt="img" id="blah">
                                <div class="profileupload">
                                    <input type="file" id="imgInp" name="profile_picture" onchange="previewImage(event)">
                                    <a href=""><img src="assets/img/icons/edit-set.svg" alt="img"></a>
                                </div>
                            </div>
                            <div class="profile-contentname">
                                <h2>{{ Auth::guard('ecole')->user()->nom }}</h2>
                                <h4>{{ Auth::guard('ecole')->user()->type->name }}</h4>
                            </div>
                        </div>
    
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Type Ecole</label>
                            <input type="text" class="form-control" id="type_id" name="typeecole_id"
                                value="{{ $ecole->typeecole->libelle }}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom"
                                value="{{ $ecole->nom }}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $ecole->email }}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Siege</label>
                            <input type="text" class="form-control" id="siege" name="siege"
                                value="{{ $ecole->siege }}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Mot de passe</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('password', 'togglePassword')">
                                        <i id="togglePassword" class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Confirmer Mot de passe</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirm_password" name="password_confirmation">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('confirm_password', 'toggleConfirmPassword')">
                                        <i id="toggleConfirmPassword" class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-12">
                        <button type="button" class="btn btn-secondary">Fermer</button>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </div>
                
               
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('blah');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);

            
                function togglePasswordVisibility(fieldId, toggleIconId) {
                    var passwordField = document.getElementById(fieldId);
                    var toggleIcon = document.getElementById(toggleIconId);
                    if (passwordField.type === "password") {
                        passwordField.type = "text";
                        toggleIcon.classList.remove("fa-eye");
                        toggleIcon.classList.add("fa-eye-slash");
                    } else {
                        passwordField.type = "password";
                        toggleIcon.classList.remove("fa-eye-slash");
                        toggleIcon.classList.add("fa-eye");
                    }
                }
              
                
        
        }
    </script>
            <!-- Don't forget to include FontAwesome for the eye icon -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
                
@endsection
