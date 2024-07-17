@extends('pages.ecole.interfaces.interfaceeleve')
@section('content')
<div class="page-header">
    <div class="page-title">
    <h4>Listes des Eleves</h4>
    </div>
    <div class="page-btn">
        <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#ajoutEleveModal">
            <img src="{{ URL::to('admin-template/assets/img/icons/plus.svg') }}" alt="img" class="me-2">Ajouter Eleve
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
            {{-- <div class="wordset">
                <ul>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                src="{{ URL::to('admin-template/assets/img/icons/pdf.svg') }}" alt="img"></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                src="{{ URL::to('admin-template/assets/img/icons/excel.svg') }}" alt="img"></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                src="{{ URL::to('admin-template/assets/img/icons/printer.svg') }}" alt="img"></a>
                    </li>
                </ul>
            </div> --}}
        </div>

        <div class="card" id="filter_inputs">
            <div class="card-body pb-0">
                <div class="row">
                    {{-- <div class="col-lg-2 col-sm-6 col-12">
                        <div class="form-group">
                            <select id="ecoles_list" wire:model="selectedEcole" name="classe_id">
                                <option value="">Sélectionner un cycle</option>
                                @foreach($classes as $classe)
                                    <option value="{{ $classe->id }}">{{ $classe->cycle }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="form-group">
                            <select id="ecoles_list" wire:model="selectedEcole" name="classe_id">
                                <option value="">Sélectionner une classe</option>
                                @foreach($classes as $classe)
                                    <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                                @endforeach
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
        </div> 

        <div class="table-responsive">
            <table class="table datanew">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Classe</th>
                        <th>Matricule</th>
                        <th>Nom </th>
                        <th>Acte De Naissance </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eleves as $eleve)
                        <tr>
                            <td>{{ $eleve->id }}</td>
                            <td>
                                @foreach($classes as $classe)
                                    @if($classe->id == $eleve->classe_id)
                                        {{ $classe->libelle }}
                                    @endif
                                @endforeach
                            </td> 
                            <td>{{ $eleve->matricule }}</td>                         
                            <td>{{ $eleve->nom  }}</td>
                           
                            <td>
                                @if ($eleve->acte_n)
                                    <a href="{{ url('actes_naissance/'.$eleve->acte_n) }}">
                                        <i class="fas fa-file-pdf"></i> Télécharger Acte_Naissance
                                    </a>
                                @else
                                    Aucun acte disponible
                                @endif
                            </td>
                          
                            <td>
                                <a class="me-3" data-bs-toggle="modal" data-bs-target="#editModal{{ $eleve->id }}">
                                    <img src="{{ URL::to('admin-template/assets/img/icons/edit.svg') }}" alt="img">
                                </a>
                                <a class="me-3 confirm-text" href="#" onclick="showDeleteModal('{{ route('eleves.delete', $eleve->id) }}')">
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

@include('pages.ecole.eleves.ajout')

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

<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmation de suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer cet élève ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <a id="confirmDelete" class="btn btn-danger" href="#">Supprimer</a>
            </div>
        </div>
    </div>
</div>

@endsection

@foreach($eleves as $eleve)
<div class="modal fade" id="editModal{{ $eleve->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $eleve->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $eleve->id }}">Modification eleve : {{ $eleve->nom }} {{ $eleve->prenom }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('pages.ecole.eleves.edit', ['eleve' => $eleve])
            </div>
        </div>
    </div>
</div>
@endforeach
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmation de suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer cet elève ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <a id="confirmDelete" class="btn btn-danger" href="#">Supprimer</a>
            </div>
        </div>
    </div>
</div>

