@extends('layouts.interfaceequipement')
@section('content')
<div class="page-header">
    <div class="page-title">
        <h4>Listes d'Equipement</h4>
    </div>
    <div class="page-btn">
        <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#ajoutEnseignantModal">
            <img src="{{ URL::to('admin-template/assets/img/icons/plus.svg') }}" alt="img" class="me-2">Ajouter Equipement
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
                            <select id="filter_libelle" class="form-control">
                                <option value="">Sélectionner un libellé</option>
                                @foreach($equipements->unique('libelle') as $equipement)
                                    <option value="{{ $equipement->libelle }}">{{ $equipement->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="form-group">
                            <select id="filter_quantite" class="form-control">
                                <option value="">Sélectionner une quantité</option>
                                @foreach($equipements->unique('quantite') as $equipement)
                                    <option value="{{ $equipement->quantite }}">{{ $equipement->quantite }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                        <div class="form-group">
                            <a class="btn btn-filters ms-auto">
                                <img src="{{ URL::to('admin-template/assets/img/icons/search-whites.svg') }}" alt="img">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table datanew" id="equipements_table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Libelle</th>
                        <th>Date</th>
                        <th>Quantité</th>
                        <th>Sortie</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="equipements_body">
                    @foreach ($equipements as $equipement)
                        <tr data-libelle="{{ $equipement->libelle }}" data-quantite="{{ $equipement->quantite }}">
                            <td>{{ $equipement->id }}</td>
                            <td>{{ $equipement->libelle }}</td>
                            <td>{{ $equipement->date_entre }}</td>
                            <td>{{ $equipement->quantite }}</td>
                            <td>
                                <a class="me-3" href="{{ url('equipement/'. $equipement->libelle.'/sortie') }}">
                                    <img src="{{ URL::to('admin-template/assets/img/icons/eye1.svg') }}" alt="img">
                                </a>
                            </td>
                            <td>
                                <a class="me-3" data-bs-toggle="modal" data-bs-target="#editModal{{ $equipement->id }}">
                                    <img src="{{ URL::to('admin-template/assets/img/icons/edit.svg') }}" alt="img">
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
                    <h5 class="modal-title" id="editModalLabel{{ $equipement->id }}">Modification équipement : {{ $equipement->libelle }}</h5>
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
        const filterLibelle = document.getElementById('filter_libelle');
        const filterQuantite = document.getElementById('filter_quantite');
        const equipementsTableBody = document.getElementById('equipements_body');

        function filterEquipements() {
            const selectedLibelle = filterLibelle.value.toLowerCase();
            const selectedQuantite = filterQuantite.value;
            const rows = equipementsTableBody.getElementsByTagName('tr');

            for (const row of rows) {
                const libelle = row.getAttribute('data-libelle').toLowerCase();
                const quantite = row.getAttribute('data-quantite');

                if ((selectedLibelle === '' || libelle.includes(selectedLibelle)) &&
                    (selectedQuantite === '' || quantite === selectedQuantite)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        }

        filterLibelle.addEventListener('change', filterEquipements);
        filterQuantite.addEventListener('change', filterEquipements);
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

