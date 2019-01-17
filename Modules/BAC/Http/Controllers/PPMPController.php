<?php

namespace Modules\BAC\Http\Controllers;

use Modules\Setup\Init;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Modules\BAC\Entities\PPMPUpload;

class PPMPController extends Controller
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
        $this->data['templatex'] = DB::table('olongapo_bac_template')->select('id','template_desc','code')->get();
        return view('bac::ppmp.index',$this->setup());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        $data['status'] = 1;
        $data['errors'] = 'NO Errors';

        $imageName = date('Y-m-d').time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('ppmp'), $imageName);

        $upload = new PPMPUpload;;
        $upload->subdept_id = $request->input('subdept_id');
        $upload->year = date('Y');
        $upload->month = date('F');
        $upload->file_upload = $imageName;
        $upload->remarks = $request->input('filename');
        $upload->save();
            
         return redirect('bac/ppmp');
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
        $data = PPMPUpload::where('subdept_id', '=', $request->input('dept_id'))->get();
        return $data;
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
        $data = PPMPUpload::where('id', '=', $request->input('upload_id'))->first();
        $data->delete();
        return $data;
    }
}
