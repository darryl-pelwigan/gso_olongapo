<table>
  <tr>
    <td>REQUISITION AND ISSUE SLIP</td>
  </tr>
  <tr>
    <td><!--logo--></td>
  </tr>
  <tr>
    <td>Republic of the Philippines</td>
  </tr>
  <tr>
    <td>City of Olongapo</td>
  </tr>
  <tr>
    <td><b>Division: </b></td>
    <td>{{ $info->_main_dept_desc }}</td>
    <td><b>Responsibility Center Code: </b></td>
    <td><b>RIS No.: </b></td>
    <td>{{ $info->ris_no }}</td>
    <td><b>Date: </b></td>
    <td>{{ date('F j Y', strtotime($info->ris_date)) }}</td>
  </tr>
  <tr>
    <td><b>Office: </b></td>
    <td>____________</td>
    <td>____________</td>
    <td><b>SAI No.: </b></td>
    <td>
      @if(!isset($purely_consump))
        {{ $info->sai_no }}
      @endif
    </td>
    <td><b>Date: </b></td>
    <td>
      @if(!isset($purely_consump))
        {{ date('F j Y', strtotime($info->sai_date)) }}
      @endif
    </td>
  </tr>
  <thead>
    <tr>
      <th>Requisition</th>
      <th>Issuance</th>
    </tr>
    <tr>
      <th>Stock No.</th>
      <th>Unit</th>
      <th>Description</th>
      <th></th>
      <th>Quantity</th>
      <th>Quantity</th>
      <th>Remarks</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $count = 1; 
      $grand_po_total = 0;
    ?>
    @foreach($po_items as $item)
      <tr>
        <td>{{ $count }}</td>
        <td>{{ $item->unit }}</td>
        <td>{{ $item->description }}</td>
        <td>{{ $item->qty }}</td>
        <td></td>
        <td></td>
      </tr>
      <?php 
        $count++; 
        if(isset($item->po_total))
          $grand_po_total += $item->po_total;
      ?>
    @endforeach
    @if($count < 33)
      @for($i = $count; $i <= 33; $i++)
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      @endfor
    @endif
    <tr>
      <td>page 1 of 1</td> <!-- to edit -->
      <td>{{-- $grand_po_total --}}</td>
    </tr>
  </tbody>
  <tr>
    <td>Purpose: </td>
    <td>{{ $info->pr_purpose ?? '' }}</td>
    <td></td>
  </tr>
  <thead>
    <tr>
      <th></th>
      <th>Requested By:</th>
      <th></th>
      <th>Approved By:</th>
      <th></th>
      <th>Issued By:</th>
      <th>Received By:</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Signature: </td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <?php
      $name = explode('/', $info->name_app);
    ?>
    <tr>
      <td>Printed Name: </td>
      <td>{{ strtoupper($info->requested_by ?? '') }}</td>
      <td></td>
      <td>{{ $name[0] }}</td>
      <td>{{ $name[1] }}</td>
      <td>{{ $info->issued_by }}</td>
      <td>{{ $info->received_by }}</td>
    </tr>
    <?php
      $des = explode('/', $info->designation_app);
    ?>
    <tr>
      <td>Designation: </td>
      <td>{{ strtoupper($info->designated_req ?? '') }}</td>
      <td></td>
      <td>{{ $des[0] }}</td>
      <td>{{ $des[1] }}</td>
      <td>{{ $info->issued_des }}</td>
      <td>{{ $info->received_des }}</td>
    </tr>
    <tr>
      <td>Date: </td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>