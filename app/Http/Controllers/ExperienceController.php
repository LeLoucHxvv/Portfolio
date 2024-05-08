<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExperienceController extends Controller
{
    public function index()
    {
        $experience = Experience::all();
        $profile = Profile::all()->first();
        return view('menu.resume.experience.index')->with([
            'experience' => $experience,
            'profile' => $profile
        ]);
    }

    public function edit($id)
    {
        $experience = Experience::where('id', $id)->first();
        return response()->json(['experience' => $experience]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'job' => 'required',
            'year_experience' => ['required', 'regex:/^\d{4}-\d{4}$/'],
            'company_name' => 'required',
            'summary' => 'required'
        ], [
            'job.required' => 'Job is required.',
            'year_experience.required' => 'Year experience is required.',
            'company_name.required' => 'Company name is required.',
            'summary.required' => 'Summary is required.'
        ]);

        $experience = Experience::create([
            'job' => $request->job,
            'year_experience' => $request->year_experience,
            'company_name' => $request->company_name,
            'summary' => $request->summary
        ]);

        return response()->json([
            'success' => '<strong>' . $request->job . '</strong> has been created successfully!',
            'experience' => $experience
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'edit-job' => 'required',
            'edit-ye' =>  ['required', 'regex:/^\d{4}-\d{4}$/'],
            'edit-companyName' => 'required',
            'edit-summary' => 'required',
        ], [
            'edit-job.required' => 'The Job field is required.'
        ]);

        $experience = Experience::findOrFail($id);

        $experience->update([
            'job' => $request->input('edit-job'),
            'year_experience' => $request->input('edit-ye'),
            'company_name' => $request->input('edit-companyName'),
            'summary' => $request->input('edit-summary')
        ]);

        return response()->json([
            'success' => '<strong>' . $request->input('edit-job') . '</strong> has been updated successfully!',
            'experience' => $experience
        ]);
    }

    public function destroy($id)
    {
        $deleteExperience = Experience::findOrFail($id);
        $experienceToDelete = $deleteExperience->experience;
        $deleteExperience->delete($id);

        $experiences = Experience::latest();
        if ($deleteExperience) {
            return response()->json([
                'success' => 'The contact called <b>' . $experienceToDelete . '</b> has been successfully deleted!',
                'experience' => $experiences,
            ]);
        }
    }
}
