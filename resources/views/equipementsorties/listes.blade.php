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
                            <input type="text" placeholder="Enter Nom d'Equipement">
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="form-group">
                            <input type="text" placeholder="Enter Type">
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="form-group">
                            <input type="text" placeholder="Enter Quantité">
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="form-group">
                            <select class="select">
                                <option>Disable</option>
                                <option>Enable</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                        <div class="form-group">
                            <a class="btn btn-filters ms-auto"><img src="{{ URL::to('admin-template/assets/img/icons/search-whites.svg') }}" alt="img"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table datanew">
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
                <tbody>
                    @foreach ($sortieequipements as $sortieequipement)
                        <tr>
                            <td>{{ $sortieequipement->id }}</td>
                            <td>{{ $sortieequipement->ecole->nom }}</td>
                            <td>{{ $sortieequipement->equipement->libelle }}</td>
                            <td>{{ $sortieequipement->date_sortie }}</td>
                            <td>{{ $sortieequipement->quantite }}</td>
                            <td> <a class="me-3" href="{{route('equipementsorties.pdf', encrypt("$sortieequipement->id"))}}">
                                <img src="{{ URL::to('admin-template/assets/img/icons/purchase1.svg') }}" alt="img">
                            </a></td>
                            {{-- <td>
                                <div class="status-toggle d-flex justify-content-between align-items-center">
                                    <input type="checkbox" id="equipement{{ $equipement->id }}" class="check">
                                    <label for="equipement{{ $equipement->id }}" class="checktoggle">checkbox</label>
                                </div>
                            </td> --}}
                            {{-- <td>
                                <a class="me-3" data-bs-toggle="modal" data-bs-target="#editModal{{ $equipement->id }}">
                                    <img src="{{ URL::to('admin-template/assets/img/icons/edit.svg') }}" alt="img">
                                </a>
                                {{-- <a class="me-3 confirm-text" href="#" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal" data-url="{{ route('equipements.delete', $equipement->id) }}">
                                    <img src="{{ URL::to('admin-template/assets/img/icons/delete.svg') }}" alt="img">
                                </a>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('equipements.ajout')
@endsection

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
        var deleteConfirmModal = document.getElementById('deleteConfirmModal');
        var confirmDeleteButton = document.getElementById('confirmDeleteButton');

        deleteConfirmModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var url = button.getAttribute('data-url');
            confirmDeleteButton.setAttribute('href', url);
        });
    });
</script>
