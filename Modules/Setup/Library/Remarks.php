<?php
namespace Modules\Setup\Library;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
*
*/
class Remarks
{
    public function get_remarks($vars){
        $remarks = DB::table($vars['table'])
                            ->where('id','=',$vars['id'])
                            ->get();
        return $remarks[0]->remarks;
    }

    public function add_remarks($vars){
        $remarks = json_decode($this->get_remarks($vars));

        $remarks[count($remarks)] = array(
                    'user_id' => Session::get('olongapo_user')->id,
                    'remarks' => $vars['remarks_msg'],
                    'date' =>  $vars['remarks_date']
            );
        return ($remarks);
    }
}
?>