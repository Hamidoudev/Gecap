@extends('layouts.interfaceprogramme')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Ajouts de programme</h4>
            <p>
                @if ($message = Session::get('success'))
                    <h3> {{ $message }} </h3>
                @endif
            </p>
        </div>
    </div>
    <form action="{{ route('programmes.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label> Libelle</label>
                            <input type="text" name="libelle">
                        </div>
                    </div>
                    {{-- <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label> Nom </label>
                            <input type="text" name="nom">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label> Prénom</label>
                            <input type="text" name="prenom">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Date Naissance</label>
                            <input type="date" name="date_n">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email">
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Téléphone</label>
                            <input type="text" name="telephone">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Adresse</label>
                            <input type="text" name="adresse">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label> CV</label>
                            <div class="image-upload">
                                <input type="file" name="cv">
                                <div class="image-uploads">
                                    <img src="{{ URL::to('admin-template/assets/img/icons/upload.svg') }}" alt="img">
                                    <h4>ajoutez ici votre cv</h4>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-lg-12">
                        <button type="reset" class="btn btn-cancel">Annuler</button>
                        <button type="submit" class="btn btn-submit me-2">Envoyer</button>

                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
