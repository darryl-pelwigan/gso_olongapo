<?php

namespace Modules\Administrator\Http\Controllers;

use Modules\Setup\Init;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Administrator\Entities\Holiday;
use Illuminate\Support\Facades\DB;


class HolidayController extends Controller
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
        $this->data['holidays'] = Holiday::all();
        return view('administrator::holiday.index',$this->setup());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        if($request['holiday_id'] > 0)
        {
            $holiday = Holiday::find($request['holiday_id']);
            $holiday->holiday = $request['holiday'];
            $holiday->description = $request['description'];
            $holiday->save();
        }else{
            $holiday = new Holiday;
            $holiday->holiday = $request['holiday'];
            $holiday->description = $request['description'];
            $holiday->save();
        }
        $data['status'] = 1;
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
        $data = Holiday::find($request->input('id'));
        $data->delete();
        return $data;
    }
}
