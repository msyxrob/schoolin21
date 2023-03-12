<?php 

						  			$sel = "select * from pupils where login = '$login' and password = '$password'";
					 				$runer = mysqli_query($con, $sel);
					 				$run = mysqli_fetch_assoc($runer);
					  					$myclass = $run['class'];
					  					$mymark = $run['mark'];
					  					$sl = "select * from mark where id = '$mymark'";
					  					$slc = mysqli_fetch_assoc(mysqli_query($con, $sl));
					  							$mymarks = $slc['mark'];
?>
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
						  		
							  <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 162px;">Ном</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="surname: activate to sort column ascending" style="width: 231px;">Фамилия</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Phone_number: activate to sort column ascending" style="width: 132px;">Рақами телефон</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Sex: activate to sort column ascending" style="width: 148px;">Ҷинс</th></tr>
						  </thead>   
						  
					  <tbody role="alert" aria-live="polite" aria-relevant="all">
					  	<?php				  			 
							  		$select = "select * from pupils where class = '$myclass' and mark = '$mymark'";
							  		$runs = mysqli_query($con, $select);
							  		while($row = mysqli_fetch_assoc($runs)){
							  			$logins = $row['login'];
							  			$name = $row['name'];
							  			$surname = $row['surname'];
							  			$number = $row['phone'];
										$id_pol = $row['id_pol'];
					  	 ?>
					  	<tr class="odd">
								<td class="sorting_1"><?php echo $name; ?></td>
								<td class="center "><?php echo $surname; ?></td>
								<td class="center "><?php echo $number; ?></td>
								<td class="center ">
									<?php switch ($id_pol) {	
										case '1':
											 ?><span class='label label-info'>писар</span><?php
										break;

										case '2':  
												 ?><span class='label label-important'>духтар</span><?php
										break;
										
									} ?>
								</td>
							</tr>
						<?php  }?>
					</tbody></table></div>            
				</div>
			</div>