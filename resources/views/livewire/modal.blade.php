<div wire:ignore.self class="modal fade" id="ajoutEleveModal" tabindex="-1" aria-labelledby="ajoutEleveModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajoutEleveModalLabel">Ajouter un Emplois</h5>
                @if ($message = Session::get('success'))
                    <h3> {{ $message }} </h3>
                @endif
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <!-- Recherche ou autre contenu -->
                        </div>
                    </div>
            
                    <div class="card" id="">
                        <div class="card-body pb-0">
                            <form wire:submit.prevent="saveEmploisEdit">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="classe_id">Classe:</label>
                                        <div class="form-control">{{ $selectedClasseLibelle }}</div>
                                    </div>
            
                                    <div class="form-group">
                                        <label for="cycle_id">Cycle:</label>
                                        <div class="form-control">{{ $selectedCycleLibelle }}</div>
                                    </div>
            
                                    @if ($showInput == 1)
                                        <div class="form-group">
                                            <label for="enseignant_id">Enseignant:</label>
                                            <div class="form-control">{{ $selectedEnseignantNom }}</div>
                                        </div>
                                    @endif
            
                                    <table class="table">
                                        <tbody>
                                            @foreach ($fields as $keyField => $field)
                                                <tr>
                                                    <td>
                                                        <label for="">Heure-Début</label>
                                                        <div class="form-control">{{ $heure_debut[$keyField] }}</div>
                                                    </td>
                                                    <td>
                                                        <label for="">Heure-Fin</label>
                                                        <div class="form-control">{{ $heure_fin[$keyField] }}</div>
                                                    </td>
                                                    <td>
                                                        <label for="jour">Jour</label>
                                                        <div class="form-control">{{ ucfirst($jour[$keyField]) }}</div>
                                                    </td>
                                                    <td>
                                                        <label for="matiere_id">Matière</label>
                                                        <div class="form-control">{{ $matiereLibelle[$keyField] }}</div>
                                                    </td>
                                                    @if ($selectedCycle == 2)
                                                        <td>
                                                            <label for="enseignant_id">Enseignant</label>
                                                            <div class="form-control">{{ $enseignantNom[$keyField] }}</div>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Retour</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>