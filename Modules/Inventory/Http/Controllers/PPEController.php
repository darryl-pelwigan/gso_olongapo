<?php

namespace Modules\Inventory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setup\Init;
use Illuminate\Support\Facades\Validator;

use Modules\PurchaseRequest\Entities\PurchaseNo;
use Modules\PurchaseOrder\Entities\PurchaseOrderNo;
use Modules\PurchaseOrder\Entities\PurchaseOrderItems;

use Modules\Inventory\Entities\PpeMnthlyReport;

class PPEController extends Controller
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


    public function index()
    {
        $this->data['pos'] = PurchaseNo::all();

        return view('inventory::inventory/ppe',$this->setup());
    }

    public function wout_ppe()
    {
        return view('inventory::inventory.wout-ppe',$this->setup());
    }

    public function set_ppe_pr($id){
        $this->data['po'] = PurchaseNo::find($id);
        return view('inventory::ppe-mnthly.set_pr_ppe',$this->setup());
    }


     public function edit_ppe_pr($id){
        $this->data['pmi'] = PpeMnthlyReport::find($id);
        return view('inventory::ppe-mnthly.edit_pr_ppe',$this->setup());
    }

}
