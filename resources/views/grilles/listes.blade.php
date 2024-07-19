@extends('layouts.interfacegrille')
@section('content')
<div class="page-header">
    <div class="page-title">
        <h4>Listes des grilles</h4>
    </div>
    <div class="page-btn">
        <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#ajoutgrilleModal">
            <img src="{{ URL::to('admin-template/assets/img/icons/plus.svg') }}" alt="img" class="me-2">Ajouter grilles
        </a>
    </div>


</div>

<div class="card">
    <div class="card-body">
        <div class="table-top">
            <div class="search-set">
                <div class="search-path">
                    {{-- <a class="btn btn-filter" id="filter_search">
                        <img src="{{ URL::to('admin-template/assets/img/icons/filter.svg') }}" alt="img">
                        <span><img src="{{ URL::to('admin-template/assets/img/icons/closes.svg') }}" alt="img"></span>
                    </a> --}}
                </div>
                <div class="search-input">
                    <a class="btn btn-searchset">
                        <img src="{{ URL::to('admin-template/assets/img/icons/search-white.svg') }}" alt="img">
                    </a>
                </div>
            </div>
            <div class="wordset">
                @if ($errors->any())

                <div class="alert alert-danger">
            
                    <p> Echec d'enregistrement, Tout les champs sont obligatoire!!!</p>
            
                </div>
            
            @endif
            </div>
        </div>

        {{-- <div class="card" id="filter_inputs">
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
        </div>  --}}

        <div class="table-responsive">
            <table class="table datanew">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Statut</th>
                        <th>Ecole</th>
                        <th>Date</th>
                        <th>Action</th>
                        <th>Grille</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($grilles as $grille)
                        <tr>
                            <td>{{ $grille->id }}</td>
                            <td>{{ $grille->statut }}</td>
                            <td>
                                @foreach($ecoles as $ecole)
                                    @if($ecole->id == $grille->ecole_id)
                                        {{ $ecole->nom }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $grille->date }}</td>
                            <td>
                                <a class="me-3" data-bs-toggle="modal" data-bs-target="#editModal{{ $grille->id }}">
                                    <img src="{{ URL::to('admin-template/assets/img/icons/edit.svg') }}" alt="img">
                                </a>
                                <a class="me-3 confirm-text" href="{{ route('grilles.delete', $grille->id) }}" onclick="return confirm('voulez-vous vraiment supprimer {{ $grille->nom }} {{ $grille->prenom }}?')">
                                    <img src="{{ URL::to('admin-template/assets/img/icons/delete.svg') }}" alt="img">
                                </a>
                            </td>
                            <td>
                                    <a class="btn btn-primary" href="{{route('grilles.pdf', encrypt("$grille->id"))}}" type="submit">Grille</a>
                           
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('grilles.ajout')

@foreach($grilles as $grille)
    <div class="modal fade" id="editModal{{ $grille->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $grille->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $grille->id }}">Modification grille : {{ $grille->nom }} {{ $grille->prenom }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('grilles.edit', ['grille' => $grille])
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection
