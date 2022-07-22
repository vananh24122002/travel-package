<div class="table-main">
                <h2>Danh sách đặt tour</h2>
            <form action="index.php?action=listtintucbv" id="mid1" method="post">
            <table class="table table-striped" id="load_tour">
            <!-- load tổng đơn đặt -->
            </table>
             </form>
              <div class="mb10">
            <input type="button" id="t1" name="themmoi" value="Chọn tất cả">
            <input type="button" id="t1" value="Bỏ chọn tất cả">
            <input type="button" id="t1" value="Xóa tất cả"></div>
            </div>
                <!-- phân trang -->
        <?php 
            $count_hoadon = count_hoadon();
            $count = $count_hoadon['count_array'];
            $pages = ceil($count/10);
            ?>
            <nav aria-label="Page navigation example">
              <ul class="pagination1">
                <?php for($i = 1 ; $i<=$pages ; $i++){ ?>
                  <li class="page-item"><a class="page-link" href="index.php?action=listbooktour&pages=<?=$i?>"><?php echo $i ?></a></li>
                <?php } ?>
              </ul>
            </nav>          


           </div> 

<script type="text/javascript">
  $(document).ready(function(){
  //load đơn đặt tour
  function load_dattour(){
          $.ajax({
            type: "POST",
            url: "DonTour/load_dattour.php",
            success: function(data){
                    $('#load_tour').html(data);
                   
                },
          });

          }
          setTimeout(function () {
            load_dattour();
          }, 500); 

  // thay đổi trạng thái xác nhận
  $(document).on('click','#xac-nhan',function(e){
      e.preventDefault();
              var id_hoa_don_xac_nhan = $(this).data("id_hoa_don_xac_nhan");
              $(document).on('click','.btn-secondary-two',function(e){
               
              $.ajax({
                type: "POST",
                url: "DonTour/action_tour.php",
                data:{id_hoa_don_xac_nhan:id_hoa_don_xac_nhan},
                cache: false,
                success: function(data){
                  // console.log(data);
                if(data==1){
                    alert('Xác nhận thành công !'),
                    // remove modal
                        $("#modal-xac-nhan").remove();
                        $("body").removeClass("modal-open");
                        $("body").attr("style", "");
                        $(".fade").removeClass("modal-backdrop");

                    setTimeout(function () {
                      load_dattour();
                      }, 500);   
                }else{
                  alert('Xác nhận thất bại !');
                }

                }
              });

            });
          
          });  
            //end thay đổi 
  // thay đổi trạng thái hủy
  $(document).on('click','#huy',function(e){
      e.preventDefault();
              var id_hoa_don_huy = $(this).data("id_hoa_don_huy");
              $(document).on('click','.btn-secondary-two',function(e){
               
              $.ajax({
                type: "POST",
                url: "DonTour/action_tour.php",
                data:{id_hoa_don_huy:id_hoa_don_huy},
                cache: false,
                success: function(data){
                  // console.log(data);
                if(data==1){
                    alert('Hủy xác nhận thành công !'),
                    // remove modal
                        $("#modal-huy").remove();
                        $("body").removeClass("modal-open");
                        $("body").attr("style", "");
                        $(".fade").removeClass("modal-backdrop");

                    setTimeout(function () {
                      load_dattour();
                      }, 500);   
                }else{
                  alert('Hủy xác nhận thất bại !');
                }

                }
              });

            });
          
          });  
            //end thay đổi 
  });
</script>