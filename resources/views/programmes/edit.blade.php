<form action="{{ route('programmes.update', $programme->id) }}" method="POST">
    @csrf
    @method('POST')
    <div class="card">
        <div class="card-body">
            <div class="row">
                {{-- <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="ecole"> Ecole</label>
                        
                        <div class="input-with-dropdown">
                            <select id="ecoles_list" wire:model="selectedEcole" name="ecole_id">
                                <option value="{{ $programme->ecole_id }}">Sélectionner une école</option>
                                @foreach($ecoles as $ecole)
                                    <option value="{{ $ecole->id }}">{{ $ecole->nom }}</option>
                                @endforeach
                            </select>
                        </div>  
                    </div>
                </div>  --}}
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Libelle</label>
                        <input type="text" name="libelle" value="{{ $programme->libelle }}">
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



