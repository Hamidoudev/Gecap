
<!-- Modal -->

<div class="modal fade" id="ajoutgrilleModal" tabindex="-1" aria-labelledby="ajoutgrilleModalLabel" aria-hidden="true">
    <div  class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajoutgrilleModalLabel">Ajouter une grille</h5>
                @if ($message = Session::get('success'))
                <h3> {{ $message }} </h3>
            @endif

           
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('grilles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                        @error('nom')

                        <div class="alert alert-danger">
                    
                            <p>Le champ "Nom" est obligatoire!!!</p>
                    
                        </div>
                    
                    @enderror
                    
                    
                    @error('prenom')
                    
                        <div class="alert alert-danger">
                    
                            <p>Le champ "Prénom" est obligatoire!!!</p>
                    
                        </div>
                    
                    @enderror
                        <div class="card">
                            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Nom <span class="text-danger">*</span></label>
                            <input type="text" name="nom">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Prénom <span class="text-danger">*</span></label>
                            <input type="text" name="prenom">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="statut">Statut <span class="text-danger">*</span></label>
                            <select name="statut" id="statut" class="form-control">
                                <option value="active">Active</option>
                                <option value="non-active">Non-active</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>École <span class="text-danger">*</span></label>
                            <div class="input-with-dropdown">
                                <select id="ecoles_list" wire:model="selectedEcole" name="ecole_id">
                                    <option value="">Sélectionner une école</option>
                                    @foreach($ecoles as $ecole)
                                        <option value="{{ $ecole->id }}">{{ $ecole->nom }}</option>
                                    @endforeach
                                </select>
                            </div>  
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Classe tenue <span class="text-danger">*</span></label>
                            <input type="text" name="classe_tenue">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Discipline <span class="text-danger">*</span></label>
                            <input type="text" name="discipline">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Thème <span class="text-danger">*</span></label>
                            <input type="text" name="theme">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Durée <span class="text-danger">*</span></label>
                            <input type="text" name="duree">
                        </div>
                    </div>
                  
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Effectif <span class="text-danger">*</span></label>
                            <input type="number" name="effectif">
                        </div>
                        <div class="form-group">
                            <label>Fille <span class="text-danger">*</span></label>
                            <input type="number" name="F">
                        </div> 
                        <div class="form-group">
                            <label>Garçon <span class="text-danger">*</span></label>
                            <input type="number" name="G">
                        </div>
                    </div>
                </div>
            
                <table>
                    <thead>
                        <tr>
                            <th>ITEM <span class="text-danger">*</span></th>
                            <th>Note <span class="text-danger">*</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>La fiche de préparation existe-t-elle ? Est-elle exploitable ? </td>
                            <td><input type="number" name="fiche_preparation" min="0" max="10"></td>
                        </tr>
                        <tr>
                            <td>Le matériel didactique existe-t-il ? Est-il suffisant ?</td>
                            <td><input type="number" name="materiel_didactique" min="0" max="10"></td>
                        </tr>
                        <tr>
                            <td>Le matériel didactique a-t-il été bien utilisé ?</td>
                            <td><input type="number" name="utilisation_materiel" min="0" max="10"></td>
                        </tr>
                        <tr>
                            <td>Les OPO (ou compétences) ont-ils été annoncés ? Ont-ils été atteints ?</td>
                            <td><input type="number" name="opo_annonces" min="0" max="10"></td>
                        </tr>
                        <tr>
                            <td>La méthodologie utilisée est-elle pertinente ?</td>
                            <td><input type="number" name="methode_pertinente" min="0" max="10"></td>
                        </tr>
                        <tr>
                            <td>Les élèves ont-ils été mis en activité ?</td>
                            <td><input type="number" name="eleves_activite" min="0" max="10"></td>
                        </tr>
                        <tr>
                            <td>Le contenu de la leçon est-il conforme au programme officiel ?</td>
                            <td><input type="number" name="contenu_conforme" min="0" max="10"></td>
                        </tr>
                        <tr>
                            <td>Le contenu de la leçon est-il bien maîtrisé par l'enseignant ?</td>
                            <td><input type="number" name="contenu_maitrise" min="0" max="10"></td>
                        </tr>
                        <tr>
                            <td>Les techniques d'animation ont-elles été bien appliquées ?</td>
                            <td><input type="number" name="techniques_animation" min="0" max="10"></td>
                        </tr>
                        <tr>
                            <td>Les exercices d'évaluation ont-ils été effectués ?</td>
                            <td><input type="number" name="exercices_evaluation" min="0" max="10"></td>
                        </tr>
                    </tbody>
                </table>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Total des Points</label>
                        <input type="text" id="totalPoints" readonly>
                    </div>
                </div>
                
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>1. Conseiller <span class="text-danger">*</span></label>
                        <input type="text" name="conseille1">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>2. Conseiller <span class="text-danger">*</span></label>
                        <input type="text" name="conseille2">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>3. Conseiller <span class="text-danger">*</span></label>
                        <input type="text" name="conseille3">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>4. Conseiller <span class="text-danger">*</span></label>
                        <input type="text" name="conseille4">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>5. Conseiller <span class="text-danger">*</span></label>
                        <input type="text" name="conseille5">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Date <span class="text-danger">*</span></label>
                        <input type="date" name="date">
                    </div>
                </div>
                </div>
            </div>
            <div class="modal-footer justify-content">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
                </div>
                </div>
               
            </form>
        </div>
    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const fields = [
                'fiche_preparation',
                'materiel_didactique',
                'utilisation_materiel',
                'opo_annonces',
                'methode_pertinente',
                'eleves_activite',
                'contenu_conforme',
                'contenu_maitrise',
                'techniques_animation',
                'exercices_evaluation'
            ];
        
            function calculateTotal() {
                let total = 0;
                fields.forEach(field => {
                    const value = document.querySelector(`input[name="${field}"]`).value;
                    total += parseFloat(value) || 0;  // Use parseFloat to handle decimals and default to 0 if empty
                });
                document.getElementById('totalPoints').value = total;
            }
        
            fields.forEach(field => {
                document.querySelector(`input[name="${field}"]`).addEventListener('input', calculateTotal);
            });
        
            // Initial calculation if there are pre-filled values
            calculateTotal();
        });
        </script>
