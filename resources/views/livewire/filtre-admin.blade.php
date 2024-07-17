<div>
    {{-- @if ($showModal)
    @livewire('show-emplois')
    @endif --}}
    <div class="page-header">
        <div class="page-title">
            <h4>Emplois Du Temps</h4>
            {{-- <h6>Manage your User</h6> --}}
        </div>
        @if ($afficherliste)
            {{-- <div class="page-btn">
                <a href="#" class="btn btn-added" wire:click="active">
                    <img src="{{ URL::to('admin-template/assets/img/icons/plus.svg') }}" alt="img" class="me-2">
                    Emplois du temps
                </a>
            </div> --}}
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
                                    
                                    <a class="me-3" href="{{url('emplois/show/'.$emploi->id)}}">
                                        <img src="{{ URL::to('admin-template/assets/img/icons/eye.svg') }}"
                                            alt="img">
                                    </a>
                                   
                                </td>


                                <tdclass="__cf_email__" data-cfemail="42362a2d2f233102273a232f322e276c212d2f"></td>

                                <td>
                                    <a class="me-3" wire:click="ActiveEdit({{ $emploi->id }})">
                                        <img src="{{ URL::to('admin-template/assets/img/icons/edit.svg') }}"
                                            alt="img">
                                    </a>
                                    {{-- <a class="me-3 confirm-text" data-bs-toggle="modal"
                                        data-bs-target="#deleteConfirmModal"
                                        data-url="{{ route('emplois.delete', $emploi->id) }}">
                                        <img src="{{ URL::to('admin-template/assets/img/icons/delete.svg') }}"
                                            alt="img">
                                    </a> --}}
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
                <img src="{{ URL::to('admin-template/assets/img/icons/return1.svg') }}" alt="img" class="me-2">
                Retour sur la liste
            </a>
        </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="table-top">
            <div class="search-set">


            </div>

        </div>

        <div class="card" id="">
            <div class="card-body pb-0">
                <form wire:submit.prevent="saveEmplois">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="classe_id">Classe: <span class="text-danger">*</span></label>
                            <select name="classe_id" class="form-control" required wire:model="selectedClasse">
                                <option value="">Sélectionner une classe</option>
                                @foreach ($classes as $classe)
                                    <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-group">
                            <label for="ecole_id">Ecole:</label>
                            <select name="ecole_id" class="form-control" required wire:model="selectedEcole">
                                <option value="">Sélectionner une ecole</option>
                                @foreach ($ecoles as $ecole)
                                    <option value="{{ $ecole->id }}">{{ $ecole->nom }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label for="cycle_id">Cycle: <span class="text-danger">*</span></label>
                            <select name="cycle_id" class="form-control" wire:change='changeCycle' required
                                wire:model="selectedCycle">
                                <option value="">Sélectionner un cycle</option>
                                @foreach ($cycles as $cycle)
                                    <option value="{{ $cycle->id }}">{{ $cycle->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($showInput == 1)
                            <div class="form-group">
                                <label for="enseignant_id">Enseignant: <span class="text-danger">*</span></label>
                                <select name="enseignant_id" class="form-control" required
                                    wire:model="selectedEnseignant">
                                    <option value="">Sélectionner un Enseignant</option>
                                    @foreach ($ListesEnseignants as $enseignant)
                                        <option value="{{ $enseignant->id }}">{{ $enseignant->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        <table class="table">

                            <tbody>
                                @foreach ($fields as $keyField => $field)
                                    <tr>
                                        <td>
                                            <label for="">Heure-Début <span class="text-danger">*</span></label>
                                            <input type="time" name="heure_debut"
                                                wire:model="heure_debut.{{ $keyField }}" class="form-control">
                                        </td>
                                        <td>
                                            <label for="">Heure-Fin <span class="text-danger">*</span></label>
                                            <input type="time" name="heure_fin"
                                                wire:model="heure_fin.{{ $keyField }}" class="form-control">
                                        </td>
                                        <td> <label for="jour">Jour <span class="text-danger">*</span></label>
                                            <select name="jour" id="jour"
                                                wire:model="jour.{{ $keyField }}" class="form-control">
                                                <option value="">Jour</option>
                                                <option value="lundi">Lundi</option>
                                                <option value="mardi">Mardi</option>
                                                <option value="mercredi">Mercredi</option>
                                                <option value="jeudi">Jeudi</option>
                                                <option value="vendredi">Vendredi</option>
                                                <option value="samedi">Samedi</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select wire:model="matiere_id.{{ $keyField }}"
                                                wire:change="chargeEnseignant($event.target.value,{{ $keyField }})"
                                                class="form-control">
                                                <option value="">Matières</option>
                                                @foreach ($matieres as $matiere)
                                                    <option value="{{ $matiere->id }}">
                                                        {{ $matiere->libelle }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @if ($selectedCycle == 2)
                                                <select wire:model="enseignant_id.{{ $keyField }}"
                                                    class="form-control">
                                                    <option value="">Enseignants</option>
                                                    @foreach ($enseignants[$keyField] ?? [] as $enseignant)
                                                        <option value="{{ $enseignant->id }}">
                                                            {{ $enseignant->nom }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger"><i class="fa fa-minus"
                                                    wire:click="removeField({{ $keyField }})"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <button type="button" class="btn btn-primary" wire:click='addField'><i
                                class="fa fa-plus"></i></button>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
@if ($editMode)
    <div class="page-btn">
        <a href="#" class="btn btn-added" wire:click="RetourEdit">
            <img src="{{ URL::to('admin-template/assets/img/icons/return1.svg') }}" alt="img" class="me-2">
            Retour sur la liste
        </a>
    </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-top">
                <div class="search-set">


                </div>

            </div>

            <div class="card" id="">
                <div class="card-body pb-0">
                    <form wire:submit.prevent="saveEmploisEdit">
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
                                <label for="cycle_id">Cycle:</label>
                                <select name="cycle_id" class="form-control" wire:change='changeCycle' required
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
                                    <select name="enseignant_id" class="form-control" required
                                        wire:model="selectedEnseignant">
                                        <option value="">Sélectionner un Enseignant</option>
                                        @foreach ($ListesEnseignants as $enseignant)
                                            <option value="{{ $enseignant->id }}">{{ $enseignant->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            <table class="table">

                                <tbody>
                                    @foreach ($fields as $keyField => $field)
                                        <tr>
                                            <td>
                                                <label for="">Heure-Début</label>
                                                <input type="time" name="heure_debut"
                                                    wire:model="heure_debut.{{ $keyField }}"
                                                    class="form-control">
                                            </td>
                                            <td>
                                                <label for="">Heure-Fin</label>
                                                <input type="time" name="heure_fin"
                                                    wire:model="heure_fin.{{ $keyField }}" class="form-control">
                                            </td>
                                            <td>
                                                <label for="jour">Jour</label>
                                                <select name="jour" id="jour"
                                                    wire:model="jour.{{ $keyField }}" class="form-control">
                                                    <option value="">Jour</option>
                                                    <option value="lundi">Lundi</option>
                                                    <option value="mardi">Mardi</option>
                                                    <option value="mercredi">Mercredi</option>
                                                    <option value="jeudi">Jeudi</option>
                                                    <option value="vendredi">Vendredi</option>
                                                    <option value="samedi">Samedi</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select wire:model="matiere_id.{{ $keyField }}"
                                                    wire:change="chargeEnseignant($event.target.value,{{ $keyField }})"
                                                    class="form-control">
                                                    <option value="">Matières</option>
                                                    @foreach ($matieres as $matiere)
                                                        <option value="{{ $matiere->id }}">{{ $matiere->libelle }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                @if ($selectedCycle == 2)
                                                    <select wire:model="enseignant_id.{{ $keyField }}"
                                                        class="form-control">
                                                        <option value="">Enseignants</option>
                                                        @foreach ($enseignants[$keyField] ?? [] as $enseignant)
                                                            <option value="{{ $enseignant->id }}" {{$enseignant_id[$keyField] == $enseignant->id ? "selected" : ""}}>
                                                                {{ $enseignant->nom }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger"><i class="fa fa-minus"
                                                        wire:click="removeField({{ $keyField }})"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <button type="button" class="btn btn-primary" wire:click='addField'><i
                                    class="fa fa-plus"></i></button>
                        </div>
                        <div class="modal-footer">
                            <button type="submit"  class="btn btn-primary">Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

@if ($showMode)
<div class="page-btn">
    <a href="#" class="btn btn-added" wire:click="RetourEdit">
        <img src="{{ URL::to('admin-template/assets/img/icons/return1.svg') }}" alt="img" class="me-2">
        Retour sur la liste
    </a>
</div>
<div class="card">
    <div class="card-body">
        <div class="table-top">
            <div class="search-set">
            </div>
        </div>
        <div class="card" id="">
            <div class="card-body pb-0">
                <form wire:submit.prevent="saveEmploisEdit">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="classe_id">Classe:</label>
                            <p>{{ $classes->firstWhere('id', $selectedClasse)->libelle }}</p>
                        </div>
                       
                        <div class="form-group">
                            <label for="cycle_id">Cycle:</label>
                            <p>{{ $cycles->firstWhere('id', $selectedCycle)->libelle }}</p>
                        </div>
                        @if ($showInput == 1)
                            <div class="form-group">
                                <label for="enseignant_id">Enseignant:</label>
                                <p>{{ $ListesEnseignants->firstWhere('id', $selectedEnseignant)->nom }}</p>
                            </div>
                        @endif

                        <table class="table">
                            <tbody>
                                @foreach ($fields as $keyField => $field)
                                    <tr>
                                        <td>
                                            <label for="">Heure-Début</label>
                                            <p>{{ $heure_debut[$keyField] }}</p>
                                        </td>
                                        <td>
                                            <label for="">Heure-Fin</label>
                                            <p>{{ $heure_fin[$keyField] }}</p>
                                        </td>
                                        <td>
                                            <label for="jour">Jour</label>
                                            <p>{{ ucfirst($jour[$keyField]) }}</p>
                                        </td>
                                        <td>
                                            <label for="matiere_id">Matière</label>
                                            <p>{{ $matieres->firstWhere('id', $matiere_id[$keyField])->libelle }}</p>
                                            @if ($selectedCycle == 2)
                                                <label for="enseignant_id">Enseignant</label>
                                                <p>{{ $enseignants[$keyField]->firstWhere('id', $enseignant_id[$keyField])->nom }}</p>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger"><i class="fa fa-minus" wire:click="removeField({{ $keyField }})"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary" wire:click='addField'><i class="fa fa-plus"></i></button>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endif



<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmModalLabel">Confirmation de suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Voulez-vous vraiment supprimer cet Emplois ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <a href="#" id="confirmDeleteButton" class="btn btn-danger">Supprimer</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var deleteConfirmModal = document.getElementById('deleteConfirmModal');
        var confirmDeleteButton = document.getElementById('confirmDeleteButton');

        deleteConfirmModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var url = button.getAttribute('data-url');
            confirmDeleteButton.setAttribute('href', url);
        });
    });
</script>

</div>

