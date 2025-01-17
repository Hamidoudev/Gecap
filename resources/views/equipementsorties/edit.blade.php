<form action="{{ route('equipements.update', $equipement->id) }}" method="POST">
    @csrf
    @method('POST')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Nom <span class="text-danger">*</span></label>
                        <input type="text" name="nom" value="{{ $equipement->nom }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Type <span class="text-danger">*</span></label>
                        <input type="text" name="type" value="{{ $equipement->type }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Quantité <span class="text-danger">*</span></label>
                        <input type="text" name="quantite" value="{{ $equipement->quantite }}">
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





