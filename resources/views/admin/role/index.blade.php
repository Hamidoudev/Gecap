@extends('pages.admin.interface')
@section('content')
<div>

    <div class="page-header">
        <div class="page-title">
        <h4>Listes des Roles</h4>
        {{-- <h6>Manage your User</h6> --}}
        </div>
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#ajoutEnseignantModal">
                <img src="{{ URL::to('admin-template/assets/img/icons/plus.svg') }}" alt="img" class="me-2">Ajouter 
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
                                    <a class="btn btn-filters ms-auto"><img
                                            src="{{ URL::to('admin-template/assets/img/icons/search-whites.svg') }}"
                                            alt="img"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  --}}
    
                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead>
                            <tr>
                            
                                <th>#</th>
                                <th>Nom</th>
                                <th> Etat </th>
                                <th> Utilisateurs </th>
                                <th> Droits </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->nom }}</td>
                                  
                                    <td>      @if ($role->type == 1)
                                        <span class="btn btn-success btn-sm">Activer</span>
                                    @else
                                        <span class="btn btn-danger btn-sm">Desactiver</span>
                                    @endif
                                    </td>
                                    <td>{{ count($role->users) }}</td>
                                   
                                    <td>{{ count($role->droits) }}</td>  
                                 
                                   
                                    
                                    
                                    <tdclass="__cf_email__" data-cfemail="42362a2d2f233102273a232f322e276c212d2f"></td>
                                  
                                    <td>
                                        <a class="me-3" data-bs-toggle="modal" data-bs-target="#editModal{{ ($role->id) }}">
                                            <img src="{{ URL::to('admin-template/assets/img/icons/edit.svg') }}"
                                                alt="img">
                                        </a>
                                        <a class="me-3 confirm-text"
                                            href="{{ route('admin.role.delete', $role->id) }} "onclick="return confirm('voulez-vous vraiment supprimer'. $role->nom . '_' . $role->type. '?')">
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
</div>
@include('admin.role.ajout')
@foreach($roles as $role)
    <div class="modal fade" id="editModal{{ $role->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $role->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $role->id }}">Modification role : {{ $role->nom }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    @include('admin.role.edit', ['role' => $role])
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection


@section('script')
    <script>
        $(document).on('click', '.update_modal', function() {
            var _this = $(this).parents('tr');
            $('#e_role_id').val(_this.find('.role_id').text());
            var role_id = $('#e_role_id').val();
            $('#e_role_nom').val(_this.find('.role_nom').text());
            var type_nom = (_this.find(".type_nom").text());
            var _option = '<option selected value="' + _this.find('.type_id').text() + '">' + type_nom + '</option>'
            $(_option).appendTo("#e_role_type");

            $.ajax({
                url: '/admin/exceptDroit',
                type: 'POST',
                data: '&id=' + role_id + '&_token={{ csrf_token() }}',
                success: function(resultat) {
                    $('#edit_customleave_select').html(resultat);
                }
            });

            $.ajax({
                url: '/admin/getDroit',
                type: 'POST',
                data: '&id=' + role_id + '&_token={{ csrf_token() }}',
                success: function(resultat) {
                    $('#droits_listes').html(resultat);
                }
            });

        })
        $(document).on('click', '.delete_modal', function() {
            var _this = $(this).parents('tr');
            $('.e_role_id').val(_this.find('.role_id').text());
        })
    </script>
@endsection