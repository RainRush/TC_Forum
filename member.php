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
	<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
				<div class="navbar-header">
					<a class="navbar-brand" href="./index.php">TC創業論壇</a>
				</div>
			</nav>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-md-6 column" align="center">
			<form class="form-horizontal" role="form" id= "form1" name= "form1" method= "post">
				<br><br><br><br><br><br><br><br>
				<div class="form-group">
					<label for="Username" class="col-sm-4 control-label">帳號</label>
					<div class="col-sm-5">
						<?php
							if (isset($_POST['register']))
								echo '<input type="text" class="form-control" id="textfield" name="Username" value="'.$_POST['Username'].'">';
							else
								echo '<input type="text" class="form-control" id="textfield" name="Username" placeholder="欲申請之帳號">';
						?>
					</div>
				</div>
				<div class="form-group">
					<label for="Email" class="col-sm-4 control-label">電子郵件</label>
					<div class="col-sm-5">
						<?php
							if (isset($_POST['register']))
								echo '<input type="text" class="form-control" id="textfield" name="Email" value="'.$_POST['Email'].'">';
							else
								echo '<input type="text" class="form-control" id="textfield" name="Email" placeholder="請輸入您的Email">';
						?>
					</div>
				</div>
				<div class="form-group">
					 <label for="Email" class="col-sm-4 control-label">確認電子信箱</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="textfield" name="Email_Check" placeholder="請再次輸入Email">
					</div>
				</div>
				<div class="form-group">
					 <label for="Password" class="col-sm-4 control-label">密碼</label>
					<div class="col-sm-5">
						<input type="password" class="form-control" id="textfield" name="Password" placeholder="請輸入您的密碼">
					</div>
				</div>
				<div class="form-group">
					 <label for="Password" class="col-sm-4 control-label">確認密碼</label>
					<div class="col-sm-5">
						<input type="password" class="form-control" id="textfield" name="Password_Check" placeholder="再次確認密碼">
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-0 col-sm-18">
						<br>
						 	<?php
						 		$conn = mysql_connect("localhost", "root", "0000");
								mysql_select_db("dan3388d") or die("Unable to connect to the server. Please try again later.");
								mysql_query(" set names 'utf8' ");
								mysql_query(" SET CHARACTER SET  'UTF8 '; ");
								mysql_query('SET CHARACTER_SET_CLIENT=UTF8; ');
								mysql_query('SET CHARACTER_SET_RESULTS=UTF8; ');
  								if (isset($_POST['register'])){
									if($_POST['Username'] == NULL)
										echo '<p style="color:red">請填入帳號</p>';
									else if($_POST['Email'] == NULL)
										echo '<p style="color:red">請填入電子信箱</p>';
									else if($_POST['Password'] == NULL)
										echo '<p style="color:red">請填入密碼</p>';
									else if($_POST['Email'] != $_POST['Email_Check'])
										echo '<p style="color:red">確認電子信箱有誤</p>';
									else if($_POST['Password'] != $_POST['Password_Check'])
										echo '<p style="color:red">確認密碼有誤</p>';
									else{
										$check = "SELECT count(1) AS EmailTimesCheck FROM User WHERE Email = '$_POST[Email]'";
										$result_check = mysql_query($check);
										$row_check = mysql_fetch_assoc($result_check);
										$check2 = "SELECT count(1) AS NameTimesCheck FROM User WHERE Username = '$_POST[Username]'";
										$result_check2 = mysql_query($check2);
										$row_check2 = mysql_fetch_assoc($result_check2);
										$data = mysql_query("SELECT * FROM User");
										$CountUser = mysql_num_rows($data);
										$UID = $CountUser + 1;
										$CurrentDate = mysql_query("SELECT CURDATE()");
										while($row=mysql_fetch_array($CurrentDate)){ 
											$Join_Time = $row['CURDATE()'];
										}
										if($row_check['EmailTimesCheck'] == 1)
											echo '<p style="color:red">此電子信箱已註冊</p>';
										else if($row_check2['NameTimesCheck'] == 1)
											echo '<p style="color:red">此帳號已有人使用</p>';
										else{
											$Username = mb_convert_encoding($_POST['Username'], "UTF-8", "auto");
											$Email = mb_convert_encoding($_POST['Email'], "UTF-8", "auto");
											$Password = mb_convert_encoding($_POST['Password'], "UTF-8", "auto");
											mysql_query(" INSERT INTO USER (UID,Username,Password,Email,Join_Time,Role,Activate) VALUES ('$UID', '$Username', '$Password', '$Email', '$Join_Time', 'Junior TCer', '0')");
											echo '<meta http-equiv="refresh" content="0 ; url=./index.php">';
										}
									}

  								}
 						 	?>
						 <br><button type="submit" class="btn btn-primary" name="register">註冊</button> 
					</div>
				</div>
			</form> 
		</div>
		<div class="col-md-6 column" align="center">
			<form class="form-horizontal" role="form" method="post">
				<br><br><br><br><br><br><br><br><br><br>
				<div class="form-group">
					 <label for="Username" class="col-sm-4 control-label">帳號</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="Username" name="Username" placeholder="請輸入帳號">
					</div>
				</div>
				<div class="form-group">
					 <label for="Password" class="col-sm-4 control-label">密碼</label>
					<div class="col-sm-5">
						<input type="password" class="form-control" id="Password" name="Password" placeholder="請輸入密碼">
					</div>
				</div>
				<?php
				if (isset($_POST['login'])){
					$Username = "$_POST[Username]";
					$Password = "$_POST[Password]";
					$sql = "SELECT * FROM USER WHERE Username = '$Username'";
					$result = mysql_query($sql);
					$row = mysql_fetch_row($result);
					$_SESSION['UID'] = $row[0];
					if($Username != null && $Password != null && $row[1] == $Username && $row[2] == $Password && $row[6] != '0'){
						$_SESSION['Username'] = $Username;
						echo '<meta http-equiv=REFRESH CONTENT=0;url=./index.php>';
					}
					else if($row[6] == '0')
						echo '<p style="color:red">尚未至Email信箱啟動</p>';
					else
						echo '<p style="color:red">帳號或密碼有誤</p>';
  				}
  			?>
				<div class="form-group">
					<div class="col-sm-offset-0 col-sm-18">
						 <br><button type="submit" class="btn btn-success" name="login">登入</button>
					</div>
				</div>
			</form> 
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