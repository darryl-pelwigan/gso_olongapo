<?php

namespace Modules\BAC\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;
use Modules\Bac\Library\Bac_datatable;

class BacDatatableController extends Controller
{
    public function set_datatables(Request $request){
        $Bac_datatable = new Bac_datatable;
        if(method_exists ( $Bac_datatable, $request->input('dataTables') )){
            $vars = $request->all();
            $method = $request->input('dataTables');
            $datatable = $Bac_datatable->$method($vars);

            return Datatables::of($datatable)->make(true);
        }
        return json_encode('errors');
    }
}
