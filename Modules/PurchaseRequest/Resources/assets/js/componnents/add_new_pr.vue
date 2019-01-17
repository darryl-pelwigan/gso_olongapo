<div class="modal fade" id="add_purchase_request_modal" tabindex="-1" role="dialog" aria-labelledby="add_purchase_request_modalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="add_purchase_request_modalLabel"> <span></span></h4>
      </div>
      <div class="modal-body">
        <div id="status"></div>
        <div id="contents-menu">
            <form class="form-horizontal" id="add_purchase_request">
            <input type="hidden" id="update_check_date" value="">
              <div class="box-body">
                <div id="statusC"></div>

                <div class="form-group">

                     <label for="pr_no" class="col-sm-2 control-label">DEPT.</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="pr_dept_desc"  placeholder="Dept" />
                        <input type="hidden" class="form-control" id="pr_dept_id" name="pr_dept_id" />
                        <input type="hidden" class="form-control" id="pr_dept_code" name="pr_dept_code"/>
                        <input type="hidden" class="form-control" id="pr_dept_subcode" name="pr_dept_subcode"/>

                    </div>

                     <label for="pr_no" class="col-sm-2 control-label">PR DATE. : </label>
                        <div class="col-sm-2">
                        <input type="text" class="form-control" id="pr_no_date" name="pr_no_date" placeholder="PR NO DATE" />
                    </div>
                </div>

                <div class="form-group">
                     <label for="pr_no" class="col-sm-2 control-label">PR NO.</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="pr_no_dis"  name="pr_no_dis"    placeholder="PR NO" disabled="true" />
                        <input type="hidden" class="form-control" id="pr_no"  name="pr_no"  />
                    </div>
                </div>

                <button type="button" class="btn btn-success btn-sm pull-right" id="add_items"><i class="fa fa-plus"></i></button>

                <table class="table table-striped" id="items_list">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Description</th>
                      <th>Remarks</th>
                      <th>Qty</th>
                      <th>unit</th>
                      <th>price</th>
                      <th>supplier</th>
                      <th>action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr id="item_1">
                      <td>1</td>
                      <td><textarea class="form-control" placeholder="Description" name="item_desc[1]"></textarea></td>
                      <td><textarea class="form-control" placeholder="Remarks" name="item_remarks[1]"></textarea></td>
                      <td><input class="form-control" type="text" name="item_qty[1]" /></td>
                      <td><input class="form-control" type="text" name="item_unit[1]" /></td>
                      <td><input class="form-control" type="text" name="item_price[1]" /></td>
                      <td><input class="form-control item_supplier" type="text" data-supplier="1" name="item_supplier[1]" /></td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>


                <div id="other_content_b"></div>


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                <button type="button" class="btn btn-info pull-right" id="submit_butts" onclick="$(this).sentPurchaseRequest();">Submit</button>
              </div>
              <!-- /.box-footer -->
              <input type="hidden" name="removetx_items" id="removetx_items" value="">
              <input type="hidden" name="pr_id_update" id="pr_id_update" value="">
              {{csrf_field()}}
            </form>

        </div>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>