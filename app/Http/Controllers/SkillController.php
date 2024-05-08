<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skill = Skill::all();
        $profile = Profile::all()->first();
        return view('menu.skill.index')->with(['skill' => $skill,
                                                    'profile' => $profile]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'skill' => 'required',
            'ye' => 'required',
            'icon' => 'required',

        ], [
            'skill.required' => 'skill field is required.',
            'ye.required' => 'Year Experience field is required.',
            'icon.required' => 'Icon field is required.',

        ]);

        $skill = Skill::create([
            'skill' => $request->skill,
            'yr_experience' => $request->ye,
            'icon' => $request->icon,

        ]);

        return response()->json([
            'success' => '<strong>' . $request->skill . '</strong> has been created successfully!',
            'skill' => $skill
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'edit-skills' => 'required',
            'edit-ye' => 'required',
            'edit-icon' => 'required',
        ],[
            'edit-skills.required' => 'The Skill field is required.'
        ]);

        $skill = Skill::findOrFail($id);

        $skill->update([
            'skill' => $request->input('edit-skills'),
            'yr_experience' => $request->input('edit-ye'),
            'icon' => $request->input('edit-icon')
        ]);

        return response()->json([
            'success' => '<strong>'.$request->input('edit-skills').'</strong> has been updated successfully!',
            'skill' => $skill
        ]);
    }

    public function edit($id)
    {
        $skill = Skill::where('id', $id)->first();
        return response()->json(['skill' => $skill]);
    }

    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        return response()->json(['success' => '<strong>' . $skill->skill . '</strong> has been deleted successfully!']);
    }
}
