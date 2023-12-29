<div id='content-top'>
	<h1>Import Results</h1>
	<a href='/admin/vehicles/' class='bforward'><?=lang('web_back_to_list')?></a>
	<span class='clearFix'>&nbsp;</span>
</div>
<table class="pure-table">
	<thead>
		<tr>
			<th>Skipped</th>
			<th>Succesful</th>
			<th>Failed</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?=$res['skipped']?></td>
			<td><?=$res['successful']?></td>
			<td><?=$res['failed']?></td>
		</tr>
	</tbody>
</table>
