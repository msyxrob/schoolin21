<?php 
    if (!isset($_SESSION['login'])) {
		echo "<script>window.open('login.php','_self')</script>";
	}else{
?>
    <!-- start: Main Menu -->
             <div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li>
                            <a href="index.php?dashboard">
                                <i class="icon-dashboard"></i><span class="hidden-tablet"> Асосӣ</span>
                            </a>
                        </li>	
                        <li>
                            <a href="index.php?class">
                                <i class="icon-group"></i><span class="hidden-tablet"> Ҳамсинфон<?php if($who == 'parents'){?>и фарзанд<?php } ?></span>
                            </a>
                        </li>	
                        <li>
                            <a href="index.php?table_lessons">
                                <i class="icon-table"></i><span class="hidden-tablet"> Ҷадвали дарсҳо</span>
                            </a>
                        </li>	
                        <li>
                            <a href="index.php?journal">
                                <i class="icon-bar-chart"></i><span class="hidden-tablet"> Журнал</span>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?news">
                                <i class="icon-list-alt"></i><span class="hidden-tablet"> Хабарҳо</span>
                            </a>
                        </li>	
                        <li>
                            <a href="index.php?hometask">
                                <i class="icon-book"></i><span class="hidden-tablet"> Вазифаҳо</span>
                            </a>
                        </li>
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
<?php } ?>