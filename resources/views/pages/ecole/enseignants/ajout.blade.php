 <!-- Modal -->
 <div class="modal fade" id="ajoutEnseignantModal" tabindex="-1" aria-labelledby="ajoutEnseignantModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajoutEnseignantModalLabel">Ajouter un enseignant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pages.ecole.enseignants.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Matricule <span class="text-danger">*</span></label>
                                        <input type="text" name="matricule" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Nom <span class="text-danger">*</span></label>
                                        <input type="text" name="nom" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Prénom <span class="text-danger">*</span></label>
                                        <input type="text" name="prenom" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Date Naissance <span class="text-danger">*</span></label>
                                        <input type="date" name="date_n" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Téléphone <span class="text-danger">*</span></label>
                                        <input type="text" name="telephone" class="form-control" id="telephone" value="+223">                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Adresse <span class="text-danger">*</span></label>
                                        <input type="text" name="adresse" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Mot de passe <span class="text-danger">*</span></label>
                                        <input type="password" name="password">
                                    </div>
                                </div>

                                {{-- <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="ecole"> Type <span class="text-danger">*</span></label>
                                        <div class="input-with-dropdown">
                                            <select id="ecoles_list" wire:model="selectedEcole" name="type_id">
                                                <option value="">Type</option>
                                                @foreach ($types as $type)
                                                    <option value="{{ $type->id }}">{{ $type->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div> --}}
                               
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>CV <span class="text-danger">*</span></label>
                                        <div class="image-upload">
                                            <input type="file" name="cv" class="form-control">
                                            <div class="image-uploads mt-2">
                                                <img src="{{ URL::to('admin-template/assets/img/icons/upload.svg') }}" alt="img">
                                                <h4>Ajoutez ici votre CV</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Vos scripts JS, y compris Bootstrap -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const telephoneInput = document.getElementById('telephone');
        
        // Mettre le curseur après le préfixe initial
        telephoneInput.setSelectionRange(4, 4);

        // Événement pour empêcher la suppression du préfixe
        telephoneInput.addEventListener('input', function(e) {
            if (!telephoneInput.value.startsWith('+223')) {
                telephoneInput.value = '+223';
                telephoneInput.setSelectionRange(4, 4);
            }
        });

        // Empêcher la suppression du préfixe via Backspace ou Delete
        telephoneInput.addEventListener('keydown', function(e) {
            const cursorPos = telephoneInput.selectionStart;
            if ((e.key === 'Backspace' && cursorPos <= 4) || (e.key === 'Delete' && cursorPos < 4)) {
                e.preventDefault();
                telephoneInput.setSelectionRange(4, 4);
            }
        });

        // Mettre le curseur après le préfixe lorsqu'on clique dans le champ
        telephoneInput.addEventListener('click', function(e) {
            if (telephoneInput.selectionStart < 4) {
                telephoneInput.setSelectionRange(4, 4);
            }
        });
    });
</script>
