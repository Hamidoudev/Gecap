


<div class="modal fade" id="ajoutEleveModal" tabindex="-1" aria-labelledby="ajoutEleveModalLabel" aria-hidden="true">
    <div  class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajoutEleveModalLabel">Ajouter un Emplois</h5>
                @if ($message = Session::get('success'))
                <h3> {{ $message }} </h3>
            @endif
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('emplois.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label> UE</label>
                                            <div class="input-with-dropdown">
                                                <select id="ecoles_list" wire:model="selectedEcole" name="ue_id">
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
                                                <select id="ecoles_list" wire:model="selectedEcole" name="trimestre_id">
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
                                    
                    </div>
                </div>
            </div>
                
                </div>
                <div class="modal-footer justify-content">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>

