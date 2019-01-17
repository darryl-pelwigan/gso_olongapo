<?php

namespace Modules\PurchaseRequest\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;
use Modules\PurchaseRequest\Library\POPR_datatable;

class PRDatatableController extends Controller
{
       public function set_datatables(Request $request){
        $POPR_datatable = new POPR_datatable;
        if(method_exists ( $POPR_datatable, $request->input('dataTables') )){
            $vars = $request->all();
            $method = $request->input('dataTables');
            $datatable = $POPR_datatable->$method($vars);

            return Datatables::of($datatable)->make(true);
        }
        return json_encode('errors');
    }
}
