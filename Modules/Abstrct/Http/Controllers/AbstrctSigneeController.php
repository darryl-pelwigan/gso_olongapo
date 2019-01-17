<?php

namespace Modules\Abstrct\Http\Controllers;
use Modules\Setup\Init;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Modules\PurchaseRequest\Entities\PurchaseItems;
use Modules\PurchaseRequest\Entities\PurchaseNo;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Modules\PurchaseRequest\Entities\OBR;
use Modules\PurchaseRequest\Entities\ApproveSupp;

use Modules\Abstrct\Entities\Abstrct;
use Modules\Abstrct\Entities\AbstrctSupplier;
use Modules\Abstrct\Entities\AbstrctItems;
use Modules\Abstrct\Entities\AbstrctSupplierApprved;
use Modules\Abstrct\Entities\AbstrctSignee;
use Modules\GSOassistant\Entities\Procmethod;


use PDF;

class AbstrctSigneeController extends Controller
{
    protected $data;
    protected $page_title = 'Login';

    function setup($vars = null)
    {
        $Init = new Init;
        $vars['page'] = $this->page_title;
        $this->data['template'] = $Init->setup($vars);
        return $this->data;
    }

    public function absctrct_list(){
        $this->data['proc_methods'] = Procmethod::all();
        return view('abstrct::abstrct.absctrct_list',$this->setup());
    }

    public function index()
    {
        $this->data['signee'] = AbstrctSignee::all();
        return view('abstrct::signee.index',$this->setup());
        
    }

    public function update(Request $request)
    {
        $data['status'] = 1;
        
        $signee_name = $request->input('signee_name');
        $signee_id = $request->input('signee_id');
        $signee_position = $request->input('signee_position');

        for ($i=0; $i < count($signee_id); $i++) { 
            $abstract_sign = AbstrctSignee::find($signee_id[$i]);
            $abstract_sign->name = $signee_name[$i];
            $abstract_sign->position =$signee_position[$i];
            $abstract_sign->save();
        }
         $this->data['signee'] = AbstrctSignee::all();
        return view('abstrct::signee.index',$this->setup());
        
    }




}
