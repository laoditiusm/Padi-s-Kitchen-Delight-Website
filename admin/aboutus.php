<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['padiskitchenaid']==0)) {
  header('location:logout.php');
  } else{
     if(isset($_POST['submit']))
  {

$ocmsaid=$_SESSION['padiskitchenaid'];
 $pagetitle=$_POST['pagetitle'];
$pagedes=$_POST['pagedes'];
$sql="update pages set PAGE_TITLE=:pagetitle,PAGE_DESCRIPTION=:pagedes where  PAGE_TYPE='aboutus'";
$query=$dbh->prepare($sql);
$query->bindParam(':pagetitle',$pagetitle,PDO::PARAM_STR);
$query->bindParam(':pagedes',$pagedes,PDO::PARAM_STR);

$query->execute();
echo '<script>alert("About us has been updated")</script>';
echo "<script>window.location.href ='aboutus.php'</script>";

  }
  ?>
<!DOCTYPE html>
<head>
<title>Padi's Kitchen Delight | About Us Page</title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});	
		});
		</script>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
		
</head>
<body class="dashboard-page">

	<?php include_once('includes/sidebar.php');?>
	<section class="wrapper scrollable">
		<?php include_once('includes/header.php');?>
		<div class="main-grid">
			<div class="agile-grids">	
				<!-- input-forms -->
				<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>About Us</h2>
					</div>
					<div class="panel panel-widget forms-panel">
						<div class="forms">
							<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
								<div class="form-title">
									<h4>About Us :</h4>
								</div>
								<div class="form-body">
									<?php

$sql="SELECT * from  pages where PAGE_TYPE='aboutus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
									<form method="post" enctype="multipart/form-data">
										
										<div class="form-group"> 
											<label for="exampleInputEmail1">Page Title</label> 
											 <input type="text" name="pagetitle" id="pagetitle" required="true" value="<?php  echo $row->PAGE_TITLE;?>" class="form-control">
										</div> 

										<div class="form-group"> 
											<label for="exampleInputEmail1">Page Description</label> 
											  <textarea type="text" name="pagedes" id="pagedes" required="true"class="form-control" rows="10"><?php  echo $row->PAGE_DESCRIPTION;?></textarea>
										</div>
										<?php $cnt=$cnt+1;}} ?> 
										<button type="submit" class="btn btn-default w3ls-button" name="submit">Update</button> 
									</form> 
								</div>
							</div>
						</div>
					</div>
					
			
					
				</div>
				<!-- //input-forms -->
			</div>
		</div>
		<!-- footer -->
		<?php include_once('includes/footer.php');?>
		<!-- //footer -->
	</section>
	<script src="js/bootstrap.js"></script>
	<script src="js/proton.js"></script>
</body>
</html>
<?php }  ?>