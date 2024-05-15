


<!-- Modal -->

    <div class="modal fade" id="ajoutEnseignantModal" tabindex="-1" aria-labelledby="ajoutEnseignantModalLabel" aria-hidden="true">
    <div  class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajoutEnseignantModalLabel">Ajouter un role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('admin.role.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-sm-2 col-6 ">
                        <div class="mb-3">
                            <label class="form-label mb-3" for="a1">Nom du Role<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="a1" name="nom"
                                placeholder="Entrez le nom du role" autofocus>
                        </div>

                    </div>
                    <div class="col-lg-6 col-sm-6 col-6">
                        <div class="mb-3">
                            <label class="form-label mb-3" for="a7">Etat<span
                                    class="text-danger">*</span></label>
                            <select class="form-select" id="a7" name="type">
                                <option value="" selected disabled>Choisir</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                    @foreach ($droits as $droit)
                        <div class="form-check col-md-4">
                            <input class="form-check-input" type="checkbox" id="id{{ $droit->id }}"
                                name="role_droits[]" value="{{ $droit->id }}">
                            <label class="form-check-label"
                                for="id{{ $droit->id }}">{{ $droit->nom }}</label>
                        </div>
                    @endforeach
                    </div>

                </div>
            </div>
                </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex gap-2 justify-content-end">
                        <button type="submit" class="btn btn-primary">
                            Ajouter
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    </div>
    


