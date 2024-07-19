 <!-- Modal -->
 <div class="modal fade" id="ajoutecoleModal" tabindex="-1" aria-labelledby="ajoutecoleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserModalLabel">Ajouter un utlisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
            
                            <div class="row">
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="first_name">Nom</label>
                                        <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" required>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="last_name">Prénom</label>
                                        <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" required>
                                    </div>
                                </div>
            
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                    </div>
                                </div>
            
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone">Téléphone</label>
                                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                                    </div>
                                </div>
                            </div>
            
                            <div class="row">
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="username">Nom d'Utilisateur</label>
                                        <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
                                    </div>
                                </div>
            
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="password">Mot de passe</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                </div>
            
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirmation</label>
                                        <input type="password" name="password_confirmation" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label> Profile </label>
                                        <div class="image-upload">
                                            <input type="file" name="profile_picture">
                                            <div class="image-uploads">
                                                <img src="{{ URL::to('admin-template/assets/img/icons/upload.svg') }}" alt="img">
                                                <h4>ajoutez ici votre Profile </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                              
                            </div>
            
                            {{-- <div class="row">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="role_id">Role</label>
                                        <select name="role_id" class="form-control" required>
                                            {{-- @foreach($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->nom }}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                </div>
            
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="role_type_user_id">Role Type</label>
                                        <select name="role_type_user_id" class="form-control" required>
                                            {{-- @foreach($roleTypeUsers as $roleTypeUser)
                                                <option value="{{ $roleTypeUser->id }}">{{ $roleTypeUser->role_type }}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                </div>
            
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="type_id">Type</label>
                                        <select name="type_id" class="form-control" required>
                                            {{-- @foreach($types as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                </div>
                            </div> --}}
            
                            <div class="modal-footer justify-content">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>