<?php

namespace Modules\BAC\Http\Controllers;

use Modules\Setup\Init;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use PDF;
use NumberFormatter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class BACController extends Controller
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
        $this->data['templatex'] = DB::table('olongapo_bac_template')->select('id','template_desc','code')->get();
        return view('bac::bac.bac-approval',$this->setup());
    }

    public function get_bac(Request $request){


        $this->data['bac'] = $request->input('control_id');

        $bac_template = DB::table('olongapo_bac_template')->find($request->input('bac_template'));

        $this->data['bac_que'] = DB::table('olongapo_bac_control_info')
                                                            ->leftJoin('olongapo_bac_source_fund','olongapo_bac_source_fund.id','=','olongapo_bac_control_info.sourcefund_id')
                                                            ->leftJoin('olongapo_bac_category','olongapo_bac_category.id','=','olongapo_bac_control_info.category_id')
                                                            ->join('olongapo_absctrct_pubbid_apprved','olongapo_absctrct_pubbid_apprved.id','=','olongapo_bac_control_info.apprved_pubbid_id')
                                                            ->join('olongapo_absctrct_pubbid','olongapo_absctrct_pubbid.id','=','olongapo_absctrct_pubbid_apprved.pubbid')
                                                            ->leftJoin('supplier_info','supplier_info.id','=','olongapo_absctrct_pubbid.supplier_id')
                                                            ->leftJoin('supplier_address','supplier_address.supplier_id','=','supplier_info.id')
                                                            ->leftJoin('olongapo_purchase_request_no','olongapo_purchase_request_no.id','=','olongapo_bac_control_info.prno_id')
                                                            ->leftJoin('olongapo_subdepartment','olongapo_subdepartment.id','=','olongapo_purchase_request_no.dept_id')
                                                            ->select(
                                                                    'olongapo_bac_control_info.id as bac_id'
                                                                    ,'olongapo_bac_control_info.bac_control_no','olongapo_bac_control_info.prno_id','olongapo_bac_control_info.amount','olongapo_bac_control_info.bac_date'
                                                                    ,'olongapo_bac_source_fund.description as sof'
                                                                    ,'olongapo_bac_category.description as bac_cat'
                                                                    ,'supplier_info.title as supplier','supplier_address.province','supplier_address.city_mun','supplier_address.brgy','supplier_address.details  as supp_addr_d'
                                                                    ,'olongapo_purchase_request_no.pr_no','olongapo_purchase_request_no.pr_date'
                                                                    ,'olongapo_subdepartment.dept_desc'
                                                                )
                                                            ->where('olongapo_bac_control_info.id' , '=',$this->data['bac'])
                                                            ->get();
            $this->data['bac_list'] = $this->data['bac_que'][0];
            $this->data['bac_control_no'] = $this->data['bac_list']->bac_control_no;
            $amount = $this->_setnumberFormater($this->data['bac_list']->amount);
            // $amount = $this->data['bac_list']->amount;

             $this->data['committee'] = db::table('olongapo_bac_awards_committee')
                                        ->join('olongapo_position','olongapo_position.id','=','olongapo_bac_awards_committee.employee_bacposition')
                                        ->select([
                                                    'olongapo_position.title',
                                                    'olongapo_bac_awards_committee.employee_name'
                                                ])
                                        ->where('olongapo_bac_awards_committee.deleted_at','=',null)
                                        ->get();

        $this->data['approved_by'] = db::table('olongapo_bac_awards_committee_approved_by')
                                        ->join('olongapo_position','olongapo_position.id','=','olongapo_bac_awards_committee_approved_by.employee_bacposition')
                                        ->select([
                                                    'olongapo_position.title',
                                                    'olongapo_bac_awards_committee_approved_by.employee_name'
                                                ])
                                        ->where('olongapo_bac_awards_committee_approved_by.deleted_at','=',null)
                                        ->orderBy('olongapo_bac_awards_committee_approved_by.employee_bacposition', 'asc')
                                        ->get();

        $this->data['attested_by'] = db::table('olongapo_bac_awards_committee_attested_by')
                                        ->join('olongapo_position','olongapo_position.id','=','olongapo_bac_awards_committee_attested_by.employee_bacposition')
                                        ->select([
                                                    'olongapo_position.title',
                                                    'olongapo_bac_awards_committee_attested_by.employee_name'
                                                ])
                                        ->where('olongapo_bac_awards_committee_attested_by.deleted_at','=',null)
                                        ->get();


        $bac_template = json_decode($bac_template->template);
        $bac_template = str_replace('[department]','<u><strong>'.$this->data['bac_list']->dept_desc.'</strong></u>',$bac_template);
        $bac_template = str_replace('[pr_no]','<u><strong>'.$this->data['bac_list']->pr_no.'</strong></u>',$bac_template);
        $bac_template = str_replace('[prno_date]','<u><strong>'.$this->data['bac_list']->pr_date.'</strong></u>',$bac_template);
        $bac_template = str_replace('[bac_categ]','<u><strong>'.$this->data['bac_list']->bac_cat.'</strong></u>',$bac_template);
        $bac_template = str_replace('[company_name]','<u><strong>'.$this->data['bac_list']->supplier.'</strong></u>',$bac_template);
        $bac_template = str_replace('[company_addr]','<u><strong>'.$this->data['bac_list']->province.'</strong></u>',$bac_template);
        $bac_template = str_replace('[pr_total_amount]','<u><strong>'.($amount).'</strong></u>',$bac_template);
        $bac_template = str_replace('[bac_date]','<u><strong>'.$this->data['bac_list']->bac_date.'</strong></u>',$bac_template);
        $bac_template = str_replace('[dept_name]','<u><strong>'.$this->data['bac_list']->dept_desc.'</strong></u>',$bac_template);
        $current_date = date('dS').' day of '. date('F Y');
        $bac_template = str_replace('[current_date]','<u><strong>'.$current_date.'</strong></u>',$bac_template);



        $this->data['bac_template'] = $bac_template ;


        $pdf = PDF::loadView('bac::bac.view-bac-approval',$this->setup())->setPaper($request->input('bac_template_paper_size'), $request->input('bac_template_orientation'));



        return $pdf->stream('bac_.pdf');
    }


    function _setnumberFormater($ammount){
        // phpinfo();
        // die();
       $ammountz = explode('.', $ammount);
        $f = new NumberFormatter("en_US", NumberFormatter::SPELLOUT);

        if($ammountz[1]>1){
            $f->setTextAttribute(NumberFormatter::DEFAULT_RULESET, "%spellout-cardinal");
            return   ucwords($f->format($ammountz[0])) .' and '.$ammountz[1].'/100 only ( Php '.number_format($ammount,2).')';
        }
        else{
            $f->setTextAttribute(NumberFormatter::DEFAULT_RULESET, "%spellout-cardinal");
            return   ucwords($f->format($ammountz[0])) .' only ( Php '.number_format($ammount,2).')' ;
        }
    }


}
