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
            <form wire:submit.prevent="saveEmplois">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="classe_id">Classe:</label>
                        <select name="classe_id" class="form-control" required wire:model="selectedClasse">
                            <option value="">Sélectionner une classe</option>
                            @foreach($classes as $classe)
                                <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ecole_id">Ecole:</label>
                        <select name="ecole_id" class="form-control" required wire:model="selectedEcole">
                            <option value="">Sélectionner une ecole</option>
                            @foreach($ecoles as $ecole)
                                <option value="{{ $ecole->id }}">{{ $ecole->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cycle_id">Cycle:</label>
                        <select name="cycle_id" class="form-control" wire:change='changeCycle' required wire:model="selectedCycle">
                            <option value="">Sélectionner un cycle</option>
                            @foreach($cycles as $cycle)
                                <option value="{{ $cycle->id }}">{{ $cycle->libelle }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if($showInput == 1)
                        <div class="form-group">
                            <label for="enseignant_id">Enseignant:</label>
                            <select name="enseignant_id" class="form-control" required wire:model="selectedEnseignant">
                                <option value="">Sélectionner un Enseignant</option>
                                @foreach($enseignants as $enseignant)
                                    <option value="{{ $enseignant->id }}">{{ $enseignant->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Heures/Jours</th>
                                <th>Lundi</th>
                                <th>Mardi</th>
                                <th>Mercredi</th>
                                <th>Jeudi</th>
                                <th>Vendredi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(['7h:45-10h:00', '7h:45-8h:45', '8h:45-9h:45', '10h:00-12h:00', '12h:00-13h:00', '13h:00-14h:00', '14h:00-15h:00', '15h:00-16h:00', '16h:00-17h:00', '17h:00-18h:00','15h:00-17h:00'] as $heure)
                                <tr>
                                    <td>{{ $heure }}</td>
                                    @foreach(['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi'] as $jour)
                                        <td>
                                            <select name="emplois[{{ $jour }}][{{ $heure }}][matiere_id]" class="form-control">
                                                <option value="">Sélectionner une matière</option>
                                                @foreach($matieres as $matiere)
                                                    <option value="{{ $matiere->id }}">
                                                        {{ $matiere->libelle }}
                                                        @if($selectedCycle == 2)
                                                            ({{ $enseignants->firstWhere('id', $matiere->enseignant_id)->nom ?? 'Aucun enseignant' }})
                                                        @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>