@extends('layouts.interface')
@section('content')
<div class="page-header">
    <div class="page-title">
        <h4>Listes des Enseignants</h4>
    </div>
    {{-- <div class="page-btn">
        <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#ajoutEnseignantModal">
            <img src="{{ URL::to('admin-template/assets/img/icons/plus.svg') }}" alt="img" class="me-2">Ajouter Enseignants
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
                        <span><img src="{{ URL::to('admin-template/assets/img/icons/closes.svg') }}" alt="img"></span>
                    </a>
                </div>
                <div class="search-input">
                    <a class="btn btn-searchset">
                        <img src="{{ URL::to('admin-template/assets/img/icons/search-white.svg') }}" alt="img">
                    </a>
                </div>
            </div>
            <div class="wordset">
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
            </div>
        </div>

        <div class="card" id="filter_inputs">
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="form-group">
                            <input type="text" placeholder="Enter User Name">
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="form-group">
                            <input type="text" placeholder="Enter Phone">
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="form-group">
                            <input type="text" placeholder="Enter Email">
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
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Adresse</th>
                        <th>CV</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($enseignants as $enseignant)
                        <tr>
                            <td>{{ $enseignant->id }}</td>
                            <td>{{ $enseignant->ecole->nom }}</td>
                            
                            <td>{{ $enseignant->nom }}</td>
                            <td>{{ $enseignant->prenom }}</td>
                            
                            <td>{{ $enseignant->email }}</td>
                            <td>{{ $enseignant->telephone }}</td>
                            <td>{{ $enseignant->adresse }}</td>
                            <td>
                                @if ($enseignant->cv)
                                    <a href="{{ url('mes_cv/'.$enseignant->cv) }}">
                                        <i class="fas fa-file-pdf"></i> Télécharger CV
                                    </a>
                                @else
                                    Aucun CV disponible
                                @endif
                            </td>
                            {{-- <td>
                                <div class="status-toggle d-flex justify-content-between align-items-center">
                                    <input type="checkbox" id="status{{ $enseignant->id }}" class="check">
                                    <label for="status{{ $enseignant->id }}" class="checktoggle">checkbox</label>
                                </div>
                            </td>
                            <td>
                                <a class="me-3" data-bs-toggle="modal" data-bs-target="#editModal{{ $enseignant->id }}">
                                    <img src="{{ URL::to('admin-template/assets/img/icons/edit.svg') }}" alt="img">
                                </a>
                                <a class="me-3 confirm-text" href="#" onclick="showDeleteModal('{{ route('enseignants.delete', $enseignant->id) }}')">
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
@include('enseignants.ajout')

<script>
    // Afficher le modal de confirmation lorsqu'on clique sur le lien de suppression
    $('.confirm-text').on('click', function(e) {
        e.preventDefault();
        var deleteUrl = $(this).attr('href');
        $('#deleteModal').modal('show');

        // Lorsqu'on clique sur le bouton "Supprimer" du modal, redirige vers l'URL de suppression
        $('#confirmDelete').on('click', function() {
            window.location.href = deleteUrl;
        });
    });

    function showDeleteModal(deleteUrl) {
        $('#confirmDelete').attr('href', deleteUrl); // Met à jour le lien de suppression dans le modal
        $('#deleteModal').modal('show'); // Affiche le modal
    }
</script>

@foreach($enseignants as $enseignant)
    <div class="modal fade" id="editModal{{ $enseignant->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $enseignant->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $enseignant->id }}">Modification enseignant : {{ $enseignant->nom }} {{ $enseignant->prenom }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('enseignants.edit', ['enseignant' => $enseignant])
                </div>
            </div>
        </div>
    </div>
@endforeach

<!-- Modal HTML -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmation de suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer cet enseignant ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <a id="confirmDelete" class="btn btn-danger" href="#">Supprimer</a>
            </div>
        </div>
    </div>
</div>

@endsection
