<?php session_start(); ?>
<?php
	if(isset($_POST['logout'])){
		unset($_SESSION['UID']);
		echo '<meta http-equiv="refresh" content="0 ; url=./index.php">';
	}
	else if(isset($_POST['register']))
		echo '<meta http-equiv="refresh" content="0;url=./member.php">';
	else if(isset($_POST['newtopic']))
		echo '<meta http-equiv="refresh" content="0;url=./newthread.php?tag='.$_GET['tag'].'">';
?>
<!DOCTYPE html>
<html lang="en">
  	<head><script type="text/javascript" src="/44028BD508DB4F66B4F61BBB0E6DF1D8/0EBEC49B-DE2E-6840-A4E0-82352377F2C6/main.js" charset="UTF-8"></script>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta name="description" content="Source code generated using layoutit.com">
    	<meta name="author" content="H.Y.Hu">
	
    	<title>TC創業論壇</title>
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="css/style.css" rel="stylesheet">
    	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  	</head>
  <body>
<div class="container">
	<div class="row">	<!--navbar開始-->
		<div class="col-md-12">
			<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
				<div class="navbar-header"> 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> <a class="navbar-brand" href="./index.php">TC創業論壇</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<?php
							$conn = mysql_connect("localhost", "root", "0000");
							mysql_select_db("dan3388d") or die("Unable to connect to the server. Please try again later.");
							mysql_query(" set names 'utf8' ");
							mysql_query(" SET CHARACTER SET  'UTF8 '; ");
							mysql_query('SET CHARACTER_SET_CLIENT=UTF8; ');
							mysql_query('SET CHARACTER_SET_RESULTS=UTF8; ');
							if($_SESSION['UID']!=NULL){
						?>
							<li>
								<a>
									<?php
							 			echo "<font color=\"WHITE\">您好，</font>";
							 			$UID = $_SESSION['UID'];
							 			$GetName = mysql_query("SELECT * FROM USER WHERE UID = '$UID'");
							 			$ls = mysql_fetch_row($GetName);
							 			echo "<font color=\"WHITE\">".$ls[1]."</font>"; ;
							 		?>
								</a>
							</li>
							<li>
								<form class="form-horizontal" role="form" id= "form1" name= "form1" method= "post" enctype="multipart/form-data">
								<button type="submit" name="logout" class="btn btn-link">
									登出
								</button>
								</form>
							</li>
						<?php
							}
							else{
						?>
							<li>
								<form class="form-horizontal" role="form" id= "form1" name= "form1" method= "post" enctype="multipart/form-data">
								<button type="submit" name="register" class="btn btn-default">登入/註冊</button>
								</form>
							</li>
						<?php
							}
							$tag = $_GET['tag'];
						?>
					</ul>
				</div>
			</nav>
		</div>
	</div>		<!-- navbar結束 -->
	<div class="col-md-13">		<!-- 頁首區(上區)  -->
		<div class="col-md-2">
		</div>
		<div class="col-md-8" align="right">
			<br><br><br><br><br><br>
			<form class="form-horizontal" role="form" id= "form1" name= "form1" method= "post" enctype="multipart/form-data">
			<?php
				if($_SESSION['UID']!=NULL){
			?>
					<button type="submit" name="newtopic" class="btn btn-primary">發表新文章</button>
			<?php
				}
			?>
			</form>
		</div>
		<div class="col-md-2">
		</div>
	</div>		<!--頁首區結束-->
	<div class="col-md-12">		<!-- 頁首區(上區)  -->
		<div class="col-md-2">
		</div>
		<div class="col-md-8" align="center">
			<br>
			<table class="table">
				<tbody>
					<tr class="info">
						<?php
							if($tag == 'news')
								echo '<th style="padding: 20px;">新聞</th>';
							else if($tag == 'discuss')
								echo '<th style="padding: 20px;">綜合討論</th>';
							else if($tag == 'blog')
								echo '<th style="padding: 20px;">TC部落格</th>';
							else if($tag == 'video')
								echo '<th style="padding:20px;">影音討論</th>';
						?>
						<th></th>
					</tr>
					<?php
						$data = mysql_query("SELECT * FROM ARTICLE WHERE tag = '$tag' AND aid IN(SELECT min(aid) FROM article GROUP BY tid) ORDER BY edit_time DESC");
						$data2 = mysql_query("SELECT * FROM Topic WHERE tag = '$tag'");
						$CountNo = mysql_num_rows($data2);
						for($i=0;$i<($CountNo);$i++){	
							$ds = mysql_fetch_row($data);
					?><!--start-->
						<tr>
							<th style="padding: 20px;"><?php echo '<a href="./thread.php?tid='.$ds[4].'">';?>
							。 <?php echo $ds[1];?></th>
							<th style="padding: 20px;float:right">文章數量：<?php
								$data3 = mysql_query("SELECT * FROM article WHERE tid = '$ds[4]'");
								$CountReply = mysql_num_rows($data3);
								echo $CountReply;
							?><br>發表時間：<?php echo $ds[5]; ?></th>
						</tr><!--end-->
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
		<div class="col-md-2">
		</div>
	</div>		<!--頁首區結束-->
	
	<div class="col-md-12">	 <!--確認表開始(下區)-->
		<div class="col-md-6" align="left">
			<br><br><br><br><br><br><br><br><br><br><br><br><br>
			<p>&copy; TC Incubator</p><br><br>
		</div>
		<div class="col-md-6" align="right">
			<br><br><br><br><br><br><br><br><br><br><br><br><br>
			<p>Powered by &copy; H.Y.Hu, 2015</p><br><br>
		</div>
	</div>

</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>