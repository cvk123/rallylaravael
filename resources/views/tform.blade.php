@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Formulář pro vytvoření týmu</h2>
        <form method="POST" action="/tform">
            @csrf
            <div class="form-group">
                <label for="team_name">Název týmu:</label>
                <input type="text" name="team_name" id="team_name" placeholder="Název týmu" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="racer">Závodníci (1-3):</label>
                <select name="racer[]" id="racer" class="form-control" multiple required>
                    @foreach ($members as $member)
                        @if ($member->type === 'racer')
                            <option value="{{ $member->id }}">{{ $member->first_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="manager">Manažeři (1):</label>
                <select name="manager[]" id="manager" class="form-control" multiple required>
                    @foreach ($members as $member)
                        @if ($member->type === 'manager')
                            <option value="{{ $member->id }}">{{ $member->first_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="photographer">Fotografové (0-1):</label>
                <select name="photographer[]" id="photographer" class="form-control" multiple>
                    @foreach ($members as $member)
                        @if ($member->type === 'photographer')
                            <option value="{{ $member->id }}">{{ $member->first_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="mechanic">Technici (1-2):</label>
                <select name="mechanic[]" id="mechanic" class="form-control" multiple required>
                    @foreach ($members as $member)
                        @if ($member->type === 'mechanic')
                            <option value="{{ $member->id }}">{{ $member->first_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="codriver">Spolujezdci (1-3):</label>
                <select name="codriver[]" id="codriver" class="form-control" multiple required>
                    @foreach ($members as $member)
                        @if ($member->type === 'codriver')
                            <option value="{{ $member->id }}">{{ $member->first_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Vytvořit tým</button>
        </form>
    </div>
@endsection


