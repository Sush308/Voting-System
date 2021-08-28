 <?php
	session_start();
	if (!isset($_SESSION['userdata'])) {
		header("location: ../");
	}

	$userdata = $_SESSION['userdata'];
	$groupdata = $_SESSION['groupdata'];

	if ($_SESSION['userdata']['status'] == 0) {
		$status = '<b class="no-status"> Not Voted </b>';
	}
	else{
		$status = '<b class="yes-status"> Voted </b>';
	}

 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
</head>
<body class="body">
	<div>
		<center>
			<div class="header-section">
				<a href="../"><button class="button-back">Back</button></a>
				<a href="logout.php"><button class="button-logout">Logout</button></a>
				<h1>Voting System</h1><br><hr>
			</div>
		</center>
			<div id="profile">
				<center><img src="../uploads/<?php echo $userdata['photo'] ?>" class="img-voter" ></center>
				<p class="b"><b >Name:&nbsp&nbsp</b><?php echo $userdata['name']; ?></p>
				<p class="b"><b >Mobile:&nbsp&nbsp</b><?php echo $userdata['mobile']; ?></p>
				<p class="b"><b >Address:&nbsp&nbsp</b><?php echo $userdata['address']; ?></p>
				<p class="b"><b >Status:&nbsp&nbsp</b><?php echo $status ?></p><br>
			</div>

			<div id="group">
				<br>
				<?php
					if ($_SESSION['groupdata']) {
						for ($i=0; $i <count($groupdata) ; $i++) { 
							?>
							<div>
								<img src="../uploads/<?php echo $groupdata[$i]['photo']  ?>" class="img-group">
								<p class="b"><b>Group Name :&nbsp&nbsp</b><?php echo $groupdata[$i]['name']  ?></p>
								<p class="b"><b>Votes :&nbsp&nbsp</b><?php echo $groupdata[$i]['votes']  ?></p>
								<form action="../api/vote.php" method="POST">
									<input type="hidden" name="gvotes" value="<?php echo $groupdata[$i]['votes']?>">
									<input type="hidden" name="gid" value="<?php echo $groupdata[$i]['id']?>">
									<?php
										if($_SESSION['userdata']['status'] == 0){
											?>
											<input type="submit" name="votebtn" value="Vote" class="votebtn">
											<?php
										}
										else{
											?>
											<button disabled="" type="button" name="votebtn" value="Vote" class="votedbtn">Voted</button>
											<?php
										}
									?>
								</form><br><br><br>
								<hr>
							</div>
							<?php
						}
					}
					else{

					}
				?>
			</div>
	</div>
</body>
</html>