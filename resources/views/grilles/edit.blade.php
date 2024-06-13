<form action="{{ route('grilles.update', $grille->id) }}" method="POST">
    @csrf
    @method('POST')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" name="nom" value="{{ $grille->nom }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Prénom</label>
                        <input type="text" name="prenom" value="{{ $grille->prenom }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="statut">Statut</label>
            <select name="statut" id="statut" class="form-control">
                <option value="active" {{ $grille->statut == 'active' ? 'selected' : '' }}>Active</option>
                <option value="non-active" {{ $grille->statut == 'non-active' ? 'selected' : '' }}>Non-active</option>
            </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>École</label>
                        <div class="input-with-dropdown">
                            <select id="ecoles_list" name="ecole_id" class="form-control">
                                {{-- <option value="">Sélectionner une école</option> --}}
                                @foreach($ecoles as $ecole)
                                    <option value="{{ $ecole->id }}" {{ $grille->ecole_id == $ecole->id ? 'selected' : '' }}>
                                        {{ $ecole->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>  
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Classe tenue</label>
                        <input type="text" name="classe_tenue" value="{{ $grille->classe_tenue }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Discipline</label>
                        <input type="text" name="discipline" value="{{ $grille->discipline }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Thème</label>
                        <input type="text" name="theme" value="{{ $grille->theme }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Durée</label>
                        <input type="text" name="duree" value="{{ $grille->duree }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Effectif</label>
                        <input type="number" name="effectif" value="{{ $grille->effectif }}">
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <input type="number" name="F" value="{{ $grille->F }}">
                    </div>
                    <div class="form-group">
                        <label>Garçon</label>
                        <input type="number" name="G" value="{{ $grille->G }}">
                    </div>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ITEM</th>
                        <th>Note</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>La fiche de préparation existe-t-elle ? Est-elle exploitable ?</td>
                        <td><input type="number" name="fiche_preparation" min="0" max="10" value="{{ $grille->fiche_preparation }}"></td>
                    </tr>
                    <tr>
                        <td>Le matériel didactique existe-t-il ? Est-il suffisant ?</td>
                        <td><input type="number" name="materiel_didactique" min="0" max="10" value="{{ $grille->materiel_didactique }}"></td>
                    </tr>
                    <tr>
                        <td>Le matériel didactique a-t-il été bien utilisé ?</td>
                        <td><input type="number" name="utilisation_materiel" min="0" max="10" value="{{ $grille->utilisation_materiel }}"></td>
                    </tr>
                    <tr>
                        <td>Les OPO (ou compétences) ont-ils été annoncés ? Ont-ils été atteints ?</td>
                        <td><input type="number" name="opo_annonces" min="0" max="10" value="{{ $grille->opo_annonces }}"></td>
                    </tr>
                    <tr>
                        <td>La méthodologie utilisée est-elle pertinente ?</td>
                        <td><input type="number" name="methode_pertinente" min="0" max="10" value="{{ $grille->methode_pertinente }}"></td>
                    </tr>
                    <tr>
                        <td>Les élèves ont-ils été mis en activité ?</td>
                        <td><input type="number" name="eleves_activite" min="0" max="10" value="{{ $grille->eleves_activite }}"></td>
                    </tr>
                    <tr>
                        <td>Le contenu de la leçon est-il conforme au programme officiel ?</td>
                        <td><input type="number" name="contenu_conforme" min="0" max="10" value="{{ $grille->contenu_conforme }}"></td>
                    </tr>
                    <tr>
                        <td>Le contenu de la leçon est-il bien maîtrisé par l'enseignant ?</td>
                        <td><input type="number" name="contenu_maitrise" min="0" max="10" value="{{ $grille->contenu_maitrise }}"></td>
                    </tr>
                    <tr>
                        <td>Les techniques d'animation ont-elles été bien appliquées ?</td>
                        <td><input type="number" name="techniques_animation" min="0" max="10" value="{{ $grille->techniques_animation }}"></td>
                    </tr>
                    <tr>
                        <td>Les exercices d'évaluation ont-ils été effectués ?</td>
                        <td><input type="number" name="exercices_evaluation" min="0" max="10" value="{{ $grille->exercices_evaluation }}"></td>
                    </tr>
                </tbody>
            </table>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                    <label>1. Conseiller</label>
                    <input type="text" name="conseille1" value="{{ $grille->conseille1 }}">
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                    <label>2. Conseiller</label>
                    <input type="text" name="conseille2" value="{{ $grille->conseille2 }}">
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                    <label>3. Conseiller</label>
                    <input type="text" name="conseille3" value="{{ $grille->conseille3 }}">
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                    <label>4. Conseiller</label>
                    <input type="text" name="conseille4" value="{{ $grille->conseille4 }}">
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                    <label>5. Conseiller</label>
                    <input type="text" name="conseille5" value="{{ $grille->conseille5 }}">
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" value="{{ $grille->date }}">
                </div>
            </div>
                <div class="col-lg-12">
                    <button type="reset" data-bs-dismiss="modal" class="btn btn-secondary">Annuler</button>
                    <button type="submit" class="btn btn-primary me-2">Modifier</button>

                </div>
            </div>
        </div>
    </div>
</form>



