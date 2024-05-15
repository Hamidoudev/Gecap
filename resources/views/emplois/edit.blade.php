

<form action="{{ route('emplois.update', $emploi->id) }}" method="POST">
    @csrf
    @method('POST')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> UE</label>
                        <input type="text" name="ue_id" value="{{ $emploi->ue_id }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Trimestre </label>
                        <input type="text" name="trimestre_id" value="{{ $emploi->trimestre_id }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Date Debut</label>
                        <input type="date" name="date_debut" value="{{ $emploi->date_debut }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Date Fin</label>
                        <input type="date" name="date_fin" value="{{ $emploi->date_fin }}">
                    </div>
                </div>
                <div class="col-lg-12">
                    <button type="reset" class="btn btn-cancel">Annuler</button>
                    <button type="submit" class="btn btn-submit me-2">Modifier</button>

                </div>
            </div>
        </div>
    </div>
</form>



