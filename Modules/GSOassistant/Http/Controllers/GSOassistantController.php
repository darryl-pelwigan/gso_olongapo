<?php

namespace Modules\GSOassistant\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setup\Init;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Modules\Employee\Entities\Employee;
use Modules\Employee\Entities\Position;
use Illuminate\Support\Facades\Redirect;

use Modules\GSOassistant\Entities\GsoTemplate as gsotemplate;

use Illuminate\Support\Facades\Session;

use PDF;

class GSOassistantController extends Controller
{
   protected $data;
    protected $page_title = 'GSO ASSISTANT';

    function setup($vars = null)
    {
        $Init = new Init;
        $vars['page'] = $this->page_title;
        $this->data['template'] = $Init->setup($vars);
        return $this->data;
    }


    public function index()
    {
        return view('gsoassistant::departments.index',$this->setup());
    }

    public function procurement_record_pdf(){
        $pdf = PDF::loadView('gsoassistant::pdf.abs_procurement_record', $this->setup() )->setPaper( 'legal','landscape');
        return $pdf->stream();
    }

    public function gsotemplate()
    {
        return view('gsoassistant::gso_templates.gso_template',$this->setup());
    }

    public function gso_addtemplate(){
        $gsotemp = gsotemplate::where('template_desc', 'gso_temp')->first();
        return view('gsoassistant::gso_templates.gso_addtemplate',$this->setup(), compact('gsotemp'));
    }

        public function set_gsopdf_template(Request $request)
    {
        $gsotemp = new gsotemplate;
        $rules = [
            'tmpl_tmpl' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules, [
           'tmpl_tmpl.required' => 'The Template Content is required.',
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            $gsotemp::where('template_desc', 'gso_temp')->update([
                'template' => json_encode((str_replace(array("\r\n", "\n\r", "\n", "\r"), '', $request->input('tmpl_tmpl')))),
                'code' => $request->input('tmpl_code'),
            ]);
            Session::flash('success', ['Saved Changes.']);
            return Redirect::back();
        }
    }

}
