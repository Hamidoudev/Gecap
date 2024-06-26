<form action="{{ route('matieres.update', $matiere->id) }}" method="POST">
    @csrf
    @method('POST')
    <div class="card">
        <div class="card-body">
            <div class="row">
                
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Libelle </label>
                        <input type="text" name="libelle" value="{{ $matiere->libelle }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Type </label>
                        <select name="type" id="type" class="form-control">
                            <option value="premier cycle" {{ $matiere->type == 'premier cycle' ? 'selected' : '' }}>Premier Cycle</option>
                            <option value="second cycle" {{ $matiere->type == 'second cycle' ? 'selected' : '' }}>Second Cycle</option>
                        </select>     
                    
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <div class="input-with-dropdown">
                            <select id="ecoles_list" name="enseignant_id" class="form-control">
                                @foreach($enseignants as $enseignant)
                                <option value="{{ $enseignant->id }}" {{ $matiere->enseignant_id == $enseignant->id ? 'selected' : '' }}>
                                    {{ $enseignant->nom }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                




                
            </div>
           
        </div>
       
    </div>
    <div class="col-lg-12">
        <button type="reset" data-bs-dismiss="modal" class="btn btn-secondary">Annuler</button>
        <button type="submit" class="btn btn-primary me-2">Modifier</button>

    </div>
</form>
