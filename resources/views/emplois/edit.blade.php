@extends('layouts.interfaceemplois')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Modification emplois</h4>
            <p>
                @if ($message = Session::get('success'))
                    <h3> {{ $message }} </h3>
                @endif
            </p>
        </div>
    </div>
    <form action="{{ route('emplois.update', $emploi->id) }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label> UE</label>
                            <input type="text" name="matricule" value="{{ $emploi->ue }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label> Trimestre </label>
                            <input type="text" name="nom" value="{{ $emploi->trimestre }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label> Date Debut</label>
                            <input type="text" name="prenom" value="{{ $emploi->date_debut }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Date Fin</label>
                            <input type="date" name="date_n"value="{{ $emploi->date_fin }}">
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
