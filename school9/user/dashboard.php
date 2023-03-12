<?php 
	$select = "select * from ".$who." where login = '$login' and password = '$password'";
	$run = mysqli_fetch_assoc(mysqli_query($con, $select));
		$id = $run['id'];
		$name = $run['name'];
		$surname = $run['surname'];
		$img = $run['img'];
		$number = $run['phone'];
		$class = $run['class'];
		$id_mark = $run['mark'];
			$select = "select * from mark where id = '$id_mark'";
			$row = mysqli_fetch_assoc(mysqli_query($con, $select));
				$mark = $row['mark'];

	# # # # # # # # # # # # #
	# T O D A Y ' S  B A L  #
	# # # # # # # # # # # # #
			
		$date = date("Y.m.d");
		$slc = "select * from journal where pupils_id = '$id' and date = '$date'";
			$runs = mysqli_query($con, $slc);
			$count_marks = mysqli_num_rows($runs);

	# # # # # # # # # # #
	# H O M E T A S K S #
	# # # # # # # # # # #

		$slc = "select * from hometask where class = '$class' and id_mark = '$id_mark'";
			$runs = mysqli_query($con, $slc);
			$count_tasks = mysqli_num_rows($runs);

	# # # # # # # # #
	# K U S H I S H #
	# # # # # # # # #

		$day=date('Y.m.d', strtotime('-7 day'));
		$slc = "select sum((bal)) from journal where date between '$day' and '$date' and pupils_id = '$id'";
			$runs = mysqli_query($con, $slc);
			$row = mysqli_fetch_assoc($runs);
				$sumbal = $row['sum((bal))'];

		$slc = "select * from journal where pupils_id = '$id'";
			$runs = mysqli_query($con, $slc);
			$count_bal = mysqli_num_rows($runs);
		$slc = "select * from journal where pupils_id = '$id' and bal = '0'";
			$runs = mysqli_query($con, $slc);
			$count_absent = mysqli_num_rows($runs);

			$fourth = $sumbal/($count_bal - $count_absent);
	
	# # # # # #
	# N E W S #
	# # # # # #
	
		$slc = "select * from news";
			$runs = mysqli_query($con, $slc);
			$count_news = mysqli_num_rows($runs);
 ?>
			<div class="row-fluid">		
				<div class="span3 statbox purple" ontablet="span6" ondesktop="span3">
					<div class="number"> <?php echo $count_marks; ?> <i class="icon-ok-circle"></i></div>
					<div class="title">Шумораи имрӯзаи баҳоҳо</div>
					<div class="footer" style="color: #000 !important;">
						<a href="index.php?journal"> <b> Муфассал </b></a>
					</div>	
				</div>
				<div class="span3 statbox green" ontablet="span6" ondesktop="span3">
					<div class="number"> <?php echo $count_tasks; ?> <i class="icon-edit"></i></div>
					<div class="title">Вазифаҳо</div>
					<div class="footer" style="color: #000 !important;">
						<a href="index.php?hometask"> <b> Муфассал </b></a>
					</div>
				</div>
				<div class="span3 statbox blue noMargin" ontablet="span6" ondesktop="span3">
					<div class="number"> <?php echo $fourth; ?> <i class="icon-check"></i></div>
					<div class="title">Кӯшиш дар як ҳафта</div>
					<div class="footer" style="color: #000 !important;">
                        <a href="index.php?journal"> <b> Муфассал </b></a>
					</div>
				</div>
				<div class="span3 statbox yellow" ontablet="span6" ondesktop="span3">
					<div class="number"> <?php echo $count_news; ?> <i class="icon-list-alt"></i></div>
					<div class="title">Хабарҳо</div>
					<div class="footer" style="color: #000 !important;">
                    <a href="index.php?news"> <b> Муфассал </b></a>
					</div>
				</div>	
				
            </div>		
            <div class="profile-box">
                    <img src="uploaders/<?php echo $img; ?>" alt="profile-img" title="IMG">
                    <div class="profile-text">
                        <p><?php echo $name." ".$surname;?></p>
                        <big><?php echo $number; ?></big> &nbsp; | &nbsp;
                        <big><?php echo $class; ?> <sup> <?php echo $mark; ?></sup></big>
                        <a onclick="window.open('index.php?edit-info','_self');" class="edita"><em class="icon-edit emicon"></em></a>
                    </div>
            </div>

			
			
						
			
            