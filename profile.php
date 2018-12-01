<?php
$url = trim(basename($_SERVER['REQUEST_URI'], '.php') . PHP_EOL);
include("connect.php");
session_start();
if($_SESSION['user_name']==NULL)
{
   header("location:../login.php");
   }
?>
<?php  
include("connect.php");
$log_id=$_SESSION['user_id'];
$qry=mysql_query("select * from user_details where login_id='$log_id'");
$row=mysql_fetch_array($qry);
$user_id=$row['user_details_id'];
$sql=mysql_query("select * from profile_pic where user_details_id='$user_id'");
$res=mysql_fetch_array($sql);
$qri=mysql_query("select * from specialization where field_status='1'");
$hos=mysql_query("select * from user_details where user_status='1' and user_type='4'");
?>
<!DOCTYPE HTML>
<html>
<head>

  

<title>EaseDok.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="../doctor/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="../doctor/css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="../doctor/css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="../doctor/css/font-awesome.css" rel="stylesheet">
<!-- jQuery -->
<script src="../doctor/js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="../doctor/css/icon-font.min.css" type='text/css' />


<style>
td{
	padding: 8px !important;
	
}

</style>
<!-- //lined-icons -->
</head>
<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
             <!--header start here-->
				<div class="header-main">
					<div class="logo-w3-agile " style="width:950px">
								<h1>EaseDok.com</h1>
							</div>
					
<?php
						//session_start(); 
						include("connect.php");
						//include("connect.php");
						$log_id=$_SESSION['user_id'];
					   //echo $log_id;
					   $sql=mysql_query("select * from user_details where login_id='$log_id'");
					   $result=mysql_fetch_array($sql); 
					   
					   ?>
					<div class="profile_details w3l">

								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">
												<span class="prfil-img"><img src="../doctor/images/v1.jpg" alt=""> </span>
												<div class="user-name">
<P><span><b><?php echo $u_name=$result['user_full_name']; ?>
</b></span></p>
												</div>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
												<div class="clearfix"></div>
											</div>
										</a>
										<ul class="dropdown-menu drp-mnu">
											
											<li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li>
											<li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
										</ul>
									</li>
								</ul>
							</div>

				     <div class="clearfix"> </div>
				</div>
<!--heder end here-->
		<ol class="breadcrumb">
                Home>Profile
				  </ol>
			<div align="left" style="vertical-align:top">
	<form name="profile edit" action="profile_edit_process.php" method="post" enctype="multipart/form-data">
<table width="1500" height="350" >
<!--<div class="user_img"><img src="../doctor/images/eye-focus.jpg" alt=""></div>-->
 

<tr><td width="30%">Name:</td><td><input type="text" placeholder="Enter Name" name="name" value="<?php echo $row['user_full_name']; ?>"> <input type="hidden" value="<?php echo $user_id; ?>" name="user_id"></td>
</tr>
<tr><td>Address:</td><td><textarea rows="2" cols="20"placeholder="Enter Address" name="address" required><?php echo $row['user_address']; ?></textarea> </td>
</tr>
<tr><td>Email:</td><td><input type="text" placeholder="Enter Email" name="email" value="<?php echo $row['email_id']; ?>"required></td></tr>
<tr><td>Phone number:</td><td><input type="text" placeholder="Enter_phone_number" name="phone" value="<?php echo $row['phone']; ?>"required></td></tr>

  <tr>
  <td>Profile Picture:</td><td> <input type="file" name="PF_file" id="PF_file"></td>
  
  </tr>
   <!--</table> -->
 <tr>
  <td>
<h2> Working Details </h1>
</td>
</tr>
 <!--<table width="1500" height="350">-->
<!--<tr><td>Experience:</td><td><input type="text" placeholder="Enter Experience" name="experienced" required></td></tr>-->

  <tr><td>Experience:</td><td><select style=" width:19%; padding:5px 8px; margin-top:2px"name="experience_id"><option value= "0,">SELECT</option>
										<option value= "1">1-2</option>
										  <option value= "3">2-3</option>
										  <option value= "4">3-4</option>
										  <option value= "5">4-5</option>
										  <option value="6">5+</option></td></tr>
 </select>
<tr><td>Current working:</td><td><select  style=" width:19%; padding:5px 8px; margin-top:2px" name="Current_id" id="txtCurrent">
                         <option value="0">Select</option>
                         <?php while($res=mysql_fetch_array($hos)){?>
                         <option value="<?php echo $res['user_details_id']; ?>"><?php echo $res['user_full_name']; ?></option>
                         <?php } ?>
                         </select><br/><br/>
                        
<tr><td>Specialization:</td><td><select  style=" width:19%; padding:5px 8px; margin-top:2px" name="specialisation_id" id="txtSpecialization">
                         <option value="0">Select</option>
                         <?php while($res=mysql_fetch_array($qri)){?>
                         <option value="<?php echo $res['specialization_id']; ?>"><?php echo $res['field_name']; ?></option>
                         <?php } ?>
                         </select><br/><br/>
                         
<tr><td><td><button type="submit" class="btn btn-success">Save</button></td></td></tr>
</table>

</form>
 </div>

	<!--//agileinfo-grap-->
<!--photoday-section-->
	<!--//photoday-section-->
	<!--w3-agileits-pane-->
	<div class="w3-agileits-pane">

				<!-- /.list-group -->

			  </div>
			  <!-- /.panel-body -->
			 <!--//w3-agileits-pane-->
<!-- script-for sticky-nav -->


		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2018 EaseDok.com. All Rights Reserved | Design by  <a href="http://https://www.facebook.com/vishnuthekkilakkattil" target="_blank">CR7</a> </p>
</div>
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo1">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
									<ul id="menu" >
										<li ><a href="doctor_home.php"><i class="fa fa-tachometer"></i>Home
										
										    <div class="clearfix"></div></a></li></li>


										<!-- <li id="menu-academico" ><a href="#"><i class="fa fa-user"></i><span>Doctors</span><div class="clearfix"></div></a></li>
									<li><a href="#"><i class="fa fa-user" ></i><span>Patients</span><div class="clearfix"></div></a></li>-->
									
									
									<!--<li id="menu-academico" ><a href="charts.html"><i class="fa fa-bar-chart"></i>Travel Record
									    <div class="clearfix"></div></a></li>
									 <li id="menu-academico" ><a href="#">Secret Note<span class="fa fa-angle-right" style="float: right"></span>
								         <div class="clearfix"></div></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="icons.html">Icons</a></li>
											<li id="menu-academico-avaliacoes" ><a href="typography.html">Typography</a></li>
											<li id="menu-academico-avaliacoes" ><a href="faq.html">Faq</a></li>
										  </ul>
									  </li>
									<li id="menu-academico" ><a href="errorpage.html"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><span>Expence</span>
                                    <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										 <ul id="menu-academico-sub" >
											<li id="menu-academico-boletim" ><a href="calendar.html">Daily</a></li>
											<li id="menu-academico-avaliacoes" ><a href="signin.html">Monthly</a></li>
											<li id="menu-academico-avaliacoes" ><a href="signup.html">Yearly</a></li></ul>
									    <div class="clearfix"></div></a></li>
									  <li id="menu-academico" ><a href="#"><i class="fa fa-cogs" aria-hidden="true"></i><span> Health</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="button.html">Buttons</a></li>
											<li id="menu-academico-avaliacoes" ><a href="grid.html">Grids</a></li>
										  </ul>
									  </li>
									 <li><a href="tabels.html"><i class="fa fa-table"></i>  <span>Remainder</span><div class="clearfix"></div></a></li>
									<li><a href="maps.html"><i class="fa fa-map-marker" aria-hidden="true"></i>  <span>Maps</span><div class="clearfix"></div></a></li>
							        <li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i>  <span>Calender</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										 <ul id="menu-academico-sub" >
											<li id="menu-academico-boletim" ><a href="calendar.html">Calendar</a></li>
											<li id="menu-academico-avaliacoes" ><a href="signin.html">Sign In</a></li>
											<li id="menu-academico-avaliacoes" ><a href="signup.html">Sign Up</a></li>


									  </ul>
									 </li>
									<li><a href="#"><i class="fa fa-check-square-o nav_icon"></i><span>Forms</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
									  <ul>
										<li><a href="input.html"> Input</a></li>
										<li><a href="validation.html">Validation</a></li>
									</ul>
									</li>-->
								  </ul>
								</div>
							  </div>
							  <div class="clearfix"></div>
							</div>
							<script>
							var toggle = true;

							$(".sidebar-icon").click(function() {
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }

											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="../doctor/js/jquery.nicescroll.js"></script>
<script src="../doctor/js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="../doctor/js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
<!-- morris JavaScript -->
<script src="../doctor/js/raphael-min.js"></script>
<script src="../doctor/js/morris.js"></script>
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });

	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}

		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2014 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2014 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2014 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2014 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2015 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2015 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2015 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2015 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2016 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
				{period: '2016 Q2', iphone: 8442, ipad: 5723, itouch: 1801}
			],
			lineColors:['#ff4a43','#a2d200','#22beef'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});


	});
	</script>
	
</body>
</html>