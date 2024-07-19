<div>

    <div class="page-header">
        <div class="page-title">
        <h4>Listes des Droits</h4>
        {{-- <h6>Manage your User</h6> --}}
        </div>
        {{-- <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#ajoutEnseignantModal">
                <img src="{{ URL::to('admin-template/assets/img/icons/plus.svg') }}" alt="img" class="me-2">Ajouter 
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
                                <th> Acces </th>
                                <th> Route </th>
                                <th> Type de Droit </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($droits as $droit)
                                <tr>
    
                                    <td>{{$droit->id}}</td>
                                    <td>{{$droit->nom}}</td>
                                    <td>{{$droit->acces}}</td>
                                    <td>{{$droit->route}}</td>
                                     <td>{{$droit->type_droit->nom}}</td> 
             
                                    <tdclass="__cf_email__" data-cfemail="42362a2d2f233102273a232f322e276c212d2f"></td>
                                 
                                    <td>
                                        <a class="me-3" href="">
                                            <img src="{{ URL::to('admin-template/assets/img/icons/edit.svg') }}"
                                                alt="img">
                                        </a>
                                        <a class="me-3 confirm-text"
                                            href=""onclick="return confirm('voulez-vous vraiment supprimer'. $droit->nom . '_' . $enseignant->acces. '?')">
                                            <img src="{{ URL::to('admin-template/assets/img/icons/delete.svg') }}"
                                                alt="img">
                                        </a>
                                    </td>

                                </tr>
                                @endforeach
                                <tr>
                           
    
                        </tbody>
                    </table>
                </div>
    
            </div>
        </div>
        
</div>
