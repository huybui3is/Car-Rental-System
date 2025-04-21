<?php 
session_start();
include('includes/config.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>

<title>Xe thuận tiện | Danh sách xe</title>
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
<!-- <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap&subset=vietnamese" rel="stylesheet">
</head>
<body>



<!--Header--> 
<?php include('includes/header.php');?>
<!-- /Header --> 

<!--Page Header-->
<section class="page-header listing_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Danh sách xe</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Trang chủ</a></li>
        <li>Danh sách xe</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<!--Listing-->
<section class="listing-page">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-push-3">
        <div class="result-sorting-wrapper">
          <div class="sorting-count">
<?php 
//Query for Listing count
$brand    = isset($_POST['brand'])    ? $_POST['brand']    : '';
$fueltype = isset($_POST['fueltype']) ? $_POST['fueltype'] : '';

// 2. Build điều kiện động
$conds  = [];
$params = [];
if ($brand !== '') {
  $conds[]         = 'xe.HX_Ma = :brand';
  $params[':brand'] = $brand;
}
if ($fueltype !== '') {
  $conds[]            = 'xe.XE_LoaiNhienLieu = :fueltype';
  $params[':fueltype'] = $fueltype;
}
$where = $conds ? 'WHERE ' . implode(' AND ', $conds) : '';

// 3. Truy vấn động
$sql   = "SELECT xe.*, hang_xe.HX_Ten
          FROM xe
          JOIN hang_xe ON hang_xe.HX_Ma = xe.HX_Ma
          $where";
$query = $dbh->prepare($sql);
foreach ($params as $k => $v) {
  $query->bindValue($k, $v);
}
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
?>
<p><span><?php echo htmlentities($cnt);?> Danh sách</span></p>
</div>
</div>

<?php if ($cnt): ?>
  <?php foreach ($results as $result): ?>
    <div class="product-listing-m gray-bg">
      <div class="product-listing-img">
        <img src="admin/img/vehicleimages/<?php echo htmlentities($result->XE_Anh1); ?>" class="img-responsive" alt="">
      </div>
      <div class="product-listing-content">
        <h5>
          <a href="vehical-details.php?vhid=<?php echo htmlentities($result->XE_Ma); ?>">
            <?php echo htmlentities($result->HX_Ten); ?>, <?php echo htmlentities($result->XE_Ten); ?>
          </a>
        </h5>
        <p class="list-price"><?php echo htmlentities($result->XE_GiaThue); ?> VND/Ngày</p>
        <ul>
          <li><i class="fa fa-user"></i> <?php echo htmlentities($result->XE_ChoNgoi); ?> chỗ ngồi</li>
          <li><i class="fa fa-calendar"></i> <?php echo htmlentities($result->XE_MauNam); ?></li>
          <li><i class="fa fa-car"></i> <?php echo htmlentities($result->XE_LoaiNhienLieu); ?></li>
        </ul>
        <a href="vehical-details.php?vhid=<?php echo htmlentities($result->XE_Ma); ?>" class="btn">
          Xem chi tiết <i class="fa fa-angle-right"></i>
        </a>
      </div>
    </div>
  <?php endforeach; ?>
<?php else: ?>
  <p>Không tìm thấy xe phù hợp.</p>
<?php endif; ?>
         </div>
      
      <!--Side-Bar-->
      <aside class="col-md-3 col-md-pull-9">
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-filter" aria-hidden="true"></i> TÌM KIẾM XE </h5>
          </div>
          <div class="sidebar_filter">
            <form action="search-carresult.php" method="post">
              <div class="form-group select">
                <select class="form-control" name="brand">
                  <option value="">Chọn hãng xe</option>

                  <?php $sql = "SELECT * from  hang_xe ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{       ?>  
<option value="<?php echo htmlentities($result->HX_Ma);?>"><?php echo htmlentities($result->HX_Ten);?></option>
<?php }} ?>
                 
                </select>
              </div>
              <div class="form-group select">
              <select class="form-control" name="fueltype">
                  <option value="">Chọn loại nhiên liệu</option>
<option value="Petrol">Petrol</option>
<option value="Diesel">Diesel</option>
<option value="CNG">CNG</option>
                </select>
              </div>
             
              <div class="form-group">
                <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> TÌM KIẾM XE</button>
              </div>
            </form>
          </div>
        </div>

        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-car" aria-hidden="true"></i> XE MỚI GẦN ĐÂY</h5>
          </div>
          <div class="recent_addedcars">
            <ul>
<?php $sql = "SELECT xe.*,hang_xe.HX_Ten,hang_xe.HX_Ma as bid  from xe join hang_xe on hang_xe.HX_Ma=xe.HX_Ma order by XE_Ma desc limit 4";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>

              <li class="gray-bg">
                <div class="recent_post_img"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->XE_Ma);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->XE_Anh1);?>" alt="image"></a> </div>
                <div class="recent_post_title"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->XE_Ma);?>"><?php echo htmlentities($result->HX_Ten);?> , <?php echo htmlentities($result->XE_Ten);?></a>
                  <p class="widget_price"><?php echo htmlentities($result->XE_GiaThue);?> VND/Ngày</p>
                </div>
              </li>
              <?php }} ?>
              
            </ul>
          </div>
        </div>
      </aside>
      <!--/Side-Bar--> 
    </div>
  </div>
</section>
<!-- /Listing--> 

<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>

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
