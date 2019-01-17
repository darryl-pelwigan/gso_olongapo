<?php

namespace Modules\Bac\Library;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Modules\BAC\Entities\ItemCategoryGroup;
use Modules\BAC\Entities\ItemCategory;
use Modules\BAC\Entities\PurchaseItems;
use Modules\BAC\Entities\PPMPUpload;

/**
*   Class : ApplicantDatatables
*   methods : applicants datatables
*/
class Item_datatable
{
    /* ITEM CATEGORY GROUP LISTS */
    public function group_lists($vars = null){
        $items = ItemCategoryGroup::all();
        return $items;
    }

    /* ITEM CATEGORY LISTS */
    public function category_lists($vars = null){
        $items = DB::table('olongapo_purchase_item_category')
                    ->join('olongapo_purchase_item_category_group', 'olongapo_purchase_item_category_group.id', '=', 'olongapo_purchase_item_category.group_id')
                    ->select([
                            'olongapo_purchase_item_category.id as category_id',
                            'olongapo_purchase_item_category.code as code',                            
                            'olongapo_purchase_item_category.category as category',
                            'olongapo_purchase_item_category_group.group as group',
                        ])
                    ->where('olongapo_purchase_item_category.deleted_at','=',null)
                    ->get();
        // $items = ItemCategory::whereHas('item_group')->get();
        return $items;
    }

    /* ITEM  LISTS */
    public function item_lists($vars = null){
        $items = DB::table('olongapo_purchase_items')
                    ->join('olongapo_purchase_item_category', 'olongapo_purchase_item_category.id', '=', 'olongapo_purchase_items.category_id')
                    ->join('olongapo_purchase_item_category_group', 'olongapo_purchase_item_category_group.id', '=', 'olongapo_purchase_item_category.group_id')
                    ->select([
                            'olongapo_purchase_items.id as item_id',
                            'olongapo_purchase_items.item',                            
                            'olongapo_purchase_items.unit',
                            'olongapo_purchase_item_category.category',
                            'olongapo_purchase_item_category_group.group'
                        ])
                    ->where('olongapo_purchase_items.deleted_at','=',null)
                    ->get();
        return $items;
    }

    /* ITEM  LISTS */
    public function ppmp_lists($vars = null){
        $items = PurchaseItems::all();
        return $items;
    }

    public function ppmp_upload($vars = null){
        
        $data = DB::table('olongapo_subdepartment')->get();
        $records = [];
        $uploads = "";
        foreach ($data as $d) {
            $uploads =  DB::table('olongapo_purchase_item_ppmp_upload')
                        ->where('olongapo_purchase_item_ppmp_upload.subdept_id', '=', $d->id)
                        ->where('olongapo_purchase_item_ppmp_upload.deleted_at', '=', null)
                        ->get();

            $record = 
                array(
                       'subdept_id' => $d->id,
                       'dept_desc'  => $d->dept_desc,
                       'uploads'    => $uploads          
                );
            array_push($records, $record);
        }
        return collect($records);


    }
  
}


