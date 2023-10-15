@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Formulář pro závodníka</h2>
        <form method="POST" action="/mform">
            @csrf
            <div class="form-group">
                <label for="jmeno">Jméno:</label>
                <input type="text" name="first_name" id="first_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="prijmeni">Příjmení:</label>
                <input type="text" name="second_name" id="second_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="typ">Typ člena:</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="racer">Závodník</option>
                    <option value="mechanic">Technik</option>
                    <option value="manager">Manažer</option>
                    <option value="codriver">Spolujezdec</option>
                    <option value="photographer">Fotograf</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Odeslat</button>
        </form>
    </div>
@endsection

