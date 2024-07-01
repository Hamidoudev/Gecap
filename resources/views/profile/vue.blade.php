@extends('layouts.interfaceprofile')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Mon Profile</h4>
        </div>

    </div>
    <div class="card">
        <div class="card-body">
           
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
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
                                <h2>{{ Auth::user()->username }}</h2>
                                <h4>{{ Auth::user()->type->name }}</h4>
                            </div>
                        </div>
    
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                value="{{ $user->first_name }}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                value="{{ $user->last_name }}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ $user->phone }}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="{{ $user->username }}">
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
        }
    </script>
@endsection
