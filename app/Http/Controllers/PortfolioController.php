<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Profile;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $profile = Profile::all()->first();
        $portfolio = Portfolio::all();
        return view('menu.portfolio.index')->with([
            'profile' => $profile,
            'portfolio' => $portfolio
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'year_created' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,bmp|',
        ], [
            'name.required' => 'The Name field is required.'
        ]);

        if ($validated) {
            $portfolio = Portfolio::findOrFail($id);

            $oldImg = $request->input('old');

            $now = new \DateTime('NOW');
            $date = $now->format('m-d-Y_H.i.s.u');
            if ($request->hasFile('img')) {
                $portfolio_Img_WithExt = $request->file('img')->getClientOriginalName();
                $portfolio_Img_filename = str_replace(' ', '_', pathinfo($portfolio_Img_WithExt, PATHINFO_FILENAME));
                $portfolio_Img_extension = $request->file('img')->getClientOriginalExtension();
                $portfolio_img = $portfolio_Img_filename . '-' . $date . '.' . $portfolio_Img_extension;
                $path_portfolio_img = $request->file('img')->storeAs('public/portpolyo', $portfolio_img);
            } else {
                $portfolio_img = $oldImg ?? 'No Data';
            }

            $portfolio->update([
                'name' => $request->name,
                'detail' => $request->detail,
                'year_created' => $request->year_created,
                'img' => $portfolio_img
            ]);

            if ($portfolio) {
                return response()->json(['success' => 'Successfully Updated !']);
            } else {
                return response()->json(['error' => 'Failed to update portfolio.'], 500);
            }
        }
    }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required',
    //         'detail' => 'required',
    //         'year_created' => 'required',
    //         'image' => 'nullable|image|mimes:jpg,jpeg,png,bmp|',
    //     ], [
    //         'name.required' => 'The Name field is required.'
    //     ]);

    //     if ($validated) {

    //         $now = new \DateTime('NOW');
    //         $date = $now->format('m-d-Y_H.i.s.u');
    //         if ($request->hasFile('img')) {
    //             $portfolio_Img_WithExt = $request->file('img')->getClientOriginalName();
    //             $portfolio_Img_filename = str_replace(' ', '_', pathinfo($portfolio_Img_WithExt, PATHINFO_FILENAME));
    //             $portfolio_Img_extension = $request->file('img')->getClientOriginalExtension();
    //             $portfolio_img = $portfolio_Img_filename . '-' . $date . '.' . $portfolio_Img_extension;
    //             $path_portfolio_img = $request->file('img')->storeAs('public/portpolyo', $portfolio_img);
    //         } else {
    //             $portfolio_img = 'No Data';
    //         }

    //         $portfolio = Portfolio::create(
    //             [
    //                 'name' => $request->name,
    //                 'detail' => $request->detail,
    //                 'year_created' => $request->year_created,
    //                 'img' => $portfolio_img,
    //             ]
    //         );
    //         if ($portfolio) {
    //             return redirect()->route('portfolio.index')->with('success', 'Portfolio "' . $request->name . '" successfully created.');
    //         } else {
    //             return back()->with('error', 'Failed to create Portfolio.');
    //         }
    //     }
    // }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'year_created' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,bmp|',
        ], [
            'name.required' => 'The Name field is required.'
        ]);

        if ($validated) {
            $now = new \DateTime('NOW');
            $date = $now->format('m-d-Y_H.i.s.u');
            if ($request->hasFile('img')) {
                $portfolio_Img_WithExt = $request->file('img')->getClientOriginalName();
                $portfolio_Img_filename = str_replace(' ', '_', pathinfo($portfolio_Img_WithExt, PATHINFO_FILENAME));
                $portfolio_Img_extension = $request->file('img')->getClientOriginalExtension();
                $portfolio_img = $portfolio_Img_filename . '-' . $date . '.' . $portfolio_Img_extension;
                $path_portfolio_img = $request->file('img')->storeAs('public/portpolyo', $portfolio_img);
            } else {
                $portfolio_img = 'No Data';
            }

            $portfolio = Portfolio::create([
                'name' => $request->name,
                'detail' => $request->detail,
                'year_created' => $request->year_created,
                'img' => $portfolio_img,
            ]);

            if ($portfolio) {
                return response()->json(['success' => 'Portfolio "' . $request->name . '" successfully created.']);
            } else {
                return response()->json(['error' => 'Failed to create Portfolio.'], 500);
            }
        }
    }

    public function show($id)
    {
        // $portfolio = Portfolio::where('id', $id)->first();
        // return response()->json(['portfolio' => $portfolio]);
        $portfolio = Portfolio::findOrFail($id);

        // Assuming you have a column named 'image_path' in your 'portfolios' table which stores the image path
        $img = asset('storage/portpolyo/' . $portfolio->img); // Adjust the path as per your storage configuration

        return response()->json([
            'portfolio' => [
                'name' => $portfolio->name,
                'detail' => $portfolio->detail,
                'year_created' => $portfolio->year_created,
                'img' => $img,
            ]
        ]);
    }

    // public function destroy($id)
    // {
    //     $portfolio = Portfolio::findOrFail($id);
    //     $portfolio->delete();

    //     return response()->json(['success' => '<strong>' . $portfolio->name . '</strong> has been deleted successfully!']);
    // }
    public function destroy($id)
{
    $portfolio = Portfolio::findOrFail($id);

    // Delete the image file from storage
    if ($portfolio->img) {
        Storage::delete('public/portpolyo/' . $portfolio->img);
    }

    // Delete the portfolio record from the database
    $portfolio->delete();

    return response()->json(['success' => '<strong>' . $portfolio->name . '</strong> has been deleted successfully!']);
}
}
