<table class="table table-bordered table-striped " id="ppe-mnthly-report">
                      <thead>
                      <tr id="test">
                              <td><input style="width:60px;" type="text" class="form-control" /></td>
                              <td><input style="width: 79px;" type="text" class="form-control" /></td>
                              <td><input style="width: 179px;" type="text" class="form-control" /></td>
                              <td><input style="width:60px;" type="text" class="form-control" /></td>
                              <td><input style="width:100px;"  type="text" class="form-control" /></td>
                              <td><input style="width:50px;" type="text" class="form-control" /></td>
                              <td><input style="width:70px;" type="text" class="form-control" /></td>
                              <td><input style="width:70px;" type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                              <td><input tyle="width:70px;"  type="text" class="form-control" /></td>
                        </tr>
                        <tr>
                              <th>Date</th>
                              <th>Control #</th>
                              <th>DESCRIPTION</th>
                              <th>PROPERTY CODE</th>
                              <th>PO#</th>
                              <th>QTY</th>
                              <th>UNIT VALUE</th>
                              <th>TOTAL VALUE</th>
                              <th>ACCOUNTABLE PERSON</th>
                              <th>DEPARTMENT</th>
                              <th>SUPPLIER</th>
                              <th>INVOICE</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                </table>

<script type="text/javascript">
$.fn.loadAddedApplicants = function(){
  $('#ppe-mnthly-report').dataTable({
    columns: [
                {
                  title: 'Date',
                },
                {
                  title: 'Control #',
                },
                {
                  title: 'DESCRIPTION',
                }
                ,
                 {
                  title: 'PROPERTY CODE',
                }
                ,
                {
                  title: 'PO#',
                }
                ,
                {
                  title: 'QTY',
                }
                ,
                {
                  title: 'UNIT VALUE',
                }
                ,
                {
                  title: 'TOTAL VALUE',
                },
                {
                  title: 'ACCOUNTABLE PERSON',
                }
                ,
                {
                  title: 'DEPARTMENT',
                }
                ,
                {
                  title: 'SUPPLIER',
                }
                ,
                {
                  title: 'INVOICE',
                }


              ],
              data : {!! json_encode($tbody) !!},
              rowsGroup: [// Always the array (!) of the column-selectors in specified order to which rows groupping is applied
                0,
                1,
                9,
                11
              ],
  }).dataTableSearch(500);
};
$.fn.loadAddedApplicants();
</script>