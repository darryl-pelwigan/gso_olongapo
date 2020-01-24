<?php

namespace Modules\BAC\Http\Controllers;

use Modules\Setup\Init;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Modules\BAC\Entities\PurchasePPMPApproval;
use Modules\PurchaseRequest\Entities\PurchaseItems;
use Modules\PurchaseRequest\Entities\PurchaseNo;

class PurchasePPMPApprovalController extends Controller
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


    /**
     * Display a listing of the resource.
     * @return Response
    */
    public function index()
    {
        return view('bac::request.index',$this->setup());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        $data['status'] = 1
        $data['errors'] = 'NO Errors';

        $approval_stat = $request->input('approval');
        $pr_id = $request->input('pr_id');
        $remarks = $request->input('remarks');
        $date = date('Y-m-d', strtotime($request->input('date')));
        $ppmp_no = $request->input('ppmp_no');

        $req = PurchasePPMPApproval::where('request_no_id', '=', $pr_id)->first();

        if(count($req) == 0){
            $approval = new PurchasePPMPApproval;
            $approval->request_no_id = $pr_id;
            $approval->status = $approval_stat;
            $approval->remarks = $remarks;
            $approval->ppmp_no = $ppmp_no;
            $approval->ppmp_date = $date;
            $approval->save();
        }else{
            $approval = PurchasePPMPApproval::where('request_no_id', '=', $pr_id)->first();
            $approval->status = $approval_stat;
            $approval->remarks = $remarks;
            $approval->ppmp_no = $ppmp_no;
            $approval->ppmp_date = $date;
            $approval->save();
        }
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(Request $request)
    {
        $this->data['edit_view']   = $request->input('view')  ? 'view' :  'edit';
        $this->data['pr'] = PurchaseNo::find($request->input('pr_id'));
        $this->data['ppmp'] = PurchasePPMPApproval::where('request_no_id', '=', $request->input('pr_id'))->first();

        return view('bac::request.edit',$this->setup());

    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('purchaseitems::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request)
    {

    }
}
