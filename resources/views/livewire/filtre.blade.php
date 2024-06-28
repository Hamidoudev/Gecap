<div>

    <div class="page-header">
        <div class="page-title">
            <h4>Emplois Du Temps</h4>
            {{-- <h6>Manage your User</h6> --}}
        </div>
        @if ($afficherliste)
            <div class="page-btn">
                <a href="#" class="btn btn-added" wire:click="active">
                    <img src="{{ URL::to('admin-template/assets/img/icons/plus.svg') }}" alt="img" class="me-2">
                    Emplois du temps
                </a>
            </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-top">
                <div class="search-set">
                    <div class="search-path">
                        <a class="btn btn-filter" id="filter_search">
                            <img src="{{ URL::to('admin-template/assets/img/icons/filter.svg') }}" alt="img">
                            <span><img src="{{ URL::to('admin-template/assets/img/icons/closes.svg') }}"
                                    alt="img"></span>
                        </a>
                    </div>
                    <div class="search-input">
                        <a class="btn btn-searchset">
                            <img src="{{ URL::to('admin-template/assets/img/icons/search-white.svg') }}" alt="img">
                        </a>
                    </div>
                </div>

            </div>

            <div class="card" id="filter_inputs">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-lg-2 col-sm-6 col-12">
                            <div class="form-group">
                                <select id="ecoles_list" wire:model="selectedCycle" wire:change="selectChanged()">
                                    <option value="">Sélectionner un cycle</option>
                                    @forelse($cycles as $item)
                                        <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                                    @empty
                                        <option value="">Pas de données !!</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-12">
                            <div class="form-group">
                                <select id="ecoles_list" wire:model="selectedClasse" wire:change="selectChanged()">
                                    <option value="">Sélectionner une classe</option>
                                    @forelse($classes as $item)
                                        <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                                    @empty
                                        <option value="">Pas de données !!</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-12">
                            <div class="form-group">
                                <select id="ecoles_list" wire:model="selectedEcole" wire:change="selectChanged()">
                                    <option value="">Sélectionner une ecole</option>
                                    @forelse($ecoles as $item)
                                        <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                    @empty
                                        <option value="">Pas de données !!</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                            <div class="form-group">
                                <a class="btn btn-filters ms-auto"><img
                                        src="{{ URL::to('admin-template/assets/img/icons/search-whites.svg') }}"
                                        alt="img"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table  datanew">
                    <thead>
                        <tr>

                            <th>#</th>
                            <th>Ecole</th>
                            <th>Classe</th>
                            <th> Matière </th>
                            <th> Emplois </th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($emplois as $emploi)
                            <tr>

                                <td>{{ $emploi->id }}</td>
                                <td>
                                    @foreach ($ecoles as $ecole)
                                        @if ($ecole->id == $emploi->ecole_id)
                                            {{ $ecole->nom }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>

                                    @foreach ($classes as $classe)
                                        @if ($classe->id == $emploi->classe_id)
                                            {{ $classe->libelle }}
                                        @endif
                                    @endforeach
                                </td>

                                <td>
                                    @foreach ($matieres as $matiere)
                                        @if ($matiere->id == $emploi->matiere_id)
                                            {{ $matiere->libelle }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <a class="me-3" data-bs-toggle="modal"
                                        data-bs-target="#vueModal{{ $emploi->id }}">
                                        <img src="{{ URL::to('admin-template/assets/img/icons/eye.svg') }}"
                                            alt="img">
                                    </a>
                                </td>


                                <tdclass="__cf_email__" data-cfemail="42362a2d2f233102273a232f322e276c212d2f"></td>

                                <td>
                                    <a class="me-3" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $emploi->id }}">
                                        <img src="{{ URL::to('admin-template/assets/img/icons/edit.svg') }}"
                                            alt="img">
                                    </a>
                                    <a class="me-3 confirm-text"
                                        href="{{ route('emplois.delete', $emploi->id) }}"onclick="return confirm('voulez-vous vraiment supprimer'. $emploi->ue_id .'?')">
                                        <img src="{{ URL::to('admin-template/assets/img/icons/delete.svg') }}"
                                            alt="img">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    @endif
    @if ($afficherform)
        <div class="page-btn">
            <a href="#" class="btn btn-added" wire:click="retour">
                <img src="{{ URL::to('admin-template/assets/img/icons/plus.svg') }}" alt="img" class="me-2">
                Retour sur la liste
            </a>
        </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="table-top">
            <div class="search-set">
                <div class="search-path">
                    <a class="btn btn-filter" id="filter_search">
                        <img src="{{ URL::to('admin-template/assets/img/icons/filter.svg') }}" alt="img">
                        <span><img src="{{ URL::to('admin-template/assets/img/icons/closes.svg') }}"
                                alt="img"></span>
                    </a>
                </div>
                <div class="search-input">
                    <a class="btn btn-searchset">
                        <img src="{{ URL::to('admin-template/assets/img/icons/search-white.svg') }}" alt="img">
                    </a>
                </div>
            </div>

        </div>

        <div class="card" id="">
            <div class="card-body pb-0">
                <form wire:submit.prevent="saveEmplois">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="classe_id">Classe:</label>
                            <select name="classe_id" class="form-control" required wire:model="selectedClasse">
                                <option value="">Sélectionner une classe</option>
                                @foreach ($classes as $classe)
                                    <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ecole_id">Ecole:</label>
                            <select name="ecole_id" class="form-control" required wire:model="selectedEcole">
                                <option value="">Sélectionner une ecole</option>
                                @foreach ($ecoles as $ecole)
                                    <option value="{{ $ecole->id }}">{{ $ecole->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cycle_id">Cycle:</label>
                            <select class="form-control" wire:change='changeCycle' required
                                wire:model="selectedCycle">
                                <option value="">Sélectionner un cycle</option>
                                @foreach ($cycles as $cycle)
                                    <option value="{{ $cycle->id }}">{{ $cycle->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($showInput == 1)

                            <div class="form-group">
                                <label for="enseignant_id">Enseignant:</label>
                                <select name="enseignant_id" class="form-control" required wire:ignore.self
                                    wire:model="enseignant_id.{{1}}">
                                    <option value="">Sélectionner un Enseignant</option>
                                    @foreach ($enseignants as $enseignant)
                                        <option value="{{ $enseignant->id }}">{{ $enseignant->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        <table class="table">

                            <tbody>
                                @foreach($schedules as $index => $schedule)
                                    <tr>
                                        <td>
                                            <label for="">Heure-Début</label>
                                            <input type="time" wire:model="schedules.{{ $index }}.heure_debut" name="schedules[{{ $index }}][heure_debut]">
                                            @error('schedules.'.$index.'.heure_debut') <span class="error">{{ $message }}</span> @enderror
                                        </td>
                                        <td>
                                            <label for="">Heure-Fin</label>
                                            <input type="time" wire:model="schedules.{{ $index }}.heure_fin" name="schedules[{{ $index }}][heure_fin]">
                                            @error('schedules.'.$index.'.heure_fin') <span class="error">{{ $message }}</span> @enderror
                                        </td>
                                        <td>
                                            <label for="jour">Jour</label>
                                            <select wire:model="schedules.{{ $index }}.jour" name="schedules[{{ $index }}][jour]" id="jour" class="form-control">
                                                <option value="">Choisir un jour</option>
                                                <option value="lundi">Lundi</option>
                                                <option value="mardi">Mardi</option>
                                                <option value="mercredi">Mercredi</option>
                                                <option value="jeudi">Jeudi</option>
                                                <option value="vendredi">Vendredi</option>
                                                <option value="samedi">Samedi</option>
                                            </select>
                                            @error('schedules.'.$index.'.jour') <span class="error">{{ $message }}</span> @enderror
                                        </td>
                                        <td>
                                            <select wire:model="schedules.{{ $index }}.matiere_id" wire:change="updatedSchedules($event.target.value, 'schedules.{{ $index }}.matiere_id')" class="form-control">
                                                <option value="">Choisir une matière</option>
                                                @foreach ($matieres as $matiere)
                                                    <option value="{{ $matiere->id }}">{{ $matiere->libelle }}</option>
                                                @endforeach
                                            </select>
                                            @error('schedules.'.$index.'.matiere_id') <span class="error">{{ $message }}</span> @enderror
                    
                                            @if ($selectedCycle == 2)
                                                <select wire:model="schedules.{{ $index }}.enseignant_id" class="form-control">
                                                    <option value="">Choisir un enseignant</option>
                                                    @foreach ($enseignants[$index] ?? [] as $enseignant)
                                                        <option value="{{ $enseignant->id }}">{{ $enseignant->nom }}</option>
                                                    @endforeach
                                                </select>
                                                @error('schedules.'.$index.'.enseignant_id') <span class="error">{{ $message }}</span> @enderror
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger" wire:click="removeSchedule({{ $index }})">Supprimer</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <button type="button" class="btn btn-primary" wire:click="addSchedule">Ajouter Champs</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif


{{-- @foreach ($emplois as $emploi)
        <div class="modal fade" id="editModal{{ $emploi->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $emploi->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $emploi->id }}">Modification emplois :   @foreach ($classes as $classe)
                            @if ($classe->id == $emploi->classe_id)
                                {{ $classe->libelle }}
                            @endif
                        @endforeach</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('emplois.edit', ['emploi' => $emploi])
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($emplois as $emploi)
        <div class="modal fade" id="vueModal{{ $emploi->id }}" tabindex="-1" aria-labelledby="vueModalLabel{{ $emploi->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="vueModalLabel{{ $emploi->id }}">Vue de l'emplois :   @foreach ($classes as $classe)
                            @if ($classe->id == $emploi->classe_id)
                                {{ $classe->libelle }}
                            @endif
                        @endforeach</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('emplois.vue', ['emploi' => $emploi])
                    </div>
                </div>
            </div>
        </div>
    @endforeach --}}

</div>
