@extends('layouts.interfaceecole')
@section('content')
<div class="page-header">
    <div class="page-title">
        <h4>Listes des écoles</h4>
    </div>
    <div class="page-btn">
        <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#ajoutecoleModal">
            <img src="{{ URL::to('admin-template/assets/img/icons/plus.svg') }}" alt="img" class="me-2">Ajouter école
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
        </div>

        <div class="card" id="filter_inputs">
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="form-group">
                            <input type="text" id="filter_nom" placeholder="Entrez le nom de l'école" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="form-group">
                            <select id="filter_type" class="form-control">
                                <option value="">Sélectionner un type</option>
                                @foreach($typeecoles as $typeecole)
                                    <option value="{{ $typeecole->id }}">{{ $typeecole->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                        <div class="form-group">
                            {{-- <a class="btn btn-filters ms-auto">
                                <img src="{{ URL::to('admin-template/assets/img/icons/search-whites.svg') }}" alt="img">
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table datanew" id="ecoles_table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Type</th>
                        <th>Nom</th>
                        <th>Siège</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="ecoles_body">
                    @foreach ($ecoles as $ecole)
                        <tr data-type-id="{{ $ecole->typeecole_id }}" data-nom="{{ strtolower($ecole->nom) }}">
                            <td>{{ $ecole->id }}</td>
                            <td>
                                @foreach($typeecoles as $typeecole)
                                    @if($typeecole->id == $ecole->typeecole_id)
                                        {{ $typeecole->libelle }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $ecole->nom }}</td>
                            <td>{{ $ecole->siege }}</td>
                            <td>{{ $ecole->email }}</td>
                            <td>
                                <a class="me-3" data-bs-toggle="modal" data-bs-target="#editModal{{ $ecole->id }}">
                                    <img src="{{ URL::to('admin-template/assets/img/icons/edit.svg') }}" alt="img">
                                </a>
                                <a class="me-3 confirm-text" href="#" onclick="showDeleteModal('{{ route('ecoles.delete', $ecole->id) }}', '{{ $ecole->nom }}')">
                                    <img src="{{ URL::to('admin-template/assets/img/icons/delete.svg') }}" alt="img">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</div>

@include('ecoles.ajout')

<script>


    document.addEventListener('DOMContentLoaded', function () {
        const filterNom = document.getElementById('filter_nom');
        const filterType = document.getElementById('filter_type');
        const ecolesTableBody = document.getElementById('ecoles_body');

        function filterEcoles() {
            const selectedNom = filterNom.value.toLowerCase();
            const selectedType = filterType.value;
            const rows = ecolesTableBody.getElementsByTagName('tr');

            for (const row of rows) {
                const typeId = row.getAttribute('data-type-id');
                const nom = row.getAttribute('data-nom');

                if ((selectedNom === '' || nom.includes(selectedNom)) &&
                    (selectedType === '' || typeId === selectedType)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        }

        filterNom.addEventListener('input', filterEcoles);
        filterType.addEventListener('change', filterEcoles);
    });


    function showDeleteModal(deleteUrl, ecoleName) {
        $('#confirmDelete').attr('href', deleteUrl); // Met à jour le lien de suppression dans le modal
        $('#deleteModal .modal-body').text(`Êtes-vous sûr de vouloir supprimer l'école ${ecoleName} ?`);
        $('#deleteModal').modal('show'); // Affiche le modal
    }
</script>

<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmation de suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer cette école ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <a id="confirmDelete" class="btn btn-danger" href="#">Supprimer</a>
            </div>
        </div>
    </div>
</div>

@foreach($ecoles as $ecole)
    <div class="modal fade" id="editModal{{ $ecole->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $ecole->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $ecole->id }}">Modification école : {{ $ecole->nom }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('ecoles.edit', ['ecole' => $ecole])
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection
