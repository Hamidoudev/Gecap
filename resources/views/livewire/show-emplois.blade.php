<div>
    <!-- Modal -->
    <div class="modal fade @if($showModal) show @endif" style="display: @if($showModal) block @else none @endif;" tabindex="-1" role="dialog" aria-labelledby="showEmploisModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showEmploisModalLabel">Détails de l'Emploi du Temps</h5>
                    <button type="button" class="close" aria-label="Close" wire:click="closeShowEmploisModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
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
                            @foreach ($heure_debut as $keyField => $value)
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
                    <button type="button" class="btn btn-primary" wire:click="closeShowEmploisModal">Retour</button>
                    <button type="button" class="btn btn-Secondary" wire:click="closeShowEmploisModal"> <i class="fas fa-download"></i></button>

                </div>
            </div>
        </div>
    </div>
</div>

