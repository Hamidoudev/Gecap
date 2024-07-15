<form action="{{ route('ecoles.update', $ecole->id) }}" method="POST">
    @csrf
    @method('POST')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="">Type</label>
                        <div class="input-with-dropdown">
                            <select id="ecoles_list" name="typeecole_id" class="form-control">
                                @foreach ($typeecoles as $typeecole)
                                    <option value="{{ $typeecole->id }}"
                                        {{ $ecole->typeecole_id == $typeecole->id ? 'selected' : '' }}>
                                        {{ $typeecole->libelle }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Nom </label>
                        <input type="text" name="nom" value="{{ $ecole->nom }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Siege </label>
                        <input type="text" name="siege" value="{{ $ecole->siege }}">
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email"value="{{ $ecole->email }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Mot de passe <span class="text-danger">*</span></label>
                        <input type="password" name="password" value="{{ $ecole->password }}">
                    </div>
                </div>

                {{-- <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="">Type</label>
                        <div class="input-with-dropdown">
                            <select id="ecoles_list" name="type_id" class="form-control">
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}"
                                        {{ $ecole->type_id == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div> --}}




                
            </div>
           
        </div>
       
    </div>
    <div class="col-lg-12">
        <button type="reset" data-bs-dismiss="modal" class="btn btn-secondary">Annuler</button>
        <button type="submit" class="btn btn-primary me-2">Modifier</button>

    </div>
</form>
