<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
?><!DOCTYPE HTML>
<html lang="en">
<head>

<title>Xe thuận tiện - Đơn hàng của tôi</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- SWITCHER -->
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
        
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<!-- Google-Font-->
<!-- <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap&subset=vietnamese" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->  
</head>
<body>


        
<!--Header-->
<?php include('includes/header.php');?>
<!--Page Header-->
<!-- /Header --> 

<!--Page Header-->
<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Đơn hàng của tôi</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Trang chủ</a></li>
        <li>Đơn hàng của tôi</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<?php 
$useremail=$_SESSION['login'];
$sql = "SELECT * from nguoi_dung where ND_Email=:useremail ";
$query = $dbh -> prepare($sql);
$query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
<section class="user_profile inner_pages">
  <div class="container">
    <div class="user_profile_info gray-bg padding_4x4_40">
      <div class="upload_user_logo"> <img src="assets/images/dealer-logo.jpg" alt="image">
      </div>

      <div class="dealer_info">
        <h5><?php echo htmlentities($result->ND_HoTen);?></h5>
        <p><?php echo htmlentities($result->ND_DiaChi); }}?>
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-3">
       <?php include('includes/sidebar.php');?>
   
      <div class="col-md-8 col-sm-8">
        <div class="profile_wrap">
          <h5 class="uppercase underline">Đơn hàng của tôi </h5>
          <div class="my_vehicles_list">
            <ul class="vehicle_listing">
<?php 
$useremail=$_SESSION['login'];
$sqlGetUserId = "SELECT ND_SoDt FROM nguoi_dung WHERE ND_Email = :useremail";
$queryGetUserId = $dbh->prepare($sqlGetUserId);
$queryGetUserId->bindParam(':useremail', $useremail, PDO::PARAM_STR);
$queryGetUserId->execute();
if ($queryGetUserId->rowCount() > 0) {
  $userSoDt = $queryGetUserId->fetch(PDO::FETCH_OBJ)->ND_SoDt;
 $sql = "SELECT xe.XE_Anh1 as XE_Anh1,xe.XE_Ten,xe.XE_Ma as vid,hang_xe.HX_Ten,don_hang.DH_NgayThue,don_hang.DH_NgayKetThuc,don_hang.DH_GhiChu,don_hang.DH_TrangThai,xe.XE_GiaThue,DATEDIFF(don_hang.DH_NgayKetThuc,don_hang.DH_NgayThue) as totaldays,don_hang.DH_So from don_hang join xe on don_hang.XE_Ma=xe.XE_Ma join hang_xe on hang_xe.HX_Ma=xe.HX_Ma where don_hang.ND_SoDt=:userSoDt order by don_hang.DH_Ma desc";
$query = $dbh -> prepare($sql);
$query-> bindParam(':userSoDt', $userSoDt, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);}
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>

<li>
    <h4 style="color:red">Đơn hàng số #<?php echo htmlentities($result->DH_So);?></h4>
                <div class="vehicle_img"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->XE_Anh1);?>" alt="image"></a> </div>
                <div class="vehicle_title">
                <?php 
  // chuyển YYYY‑MM‑DD → Unix timestamp → d-m-Y
  $start = date('d-m-Y', strtotime($result->DH_NgayThue));
  $end   = date('d-m-Y', strtotime($result->DH_NgayKetThuc));
?>

                  <h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid);?>"> <?php echo htmlentities($result->HX_Ten);?> , <?php echo htmlentities($result->XE_Ten);?></a></h6>
                  <p><b>Thuê từ ngày </b> <?php echo $start; ?> <b>Đến ngày </b> <?php echo $end;?></p>
                  <div style="float: left"><p><b>Ghi chú:</b> <?php echo htmlentities($result->DH_GhiChu);?> </p></div>
                </div>
                <?php if($result->DH_TrangThai==1)
                { ?>
                <div class="vehicle_status"> <a href="#" class="btn outline btn-xs active-btn">Đã xác nhận</a>
                           <div class="clearfix"></div>
        </div>

              <?php } else if($result->DH_TrangThai==2) { ?>
 <div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Đã hủy</a>
            <div class="clearfix"></div>
        </div>
             


                <?php } else { ?>
 <div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Chưa xác nhận</a>
            <div class="clearfix"></div>
        </div>
                <?php } ?>
       
              </li>

<h5 style="color:blue">Hóa đơn</h5>
<table>
  <tr>
    <th>Tên xe</th>
    <th>Thuê từ ngày</th>
    <th>Ngày kết thúc</th>
    <th>Tổng số ngày</th>
    <th>Giá Thuê / Ngày</th>
  </tr>
  <tr>
    <td><?php echo htmlentities($result->XE_Ten);?>, <?php echo htmlentities($result->HX_Ten);?></td>
    <td><?php echo htmlentities(date('d-m-Y', strtotime($result->DH_NgayThue))); ?></td>
    <td><?php echo htmlentities(date('d-m-Y', strtotime($result->DH_NgayKetThuc))); ?></td>
       <td><?php echo htmlentities($tds=$result->totaldays);?></td>
        <td> <?php echo htmlentities($ppd=$result->XE_GiaThue);?></td>
  </tr>
  <tr>
    <th colspan="4" style="text-align:center;"> Tổng tiền</th>
    <th><?php echo htmlentities($tds*$ppd);?></th>
  </tr>
</table>
<hr />
              <?php }}  else { ?>
                <h5 align="center" style="color:red">Chưa đặt</h5>
              <?php } ?>
             
         
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/my-vehicles--> 
<?php include('includes/footer.php');?>

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>
</body>
</html>
<?php } ?>