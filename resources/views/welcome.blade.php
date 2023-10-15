<?php

use App\Models\Member;

?>

@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rally</title>
    <style>
        h2 {
            text-align: center;
            margin-top: 15px !important;
        }

        table {
            width: 90%;
            border-collapse: collapse;
            margin: 0 auto;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        .position {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="centered-container text-center">
        <h1 class="mt-5 custom-margin">Rally</h1>
        <a href="mform" class="btn btn-primary">Zaregistruj se jako člen</a>
        <a href="tform" class="btn btn-primary">Zaregistruj tým</a>
    </div>

    @foreach ($teams as $team)
        <h2>{{ $team->team_name }}</h2>
        <table>
            <thead>
                <tr>
                    <th>Pozice</th>
                    <th>Počet členů</th>
                    <th>Jména členů</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="position">Racer</td>
                    <td>{{ $racerCount = count(explode(',', $team->racer)) }}</td>
                    <td>
                        @foreach (explode(',', $team->racer) as $racerId)
                            {{ Member::find($racerId)->first_name }}, 
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td class="position">Manažer</td>
                    <td>{{ $managerCount = count(explode(',', $team->manager)) }}</td>
                    <td>
                        @foreach (explode(',', $team->manager) as $managerId)
                            {{ Member::find($managerId)->first_name }}, 
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td class="position">Fotograf</td>
                    <td>
                        @php
                            $photographers = array_filter(explode(',', $team->photographer));
                            $photographerCount = count($photographers);
                        @endphp
                        {{ $photographerCount }}
                    </td>
                    <td>
                        @foreach ($photographers as $photographerId)
                            @if ($photographer = Member::find($photographerId))
                                {{ $photographer->first_name }},
                            @endif
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td class="position">Technik</td>
                    <td>{{ $mechanicCount = count(explode(',', $team->mechanic)) }}</td>
                    <td>
                        @foreach (explode(',', $team->mechanic) as $mechanicId)
                            {{ Member::find($mechanicId)->first_name }}, 
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td class="position">Spolujezdec</td>
                    <td>{{ $codriverCount = count(explode(',', $team->codriver)) }}</td>
                    <td>
                        @foreach (explode(',', $team->codriver) as $codriverId)
                            {{ Member::find($codriverId)->first_name }}, 
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
    @endforeach
</body>
</html>






