<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<?php
 $sql = " SELECT * FROM taikhoan WHERE kichHoat =1";
 $counttk = pdo_query($sql);
 $sql = " SELECT * FROM baiviet ";
 $countbv = pdo_query($sql);
 $sql = " SELECT * FROM tour ";
 $counttour = pdo_query($sql);
 $sql = " SELECT COUNT(id_hoadon) as counthd FROM hoadondattour WHERE tinhtrang=0 ";
 $countdonhang = pdo_query_one($sql);
 $sql = " SELECT SUM(tongtien) as countnow FROM hoadondattour WHERE (DATE(time_dat)) = CURRENT_DATE";
 $tthomnay = pdo_query_one($sql);
 $sql = " SELECT SUM(tongtien) as countnow FROM hoadondattour WHERE (WEEK(DATE(time_dat))) = WEEK(NOW())";
 $tttuannay = pdo_query_one($sql);
 $sql = " SELECT SUM(tongtien) as countnow FROM hoadondattour WHERE (MONTH(DATE(time_dat))) = MONTH(NOW())";
 $ttthangnay = pdo_query_one($sql);
 $sql = " SELECT SUM(tongtien) as countnow FROM hoadondattour WHERE (YEAR(DATE(time_dat))) = YEAR(NOW())";
 $ttnamnay = pdo_query_one($sql);
?>
<div class="table-main">
<h2>Wellcome Travel Package Home ❤️</h2>
<div class="tongquat">
    <div class="thanhvien">
        <span id="tv"><i class="fa fa-user-plus" aria-hidden="true"></i></span> 
        <span id="soluong"><?=count($counttk);?></span>
        <span style="padding-left:1vw">Thành viên </span>
        <div class="xem-them"><a href="">Xem thêm <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></div>  
    </div>
    <div class="tintuc">
        <span id="tv"><i class="fa fa-newspaper-o" aria-hidden="true"></i></span>
        <span id="soluong"><?=count($countbv);?></span>
        <span style="padding-left:1vw">Tin tức</span>
        <div class="xem-them"><a href="">Xem thêm <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></div>
    </div>
    <div class="tour">
        <span id="tv"><i class="fa fa-plane" aria-hidden="true"></i></span>
        <span id="soluong"><?=count($counttour);?></span>
        <span style="padding-left:1vw">Tour</span>
        <div class="xem-them"><a href="">Xem thêm <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></div>
    </div>
    <div class="donhang">
        <span id="tv"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
        <span id="soluong"><?=$countdonhang['counthd']?></span>
        <span style="padding-left:1vw">Đơn hàng mới</span>
        <div class="xem-them"><a href="">Xem thêm <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></div>
    </div>
<!-- tổng tiền -->
    <div class="hom-nay">
        <span id="tv-tong-tien"><i class="fa fa-calendar-o" aria-hidden="true"></i></span> 
        <div class="content-box">
            DOANH THU HÔM NAY
            <p style="color:black; margin-top:-5vw;font-size:1.5vw"><?php echo '$ '.  number_format($tthomnay['countnow']) . ''; ?></p>
        </div>
    </div>
    <div class="tuan-nay">
        <span id="tv-tong-tien"><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
        <div class="content-box">
            DOANH THU TUẦN NAY
            <p style="color:black; margin-top:-5vw;font-size:1.5vw"><?php echo '$ '.  number_format($tttuannay['countnow']) . ''; ?></p>
        </div>
    </div>
    <div class="thang-nay">
        <span id="tv-tong-tien"><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
        <div class="content-box">
            DOANH THU THÁNG 
            <p style="color:black; margin-top:-5vw;font-size:1.5vw"><?php echo '$ '.  number_format($ttthangnay['countnow']) . ''; ?></p>
        </div>
    </div>
    <div class="nam-nay">
        <span id="tv-tong-tien"><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
        <div class="content-box">
            DOANH THU NĂM NAY
            <p style="color:black; margin-top:-5vw;font-size:1.5vw"><?php echo '$ '.  number_format($ttnamnay['countnow']) . ''; ?></p>
        </div>
    </div>
    </div>
</div>


<p>Thống kê doanh thu trong <span id="text-date"></span></p>
<div id="myfirstchart" style="height: 250px;"></div>
<script>
$(document).ready(function(){
    thong_ke();
    var char = new Morris.Area({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  
  xkey: 'time_dat',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['time_dat','order','money','quantity'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Số lượng bán được','Tổng tiền','Số người']
 });
 function thong_ke(){
     var text = '1 tháng qua';
     $('#text-date').text(text);
     $.ajax({
            dataType: "JSON",
            method:"POST",
            url: "ThongKe/action.php",
            cache: false,
            success: function(data){
                    char.setData(data)
                    $('#text-date').text(text);
                   
                },
          });

 }
});
</script>