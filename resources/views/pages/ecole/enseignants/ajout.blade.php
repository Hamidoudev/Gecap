 <!-- Modal -->
 <div class="modal fade" id="ajoutEnseignantModal" tabindex="-1" aria-labelledby="ajoutEnseignantModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajoutEnseignantModalLabel">Ajouter un enseignant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('enseignants.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Matricule</label>
                                        <input type="text" name="matricule" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input type="text" name="nom" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Prénom</label>
                                        <input type="text" name="prenom" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Date Naissance</label>
                                        <input type="date" name="date_n" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Téléphone</label>
                                        <input type="text" name="telephone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Adresse</label>
                                        <input type="text" name="adresse" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="matieres">Sélectionnez les matières :</label>
                                        <select name="matieres[]" id="matieres" class="form-control" multiple>
                                            @foreach($matieres as $matiere)
                                                <option value="{{ $matiere->id }}">{{ $matiere->libelle }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>CV</label>
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