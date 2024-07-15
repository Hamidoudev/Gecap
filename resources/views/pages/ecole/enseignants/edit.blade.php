<form action="{{ route('pages.ecole.enseignants.update', $enseignant->id) }}" method="POST">
    @csrf
    @method('POST')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Matricule <span class="text-danger">*</span><span class="text-danger">*</span></label>
                        <input type="text" name="matricule" value="{{ $enseignant->matricule }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Nom <span class="text-danger">*</span><span class="text-danger">*</span></label>
                        <input type="text" name="nom" value="{{ $enseignant->nom }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Prénom <span class="text-danger">*</span><span class="text-danger">*</span></label>
                        <input type="text" name="prenom" value="{{ $enseignant->prenom }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Date Naissance <span class="text-danger">*</span></label>
                        <input type="date" name="date_n"value="{{ $enseignant->date_n }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Email <span class="text-danger">*</span></label>
                        <input type="text" name="email"value="{{ $enseignant->email }}">
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Téléphone <span class="text-danger">*</span></label>
                        <input type="text" name="telephone"value="{{ $enseignant->telephone }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Adresse <span class="text-danger">*</span></label>
                        <input type="text" name="adresse"value="{{ $enseignant->adresse }}">
                    </div>
                </div>

            

                <div class="col-lg-12">
                    <div class="form-group">
                        <label> CV <span class="text-danger">*</span></label>
                        <div class="image-upload">
                            <input type="file" name="cv" value="{{ $enseignant->cv }}">
                            <div class="image-uploads">
                                <img src="{{ URL::to('admin-template/assets/img/icons/upload.svg') }}" alt="img">
                                <h4>ajoutez ici votre cv</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button type="reset" data-bs-dismiss="modal" class="btn btn-secondary">Annuler</button>
                    <button type="submit" class="btn btn-primary me-2">Modifier</button>

                </div>
            </div>
        </div>
    </div>
</form>



