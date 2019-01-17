<?php

namespace Modules\Inventory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;
use Modules\Inventory\Library\inventryDataTable;


class InventoryDataTableController extends Controller
{
    public function set_datatables(Request $request){
        $inventryDataTable = new inventryDataTable;
        if(method_exists ( $inventryDataTable, $request->input('dataTables') )){
            $vars = $request->all();
            $method = $request->input('dataTables');
            $datatable = $inventryDataTable->$method($vars);
            return Datatables::of($datatable)->make(true);
        }
        return json_encode('errors');
    }

}
