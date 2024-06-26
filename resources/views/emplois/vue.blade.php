<form action="{{ route('emplois.update', $emploi->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <div class="form-group">
            <label for="classe_id">Classe:</label>
            <select name="classe_id" class="form-control" disabled>
                <option value=""> classe</option>
                @foreach($classes as $classe)
                    <option value="{{ $classe->id }}" {{ $emploi->classe_id == $classe->id ? 'selected' : '' }}>{{ $classe->libelle }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="ecole_id">Ecole:</label>
            <select name="ecole_id" class="form-control" disabled>
                <option value="">ecole</option>
                @foreach($ecoles as $ecole)
                    <option value="{{ $ecole->id }}" {{ $emploi->ecole_id == $ecole->id ? 'selected' : '' }}>{{ $ecole->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="cycle_id">Cycle:</label>
            <select name="cycle_id" class="form-control" disabled>
                <option value="">Sélectionner une cycle</option>
                @foreach($cycles as $cycle)
                    <option value="{{ $cycle->id }}" {{ $emploi->cycle_id == $cycle->id ? 'selected' : '' }}>{{ $cycle->libelle }}</option>
                @endforeach
            </select>
        </div>
       
        <table class="table">
            <thead>
                <tr>
                    <th>Heures/Jours</th>
                    <th>Lundi</th>
                    <th>Mardi</th>
                    <th>Mercredi</th>
                    <th>Jeudi</th>
                    <th>Vendredi</th>
                </tr>
            </thead>
            <tbody>
                @foreach(['7h:45-10h:00', '7h:45-8h:45', '8h:45-9h:45', '10h:00-12h:00', '12h:00-13h:00', '13h:00-14h:00', '14h:00-15h:00', '15h:00-16h:00', '16h:00-17h:00', '17h:00-18h:00','15h:00-17h:00'] as $heure)
                    <tr>
                        <td>{{ $heure }}</td>
                        @foreach(['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi'] as $jour)
                            <td>
                                <select name="emplois[{{ $jour }}][{{ $heure }}][matiere_id]" class="form-control" disabled>
                                    <option value=""> matière</option>
                                    @foreach($matieres as $matiere)
                                        <option value="{{ $matiere->id }}" {{ isset($emploi->matiere_id[$jour][$heure]) && $emploi->matiere_id[$jour][$heure] == $matiere->id ? 'selected' : '' }}>{{ $matiere->libelle }}</option>
                                    @endforeach
                                </select>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <button type="reset" data-bs-dismiss="modal" class="btn btn-secondary">Annuler</button>
        <a class="btn btn-primary" href="{{route('emplois.pdf', encrypt("$emploi->id"))}}" type="submit">Telecharger</a>

    </div>
</form>


