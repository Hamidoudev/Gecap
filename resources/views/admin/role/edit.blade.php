<form action="{{ route('admin.role.update', $role->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="modal-body">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-sm-2 col-6">
                        <div class="mb-3">
                            <label class="form-label mb-3" for="a1">Nom du Rôle<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="a1" name="nom" value="{{ $role->nom }}" placeholder="Entrez le nom du rôle" autofocus>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-6">
                        <div class="mb-3">
                            <label class="form-label mb-3" for="a7">État<span class="text-danger">*</span></label>
                            <select class="form-select" id="a7" name="etat">
                                <option value="" disabled>Choisir</option>
                                <option value="1" {{ $role->etat == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $role->etat == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($droits as $droit)
                        <div class="form-check col-md-4">
                            <input class="form-check-input" type="checkbox" id="id{{ $droit->id }}" name="role_droits[]" value="{{ $droit->id }}" {{ in_array($droit->id, $role->droits->pluck('id')->toArray()) ? 'checked' : '' }}>
                            <label class="form-check-label" for="id{{ $droit->id }}">{{ $droit->nom }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex gap-2 justify-content-end">
            <button type="submit" class="btn btn-primary">Modifier</button>
        </div>
    </div>
</form>