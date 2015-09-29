<?php session_start(); ?>
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
								<?php
								?>
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
						?>
					</ul>
				</div>
			</nav>
		</div>
	</div>		<!-- navbar結束 -->
	<div class="col-md-13">		<!-- 頁首區(上區)  -->
		<div class="col-md-2">
		</div>
		<div class="col-md-8" align="center">
			<br><br><br><br><br><br>
			<table class="table">
				<tbody>
					<tr class="info">
						<th style="padding: 20px;">一般論壇</th>
						<th style="padding: 20px;"></th>
						<th style="padding: 20px;"></th>
					</tr>
					<tr>
						<th style="padding: 20px;"><a href="./main.php?tag=news"> - 新聞</a></th>
						<th style="padding: 20px;"></th>
						<th style="padding: 20px;float:right">文章數量：<?php
							$NewsData = mysql_query("SELECT * FROM article WHERE tag = 'news'");
							$CountNews = mysql_num_rows($NewsData);
							echo $CountNews;
						?></th>
					</tr>
					<tr>
						<th style="padding: 20px;"><a href="./main.php?tag=discuss"> - 綜合討論</a></th>
						<th style="padding: 20px;"></th>
						<th style="padding: 20px;float:right">文章數量：<?php
							$DiscussData = mysql_query("SELECT * FROM article WHERE tag = 'discuss'");
							$CountDiscuss = mysql_num_rows($DiscussData);
							echo $CountDiscuss;
						?></th>
					</tr>
					<tr class="info">
						<th style="padding: 20px;">TC</th>
						<th style="padding: 20px;"></th>
						<th style="padding: 20px;"></th>
					</tr>
					<tr>
						<th style="padding: 20px;"><a href="./main.php?tag=blog"> - TC部落格</a></th>
						<th style="padding: 20px;"></th>
						<th style="padding: 20px;float:right">文章數量：<?php
							$BlogData = mysql_query("SELECT * FROM article WHERE tag = 'blog'");
							$CountBlog = mysql_num_rows($BlogData);
							echo $CountBlog;
						?></th>
					</tr>
					<tr>
						<th style="padding: 20px;"><a href="./main.php?tag=4"> - 影音討論</a></th>
						<th style="padding: 20px;"></th>
						<th style="padding: 20px;float:right">文章數量：<?php
							$VideoData = mysql_query("SELECT * FROM article WHERE tag = 'blog'");
							$CountVideo = mysql_num_rows($VideoData);
							echo $CountVideo;
						?></th>
					</tr>
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

	<?php
		if(isset($_POST['logout'])){
			unset($_SESSION['UID']);
			echo '<meta http-equiv="refresh" content="0 ; url=./index.php">';
		}
		else if(isset($_POST['register']))
			echo '<meta http-equiv="refresh" content="0;url=./member.php">';
	?>

</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>