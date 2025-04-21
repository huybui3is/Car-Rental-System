<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_REQUEST['eid']))
	{
$eid=intval($_GET['eid']);
$status="2";
$sql = "UPDATE don_hang SET DH_TrangThai=:status WHERE  DH_Ma=:eid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':eid',$eid, PDO::PARAM_STR);
$query -> execute();
  echo "<script>alert('Hủy đơn thuê xe thành công');</script>";
echo "<script type='text/javascript'> document.location = 'canceled-bookings.php; </script>";
}


if(isset($_REQUEST['aeid']))
	{
$aeid=intval($_GET['aeid']);
$status=1;

$sql = "UPDATE don_hang SET DH_TrangThai=:status WHERE  DH_Ma=:aeid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
$query -> execute();
echo "<script>alert('Xác nhận đơn thuê xe thành công');</script>";
echo "<script type='text/javascript'> document.location = 'confirmed-bookings.php'; </script>";
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
	
	<title>Xe thuận tiện | Đơn thuê xe mới   </title>

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

						<h2 class="page-title">Chi tiết đơn hàng</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Thông tin đơn hàng</div>
							<div class="panel-body">


<div id="print">
								<table border="1"  class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%"  >
				
									<tbody>

									<?php 
$bid=intval($_GET['bid']);
									$sql = "SELECT nguoi_dung.*,hang_xe.HX_Ten,xe.XE_Ten,don_hang.DH_NgayThue,don_hang.DH_NgayKetThuc,don_hang.DH_GhiChu,don_hang.XE_Ma as vid,don_hang.DH_TrangThai,don_hang.DH_NgayTao,don_hang.DH_Ma,don_hang.DH_So,
DATEDIFF(don_hang.DH_NgayKetThuc,don_hang.DH_NgayThue) as totalnodays,xe.XE_GiaThue
									  from don_hang join xe on xe.XE_Ma=don_hang.XE_Ma join nguoi_dung on nguoi_dung.ND_SoDt=don_hang.ND_SoDt join hang_xe on xe.HX_Ma=hang_xe.HX_Ma where don_hang.DH_Ma=:bid";
$query = $dbh -> prepare($sql);
$query -> bindParam(':bid',$bid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
	<h3 style="text-align:center; color:red">#<?php echo htmlentities($result->DH_So);?> Chi tiết đơn hàng </h3>

		<tr>
											<th colspan="4" style="text-align:center;color:blue">Chi tiết người dùng</th>
										</tr>
										<tr>
											<th>Đơn thuê số.</th>
											<td>#<?php echo htmlentities($result->DH_So);?></td>
											<th>Họ và tên</th>
											<td><?php echo htmlentities($result->ND_HoTen);?></td>
										</tr>
										<tr>											
											<th>Địa chỉ email</th>
											<td><?php echo htmlentities($result->ND_Email);?></td>
											<th>Số điện thoại liên hệ</th>
											<td><?php echo htmlentities($result->ND_SoDt);?></td>
										</tr>
											<tr>											
											<th>Địa chỉ</th>
											<td><?php echo htmlentities($result->ND_DiaChi);?></td>
										</tr>

										<tr>
											<th colspan="4" style="text-align:center;color:blue">Chi tiết đơn thuê</th>
										</tr>
											<tr>											
											<th>Tên xe</th>
											<td><a href="edit-vehicle.php?id=<?php echo htmlentities($result->vid);?>"><?php echo htmlentities($result->HX_Ten);?> , <?php echo htmlentities($result->XE_Ten);?></td>
											<th>Ngày tạo</th>
											<td><?php echo htmlentities($result->DH_NgayTao);?></td>
										</tr>
										<tr>
											<th>Thuê từ ngày</th>
											<td><?php echo htmlentities($result->DH_NgayThue);?></td>
											<th>Đến ngày</th>
											<td><?php echo htmlentities($result->DH_NgayKetThuc);?></td>
										</tr>
<tr>
	<th>Tổng số ngày</th>
	<td><?php echo htmlentities($tdays=$result->totalnodays);?></td>
	<th>Giá Thuê theo ngày</th>
	<td><?php echo htmlentities($ppdays=$result->XE_GiaThue);?></td>
</tr>
<tr>
	<th colspan="3" style="text-align:center">Tổng tiền</th>
	<td><?php echo htmlentities($tdays*$ppdays);?></td>
</tr>
<tr>
<th>Trạng thái đơn hàng</th>
<td><?php 
if($result->DH_TrangThai==0)
{
echo htmlentities('Not Confirmed yet');
} else if ($result->DH_TrangThai==1) {
echo htmlentities('Đã xác nhận');
}
 else{
 	echo htmlentities('Đã hủy');
 }
										?></td>
										<th>Ngày cập nhật</th>
										<td><?php echo htmlentities($result->DH_NgayCapNhat);?></td>
									</tr>

									<?php if($result->DH_TrangThai==0){ ?>
										<tr>	
										<td style="text-align:center" colspan="4">
				<a href="bookig-details.php?aeid=<?php echo htmlentities($result->DH_Ma);?>" onclick="return confirm('Bạn có muốn xác nhận đơn thuê này?')" class="btn btn-primary"> Confirm Booking</a> 

<a href="bookig-details.php?eid=<?php echo htmlentities($result->DH_Ma);?>" onclick="return confirm('Bạn có muốn hủy đơn thuê này?')" class="btn btn-danger"> Cancel Booking</a>
</td>
</tr>
<?php } ?>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>
								<form method="post">
	   <input name="Submit2" type="submit" class="txtbox4" value="Print" onClick="return f3();" style="cursor: pointer;"  />
	</form>

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
	<script language="javascript" type="text/javascript">
function f3()
{
window.print(); 
}
</script>
</body>
</html>
<?php } ?>
