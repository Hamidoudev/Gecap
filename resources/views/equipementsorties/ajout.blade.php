<!-- Modal -->

<div class="modal fade" id="ajoutEnseignantModal" tabindex="-1" aria-labelledby="ajoutEnseignantModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajoutEnseignantModalLabel">Ajouter un Equipement</h5>
                @if ($message = Session::get('success'))
                    <h3> {{ $message }} </h3>
                @endif
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('equipements.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                               
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label> Date Sortie <span class="text-danger">*</span></label>
                                            <input type="text" name="date_sortie">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label> quantité <span class="text-danger">*</span></label>
                                            <input type="text" name="quantite">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="ecole"> Equipement <span class="text-danger">*</span></label>

                                            <div class="input-with-dropdown">
                                                <select id="ecoles_list" wire:model="selectedEcole" name="equipement_id">
                                                    <option value="">Ecole</option>
                                                    @foreach ($equipements as $equipement)
                                                        <option value="{{ $equipement->id }}">{{ $equipement->nom }}</option>
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
            </form>
        </div>
    </div>
</div>