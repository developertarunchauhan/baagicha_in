<?php

namespace App\Http\Controllers;

use App\Models\Variety;
use Illuminate\Http\Request;
use App\Http\Requests\VarietyRequest;

class VarietyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $varieties = Variety::where('variety_id', 0)->with(['children'])->get();
        //p($parent_varieties);

        //return $parent_varieties;
        // $varieties = Variety::where('variety_id', 0)->with(['children'])->get();
        //$varieties = Variety::all();
        // $all_varieties = Variety::all();
        return view('admin.variety.index', compact('varieties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $varieties = Variety::where('variety_id', 0)->get();
        return view('admin.variety.create', compact('varieties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VarietyRequest $request)
    {
        $data = $request->validated();
        Variety::create($data);
        return redirect(route('variety.index'))->with('_store', 'New Variety Saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(Variety $variety)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Variety $variety)
    {
        $varieties = Variety::where('variety_id', 0)->with(['children'])->get();
        return view('front.variety.edit', compact('variety', 'varieties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VarietyRequest $request, Variety $variety)
    {
        $data = $request->validated();
        $variety->update($data);
        return redirect(route('variety.index'))->with('_update', 'Variety updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Variety $variety)
    {
        //
    }
}
