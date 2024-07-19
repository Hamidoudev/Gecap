@extends('layouts.interfaceequipement')
@section('content')
<div class="page-header">
    <div class="page-title">
        <h4>Listes des Sorties</h4>
    </div>
  
</div>
<div class="card">
    <div class="card-body">
        <div class="table-top">
            <div class="search-set">
                <div class="search-path">
                    <a class="btn btn-filter" id="filter_search">
                        <img src="{{ URL::to('admin-template/assets/img/icons/filter.svg') }}" alt="img">
                        <span><img src="{{ URL::to('admin-template/assets/img/icons/closes.svg') }}" alt="img"></span>
                    </a>
                </div>
                <div class="search-input">
                    <a class="btn btn-searchset">
                        <img src="{{ URL::to('admin-template/assets/img/icons/search-white.svg') }}" alt="img">
                    </a>
                </div>
            </div>
            {{-- <div class="wordset">
                <ul>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="{{ URL::to('admin-template/assets/img/icons/pdf.svg') }}" alt="img"></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="{{ URL::to('admin-template/assets/img/icons/excel.svg') }}" alt="img"></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="{{ URL::to('admin-template/assets/img/icons/printer.svg') }}" alt="img"></a>
                    </li>
                </ul>
            </div> --}}
        </div>

        <div class="card" id="filter_inputs">
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="form-group">
                            <select id="filter_ecole" class="form-control">
                                <option value="">Sélectionner une école</option>
                                @foreach($sortieequipements->unique('ecole.nom') as $sortieequipement)
                                    <option value="{{ $sortieequipement->ecole->nom }}">{{ $sortieequipement->ecole->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="form-group">
                            <select id="filter_libelle" class="form-control">
                                <option value="">Sélectionner un libellé</option>
                                @foreach($sortieequipements->unique('equipement.libelle') as $sortieequipement)
                                    <option value="{{ $sortieequipement->equipement->libelle }}">{{ $sortieequipement->equipement->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="form-group">
                            <select id="filter_quantite" class="form-control">
                                <option value="">Sélectionner une quantité</option>
                                @foreach($sortieequipements->unique('quantite') as $sortieequipement)
                                    <option value="{{ $sortieequipement->quantite }}">{{ $sortieequipement->quantite }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                        <div class="form-group">
                            <a class="btn btn-filters ms-auto" id="filter_button">
                                <img src="{{ URL::to('admin-template/assets/img/icons/search-whites.svg') }}" alt="img">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table datanew" id="sortieequipements_table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Ecole</th>
                        <th>Libelle</th>
                        <th>Date Sortie</th>
                        <th>Quantité</th>
                        <th>Bon de Sortie</th>
                    </tr>
                </thead>
                <tbody id="sortieequipements_body">
                    @foreach ($sortieequipements as $sortieequipement)
                        <tr data-ecole="{{ $sortieequipement->ecole->nom }}" data-libelle="{{ $sortieequipement->equipement->libelle }}" data-quantite="{{ $sortieequipement->quantite }}">
                            <td>{{ $sortieequipement->id }}</td>
                            <td>{{ $sortieequipement->ecole->nom }}</td>
                            <td>{{ $sortieequipement->equipement->libelle }}</td>
                            <td>{{ $sortieequipement->date_sortie }}</td>
                            <td>{{ $sortieequipement->quantite }}</td>
                            <td>
                                <a class="me-3" href="{{route('equipementsorties.pdf', encrypt("$sortieequipement->id"))}}">
                                    <img src="{{ URL::to('admin-template/assets/img/icons/purchase1.svg') }}" alt="img">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</div>
@include('equipements.ajout')

@foreach($equipements as $equipement)
    <div class="modal fade" id="editModal{{ $equipement->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $equipement->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $equipement->id }}">Modification équipement : {{ $equipement->nom }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('equipements.edit', ['equipement' => $equipement])
                </div>
            </div>
        </div>
    </div>
@endforeach

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmModalLabel">Confirmation de suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Voulez-vous vraiment supprimer cet équipement ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <a href="#" id="confirmDeleteButton" class="btn btn-danger">Supprimer</a>
            </div>
        </div>
    </div>
</div>

<script>
        document.addEventListener('DOMContentLoaded', function () {
        const filterEcole = document.getElementById('filter_ecole');
        const filterLibelle = document.getElementById('filter_libelle');
        const filterQuantite = document.getElementById('filter_quantite');
        const filterButton = document.getElementById('filter_button');
        const sortieequipementsTableBody = document.getElementById('sortieequipements_body');

        function filterSortieequipements() {
            const selectedEcole = filterEcole.value.toLowerCase();
            const selectedLibelle = filterLibelle.value.toLowerCase();
            const selectedQuantite = filterQuantite.value;
            const rows = sortieequipementsTableBody.getElementsByTagName('tr');

            for (const row of rows) {
                const ecole = row.getAttribute('data-ecole').toLowerCase();
                const libelle = row.getAttribute('data-libelle').toLowerCase();
                const quantite = row.getAttribute('data-quantite');

                if ((selectedEcole === '' || ecole.includes(selectedEcole)) &&
                    (selectedLibelle === '' || libelle.includes(selectedLibelle)) &&
                    (selectedQuantite === '' || quantite === selectedQuantite)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        }

        filterButton.addEventListener('click', filterSortieequipements);
    });


    document.addEventListener('DOMContentLoaded', function () {
        var deleteConfirmModal = document.getElementById('deleteConfirmModal');
        var confirmDeleteButton = document.getElementById('confirmDeleteButton');

        deleteConfirmModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var url = button.getAttribute('data-url');
            confirmDeleteButton.setAttribute('href', url);
        });
    });
</script>
@endsection

