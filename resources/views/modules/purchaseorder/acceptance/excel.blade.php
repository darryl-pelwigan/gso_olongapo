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
		?>
		@foreach($po_items as $item)
			<tr>
				<td>{{ $item->po_item_id }}</td>
				<td>{{ $item->unit }}</td>
				<td>{{ $item->description }}</td>
				<td>{{ $item->qty }}</td>
			</tr>
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
		<td>_________________</td>
		<td>Date Inspected: </td>
		<td>_________________</td>
	</tr>
	<tr>
		<td>[ ] Complete</td>
		<td>[ ] Inspected, verified and found OK 
			As to quantity and specifications
		</td>
	</tr>
	<tr>
		<td>[ ] Partial</td>
	</tr>
	<tr>
		<td><u>{{ $prop }}</u></td>
		<td>_________________________________</td>
	</tr>
	<tr>
		<td>Property Officer</td>
		<td>Inspection Officer / Committee</td>
	</tr>
</table>