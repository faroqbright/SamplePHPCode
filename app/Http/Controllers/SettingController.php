<?php

namespace App\Http\Controllers;

use stdClass;
use App\Level;
use App\Point;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function aboutForm()
    {
        $about = Setting::where('key', 'about')->first();
        return view('settings.about', compact('about'));
    }

    public function aboutUpdate(Request $request)
    {
        $request->validate(['about'=> 'required|string']);

        Setting::updateOrCreate([
            'key'=> 'about'
        ],
        [
            'key' => 'about',
            'value' => $request->about
        ]);

        return back()->with('success', 'Page text saved successfully');
    }

    public function pointsIndex()
    {
        $points = Point::all();

        return view('settings.points-index', compact('points'));
    }

    public function pointsUpdate(Request $request, Point $point)
    {
        $request->validate(['min' => 'required|integer', 'max' => 'required|integer']);
        $point->update($request->only(['min', 'max']));

        return back()->with('success', 'Points updated successfully');
    }

    public function levelsIndex()
    {
        $levels = Level::all();

        return view('settings.levels-index', compact('levels'));
    }

    public function levelsStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'min' => 'required|integer',
            'max' => 'required|integer',
        ]);

        Level::create($request->all());

        return back()->with('success', 'Level created successfully');
    }

    public function levelsUpdate(Request $request, Level $level)
    {
        $request->validate([
            'name' => 'required|string',
            'min' => 'required|integer',
            'max' => 'required|integer',
        ]);

        $level->update($request->only(['name', 'min', 'max']));

        return back()->with('success', 'Level updated successfully');
    }
}
