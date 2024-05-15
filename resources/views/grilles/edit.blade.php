<form action="{{ route('grilles.update', $grille->id) }}" method="POST">
    @csrf
    @method('POST')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" name="nom" value="{{ $suivi->nom }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Prénom</label>
                        <input type="text" name="prenom" value="{{ $suivi->prenom }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Statut</label>
                        <input type="text" name="statut" value="{{ $suivi->statut }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>École</label>
                        <input type="text" name="ecole" value="{{ $suivi->ecole }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Classe tenue</label>
                        <input type="text" name="classe_tenue" value="{{ $suivi->classe_tenue }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Discipline</label>
                        <input type="text" name="discipline" value="{{ $suivi->discipline }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Thème</label>
                        <input type="text" name="theme" value="{{ $suivi->theme }}">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Durée</label>
                        <input type="text" name="duree" value="{{ $suivi->duree }}">
                    </div>
                </div>
              
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Effectif</label>
                        <input type="number" name="effectif" value="{{ $suivi->effectif }}">
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
                        <td><input type="number" name="fiche_preparation" min="0" max="10" value="{{ $suivi->fiche_preparation }}"></td>
                    </tr>
                    <tr>
                        <td>Le matériel didactique existe-t-il ? Est-il suffisant ?</td>
                        <td><input type="number" name="materiel_didactique" min="0" max="10" value="{{ $suivi->materiel_didactique }}"></td>
                    </tr>
                    <tr>
                        <td>Le matériel didactique a-t-il été bien utilisé ?</td>
                        <td><input type="number" name="utilisation_materiel" min="0" max="10" value="{{ $suivi->utilisation_materiel }}"></td>
                    </tr>
                    <tr>
                        <td>Les OPO (ou compétences) ont-ils été annoncés ? Ont-ils été atteints ?</td>
                        <td><input type="number" name="opo_annonces" min="0" max="10" value="{{ $suivi->opo_annonces }}"></td>
                    </tr>
                    <tr>
                        <td>La méthodologie utilisée est-elle pertinente ?</td>
                        <td><input type="number" name="methode_pertinente" min="0" max="10" value="{{ $suivi->methode_pertinente }}"></td>
                    </tr>
                    <tr>
                        <td>Les élèves ont-ils été mis en activité ?</td>
                        <td><input type="number" name="eleves_activite" min="0" max="10" value="{{ $suivi->eleves_activite }}"></td>
                    </tr>
                    <tr>
                        <td>Le contenu de la leçon est-il conforme au programme officiel ?</td>
                        <td><input type="number" name="contenu_conforme" min="0" max="10" value="{{ $suivi->contenu_conforme }}"></td>
                    </tr>
                    <tr>
                        <td>Le contenu de la leçon est-il bien maîtrisé par l'enseignant ?</td>
                        <td><input type="number" name="contenu_maitrise" min="0" max="10" value="{{ $suivi->contenu_maitrise }}"></td>
                    </tr>
                    <tr>
                        <td>Les techniques d'animation ont-elles été bien appliquées ?</td>
                        <td><input type="number" name="techniques_animation" min="0" max="10" value="{{ $suivi->techniques_animation }}"></td>
                    </tr>
                    <tr>
                        <td>Les exercices d'évaluation ont-ils été effectués ?</td>
                        <td><input type="number" name="exercices_evaluation" min="0" max="10" value="{{ $suivi->exercices_evaluation }}"></td>
                    </tr>
                </tbody>
            </table>
                <div class="col-lg-12">
                    <button type="reset" class="btn btn-cancel">Annuler</button>
                    <button type="submit" class="btn btn-submit me-2">Modifier</button>

                </div>
            </div>
        </div>
    </div>
</form>



