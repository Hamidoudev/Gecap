@extends('layouts.interfaceemploisuser')
@section('content')
<div class="page-header">
    <div class="page-title">
    <h4>EMPLOIS DU TEMPS</h4>
    {{-- <h6>Manage your User</h6> --}}
    </div>
    <div class="page-btn">
        <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#ajoutEleveModal">
            <img src="{{ URL::to('admin-template/assets/img/icons/plus.svg') }}" alt="img" class="me-2">Ajouter Emplois
        </a>    </div>
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
                <div class="wordset">
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
                            {{-- <th>
                                <label class="checkboxs">
                                    <input type="checkbox">
                                    <span class="checkmarks"></span>
                                </label>
                            </th> --}}
                            <th>#</th>
                            <th>UE</th>
                            <th> Trimestre </th>
                            <th> Date Debut </th>
                            <th>Date FIN </th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($emplois as $emploi)
                            <tr>
                                {{-- <td>
            <label class="checkboxs">
            <input type="checkbox">
            <span class="checkmarks"></span>
            </label>
            </td>  --}}
                                 {{-- <td class="productimgname">
            <a href="javascript:void(0);" class="product-img">
            <img src="{{ URL::to('admin-template/assets/img/customer/customer1.jpg') }}" alt="product">
            </a>
            </td>  --}}
                                {{-- <td><label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label></td> --}}
                                <td>{{ $emploi->id }}</td>
                                <td>{{ $emploi->ue_id }}</td>
                                <td>{{ $emploi->trimestre_id }}</td>
                                <td>{{ $emploi->date_debut }}</td>
                                <td>{{ $emploi->date_fin }}</td>
                      
                                <tdclass="__cf_email__" data-cfemail="42362a2d2f233102273a232f322e276c212d2f"></td>
                                <td>
                                    <div class="status-toggle d-flex justify-content-between align-items-center">
                                        <input type="checkbox" id="user1" class="check">
                                        <label for="user1" class="checktoggle">checkbox</label>
                                    </div>
                                </td>
                                <td>
                                    <a class="me-3" data-bs-toggle="modal" data-bs-target="#editModal{{ $emploi->id }}">
                                        <img src="{{ URL::to('admin-template/assets/img/icons/edit.svg') }}" alt="img">
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
    @include('emplois.ajout')
@endsection

@foreach($emplois as $emploi)
    <div class="modal fade" id="editModal{{ $emploi->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $emploi->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $emploi->id }}">Modification enseignant : {{ $emploi->ue_id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('emplois.edit', ['emploi' => $emploi])
                </div>
            </div>
        </div>
    </div>
@endforeach
