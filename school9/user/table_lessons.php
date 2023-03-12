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
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Ҷадвали дарсҳои асосии Синфи <?php echo $myclass; ?> <sup><?php echo $mymarks; ?></sup></h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table style="text-align: center; height: 450px; width: 100%; border-color: skyblue;" border="2">
							<tr>
								<td>Ҳ/С</td>
								<td>Душанбе</td>
								<td>Сешанбе</td>
								<td>Чоршанбе</td>
								<td>Панҷшанбе</td>
								<td>Ҷумъа</td>
								<td>Шанбе</td>
							</tr>
							<tr>
								<th>1</th>
								<th>Касбу Ҳунар</th>
								<th>Забони Модарӣ</th>
								<th>Т.ҷисмонӣ</th>
								<th>Забони Модарӣ</th>
								<th>Химия</th>
								<th>Адабиёт</th>
							</tr>
							<tr>
								<th>2</th>
								<th>Химия</th>
								<th>Алгебра</th>
								<th>З.русӣ</th>
								<th>З.русӣ</th>
								<th>Алгебра</th>
								<th>Алгебра</th>
							</tr>
							<tr>
								<th>3</th>
								<th>Ҳуқуқ</th>
								<th>Геометрия</th>
								<th>Т.дин</th>
								<th>Т.Х.Т</th>
								<th>География</th>
								<th>Физика</th>
							</tr>
							<tr>
								<th>4</th>
								<th>Биология</th>
								<th>Адабиёт</th>
								<th>Биология</th>
								<th>Физика</th>
								<th>Экология</th>
								<th>З.хориҷӣ</th>
							</tr>	
							<tr>
								<th>5</th>
								<th>Адабиёт</th>
								<th>Т.Х.Т</th>
								<th>Т.умумӣ</th>
								<th>Т.иттилоотӣ</th>
								<th>З.хориҷӣ</th>
								<th>С.тарбиявӣ</th>
							</tr>
							<tr>
								<th>6</th>
								<th>Нақша</th>
								<th></th>
								<th></th>
								<th>Т.ҷисмонӣ</th>
								<th></th>
								<th></th>
							</tr>
							<tr style="height: 20px;">
								
							</tr>
							
							<tr>
								<th>7</th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
							<tr>
								<th>8</th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
							
							


							
						</table>
						
								
							
							
						

						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
									<?php				  			 
							  		$select = "select * from timetables where class = '$myclass' and mark = '$mymark' ";
							  		$runs = mysqli_query($con, $select);
							  		while($row = mysqli_fetch_assoc($runs)){
							  			$lessons = $row['lessons'];
										$id_day = $row['day'];
									$sel = "select * from week where id = '$id_day'";
									$rower = mysqli_fetch_assoc(mysqli_query($con, $sel));
										$day = $rower['day'];
					  	 ?>
								<div class="tr">
									<div class="thead">
										<?php echo $day; ?>
									</div>
									<div class="tbody">
										<?php echo $lessons; ?>
									</div>
								</div>
							<?php } ?>
						</div>            
					</div>
				</div>

