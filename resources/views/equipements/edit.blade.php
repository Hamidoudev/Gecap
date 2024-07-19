<form action="{{ route('equipements.update', $equipement->id) }}" method="POST">
    @csrf
    @method('POST')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Libelle <span class="text-danger">*</span></label>
                        <input type="text" name="libelle" value="{{ $equipement->libelle }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Date Entree <span class="text-danger">*</span></label>
                        <input type="date" name="date_entre" value="{{ $equipement->date_entre }}">
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





