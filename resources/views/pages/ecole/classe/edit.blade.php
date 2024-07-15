<form action="{{ route('pages.ecole.classe.update', $classe->id) }}" method="POST">
    @csrf
    @method('POST')
    <div class="card">
        <div class="card-body">
            <div class="row">
                
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Libelle </label>
                        <input type="text" name="libelle" value="{{ $classe->libelle }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Cycle <span class="text-danger">*</span></label>
                        <div class="input-with-dropdown">
                            <select id="ecoles_list" name="cycle_id" class="form-control">
                                @foreach($cycles as $cycle)
                                    <option value="{{ $cycle->id }}" {{ $classe->cycle_id == $cycle->id ? 'selected' : '' }}>
                                        {{ $cycle->libelle }}
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
