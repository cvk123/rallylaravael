<?php

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TeamController;
use App\Models\Member;
use App\Models\Team;    
use Illuminate\Http\Request;

Route::get('/', function () {
    $teams = DB::table('teams')->get();
    return view('welcome', [
        'teams' => $teams
    ]);
    $members = DB::table('members')->get();
    return view('welcome', [
        'members' => $members
    ]);
});

Route::get('/mform', function () {
    return view('mform');
});

Route::post('/mform', function () {
    $member = new Member();
    $member->first_name = request('first_name');
    $member->second_name = request('second_name');
    $member->type = request('type');
    $member->save();
    return redirect('/');
});

Route::get('/tform', function () {
   $members = DB::table('members')->get();
   return view('tform', [
    'members' => $members
    ]);
});

Route::post('/tform', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'team_name' => 'required',
        'racer' => 'required|array|min:1|max:3',
        'manager' => 'required|array|min:1|max:1',
        'photographer' => 'array|max:1',
        'mechanic' => 'required|array|min:1|max:2',
        'codriver' => 'required|array|min:1|max:3',
    ]);

    if ($validator->fails()) {
        return redirect('tform')
            ->withErrors($validator)
            ->withInput();
    }

    $photographers = $request->input('photographer');
    $photographerString = $photographers ? implode(',', $photographers) : null; 

    $team = new Team();
    $team->team_name = $request->input('team_name');
    $team->racer = implode(',', $request->input('racer'));
    $team->manager = implode(',', $request->input('manager'));
    $team->photographer = $photographerString; 
    $team->codriver = implode(',', $request->input('codriver'));
    $team->mechanic = implode(',', $request->input('mechanic'));
    $team->save();
    return redirect('/');
});