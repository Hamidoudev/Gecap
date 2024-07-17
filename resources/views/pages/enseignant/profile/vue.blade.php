@extends('pages.enseignant.interfaceprofile')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Mon Profile</h4>
        </div>

    </div>
    <div class="card">
        <div class="card-body">
           
            <form action="{{ route('pages.enseignant.profile.update') }}" method="POST" enctype="multipart/form-data">
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
                                <h2>{{ Auth::guard('ecole')->user()->prenom }} {{ Auth::guard('ecole')->user()->nom }}</h2>
                                <h4>{{ Auth::guard('ecole')->user()->type->name }}</h4>
                            </div>
                        </div>
    
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Ecole</label>
                            <input type="text" class="form-control" id="type_id" name="ecole_id"
                                value="{{ $enseignant->ecole->nom }}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Matricule</label>
                            <input type="text" class="form-control" id="matricule" name="matricule"
                                value="{{ $enseignant->matricule }}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom"
                                value="{{ $enseignant->nom }}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Prenom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom"
                                value="{{ $enseignant->prenom }}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Date Naissance</label>
                            <input type="date" class="form-control" id="date_n" name="date_n"
                                value="{{ $enseignant->date_n }}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $enseignant->email }}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Telephone</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ $enseignant->telephone ?? '+223'  }}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Adresse</label>
                            <input type="text" class="form-control" id="adresse" name="adresse"
                                value="{{ $enseignant->adresse }}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>CV</label>
                            <input type="text" class="form-control" id="cv" name="cv"
                                value="{{ $enseignant->cv }}">
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

                  
                    <div class="col-12">
                        <button type="button" class="btn btn-secondary">Fermer</button>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
       
    document.addEventListener('DOMContentLoaded', function() {
        const phoneInput = document.getElementById('phone');
        
        // S'assurer que le champ commence par +223
        if (!phoneInput.value.startsWith('+223')) {
            phoneInput.value = '+223';
        }

        // Mettre le curseur après le préfixe initial
        phoneInput.setSelectionRange(4, 4);

        // Événement pour empêcher la suppression du préfixe
        phoneInput.addEventListener('input', function(e) {
            if (!phoneInput.value.startsWith('+223')) {
                phoneInput.value = '+223';
                phoneInput.setSelectionRange(4, 4);
            }
        });

        // Empêcher la suppression du préfixe via Backspace ou Delete
        phoneInput.addEventListener('keydown', function(e) {
            const cursorPos = phoneInput.selectionStart;
            if ((e.key === 'Backspace' && cursorPos <= 4) || (e.key === 'Delete' && cursorPos < 4)) {
                e.preventDefault();
                phoneInput.setSelectionRange(4, 4);
            }
        });

        // Mettre le curseur après le préfixe lorsqu'on clique dans le champ
        phoneInput.addEventListener('click', function(e) {
            if (phoneInput.selectionStart < 4) {
                phoneInput.setSelectionRange(4, 4);
            }
        });
    });


        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('blah');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
