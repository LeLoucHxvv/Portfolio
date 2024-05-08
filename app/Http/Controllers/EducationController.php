<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Profile;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $education = Education::all();
        $profile = Profile::all()->first();
        return view('menu.resume.education.index')->with(['education' => $education ,
                                                            'profile' => $profile]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'master' => 'required',
            'school_year' => ['required', 'regex:/^\d{4}-\d{4}$/'],
            'place_school' => 'required',
            'summary' => 'required'
        ],[
            'master.required' => 'Master is required.',
            'school_year.required' => 'School Year is required.',
            'place_school.required' => 'Place of School is required.',
            'summary.required' => 'Summary is required.'
        ]);

        $education = Education::create([
            'master' => $request->master,
            'school_year' => $request->school_year,
            'place_school' => $request->place_school,
            'summary' => $request->summary
        ]);

        return response()->json([
            'success' => '<strong>'.$request->master.'</strong> has been created successfully!',
            'education' => $education
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'edit-master' => 'required',
            'edit-sy' => ['required', 'regex:/^\d{4}-\d{4}$/'],
            'edit-placeschool' => 'required',
            'edit-summary' => 'required',
        ],[
            'edit-master.required' => 'The Master field is required.'
        ]);

        $education = Education::findOrFail($id);

        $education->update([
            'master' => $request->input('edit-master'),
            'school_year' => $request->input('edit-sy'),
            'place_school' => $request->input('edit-placeschool'),
            'summary' => $request->input('edit-summary')
        ]);

        return response()->json([
            'success' => '<strong>'.$request->input('edit-master').'</strong> has been updated successfully!',
            'education' => $education
        ]);
    }

    public function edit($id)
    {
        $education = Education::where('id', $id)->first();
        return response()->json(['education' => $education]);

    }

    public function destroy($id)
    {
        $deleteEducation = Education::findOrFail($id);
        $educationtToDelete = $deleteEducation->education;
        $deleteEducation->delete($id);

        $educations = Education::latest();
        if($deleteEducation){
            return response()->json([
                'success'=>'The contact called <b>'.$educationtToDelete.'</b> has been successfully deleted!',
                'interests'=>$educations,
            ]);
        }
    }
}
