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
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label> Libelle <span class="text-danger">*</span> </label>
                                        <input type="text" name="libelle">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label> Date Entree <span class="text-danger">*</span></label>
                                        <input type="date" name="date_entre" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label> Quantité <span class="text-danger">*</span></label>
                                        <input type="number" min="1" name="quantite" class="form-control">
                                    </div>
                                </div>

                                {{-- <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="ecole"> Ecole <span class="text-danger">*</span></label>

                                            <div class="input-with-dropdown">
                                                <select id="ecoles_list" wire:model="selectedEcole" name="ecole_id">
                                                    <option value="">Ecole</option>
                                                    @foreach ($ecoles as $ecole)
                                                        <option value="{{ $ecole->id }}">{{ $ecole->nom }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div> --}}

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




<div class="modal fade" id="sortieModal" tabindex="-1" aria-labelledby="ajoutEnseignantModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajoutEnseignantModalLabel">Sortie Equipement</h5>
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
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="ecole"> Ecole <span class="text-danger">*</span></label>

                                        <div class="input-with-dropdown">
                                            <select id="ecoles_list" wire:model="selectedEcole" name="ecole_id">
                                                <option value="">Ecole</option>
                                                @foreach ($ecoles as $ecole)
                                                    <option value="{{ $ecole->id }}">{{ $ecole->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label> Date Sortie <span class="text-danger">*</span></label>
                                        <input type="date" name="date_sortie" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label> Quantité <span class="text-danger">*</span></label>
                                        <input type="number" min="1" name="quantite" class="form-control">
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
