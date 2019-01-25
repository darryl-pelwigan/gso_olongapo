<?php

namespace Modules\Department\Http\Controllers;

use Modules\Setup\Init;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;


use Modules\PurchaseRequest\Entities\PurchaseNo;
use Modules\PurchaseRequest\Entities\PurchaseItems;


class DetpPurchaseRequestController extends Controller
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

    public function add_purchase_request( Request $request)
    {

        $validator = Validator::make($request->all(), [
        'pr_no_date'    => 'required|date',
        'purpose'       => 'required|min:5',
        'item_desc.*'   => 'required',
        'item_qty.*'    => ['required','regex:/^(0|[1-9]\d*)(\.\d+)?$/'],
        'item_unit.*'   =>  'required',
        'item_price.*'  =>  ['required','regex:/^(0|[1-9]\d*)(\.\d+)?$/'],
      ],
      [
        'pr_no_date.required'   => 'PURCHASE REQUEST DATE IS REQUIRED',
        'purpose.required'      => 'PURCHASE REQUEST PURPOSE IS REQUIRED',
        'item_desc.required'  => 'PURCHASE REQUEST ITEMS DESCRIPTION IS REQUIRED',
        'item_qty.*.required'   => 'PURCHASE REQUEST ITEMS QUANTITY IS REQUIRED',
        'item_qty.*.regex'   => 'PURCHASE REQUEST ITEMS QUANTITY FORMAT IS INVALID',
        'item_unit.*.required' => 'PURCHASE REQUEST ITEMS UNIT IS REQUIRED',
        'item_price.*.required' => 'PURCHASE REQUEST ITEMS UNIT PRICE IS REQUIRED',
        'item_price.*.regex' => 'PURCHASE REQUEST ITEMS UNIT PRICE FORMAT IS INVALID',
      ]);

        if($validator->fails()){
            $data['status'] = 0;
            $data['errors'] = $validator->messages();
        }else{
            $data['status'] = 0;
            $data['errors'] = 'Successfully Save PUrchase Request';
            $PurchaseNo =new PurchaseNo;
            $department = $request->input('department') ?? session::get('olongapo_emp_depts')->dept_id;

            $PurchaseNo->dept_id =  $department;
            $PurchaseNo->pr_date_dept =  $request->input('pr_no_date');
            $PurchaseNo->pr_purpose =  $request->input('purpose');
            $PurchaseNo->save();
            for($x = 0 ; $x< count($request->input('item_desc'));$x++){
                $datax[] = [
                                        'prno_id' => $PurchaseNo->id,
                                         'description' => $request->input('item_desc.'.$x),
                                          'remarks' => $request->input('item_remarks.'.$x),
                                           'unit' => $request->input('item_unit.'.$x),
                                           'qty' => $request->input('item_qty.'.$x),
                                            'unit_price' => $request->input('item_price.'.$x),
                                            'total_price' => $request->input('item_qty.'.$x)*$request->input('item_price.'.$x),
                                    ];
            }
            $PurchaseNo->pr_items()->insert( $datax );
            return $datax;
        }

        return $data;
    }

    public function pr_edit( Request $request){
        $this->data['pr'] = PurchaseNo::find($request->input('pr_id'));
        $employee_id = Session::get('olongapo_user')->employee_id;
        
        $query = DB::table('olongapo_employee_list')
                    ->select('olongapo_employee_list.dept_id')
                    ->where('id', '=', $employee_id)
                    ->get();
        $dept_id = $query[0]->dept_id;

        $uploads =  DB::table('olongapo_purchase_item_ppmp_upload')
                        ->where('olongapo_purchase_item_ppmp_upload.subdept_id', '=', $dept_id)
                        ->where('olongapo_purchase_item_ppmp_upload.deleted_at', '=', null)
                        ->get();
        $this->data['uploads'] = $uploads; 
        
        return view('department::purchase_request.edit',$this->setup());
    }

    public function save_edit(Request $request){
        if($request->input('cancel')){
            return redirect()->route('dept.index');
        }

        $validator = Validator::make($request->all(), [
                                'pr_no_date'    => 'required|date',
                                'purpose'       => 'required|min:5',
                                'item_desc.*'   => 'required',
                                'item_qty.*'    => ['required','regex:/^(0|[1-9]\d*)(\.\d+)?$/'],
                                'item_unit.*'   =>  'required',
                                'item_price.*'  =>  ['required','regex:/^(0|[1-9]\d*)(\.\d+)?$/'],
                              ],
                              [
                                'pr_no_date.required'   => 'PURCHASE REQUEST DATE IS REQUIRED',
                                'purpose.required'      => 'PURCHASE REQUEST PURPOSE IS REQUIRED',
                                'item_desc.required'  => 'PURCHASE REQUEST ITEMS DESCRIPTION IS REQUIRED',
                                'item_qty.*.required'   => 'PURCHASE REQUEST ITEMS QUANTITY IS REQUIRED',
                                'item_qty.*.regex'   => 'PURCHASE REQUEST ITEMS QUANTITY FORMAT IS INVALID',
                                'item_unit.*.required' => 'PURCHASE REQUEST ITEMS UNIT IS REQUIRED',
                                'item_price.*.required' => 'PURCHASE REQUEST ITEMS UNIT PRICE IS REQUIRED',
                                'item_price.*.regex' => 'PURCHASE REQUEST ITEMS UNIT PRICE FORMAT IS INVALID',
                            ]);

        if($validator->fails()){
            return back()->withInput()->withErrors($validator->messages());
        }else{
            $PurchaseNo =PurchaseNo::find($request->input('pr_id'));
            if($PurchaseNo){
                $PurchaseNo->pr_date_dept =  $request->input('pr_no_date');
                $PurchaseNo->pr_purpose =  $request->input('purpose');
                $PurchaseNo->save();
                   for($x = 0 ; $x< count($request->input('item_desc'));$x++){
                                if($request->input('item_id.'.$x)){
                                        $item =  $PurchaseNo->pr_items()->where('id',$request->input('item_id.'.$x))->first();
                                        $item->description =  $request->input('item_desc.'.$x);
                                        $item->unit =  $request->input('item_unit.'.$x);
                                        $item->qty =  $request->input('item_qty.'.$x);
                                        $item->unit_price =  $request->input('item_price.'.$x);
                                        $item->total_price =  $request->input('item_qty.'.$x)*$request->input('item_price.'.$x);
                                        if($request->input('delete.'.$x) === 'true'){
                                            $item->delete();
                                        }else{
                                            $item->save();
                                        }
                                }else{
                                    $Purchase = new PurchaseNo;
                                    $Purchase->dept_id =  session::get('olongapo_emp_depts')->dept_id;
                                    $Purchase->pr_date_dept =  $request->input('pr_no_date');
                                    $Purchase->pr_purpose =  $request->input('purpose');
                                    $Purchase->save();
             
                                        $datax = [
                                                    'prno_id' => $request->input('pr_id'),
                                                    'description' => $request->input('item_desc.'.$x),
                                                    'remarks' => null,
                                                    'unit' => $request->input('item_unit.'.$x),
                                                    'qty' => $request->input('item_qty.'.$x),
                                                    'unit_price' => $request->input('item_price.'.$x),
                                                    'total_price' => $request->input('item_qty.'.$x)*$request->input('item_price.'.$x),
                                                ];

                                    $Purchase->pr_items()->insert( $datax );
                                }
                    }
                    Session::flash('info', ['Purchase Request Successfully Updated']);
                    return back()->withInput();
            }
            Session::flash('danger', ['Purchase Request ERROR UPDATING PLEASE REFRESH YOUR BROWSER AND TRY AGAIN.']);
            return back()->withInput();
        }
    }

    public function destroy(Request $request){
        $pr_id = $request->input('pr_id');

        for ($i=0; $i < count($pr_id); $i++) { 
            $pr_items = PurchaseItems::where('prno_id', $pr_id[$i])->delete();
            $prno = PurchaseNo::find($pr_id[$i]);
            $prno->delete();
        }
        $data['status'] = 0;
        return $data;
    }
}
