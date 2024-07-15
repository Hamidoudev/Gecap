<!-- Modal -->

<div class="modal fade" id="ajoutEnseignantModal" tabindex="-1" aria-labelledby="ajoutEnseignantModalLabel" aria-hidden="true">
    <div  class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajoutEnseignantModalLabel">Ajouter un Programme</h5>
                @if ($message = Session::get('success'))
                <h3> {{ $message }} </h3>
            @endif
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('programmes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="ecole"> Ecole <span class="text-danger">*</span></label>
                                <select id="ecoles_list" class="form-control" name="ecole_id">
                                    @foreach($ecoles as $ecole)
                                        <option value="{{ $ecole->id }}">{{ $ecole->nom }}</option>
                                    @endforeach
                                </select>
                             
                        </div>
                    </div> 
                    
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="classe_id">Classe <span class="text-danger">*</span></label>
                            
                            <select name="classe_id" id="classe_id" class="form-control" >
                                @foreach ($classes as $classe)
                                    <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                                @endforeach
                            </select>
                             
                        </div>
                    </div> 
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="matiere_id">Matière <span class="text-danger">*</span></label>
                            <select name="matiere_id" id="matiere_id" class="form-control">
                                @foreach ($matieres as $matiere)
                                    <option value="{{ $matiere->id }}">{{ $matiere->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> 
                    
                 
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="theme">Thème <span class="text-danger">*</span></label>
                            <input type="text" name="theme" id="theme" class="form-control" value="{{ old('theme') }}">
                        </div>
                    </div>
                   
                        <div class="form-group">
                            <label for="contenu">Contenu <span class="text-danger">*</span></label>
                            <textarea name="contenu" id="contenu" class="form-control">{{ old('contenu') }}</textarea>
                        </div>
                   
                </div>
            </div>
                </div>
                </div>
                <div class="modal-footer justify-content">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
    </div

