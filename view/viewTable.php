<link rel="stylesheet" href="css/styleTable.css">
<script language="JavaScript" type="text/javascript" src="js/tableStyle.js"></script>


<?php
if($rows){
	$n=count($rows);
	$m=count($rows[0]);
	$keys =array_keys($rows[0]);
}
else {
	$n=0;
	$m=0;
}

$i=0;
$j=0;
?>
<h3><?php echo 'Table: '.ucfirst($table_name); ?></h3>
<div id="" class="container">
	<div class="row">
		<div class="col-md-3">
				<form action="#" method="get">
						<div class="input-group">

								<input class="form-control" id="system-search" name="q" placeholder="Search for" required>

						</div>
				</form>
		</div>
		<div >
			<div class="table-responsive-vertical shadow-z-1" >
						 <table id="table" class="table table-list-search table-hover table-mc-light-blue">
													<thead>
															<tr>

															<?php
															if($n>0 && $m>0){
															while(array_key_exists($i,$keys)) {
																	echo  " <th>".ucfirst(strtolower($keys[$i]))."</th>";
																	$i++;
																}
																$i=0;
																?>
															</tr>
													</thead>
													<tbody>
													<?php  while(array_key_exists($i, $rows) && array_key_exists($keys[$j],$rows[$i]) && $i<$n && $j<$m){
																echo "<tr>";
																while($i<$n && $j<$m){

																		echo "<td data-title='/'>".ucfirst(strtolower($rows[$i][$keys[$j]]))."</td>";
																		$j++;
																}
															$j=0;
															echo "</tr>";
															$i++;
														}}?>

													</tbody>
											</table>
					</div>
				</div>

	</div>
</div>
