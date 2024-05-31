<form action="{{ route('eleves.update', $eleve->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>École</label>
                        <div class="input-with-dropdown">
                            <select id="ecoles_list" name="ecole_id" class="form-control">
                                @foreach($ecoles as $ecole)
                                    <option value="{{ $ecole->id }}" {{ $eleve->ecole_id == $ecole->id ? 'selected' : '' }}>
                                        {{ $ecole->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>  
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Matricule</label>
                        <input type="text" name="matricule" value="{{ $eleve->matricule }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Nom </label>
                        <input type="text" name="nom" value="{{ $eleve->nom }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Prénom</label>
                        <input type="text" name="prenom" value="{{ $eleve->prenom }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Date Naissance</label>
                        <input type="date" name="date_n" value="{{ $eleve->date_n }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Adresse</label>
                        <input type="text" name="adresse" value="{{ $eleve->adresse }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <select name="genre" id="genre" class="form-control">
                            <option value="F" {{ $eleve->genre == 'F' ? 'selected' : '' }}>Femme</option>
                            <option value="H" {{ $eleve->genre == 'H' ? 'selected' : '' }}>Homme</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Acte_Naissance</label>
                        <div class="image-upload">
                            <input type="file" name="acte_n">
                            <div class="image-uploads">
                                <img src="{{ URL::to('admin-template/assets/img/icons/upload.svg') }}" alt="img">
                                <h4>Ajoutez ici votre Acte_Naissance</h4>
                            </div>
                        </div>
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
