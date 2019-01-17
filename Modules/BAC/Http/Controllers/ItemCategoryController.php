<?php

namespace Modules\BAC\Http\Controllers;

use Modules\Setup\Init;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Modules\BAC\Entities\ItemCategory;


class ItemCategoryController extends Controller
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
        
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),
                        [ 'category'            => 'required' ],
                        [ 'group_id'            => 'required' ],
                        [ 'category.required'   => 'Category name is required.' ],
                        [ 'group_id.required'   => 'Group name is required.' ]
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
            if($request->input('category_id') > 0)
            {
                $groupitem = ItemCategory::find($request->input('category_id'));
                $groupitem->category = $request->input('category');
                $groupitem->code = $request->input('code');
                $groupitem->group_id = $request->input('group_id');
                $groupitem->save();
            }else{
                $groupitem = new ItemCategory;
                $groupitem->category = $request->input('category');
                $groupitem->code = $request->input('code');
                $groupitem->group_id = $request->input('group_id');
                $groupitem->save();
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
        $data = ItemCategory::where('id', '=', $request->input('category_id'))->first();
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
        $data = ItemCategoryGroup::find($request->input('group_id'));
        $data->delete();
        return $data;
    }
}
