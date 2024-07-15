 


<div class="modal fade" id="ajoutEleveModal" tabindex="-1" aria-labelledby="ajoutEleveModalLabel" aria-hidden="true">
    <div  class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajoutEleveModalLabel">Ajouter une Classe</h5>
                @if ($message = Session::get('success'))
                <h3> {{ $message }} </h3>
            @endif
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('pages.ecole.classe.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                 
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label> Libelle <span class="text-danger">*</span></label>
                                <input type="text" name="libelle">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label> Cycle <span class="text-danger">*</span></label>
                                <div class="input-with-dropdown">
                                    <select id="ecoles_list" wire:model="selectedEcole" name="cycle_id">
                                        <option value="">Cycle</option>
                                        @foreach($cycles as $cycle)
                                            <option value="{{ $cycle->id }}">{{ $cycle->libelle }}</option>
                                        @endforeach
                                    </select>
                                </div> 
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


