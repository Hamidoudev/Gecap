<form action="{{ route('eleves.update', $eleve->id) }}" method="POST">
    @csrf
    @method('POST')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Ecole</label>
                        <div class="input-with-dropdown">
                            <select id="ecoles_list" wire:model="selectedEcole" name="ecole_id" >
                                <option value="{{ $eleve->ecole_id }}">Sélectionner une école</option>
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
                        <input type="text" name="matricule" value="{{ $eleve->matricule }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Nom </label>
                        <input type="text" name="nom" value="{{ $eleve->nom }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Prénom</label>
                        <input type="text" name="prenom" value="{{ $eleve->prenom }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Date Naissance</label>
                        <input type="date" name="date_n"value="{{ $eleve->date_n }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Adresse</label>
                        <input type="text" name="adresse"value="{{ $eleve->adresse }}">
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Genre</label>
                        {{-- <div class="genre">
                            <label>
                                <input type="radio" name="genre" value="{{ $eleve->genre }}"> F
                            </label><label>
                                <input type="radio" name="genre" value="{{ $eleve->genre }}"> H
                            </label>
                        </div> --}}
                        <input type="text" name="genre"value="{{ $eleve->genre }}">
                    </div>
                </div>
    

                <div class="col-lg-12">
                    <div class="form-group">
                        <label> Acte_Naissance</label>
                        <div class="image-upload">
                            <input type="file" name="acte_n" value="{{ $eleve->acte_n }}">
                            <div class="image-uploads">
                                <img src="{{ URL::to('admin-template/assets/img/icons/upload.svg') }}" alt="img">
                                <h4>ajoutez ici votre Acte_Naissance</h4>
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

{{-- @extends('layouts.interfaceeleve')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Modification Eleves</h4>
            <p>
                @if ($message = Session::get('success'))
                    <h3> {{ $message }} </h3>
                @endif
            </p>
        </div>
    </div>
    <form action="{{ route('eleves.update', $eleve->id) }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label> Ecole</label>
                            <div class="input-with-dropdown">
                                <select id="ecoles_list" wire:model="selectedEcole" name="ecole_id" >
                                    <option value="{{ $eleve->ecole_id }}">Sélectionner une école</option>
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
                            <input type="text" name="matricule" value="{{ $eleve->matricule }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label> Nom </label>
                            <input type="text" name="nom" value="{{ $eleve->nom }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label> Prénom</label>
                            <input type="text" name="prenom" value="{{ $eleve->prenom }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Date Naissance</label>
                            <input type="date" name="date_n"value="{{ $eleve->date_n }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Adresse</label>
                            <input type="text" name="adresse"value="{{ $eleve->adresse }}">
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Genre</label>
                            {{-- <div class="genre">
                                <label>
                                    <input type="radio" name="genre" value="{{ $eleve->genre }}"> F
                                </label><label>
                                    <input type="radio" name="genre" value="{{ $eleve->genre }}"> H
                                </label>
                            </div> 
                            <input type="text" name="genre"value="{{ $eleve->genre }}">
                        </div>
                    </div>
        

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label> Acte_Naissance</label>
                            <div class="image-upload">
                                <input type="file" name="acte_n" value="{{ $eleve->acte_n }}">
                                <div class="image-uploads">
                                    <img src="{{ URL::to('admin-template/assets/img/icons/upload.svg') }}" alt="img">
                                    <h4>ajoutez ici votre Acte_Naissance</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button   class="btn btn-cancel"> <a href="{{ route('eleves.listes') }}"></a>Annuler</button>
                        <button type="submit" class="btn btn-submit me-2">Modifier</button>

                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection


 --}}
