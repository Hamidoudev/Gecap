@extends('layouts.interfaceemplois')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Ajouts Emplois</h4>
            <p>
                @if ($message = Session::get('success'))
                    <h3> {{ $message }} </h3>
                @endif
            </p>
        </div>
    </div>
    <form action="{{ route('emplois.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label> UE</label>
                            <div class="input-with-dropdown">
                                <select id="ecoles_list" wire:model="selectedEcole" name="ue">
                                    <option value="">Sélectionner une UE</option>
                                    @foreach($ues as $ue)
                                        <option value="{{ $ue->id }}">{{ $ue->libelle }}</option>
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label> Trimestre </label>
                            <div class="input-with-dropdown">
                                <select id="ecoles_list" wire:model="selectedEcole" name="trimestre">
                                    <option value="">Sélectionner un trimestre</option>
                                    @foreach($trimestres as $trimestre)
                                        <option value="{{ $trimestre->id }}">{{ $trimestre->libelle }}</option>
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label> Date Debut </label>
                            <input type="date" name="date_debut">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Date Fin</label>
                            <input type="date" name="date_fin">
                        </div>
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
