@extends('layouts.interfaceequipement')
@section('content')


<form action="{{url('equipement/'. $equipement->libelle.'/sortie')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="card">
            <div class="card-header">
                <h4>Sortie Equipement</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="ecole"> Ecole <span class="text-danger">*</span></label>

                            <div class="input-with-dropdown">
                                <select id="ecoles_list"  name="ecole_id">
                                    <option value="">Ecole</option>
                                    @foreach ($ecoles as $ecole)
                                        <option value="{{ $ecole->id }}">{{ $ecole->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-sm-6 col-12">
                        <div class="form-group">
                            <label> Date Sortie <span class="text-danger">*</span></label>
                            <input type="date" name="date_sortie" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-6 col-12">
                        <div class="form-group">
                            <label> Quantité <span class="text-danger">*</span></label>
                            <input type="number" min="1" name="quantite" class="form-control">
                        </div>
                    </div>



                </div>
                <div class="modal-footer justify-content">

                    <button type="submit" class="btn btn-primary">Sortie</button>
                </div>
            </div>
        </div>
       
</form>
@endsection