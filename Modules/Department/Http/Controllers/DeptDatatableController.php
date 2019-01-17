<?php

namespace Modules\Department\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;
use Modules\Department\Library\Dept_datatable;

class DeptDatatableController extends Controller
{
     public function set_datatables(Request $request){
        $Dept_datatable = new Dept_datatable;
        if(method_exists ( $Dept_datatable, $request->input('dataTables') )){
            $vars = $request->all();
            $method = $request->input('dataTables');
            $datatable = $Dept_datatable->$method($vars);

            return Datatables::of($datatable)->make(true);
        }
        return json_encode('errors');
    }
}
