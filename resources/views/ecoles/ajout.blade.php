<!-- Modal -->

<div class="modal fade" id="ajoutecoleModal" tabindex="-1" aria-labelledby="ajoutecoleModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajoutecoleModal">Ajouter une Ecole</h5>
                @if ($message = Session::get('success'))
                    <h3> {{ $message }} </h3>
                @endif
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('ecoles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="ecole"> Type</label>

                                        <div class="input-with-dropdown">
                                            <select id="ecoles_list" wire:model="selectedEcole" name="typeecole_id">
                                                <option value="">Sélectionner un type</option>
                                                @foreach ($typeecoles as $typeecole)
                                                    <option value="{{ $typeecole->id }}">{{ $typeecole->libelle }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
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
                                        <label> Siege </label>
                                        <input type="text" name="siege">
                                    </div>
                                </div>


                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email">
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="modal-footer justify-content">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </div>
                </div>
        </div>
      
        </form>
    </div>
</div>
</div>
