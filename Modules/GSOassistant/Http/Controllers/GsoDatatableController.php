<?php

namespace Modules\GSOassistant\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;
use Modules\GSOassistant\Library\GsoDatatable;

class GsoDatatableController extends Controller
{
   
     public function set_datatables(Request $request){
        $Gso_datatable = new GsoDatatable;
        if(method_exists ( $Gso_datatable, $request->input('dataTables') )){
            $vars = $request->all();
            $method = $request->input('dataTables');
            $datatable = $Gso_datatable->$method($vars);

            return Datatables::of($datatable)->make(true);
        }
        return json_encode('errors');
    }
}
