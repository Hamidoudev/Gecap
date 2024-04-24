@extends('pages.admin.interface')
@section('content')
    @if (request()->is('admin/user/create'))
    <h1 class="h3 mb-3"><strong>Ajouter un utilisateur</strong></h1>
    @endif
    @if (request()->is('admin/user*/edit'))
    <h1 class="h3 mb-3"><strong>Modifier un utilisateur</strong></h1>
    @endif
    <div class="row">
        <div class="col">
            <div class="w-100">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0"><a href="{{ route('admin.user.index') }}">Retour</a></h5>
                        </div>
                        <div class="card-body">
                            <form
                                action="{{ request()->is('admin/user/create') ? route('admin.user.store') : route('admin.user.update', $user->id) }}"
                                method="post">
                                @csrf
                                @method(request()->is('admin/user*/edit') ? 'PUT' : 'POST')
                                <div class="mb-3">
                                    <label class="form-label">Nom utilisateur</label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ request()->is('admin/user/create') ? '' : $user->name }}"
                                        autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ request()->is('admin/user/create') ? '' : $user->email }}"
                                        autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Type</label>
                                    <input id="type" type="text"
                                        class="form-control @error('type') is-invalid @enderror" name="type"
                                        value="{{ request()->is('admin/user/create') ? '' : $user->type }}"
                                        autocomplete="type" autofocus>

                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    @if (request()->is('admin/user/create'))
                                        <button type="submit" class="btn btn-lg btn-primary">Enregistrer</button>
                                    @endif
                                    @if (request()->is('admin/user*/edit'))
                                        <button type="submit" class="btn btn-lg btn-primary">Modifier</button>
                                    @endif
                                    <button type="reset" class="btn btn-lg btn-secondary">Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
