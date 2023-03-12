<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon white tasks"></i><span class="break"></span>Синфи <?php echo $myclass; ?> <sup><?php echo $mymarks; ?></sup></h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid"><table class="table table-striped table-bordered bootstrap-datatable datatable dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
						  <thead>
						  		
							  <tr role="row">
							  	
							  	<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 162px;">Фан</th>
							  	
							  	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="surname: activate to sort column ascending" style="width: 231px;">Муаллими фаннӣ</th>
							  	
							  	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Phone_number: activate to sort column ascending" style="width: 132px;">Баҳо</th>

							  	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Sex: activate to sort column ascending" style="width: 148px;">Сана</th></tr>
						  </thead>   
						  
					  <tbody role="alert" aria-live="polite" aria-relevant="all">
					  	<?php 
					  		$select = "select * from journal where pupils_id = '$id'";
					  		$get_marks = mysqli_query($con, $select);
					  		while($get = mysqli_fetch_assoc($get_marks)){
					  			$id_subject = $get['id_subject'];
					  			$bal = $get['bal'];
					  			$date = $get['date'];
					  			$slc = "select * from subjects where id = '$id_subject'";
								$row = mysqli_fetch_assoc(mysqli_query($con, $slc));
					  				$teacher = $row['teacher'];
					  				$subject = $row['subject'];
					  	?>
					  	<tr class="odd">
							<td class="sorting_1"><?php print $subject; ?></td>
							<td class="center "><?php print $teacher; ?></td>
							<td class="center ">
								<?php
									switch ($bal) {
										case '2':
											echo "<span class='label label-important'> ".$bal." </span>";
											break;
										
										case '3':
											echo "<span class='label label-warning'> ".$bal." </span>";
											break;
										
										case '4':
											echo "<span class='label label-info'> ".$bal." </span>";
											break;
										
										case '5':
											echo "<span class='label label-success'> ".$bal." </span>";
											break;

										default:
											echo "<span class='label label-default'> ".$bal." </span>";
											break;
									}
								?>
							</td>
							<td class="center "><?php print $date; ?></td>
						</tr>
					<?php } ?>
					</tbody></table></div>            
				</div>
			</div>