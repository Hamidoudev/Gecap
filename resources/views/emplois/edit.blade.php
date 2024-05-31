

<form action="{{ route('emplois.update', $emploi->id) }}" method="POST">
    @csrf
    @method('POST')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>UE</label>
                        <div class="input-with-dropdown">
                            <select id="ues_list" name="ue_id" class="form-control">
                                <option value="">Sélectionner une UE</option>
                                @foreach($ues as $ue)
                                    <option value="{{ $ue->id }}" {{ $ue->ue_id == $ue->id ? 'selected' : '' }}>
                                        {{ $ue->libelle }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Trimestre</label>
                        <div class="input-with-dropdown">
                            <select id="trimestres_list" name="trimestre_id" class="form-control">
                                <option value="">Sélectionner un trimestre</option>
                                @foreach($trimestres as $trimestre)
                                    <option value="{{ $trimestre->id }}" {{ $trimestre->trimestre_id == $trimestre->id ? 'selected' : '' }}>
                                        {{ $trimestre->libelle }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
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



