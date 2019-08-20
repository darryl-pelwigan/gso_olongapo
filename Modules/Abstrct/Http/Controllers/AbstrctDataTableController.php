<?php

namespace Modules\Abstrct\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;
use Modules\Abstrct\Library\Abstrct_datatable;


class AbstrctDataTableController extends Controller
{
    public function set_datatables(Request $request){
        
        $Abstrct_datatable = new Abstrct_datatable;
        if(method_exists ( $Abstrct_datatable, $request->input('dataTables') )){
            $vars = $request->all();
            $method = $request->input('dataTables');
            $datatable = $Abstrct_datatable->$method($vars);

            return Datatables::of($datatable)->make(true);
        }
        return json_encode('errors');
    }
}
