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

$msg="Hủy đơn thuê xe thành công";
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

$msg="Xác nhận đơn thuê xe thành công";
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
	
	<title>Xe thuận tiện |Quản lý bài đánh giá   </title>

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

						<h2 class="page-title">Quản lý đơn thuê xe</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Thông tin đơn thuê xe</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>LỖI</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>THÀNH CÔNG</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th>Họ và tên</th>
											<th>Xe</th>
											<th>Thuê từ ngày</th>
											<th>Đến ngày</th>
											<th>Ghi chú</th>
											<th>Trạng thái</th>
											<th>Ngày tạo</th>
											<th>Hành động</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>#</th>
										<th>Họ và tên</th>
											<th>Xe</th>
											<th>Thuê từ ngày</th>
											<th>Đến ngày</th>
											<th>Ghi chú</th>
											<th>Trạng thái</th>
											<th>Ngày tạo</th>
											<th>Hành động</th>
										</tr>
									</tfoot>
									<tbody>

									<?php $sql = "SELECT nguoi_dung.ND_HoTen,hang_xe.HX_Ten,xe.XE_Ten,don_hang.DH_NgayThue,don_hang.DH_NgayKetThuc,don_hang.DH_GhiChu,don_hang.XE_Ma as vid,don_hang.DH_TrangThai,don_hang.DH_NgayTao,don_hang.DH_Ma  from don_hang join xe on xe.XE_Ma=don_hang.XE_Ma join nguoi_dung on nguoi_dung.ND_SoDt=don_hang.ND_SoDt join hang_xe on xe.HX_Ma=hang_xe.HX_Ma  ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($result->ND_HoTen);?></td>
											<td><a href="edit-vehicle.php?id=<?php echo htmlentities($result->vid);?>"><?php echo htmlentities($result->HX_Ten);?> , <?php echo htmlentities($result->XE_Ten);?></td>
											<td><?php echo htmlentities($result->DH_NgayThue);?></td>
											<td><?php echo htmlentities($result->DH_NgayKetThuc);?></td>
											<td><?php echo htmlentities($result->DH_GhiChu);?></td>
											<td><?php 
if($result->DH_TrangThai==0)
{
echo htmlentities('Chưa xác nhận');
} else if ($result->DH_TrangThai==1) {
echo htmlentities('Đã xác nhận');
}
 else{
 	echo htmlentities('Đã hủy');
 }
										?></td>
											<td><?php echo htmlentities($result->DH_NgayTao);?></td>
										<td><a href="manage-bookings.php?aeid=<?php echo htmlentities($result->DH_Ma);?>" onclick="return confirm('Bạn có muốn xác nhận đơn thuê xe này?')"> Xác nhận</a> /


<a href="manage-bookings.php?eid=<?php echo htmlentities($result->DH_Ma);?>" onclick="return confirm('Bạn có muốn hủy đơn thuê xe này?')"> Hủy</a>
</td>

										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>

						

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
