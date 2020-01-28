<table>
	<tr>
		<td><b>ACCEPTANCE & INSPECTION REPORT</b></td>
	</tr>
	<tr>
		<td>Republic of the Philippines</td>
	</tr>
	<tr>
		<td>City of Olongapo</td>
	</tr>
	<tr>
		<td>Supplier: </td>
		<td><u>{{ $info->suppl_title }}</u></td>
		<td>AIR No.: </td>
		<td><u>{{ $info->aai_no }}</u></td>
	</tr>
	<tr>
		<td>P.O. No.: </td>
		<td><u>{{ $info->po_no }}</u></td>
		<td>Date: </td>
		<td><u>{{ $info->po_date }}</u></td>
	</tr>
	<tr>
		<td>Invoice No.: </td>
		<td><u>{{ $info->invoice_no }}</u></td>
		<td>Date: </td>
		<td><u>{{ $info->invoice_date }}</u></td>
	</tr>
	<tr>
		<td>Requisitioning Office/Department: </td>
		<td><u>{{ $info->dept_desc }}</u></td>
		<td>Responsibility Center Code</td>
		<td><u>{{$info->subdept_code}}</u></td>
	</tr>
	<thead>
		<tr>
			<th>Item No.</th>
			<th>Unit</th>
			<th>Description</th>
			<th>Quantity</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$total_num_rows = 28;
			$num_rows = $total_num_rows - count($po_items);
			$item_no = 1;
		?>
		@foreach($po_items as $item)
			<tr>
				<td>{{ $item_no }}</td>
				<td>{{ $item->unit }}</td>
				<td>{{ $item->description }}</td>
				<td>{{ $item->qty }}</td>
			</tr>
			<?php
				$item_no++;
			?>
		@endforeach
		@if(count($po_items) < $num_rows)
			@for($i = 0; $i < $num_rows; $i++)
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			@endfor
		@endif
	</tbody>
	<tr>
		<td><b>ACCEPTANCE</b></td>
		<td><b>INSPECTION</b></td>
	</tr>
	<tr>
		<td>Date Received: </td>
		<td><u>{{ \Carbon\Carbon::parse($req['dtr'])->format('F d, Y') }}</u></td>
		<td>Date Inspected: </td>
		<td><u>{{ \Carbon\Carbon::parse($req['dti'])->format('F d, Y') }}</u></td>
	</tr>
	<tr>
		@if($req['status'] == 1)
		<td>[ / ] Complete</td>
		@else
		<td>[   ] Complete</td>
		@endif
		@if(isset($req['inspected']))
		<td>[ / ] Inspected, verified and found OK 
			As to quantity and specifications
		</td>
		@else
		<td>[   ] Inspected, verified and found OK 
			As to quantity and specifications
		</td>
		@endif
	</tr>
	<tr>
		@if($req['status'] == 1)
		<td>[   ] Partial</td>
		@else
		<td>[ / ] Partial</td>
		@endif
	</tr>
	<tr>
		<td><u>{{ $req['prop_emp2'] }}</u></td>
		<td><u>{{ $req['insp_emp2'] }}</u></td>
	</tr>
	<tr>
		<td>Property Officer</td>
		<td>Inspection Officer / Committee</td>
	</tr>
</table>