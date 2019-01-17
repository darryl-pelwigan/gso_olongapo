<?php

namespace Modules\Inventory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setup\Init;
use Illuminate\Support\Facades\Validator;


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
        return view('inventory::inventory.ppe',$this->setup());
    }
    
    public function wout_ppe()
    {
        return view('inventory::inventory.wout-ppe',$this->setup());
    }

 
}
