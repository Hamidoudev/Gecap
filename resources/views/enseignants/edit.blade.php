@extends('layouts.interface')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Modification enseignants</h4>
            <p>
                @if ($message = Session::get('success'))
                    <h3> {{ $message }} </h3>
                @endif
            </p>
        </div>
    </div>
    <form action="{{ route('enseignants.update', $enseignant->id) }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label> Matricule</label>
                            <input type="text" name="matricule" value="{{ $enseignant->matricule }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label> Nom </label>
                            <input type="text" name="nom" value="{{ $enseignant->nom }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label> Prénom</label>
                            <input type="text" name="prenom" value="{{ $enseignant->prenom }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Date Naissance</label>
                            <input type="date" name="date_n"value="{{ $enseignant->date_n }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email"value="{{ $enseignant->email }}">
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Téléphone</label>
                            <input type="text" name="telephone"value="{{ $enseignant->telephone }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Adresse</label>
                            <input type="text" name="adresse"value="{{ $enseignant->adresse }}">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label> CV</label>
                            <div class="image-upload">
                                <input type="file" name="cv" value="{{ $enseignant->cv }}">
                                <div class="image-uploads">
                                    <img src="{{ URL::to('admin-template/assets/img/icons/upload.svg') }}" alt="img">
                                    <h4>ajoutez ici votre cv</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="reset" class="btn btn-cancel">Annuler</button>
                        <button type="submit" class="btn btn-submit me-2">Modifier</button>

                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
