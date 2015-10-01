<?php session_start(); ?>
<?php
	if(isset($_POST['logout'])){
		unset($_SESSION['UID']);
		echo '<meta http-equiv="refresh" content="0 ; url=./index.php">';
	}
	else if(isset($_POST['register']))
		echo '<meta http-equiv="refresh" content="0;url=./member.php">';
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
	<div class="row clearfix">
		<div class="col-md-2">
		</div>
		<div class="col-md-8 column" align="center">
			<form class="form-horizontal" role="form" id= "form1" name= "form1" method= "post">
				<br><br><br><br><br><br><br><br>
				<div class="form-group">
					<label for="topic" class="col-sm-4 control-label">文章主題</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="textfield" name="topic" placeholder="請輸入文章主題">
					</div>
				</div>
				<table border="0" cellspacing="0" cellpadding="5" class="tborder">
					<thead>
						<tr>
							<td class="thead" colspan="2" style="background:#6495ED;border-radius: 3px;text-shadow: 1px 1px 0px rgba(0, 0, 0, 0.2);padding: 10px;height: 25px;color: #fff;font-size: 14px;font-weight: lighter;">
								<div><strong>文章內容</strong></div>
							</td>
						</tr>
					</thead>
					<tbody id="quickreply_e">
						<tr>
        			      	<td class="trow1" valign="top" width="4%">
							</td>
							<td class="trow1">
								<div style="width: 95%">
									<br><textarea style="width: 100%; padding: 4px; margin: 0;" rows="8" cols="80" name="content" id="message" tabindex="1"></textarea>
								</div> <br>
							</td>
						</tr>
					</tbody>
				</table>
				
				<div class="form-group">
					<div class="col-sm-offset-0 col-sm-18">
						<br>
						 	<?php
  								if (isset($_POST['postnew'])){
									if($_POST['topic'] == NULL)
										echo '<p style="color:red">請記得寫上文章主題</p>';
									else if($_POST['content'] == NULL)
										echo '<p style="color:red">內容不可為空白</p>';
									else{
										$data1 = mysql_query("SELECT * FROM article");
										$CountArt = mysql_num_rows($data1);
										$aid = $CountArt + 1;
										$data2 = mysql_query("SELECT * FROM topic");
										$CountTop = mysql_num_rows($data2);
										$tid = $CountTop + 1;
										$CurrentNow = mysql_query("SELECT NOW()");
										while($row=mysql_fetch_array($CurrentNow)){ 
											$edit_time = $row['NOW()'];
										}
										if($row_check['EmailTimesCheck'] == 1)
											echo '<p style="color:red">此電子信箱已註冊</p>';
										else if($row_check2['NameTimesCheck'] == 1)
											echo '<p style="color:red">此帳號已有人使用</p>';
										else{
											$topic = mb_convert_encoding($_POST['topic'], "UTF-8", "auto");
											$content = mb_convert_encoding($_POST['content'], "UTF-8", "auto");
											mysql_query("INSERT INTO Topic(tid,topic,tag) VALUES ('$uid', '$topic', '$tag')");
											mysql_query("INSERT INTO Article(aid, topic, content, tag, tid, edit_time, views, uid) VALUES ('$aid','$topic','$content','$tag','$tid','$edit_time','0','$UID') ");
											echo '<meta http-equiv="refresh" content="0 ; url=./main.php?tag='.$tag.'">';
										}
									}

  								}
 						 	?>
						 <br><button type="submit" class="btn btn-primary" name="postnew">發表文章</button> 
					</div>
				</div>
			</form> 
		</div>
	<div class="col-md-2">
		</div>
	</div>
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
</body>
</html>