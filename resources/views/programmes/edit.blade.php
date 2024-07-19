<form action="{{ route('programmes.update', $programme->id) }}" method="POST">
    @csrf
    @method('POST')
    <div class="card">
        <div class="card-body">
            <div class="row">
             
                
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="ecole"> Ecole <span class="text-danger">*</span></label>
                            <select id="ecoles_list" class="form-control" name="ecole_id">
                                @foreach ($ecoles as $ecole)
                                <option value="{{ $ecole->id }}" {{ $programme->ecole_id == $ecole->id ? 'selected' : '' }}>
                                    {{ $ecole->nom }}
                                </option>
                            @endforeach
                            </select>
                         
                    </div>
                </div> 
                
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="classe_id">Classe <span class="text-danger">*</span></label>
                        
                        <select name="classe_id" id="classe_id" class="form-control" >
                            @foreach($classes as $classe)
                            <option value="{{ $classe->id }}" {{ $programme->classe_id == $classe->id ? 'selected' : '' }}>
                                {{ $classe->libelle }}
                            </option>
                        @endforeach
                        </select>
                         
                    </div>
                </div> 
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="matiere_id">Matière <span class="text-danger">*</span></label>
                        <select name="matiere_id" id="matiere_id" class="form-control">
                            @foreach ($matieres as $matiere)
                            <option value="{{ $matiere->id }}" {{ $programme->matiere_id == $matiere->id ? 'selected' : '' }}>
                                {{ $matiere->libelle }}
                            </option>
                        @endforeach
                        </select>
                    </div>
                </div> 
                
             
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="theme">Thème <span class="text-danger">*</span></label>
                        <input type="text" name="theme" id="theme" class="form-control" value="{{  $programme->theme, old('theme') }}">
                    </div>
                </div>
               
                    <div class="form-group">
                        <label for="contenu">Contenu <span class="text-danger">*</span></label>
                        <textarea name="contenu" id="contenu" class="form-control">{{ $programme->contenu,  old('contenu') }}</textarea>
                    </div>
                <div class="col-lg-12">
                    <button type="reset" class="btn btn-cancel">Annuler</button>
                    <button type="submit" class="btn btn-submit me-2">Modifier</button>

                </div>
            </div>
        </div>
    </div>
</form>



