<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['submit']))
  {
$vehicletitle=$_POST['vehicletitle'];
$brand=$_POST['brandname'];
$vehicleoverview=$_POST['vehicalorcview'];
$priceperday=$_POST['priceperday'];
$fueltype=$_POST['fueltype'];
$modelyear=$_POST['modelyear'];
$seatingcapacity=$_POST['seatingcapacity'];
$airconditioner=$_POST['airconditioner'];
$powerdoorlocks=$_POST['powerdoorlocks'];
$antilockbrakingsys=$_POST['antilockbrakingsys'];
$brakeassist=$_POST['brakeassist'];
$powersteering=$_POST['powersteering'];
$driverairbag=$_POST['driverairbag'];
$passengerairbag=$_POST['passengerairbag'];
$powerwindow=$_POST['powerwindow'];
$cdplayer=$_POST['cdplayer'];
$centrallocking=$_POST['centrallocking'];
$crashcensor=$_POST['crashcensor'];
$leatherseats=$_POST['leatherseats'];
$id=intval($_GET['id']);

$sql="update xe set XE_Ten=:vehicletitle,HX_Ma=:brand,XE_TongQuan=:vehicleoverview,XE_GiaThue=:priceperday,XE_LoaiNhienLieu=:fueltype,XE_MauNam=:modelyear,XE_ChoNgoi=:seatingcapacity,AirConditioner=:airconditioner,PowerDoorLocks=:powerdoorlocks,AntiLockBrakingSystem=:antilockbrakingsys,BrakeAssist=:brakeassist,PowerSteering=:powersteering,DriverAirbag=:driverairbag,PassengerAirbag=:passengerairbag,PowerWindows=:powerwindow,CDPlayer=:cdplayer,CentralLocking=:centrallocking,CrashSensor=:crashcensor,LeatherSeats=:leatherseats where XE_Ma=:id ";
$query = $dbh->prepare($sql);
$query->bindParam(':vehicletitle',$vehicletitle,PDO::PARAM_STR);
$query->bindParam(':brand',$brand,PDO::PARAM_STR);
$query->bindParam(':vehicleoverview',$vehicleoverview,PDO::PARAM_STR);
$query->bindParam(':priceperday',$priceperday,PDO::PARAM_STR);
$query->bindParam(':fueltype',$fueltype,PDO::PARAM_STR);
$query->bindParam(':modelyear',$modelyear,PDO::PARAM_STR);
$query->bindParam(':seatingcapacity',$seatingcapacity,PDO::PARAM_STR);
$query->bindParam(':airconditioner',$airconditioner,PDO::PARAM_STR);
$query->bindParam(':powerdoorlocks',$powerdoorlocks,PDO::PARAM_STR);
$query->bindParam(':antilockbrakingsys',$antilockbrakingsys,PDO::PARAM_STR);
$query->bindParam(':brakeassist',$brakeassist,PDO::PARAM_STR);
$query->bindParam(':powersteering',$powersteering,PDO::PARAM_STR);
$query->bindParam(':driverairbag',$driverairbag,PDO::PARAM_STR);
$query->bindParam(':passengerairbag',$passengerairbag,PDO::PARAM_STR);
$query->bindParam(':powerwindow',$powerwindow,PDO::PARAM_STR);
$query->bindParam(':cdplayer',$cdplayer,PDO::PARAM_STR);
$query->bindParam(':centrallocking',$centrallocking,PDO::PARAM_STR);
$query->bindParam(':crashcensor',$crashcensor,PDO::PARAM_STR);
$query->bindParam(':leatherseats',$leatherseats,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();

$msg="Cập nhật xe thành công";


}


	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Xe thuận tiện | Quản lý cập nhật thông tin xe</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
	<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Cập nhật thông tin xe</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Thông tin cơ bản</div>
									<div class="panel-body">
<?php if($msg){?><div class="succWrap"><strong>THÀNH CÔNG</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
<?php 
$id=intval($_GET['id']);
$sql ="SELECT xe.*,hang_xe.HX_Ten,hang_xe.HX_Ma as bid from xe join hang_xe on hang_xe.HX_Ma=xe.HX_Ma where xe.XE_Ma=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Tên xe<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="vehicletitle" class="form-control" value="<?php echo htmlentities($result->XE_Ten)?>" required>
</div>
<label class="col-sm-2 control-label">Chọn hãng xe<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="brandname" required>
<option value="<?php echo htmlentities($result->bid);?>"><?php echo htmlentities($bdname=$result->HX_Ten); ?> </option>
<?php $ret="select HX_Ma,HX_Ten from hang_xe";
$query= $dbh -> prepare($ret);
//$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$resultss = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($resultss as $results)
{
if($results->HX_Ten==$bdname)
{
continue;
} else{
?>
<option value="<?php echo htmlentities($results->HX_Ma);?>"><?php echo htmlentities($results->HX_Ten);?></option>
<?php }}} ?>

</select>
</div>
</div>
											
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Tổng quan về xe<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="vehicalorcview" rows="3" required><?php echo htmlentities($result->XE_TongQuan);?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Giá theo ngày(VND)<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="priceperday" class="form-control" value="<?php echo htmlentities($result->XE_GiaThue);?>" required>
</div>
<label class="col-sm-2 control-label">Chọn loại nhiên liệu<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="fueltype" required>
<option value="<?php echo htmlentities($result->XE_LoaiNhienLieu);?>"> <?php echo htmlentities($result->XE_LoaiNhienLieu);?> </option>

<option value="Petrol">Petrol</option>
<option value="Diesel">Diesel</option>
<option value="CNG">CNG</option>
</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Mẫu năm<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="modelyear" class="form-control" value="<?php echo htmlentities($result->XE_MauNam);?>" required>
</div>
<label class="col-sm-2 control-label">Số chỗ ngồi<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="seatingcapacity" class="form-control" value="<?php echo htmlentities($result->XE_ChoNgoi);?>" required>
</div>
</div>
<div class="hr-dashed"></div>								
<div class="form-group">
<div class="col-sm-12">
<h4><b>Ảnh của xe</b></h4>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Ảnh 1 <img src="img/vehicleimages/<?php echo htmlentities($result->XE_Anh1);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage1.php?imgid=<?php echo htmlentities($result->XE_Ma)?>">Đổi ảnh 1</a>
</div>
<div class="col-sm-4">
Ảnh 2<img src="img/vehicleimages/<?php echo htmlentities($result->XE_Anh2);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage2.php?imgid=<?php echo htmlentities($result->XE_Ma)?>">Đổi ảnh 2</a>
</div>
<div class="col-sm-4">
Ảnh 3<img src="img/vehicleimages/<?php echo htmlentities($result->XE_Anh3);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage3.php?imgid=<?php echo htmlentities($result->XE_Ma)?>">Đổi ảnh 3</a>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Ảnh 4<img src="img/vehicleimages/<?php echo htmlentities($result->XE_Anh4);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage4.php?imgid=<?php echo htmlentities($result->XE_Ma)?>">Đổi ảnh 4</a>
</div>
<div class="col-sm-4">
Ảnh 5
<?php if($result->XE_Anh5=="")
{
echo htmlentities("File not available");
} else {?>
<img src="img/vehicleimages/<?php echo htmlentities($result->XE_Anh5);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage5.php?imgid=<?php echo htmlentities($result->XE_Ma)?>">Đổi ảnh 5</a>
<?php } ?>
</div>

</div>
<div class="hr-dashed"></div>									
</div>
</div>
</div>
</div>
	
							

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Tiện ích</div>
<div class="panel-body">


<div class="form-group">
<div class="col-sm-3">
<?php if($result->AirConditioner==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="airconditioner" checked value="1">
<label for="inlineCheckbox1"> Điều hòa </label>
</div>
<?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="airconditioner" value="1">
<label for="inlineCheckbox1"> Điều hòa </label>
</div>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->PowerDoorLocks==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="powerdoorlocks" checked value="1">
<label for="inlineCheckbox2"> Khóa cửa điện </label>
</div>
<?php } else {?>
<div class="checkbox checkbox-success checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="powerdoorlocks" value="1">
<label for="inlineCheckbox2"> Khóa cửa điện </label>
</div>
<?php }?>
</div>
<div class="col-sm-3">
<?php if($result->AntiLockBrakingSystem==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="antilockbrakingsys" checked value="1">
<label for="inlineCheckbox3"> Hệ thống chống bó cứng phanh </label>
</div>
<?php } else {?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="antilockbrakingsys" value="1">
<label for="inlineCheckbox3"> Hệ thống chống bó cứng phanh </label>
</div>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->BrakeAssist==1)
{
	?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="brakeassist" checked value="1">
<label for="inlineCheckbox3"> Hỗ trợ phanh </label>
</div>
<?php } else {?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="brakeassist" value="1">
<label  for="inlineCheckbox3"> Hỗ trợ phanh </label>
</div>
<?php } ?>
</div>

<div class="form-group">
<?php if($result->PowerSteering==1)
{
	?>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="powersteering" checked value="1">
<label for="inlineCheckbox1"> Trợ lực lái </label>
</div>
<?php } else {?>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="powersteering" value="1">
<label for="inlineCheckbox1"> Trợ lực lái </label>
</div>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->DriverAirbag==1)
{
?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="driverairbag" checked value="1">
<label for="inlineCheckbox2">Túi khí tài xế</label>
</div>
<?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="driverairbag" value="1">
<label for="inlineCheckbox2">Túi khí tài xế</label>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->DriverAirbag==1)
{
?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="passengerairbag" checked value="1">
<label for="inlineCheckbox3"> Túi khí hành khách </label>
</div>
<?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="passengerairbag" value="1">
<label for="inlineCheckbox3"> Túi khí hành khách </label>
</div>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->PowerWindows==1)
{
?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="powerwindow" checked value="1">
<label for="inlineCheckbox3"> Cửa sổ điện </label>
</div>
<?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="powerwindow" value="1">
<label for="inlineCheckbox3"> Cửa sổ điện </label>
</div>
<?php } ?>
</div>


<div class="form-group">
<div class="col-sm-3">
<?php if($result->CDPlayer==1)
{
?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="cdplayer" checked value="1">
<label for="inlineCheckbox1"> Máy phát nhạc CD </label>
</div>
<?php } else {?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="cdplayer" value="1">
<label for="inlineCheckbox1"> Máy phát nhạc CD </label>
</div>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->CentralLocking==1)
{
?>
<div class="checkbox  checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="centrallocking" checked value="1">
<label for="inlineCheckbox2">Khóa trung tâm</label>
</div>
<?php } else { ?>
<div class="checkbox checkbox-success checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="centrallocking" value="1">
<label for="inlineCheckbox2">Khóa trung tâm</label>
</div>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->CrashSensor==1)
{
?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="crashcensor" checked value="1">
<label for="inlineCheckbox3"> Cảm biến va chạm </label>
</div>
<?php } else {?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="crashcensor" value="1">
<label for="inlineCheckbox3"> Cảm biến va chạm </label>
</div>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->CrashSensor==1)
{
?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="leatherseats" checked value="1">
<label for="inlineCheckbox3"> Ghế da </label>
</div>
<?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="leatherseats" value="1">
<label for="inlineCheckbox3"> Ghế da </label>
</div>
<?php } ?>
</div>
</div>

<?php }} ?>


											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2" >
													
<button class="btn btn-primary" name="submit" type="submit" style="margin-top:4%">Cập nhật thông tin</button>
												</div>
											</div>

										</form>
									</div>
								</div>
							</div>
						</div>
						
					

					</div>
				</div>
				
			

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>