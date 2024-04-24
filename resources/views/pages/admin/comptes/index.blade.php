@extends('pages.admin.interface')
@section('content')
    <h1 class="h3 mb-3"><strong>Liste des utilisateurs</strong> {{ $rows }}</h1>
    <div class="row">
        <div class="col">
            <div class="w-100">
                <div class="row">
                    <div class="card">
                        <form action="{{ route('admin.user.search') }}" method="get">
                            @csrf
                            <div class="mb-3">
                                <input id="name" type="search" class="form-control" name="name">
                                <button type="submit" class="btn btn-lg btn-secondary">Recherche</button>
                            </div>
                        </form>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
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
@endsection
