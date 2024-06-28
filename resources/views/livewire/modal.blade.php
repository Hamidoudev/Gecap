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
                       
                        <tbody>
                            {{-- @php
                                $heurepremiercycle = ['7h:45-10h:00', '10h:00-12h:00', '15h:00-16h:00', '16h:00-17h:00', '15h:00-17h:00'];
                                $heuresecondcycle = ['7h:45-8h:45', '8h:45-9h:45', '10h:00-12h:00', '15h:00-16h:00', '16h:00-17h:00', '15h:00-17h:00'];
                                $heures = $selectedCycle == 1 ? $heurepremiercycle : $heuresecondcycle;
                            @endphp --}}
                          
                                <tr>
                                    <td>
                                        <label for="">Heure-Début</label>
                                         <input type="time" name="heure_debut"> 
                                    </td>
                                    <td> 
                                        <label for="">Heure-Fin</label>
                                        <input type="time" name="heure_fin"> 
                                    </td>
                                    <td> <label for="jour">Jour</label>
                                        <select name="jour" id="jour" class="form-control">
                                            <option value="lundi">Lundi</option>
                                            <option value="mardi">Mardi</option>
                                            <option value="mercredi">Mercredi</option>
                                            <option value="jeudi">Jeudi</option>
                                            <option value="vendredi">Vendredi</option>
                                            <option value="samedi">Samedi</option>
                                        </select></td>
                                        <td>
                                            <select wire:model="matiere_id" wire:change="chargeEnseignant($event.target.value)" class="form-control">
                                                <option value="">Matières</option>
                                                @foreach($matieres as $matiere)
                                                    <option value="{{ $matiere->id }}">
                                                        {{ $matiere->libelle }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            
                                            @if ($selectedCycle == 2)
                                                <select wire:model="enseignant_id" class="form-control">
                                                    <option value="">Enseignants</option>
                                                    @foreach($enseignants as $enseignant)
                                                        <option value="{{ $enseignant->id }}">
                                                            {{ $enseignant->nom }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </td>
                                   
                                </tr>
                            
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