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
							$tid = $_GET['tid'];
							$data = mysql_query("SELECT * FROM ARTICLE WHERE tid = '$tid'");
							$ds = mysql_fetch_row($data);
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
						<th style="padding: 20px;background:#6495ED"><p style="color:white"><?php echo $ds[1]?></p></th>
					</tr>
					<tr>
						<td>
							<div>
							<?php
								$art_data = mysql_query("SELECT * FROM ARTICLE WHERE tid = '$tid' ORDER BY edit_time DESC");
								$CountArt = mysql_num_rows($art_data);
								for($i=0;$i<($CountArt);$i++){
									$rs = mysql_fetch_row($art_data);
									$uid = $rs[7];
									$user_data = mysql_query("SELECT * FROM USER WHERE uid = '$uid'");
									$us = mysql_fetch_row($user_data);
									$userstat = mysql_query("SELECT * FROM ARTICLE WHERE uid = '$uid'");
									$CountUserArt = mysql_num_rows($userstat);
									$is = mysql_fetch_row($userstat);
							?>
								<br>
								<div class="post" style="overflow:hidden">
									<div class="post_author" style="background:#f5f5f5;padding:5px;overflow:hidden;border:1px solid #ddd;-moz-background-clip: padding;-webkit-background-clip: padding-box;-webkit-box-shadow:inset 0 0 1px 1px #fff;-moz-box-shadow: inset 0 0 1px 1px #fff;box-shadow: inset 0 0 1px 1px #fff;text-shadow:1px 1px 0px #fff;font-size: 14px;font-style: normal;">
										<div class="author image" style="float:left ; margin-right:3px">
											<img src="./image/TC_defaultuser.png" alt width="70" height="80">
										</div>
										<div class="author info" style="float: left; padding: 6px 8px; font-size: 14px; font-style: normal;">
											<strong><?php echo $us[1]?></strong>
											<br>
											<span><p style="color:#999"><?php echo $us[5]?></p></span>
										</div>
										<div class="author stat" style="float: right; padding: 3px 10px 3px 5px; color: #666; line-height: 1.3; font-size: 14px; font-style: normal;">
											文章總數 <?php echo $CountUserArt;?><br>
											加入時間 <?php echo $us[4];?><br>
										</div>
									</div>
									<div class="post content" style="padding: 9px 10px 5px 10px;">
										<div class="post head" style="padding-bottom: 4px;border-bottom: 1px dashed #ddd;margin-bottom: 4px;">
											<div class="float_right" style="vertical-align: top;float: right;"><strong style="color:deepskyblue">#<?php echo $i+1 ?></strong></div>
											<span><?php echo $rs[5]?></span>
										</div>
										<div class="post_body scaleimages" style="padding: 12px 0;line-height: 1.5;">
											<?php echo $rs[2]?>
										</div>
									</div>
								</div>
							<?php
								}
							?>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
			<form class="form-horizontal" role="form" id= "form1" name= "form1" method= "post" enctype="multipart/form-data">
				<?php
					if($_SESSION['UID']!=NULL){
				?>
				<table border="0" cellspacing="0" cellpadding="5" class="tborder">
					<thead>
						<tr>
							<td class="thead" colspan="2" style="background:#6495ED;border-radius: 3px;text-shadow: 1px 1px 0px rgba(0, 0, 0, 0.2);padding: 10px;height: 25px;color: #fff;font-size: 14px;font-weight: lighter;">
								<div><strong>快速回覆</strong></div>
							</td>
						</tr>
					</thead>
					<tbody style="" id="quickreply_e">
						<tr>
        			      	<td class="trow1" valign="top" width="4%">
							</td>
							<td class="trow1">
								<div style="width: 95%">
									<textarea style="width: 100%; padding: 4px; margin: 0;" rows="8" cols="80" name="content" id="message" tabindex="1"></textarea>
								</div> <br>				                  
				                 <div class="float_right" style="margin-top: -10px; margin-right: 4%;"><button type="submit" name="reply" class="btn btn-primary">回覆</button></div>
							</td>
						</tr>
					</tbody>
				</table>
				<?php
					}
				?>
			</form>
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
		else if(isset($_POST['reply'])){
			$totalart = mysql_query("SELECT * FROM article");
			$CountTotal = mysql_num_rows($totalart);
			$new_aid = $CountTotal+1;
			$content = mb_convert_encoding($_POST['content'], "UTF-8", "auto");
			$CurrentNow = mysql_query("SELECT NOW()");
				while($row=mysql_fetch_array($CurrentNow)){ 
					$cd = $row['NOW()'];
				}
			mysql_query("INSERT INTO Article(aid, topic, content, tag, tid, edit_time, views, uid) VALUES ('$new_aid','$ds[1]','$content','$ds[3]','$tid','$cd','0','$UID') ");
			echo '<meta http-equiv="refresh" content="0 ; url=./thread.php?tid='.$tid.'">';
		}
	?>

</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>