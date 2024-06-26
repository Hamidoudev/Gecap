@extends('pages.admin.interface')
@section('content')
<div class="page-header">
    <div class="page-title">
    <h4>Listes des Utilisateurs</h4> 
    </div>
    <div class="page-btn">
        <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#ajoutecoleModal">
            <img src="{{ URL::to('admin-template/assets/img/icons/plus.svg') }}" alt="img" class="me-2">Ajouter 
        </a>
    </div>
</div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Email</th>
                                        <th>Nom Utilisateur</th>
                                        <th>Profil</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->first_name }}</td>
                                            <td>{{ $user->last_name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->profile_picture }}</td>
                                            <td>
                                                <a class="me-3" data-bs-toggle="modal" data-bs-target="#editModal{{ $user->id }}">
                                                    <img src="{{ URL::to('admin-template/assets/img/icons/edit.svg') }}" alt="img">
                                                </a>
                                                <a class="me-3 confirm-text" href="{{ route('grilles.delete', $user->id) }}" onclick="return confirm('voulez-vous vraiment supprimer {{ $user->first_name }} {{  $user->last_name }}?')">
                                                    <img src="{{ URL::to('admin-template/assets/img/icons/delete.svg') }}" alt="img">
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if (request()->is('admin/user/index'))
                                <div class="d-flex justify-content">
                                    {!! $users->links() !!}
                                </div>
                            @endif
                            @if (request()->is('admin/user/search'))
                                <div class="d-flex justify-content">

                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.users.form')
@endsection

