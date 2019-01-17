<?php

namespace Modules\BAC\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;
use Modules\Bac\Library\Item_datatable;

class ItemDatatableController extends Controller
{
    public function set_datatables(Request $request){
        $item_datatables = new Item_datatable;
        if(method_exists ( $item_datatables, $request->input('dataTables') )){
            $vars = $request->all();
            $method = $request->input('dataTables');
            $datatable = $item_datatables->$method($vars);

            return Datatables::of($datatable)->make(true);
        }
        return json_encode('errors');
    }
}
