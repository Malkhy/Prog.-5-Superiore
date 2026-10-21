<?php
$page=$_SERVER['PHP_SELF'];

if (strpos($page,"pages")!== false)
{
	$Add="../pages/";
	$home="../";
	$K=substr($page,strpos($page,"pages")+6);
	if (strpos($K,"/")!== false)
	{
		$Add="../../pages/";
		$home="../../";
	}		
	
}
else
{
	 $Add="pages/";
	 $home="";
}

?>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
		<?php
		echo "<H6>".$page."</H6>";
		?>
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Username</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="<?php echo $home;?>index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="widgets.html"><em class="fa fa-calendar">&nbsp;</em> Widgets</a></li>
			<li><a href="charts.html"><em class="fa fa-bar-chart">&nbsp;</em> Charts</a></li>
			<li><a href="elements.html"><em class="fa fa-toggle-off">&nbsp;</em> UI Elements</a></li>
			<li><a href="panels.html"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Gestione Utenti <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="<?php echo $Add;?>Utenti/Edit.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Nuovo Utente
					</a></li>
					<li><a class="" href="<?php echo $Add;?>Utenti/ListView.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Lista Utenti
					</a></li>
					
				</ul>
			</li>

			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-navicon">&nbsp;</em> Gestione Veterinari <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				
				<ul class="children collapse" id="sub-item-2">
					<li><a class="" href="<?php echo $Add;?>Veterinari/ListViewVet.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Lista dei Veterinari
					</a></li>
				</ul>
			</li>
			
			<li class="parent "><a data-toggle="collapse" href="#sub-item-3">
				<em class="fa fa-navicon">&nbsp;</em> Gestione Soccorritori <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3">

					<li><a class="" href="<?php echo $Add;?>Soccorritori/EditSoc.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Aggiungi Soccorritore
					</a></li>

					<li><a class="" href="<?php echo $Add;?>Soccorritori/ListViewSoc.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Lista dei Soccorritori
					</a></li>
				</ul>
			</li>
			


			<li class="parent "><a data-toggle="collapse" href="#sub-item-4">
				<em class="fa fa-navicon">&nbsp;</em> Accettazione <span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-4">
					<li><a class="" href="<?php echo $Add;?>Accettazione/EditAccettazione.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Aggiungi Scheda di Accettazione
					</a></li>
					<li><a class="" href="<?php echo $Add;?>Accettazione/ListViewAccettazione.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Lista schede di Accettazione
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-5">
				<em class="fa fa-navicon">&nbsp;</em> Gestione Animali <span data-toggle="collapse" href="#sub-item-5" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-5">
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 7
					</a></li>
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 8
					</a></li>
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 9
					</a></li>
				</ul>
			</li>
			<li><a href="login.html"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>

	</div><!--/.sidebar-->
