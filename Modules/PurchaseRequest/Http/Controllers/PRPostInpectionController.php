<?php

namespace Modules\PurchaseRequest\Http\Controllers;
use Modules\Setup\Init;
use Modules\Setup\Library\Remarks;
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

use Modules\GSOassistant\Entities\Procmethod;
use PDF;

use Modules\GSOassistant\Entities\Requestordersignee;

class PRPostInpectionController extends Controller
{

    protected $data;
    protected $page_title = 'Purchase Request';

    function setup($vars = null)
    {
        $Init = new Init;
        $vars['page'] = $this->page_title;
        $this->data['template'] = $Init->setup($vars);
        return $this->data;
    }


    public function index()
    {
        return view('bac::request.index',$this->setup());
    }



    public function inpection()
    {
        return view('bac::inspection.index',$this->setup());
    }



    public function addinpection(Request $request)
    {
        $this->data['pr'] = PurchaseNo::find($request->input('pr_id'));

        return view('bac::inspection.edit',$this->setup());
    }


}
