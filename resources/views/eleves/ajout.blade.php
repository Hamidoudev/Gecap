@extends('layouts.interfaceeleve')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Ajouts des Eleves</h4>
            <p>
                @if ($message = Session::get('success'))
                    <h3> {{ $message }} </h3>
                @endif
            </p>
        </div>
    </div>
    <form action="{{ route('eleves.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="ecole"> Ecole</label>
                            {{-- <select id="ecole_id" name="ecole_id">
                                @foreach($ecoles as $ecole)
                                    <option value="{{ $ecole->id }}">{{ $ecole->nom }}</option>
                                @endforeach
                            </select> --}}
                            <div class="input-with-dropdown">
                                <select id="ecoles_list" wire:model="selectedEcole" name="ecole_id">
                                    <option value="">Sélectionner une école</option>
                                    @foreach($ecoles as $ecole)
                                        <option value="{{ $ecole->id }}">{{ $ecole->nom }}</option>
                                    @endforeach
                                </select>
                            </div>  
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label> Matricule</label>
                            <input type="text" name="matricule">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
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
                            <label>Adresse</label>
                            <input type="text" name="adresse">
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group-">
                            
                            <label>Genre</label>
                            <div class="genre">
                            <label>
                                <input type="radio" name="genre" value="F"> F
                            </label><label>
                                <input type="radio" name="genre" value="M"> H
                            </label>
                        </div>
                            
                            
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label> Acte_Naissance</label>
                            <div class="image-upload">
                                <input type="file" name="acte_n">
                                <div class="image-uploads">
                                    <img src="{{ URL::to('admin-template/assets/img/icons/upload.svg') }}" alt="img">
                                    <h4>ajoutez ici votre Acte_Naissance</h4>
                                </div>
                            </div>
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
    <script>
        function selectEcole(value) {
            document.getElementById('ecole').value = value;
        }
    </script>
    @livewireStyles
    @livewireScripts
    
@endsection
