<?php

namespace Modules\MasterUnit\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\MasterUnit\Models\Unit;
use Yajra\DataTables\Facades\DataTables;

class HelperController extends Controller {
    public function datatables(Request $request) {
        $model = Unit::where('code', '<>', null);
        return DataTables::of($model)->make(true);
    }

    public function select2(Request $request) {
        $output = Unit::select('*', 'code as id', 'name as text');
        if ($request->has('q') || $request->has('term')) {
            $keyword = ($request->q ?? $request->term);
            $output = $output->where('code', 'LIKE', '%' . $keyword . '%')->orWhere('name', 'LIKE', '%' . $keyword . '%');
        }
        $output = $output->paginate();
        return response()->json([
            'results' => $output->items(),
            'pagination' => [
                'more' => (!empty($output->next_page))
            ]
        ]);
    }
}
