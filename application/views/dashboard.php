<?
$ci =& get_instance();
$day_name_arr = array(1 => "จ.",2 => "อ.",3 => "พ.",4 => "พฤ.",5 => "ศ.",6 => "ส.",7 => "อา.", );
$month_name_arr = array(
    1 => "มกราคม",
    2 => "กุมภาพันธ์",
    3 => "มีนาคม",
    4 => "เมษายน",
    5 => "พฤษภาคม",
    6 => "มิถุนายน",
    7 => "กรกฎาคม",
    8 => "สิงหาคม",
    9 => "กันยายน",
    10 => "ตุลาคม",
    11 => "พฤศจิกายน",
    12 => "ธันวาคม",
     );
?>
    <main role="main" class="container">
    	<div class="container">
		  <div class="row">
		  <div class="col col-md-4">
		  	<div class="card" style="width: 18rem;">
			  <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1636d574685%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1636d574685%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.203125%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
			  <div class="card-body">
			    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			    <a href="<?=site_url("admin_user")?>" class="btn btn-primary btn-lg">รายชื่อผู้ดูแลระบบ</a>
			  </div>
			</div>
			</div>
      <div class="col col-md-4">
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1636d574685%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1636d574685%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.203125%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="<?=site_url("member")?>" class="btn btn-primary btn-lg">รายชื่อสมาชิก</a>
        </div>
      </div>
      </div>
		  </div>
		</div>
      <script type="text/javascript">
      $(function () {
    $("[data-fancybox]").fancybox({
      iframe : {
        css : {
          width : '95%',height : '95%'
        }
      }
    });
                $('.datetimepicker').datetimepicker({
                  //datepicker:false,
                    //format: 'H:i'
                });
                $('.datepicker').datepicker({
                  //datepicker:false,
                    dateFormat: 'dd/mm/yy',beforeShow:function(){    
                                                        if($(this).val()!=""){  
                                                            var arrayDate=$(this).val().split("/");       
                                                            arrayDate[2]=parseInt(arrayDate[2])-543;  
                                                            $(this).val(arrayDate[0]+"/"+arrayDate[1]+"/"+arrayDate[2]);  
                                                        }  
                                                        setTimeout(function(){  
                                                            $.each($(".ui-datepicker-year option"),function(j,k){  
                                                                var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                                                                $(".ui-datepicker-year option").eq(j).text(textYear);  
                                                            });               
                                                        },50);  
                                                    }
                });
            });
      	function deleteconfirm(link){
        if (confirm("Confirm Delete")) {
            window.open(link,"_self")
        };
    }
    function sub_search(){
          myform = document.createElement("form");
          $(myform).attr("action","<?=site_url("main/dashboard/")?>");   
          $(myform).attr("method","post");
          $(myform).html('<input type="text" name="stu_keyword" value="'+$("#search_txt").val()+'"><input type="text" name="start_date" value="'+$("#start_date").val()+'"><input type="text" name="end_date" value="'+$("#end_date").val()+'">')
          document.body.appendChild(myform);
          myform.submit();
          $(myform).remove();
        }
      </script>

    </main><!-- /.container -->

    
