<div class="news-content">
	<?php 
		$select = "select * from news";
		$run = mysqli_query($con, $select);
		while($view_news = mysqli_fetch_assoc($run)){
	 		$title = $view_news['title'];
	 		$descr = $view_news['descr'];
	 		$img = $view_news['img'];
	 		$date = $view_news['date'];
	 ?>
	<div class="news">
		<h2><?php echo $title; ?></h2>
		<p><?php echo substr($descr, 0 , 300)."..."; ?></p>
		<a href="news">муфассал</a>
	</div>	
	<?php } ?>
</div>