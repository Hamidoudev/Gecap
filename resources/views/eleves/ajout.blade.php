 


<div class="modal fade" id="ajoutEleveModal" tabindex="-1" aria-labelledby="ajoutEleveModalLabel" aria-hidden="true">
    <div  class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajoutEleveModalLabel">Ajouter un Eleve</h5>
                @if ($message = Session::get('success'))
                <h3> {{ $message }} </h3>
            @endif
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('eleves.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="form-group">
                                 <label for="ecole"> Classe</label>
                               
                                <div class="input-with-dropdown">
                                    <select id="ecoles_list" wire:model="selectedEcole" name="classe_id">
                                        <option value="">Sélectionner une classe</option>
                                        @foreach($classes as $classe)
                                            <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                                        @endforeach
                                    </select>
                                </div>  
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label> Matricule</label>
                                <input type="text" name="matricule">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label> Nom </label>
                                <input type="text" name="nom">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label> Prénom</label>
                                <input type="text" name="prenom">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Date Naissance</label>
                                <input type="date" name="date_n">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Adresse</label>
                                <input type="text" name="adresse">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="genre">Genre</label>
                                <select name="genre" id="genre" class="form-control">
                                    <option value="F">Femme</option>
                                    <option value="M">Homme</option>
                                </select>
                            </div>
                        </div>
                        
    
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label> Acte_Naissance</label>
                                <div class="image-upload">
                                    <input type="file" name="acte_n">
                                    <div class="image-uploads">
                                        <img src="{{ URL::to('admin-template/assets/img/icons/upload.svg') }}" alt="img">
                                        <h4>ajoutez ici votre Acte_Naissance</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
                </div>
                <div class="modal-footer justify-content">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>

    <script>
        function selectEcole(value) {
            document.getElementById('ecole').value = value;
        }
    </script>
    @livewireStyles
    @livewireScripts 
