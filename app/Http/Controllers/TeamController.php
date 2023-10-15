<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Team;

class TeamController extends Controller
{
    /**
     * Process the form to create a team and its members.
     *
     * @param Request $request Request containing form data
     * @return \Illuminate\Http\RedirectResponse Redirect to the form with the operation result
     */
    public function create(Request $request): RedirectResponse
    {
        // Validate input data
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

        // Create a team in the database
        $team = new Team();
        $team->team_name = $request->input('team_name');
        $team->save();

        // Assign racers to the team
        $racerIds = $request->input('racer');
        $team->racers()->attach($racerIds);

        // Assign a manager to the team
        $managerIds = $request->input('manager');
        $team->managers()->attach($managerIds);

        // Assign a photographer to the team (if selected)
        $photographerIds = $request->input('photographer');
        if (!empty($photographerIds)) {
            $team->photographers()->attach($photographerIds);
        }

        // Assign mechanics to the team
        $mechanicIds = $request->input('mechanic');
        $team->mechanics()->attach($mechanicIds);

        // Assign codrivers to the team
        $codriverIds = $request->input('codriver');
        $team->codrivers()->attach($codriverIds);

        return redirect()->route('tform')->with('success', 'Data has been saved to the database.');
    }
}