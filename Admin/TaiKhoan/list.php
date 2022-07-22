<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<div class="table-main">
                <h2>Danh sách tài khoản</h2>
            <table class="table table-striped" id="load_tk">
            <a href="index.php?action=addtk"><input type="button" value="Thêm mới" class="button-right"></div></a>
            
            </table>
              <div class="mb10">
            <input type="button" id="t1" name="themmoi" value="Chọn tất cả">
            <input type="button" id="t1" value="Bỏ chọn tất cả">
            <input type="button" id="t1" value="Xóa tất cả">
            </div>
            
             <!-- phân trang -->
             <?php 
            $count_hoadon = count_hoadon();
            // var_dump($count_hoadon);
            $count = $count_hoadon['count_array'];
            // echo $count;
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
  //load tài khoản
  function load_tk(){
          $.ajax({
            type: "POST",
            url: "TaiKhoan/load_tk.php",
            cache: false,
            success: function(data){
                    $('#load_tk').html(data);
                   
                },
          });

          }
          setTimeout(function () {
            load_tk()
          }, 500);
  // xóa tài khoản
  $(document).on('click','.btn-secondary-one',function(e){
      e.preventDefault();
              var id_tk = $(this).data("id_tk");
              $(document).on('click','.btn-secondary-two',function(e){
               
              $.ajax({
                type: "POST",
                url: "TaiKhoan/action_tk.php",
                data:{id_tk:id_tk},
                cache: false,
                success: function(data){
                if(data==1){
                    alert('Xóa tài khoản thành công !'),
                    // remove modal
                        $("#modal-del").remove();
                        $("body").removeClass("modal-open");
                        $("body").attr("style", "");
                        $(".fade").removeClass("modal-backdrop");

                    setTimeout(function () {
                      load_tk();
                      }, 500);   
                }else{
                  alert('Xóa tài khoản thất bại !');
                }

                }
              });

            });
            // end xoa
          });    
        


        });
</script>