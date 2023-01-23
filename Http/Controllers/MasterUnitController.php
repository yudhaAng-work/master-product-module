<?php

namespace Modules\MasterUnit\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
use Modules\MasterUnit\Models\Unit;

class MasterUnitController extends Controller {
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request) {
        return view('masterunit::index');
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create() {
        return view('masterunit::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'code' => [
                'required',
                Rule::unique('units')
            ],
            'name' => [
                'required',
                Rule::unique('units')
            ]
        ]);
        $unit = new Unit;
        foreach ($validated as $field => $value) {
            $unit->{$field} = $value;
        }
        $unit->save();
        return redirect()->route('master.units.show', ['unit' => $unit])->with('response', (object)[
            'status' => 'success',
            'message' => 'Data has been saved'
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Request $request, Unit $unit) {
        return view('masterunit::show', ['unit' => $unit]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Request $request, Unit $unit) {
        return view('masterunit::update', ['unit' => $unit]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Unit $unit) {
        $validated = $request->validate([
            'code' => [
                'required',
                Rule::unique('units')->ignore($unit->code, 'code')
            ],
            'name' => [
                'required',
                Rule::unique('units')->ignore($unit->code, 'code')
            ]
        ]);
        foreach ($validated as $field => $value) {
            $unit->{$field} = $value;
        }
        $unit->save();
        return redirect()->route('master.units.show', ['unit' => $unit])->with('response', (object)[
            'status' => 'success',
            'message' => 'Data has been saved'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request, Unit $unit) {
        $unit->delete();
        if ($request->ajax()) {
            return response()->json([
                'status'    => 'OK',
                'message'   => 'Data has been deleted'
            ]);
        }
        return redirect()->route('master.units.index');
    }
}
