@extends('layouts.interfaceeleve')
@section('content')
<div class="page-header">
    <div class="page-title">
    <h4>Listes des Eleves</h4>
    </div>
    {{-- <div class="page-btn">
        <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#ajoutEleveModal">
            <img src="{{ URL::to('admin-template/assets/img/icons/plus.svg') }}" alt="img" class="me-2">Ajouter Eleve
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
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="form-group">
                            <select id="filter_classe" name="classe_id" class="form-control">
                                <option value="">Sélectionner une classe</option>
                                @foreach($classes as $classe)
                                    <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="form-group">
                            <select id="filter_ecole" name="ecole_id" class="form-control">
                                <option value="">Sélectionner une école</option>
                                @foreach($ecoles as $ecole)
                                    <option value="{{ $ecole->id }}">{{ $ecole->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table datanew" id="eleves_table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Ecole</th>
                        <th>Classe</th>
                        <th>Matricule</th>
                        <th>Nom </th>
                        <th>Adresse</th>
                        <th>Genre</th>
                        <th>Acte De Naissance </th>
                    </tr>
                </thead>
                <tbody id="eleves_body">
                    @foreach ($eleves as $eleve)
                        <tr data-ecole-id="{{ $eleve->ecole_id }}" data-classe-id="{{ $eleve->classe_id }}">
                            <td>{{ $eleve->id }}</td>
                            <td>{{ $ecole->firstWhere('id', $eleve->ecole_id)->nom }}</td>
                            <td>{{ $classe->firstWhere('id', $eleve->classe_id)->libelle }}</td>
                            <td>{{ $eleve->matricule }}</td>
                            <td>{{ $eleve->nom }}</td>
                            <td>{{ $eleve->adresse }}</td>
                            <td>{{ $eleve->genre }}</td>
                            <td>
                                @if ($eleve->acte_n)
                                    <a href="{{ url('actes_naissance/'.$eleve->acte_n) }}">
                                        <i class="fas fa-file-pdf"></i> Télécharger Acte_Naissance
                                    </a>
                                @else
                                    Aucun acte disponible
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        

    </div>
</div>

@include('eleves.ajout')

<script>


    document.addEventListener('DOMContentLoaded', function () {
        const filterClasse = document.getElementById('filter_classe');
        const filterEcole = document.getElementById('filter_ecole');
        const elevesTableBody = document.getElementById('eleves_body');

        function filterEleves() {
            const selectedClasse = filterClasse.value;
            const selectedEcole = filterEcole.value;
            const rows = elevesTableBody.getElementsByTagName('tr');

            for (const row of rows) {
                const classeId = row.getAttribute('data-classe-id');
                const ecoleId = row.getAttribute('data-ecole-id');

                if ((selectedClasse === '' || classeId === selectedClasse) &&
                    (selectedEcole === '' || ecoleId === selectedEcole)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        }

        filterClasse.addEventListener('change', filterEleves);
        filterEcole.addEventListener('change', filterEleves);
    });


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

@foreach($eleves as $eleve)
<div class="modal fade" id="editModal{{ $eleve->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $eleve->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $eleve->id }}">Modification eleve : {{ $eleve->nom }} {{ $eleve->prenom }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('eleves.edit', ['eleve' => $eleve])
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
@endsection


