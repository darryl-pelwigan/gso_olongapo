<?php

namespace Modules\BAC\Http\Controllers;

use Modules\Setup\Init;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Modules\BAC\Entities\PurchaseItems;


class ItemsController extends Controller
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
        $this->data['group'] = DB::table('olongapo_purchase_item_category_group')->get();
        $this->data['category'] = DB::table('olongapo_purchase_item_category')->get();
        return view('bac::items.item_lists',$this->setup());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),
                        [ 'item'           => 'required' ],
                        [ 'unit'           => 'required' ],
                        [ 'category_id'    => 'required' ],
                        [ 'item.required'         => 'Item name is required' ],
                        [ 'unit.required'         => 'Unit name is required' ],
                        [ 'category_id.required'  => 'Category is required' ]
                    );

        if($validator->fails())
        {
            $data['status'] = 0;
            $data['errors'] = $validator->messages();
        }
        else
        {
            $data['status'] = 1;
            $data['errors'] = 'NO Errors';

            if($request->input('item_id') > 0)
            {
                $item = PurchaseItems::find($request->input('item_id'));
                $item->category_id = $request->input('category_id');
                $item->item = $request->input('item');
                $item->unit = $request->input('unit');
                $item->save();
            }else{
                $item = new PurchaseItems;
                $item->category_id = $request->input('category_id');
                $item->item = $request->input('item');
                $item->unit = $request->input('unit');
                $item->save();
            }
            
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
        $data = PurchaseItems::where('id', '=', $request->input('item_id'))->first();
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
        $data = PurchaseItems::where('id', '=', $request->input('item_id'))->first();
        $data->delete();
        return $data;
    }
}
