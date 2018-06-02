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
    <main role="main" class="container-fluid" style="font-size: 14px;">
    	<div class="container-fluid">
		  <div class="row">
		    <div class="col col-md-2">
		      <a href="<?=site_url("aom/create")?>" class="btn btn-success">Add</a>
		    </div>
		    <div class="col col-md-6">
		    	<div class="row">
		    		<div class="col col-md-2">
		    			<font style="display: inline-block;">ตั้งแต่</font> 		    			
		    		</div>
		    		<div class="col col-md-4">
		    			<input class="form-control datepicker" type="text" id="start_date" placeholder="Search" style="display: inline-block;" value="<?if(isset($_POST['start_date'])){echo $_POST['start_date'];}?>"> 
		    		</div>
		    		<div class="col col-md-2">
		    			<font style="display: inline-block;">ถึง</font>
		    		</div>
		    		<div class="col col-md-4">
		    			<input class="form-control datepicker" type="text" id="end_date" placeholder="Search" style="display: inline-block;" value="<?if(isset($_POST['end_date'])){echo $_POST['end_date'];}?>">
		    		</div>
		    	</div>	    	
		    </div>
		    <div class="col col-md-4">
		    	<div class="row">
		    		<div class="col col-md-8">
		    			<input class="form-control" type="text" id="search_txt" placeholder="Search" style="display: inline-block;" value="<?if(isset($_POST['stu_keyword'])){echo $_POST['stu_keyword'];}?>">
		    		</div>
		    		<div class="col col-md-4">
		    			<a href="javascript:sub_search();" class="btn btn-primary">Search</a>
		    		</div>
		    	</div>	    	
		    </div>
		  </div>
		  <div class="row">
		  	<div class="col col-md-12">
			  	<table class="table table-bordered" style="margin-top: 20px;">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">ชื่อ-นามสกุล</th>
				      <th scope="col">ครบกำหนดฟ้อง</th>
				      <th scope="col">วันฟ้อง</th>
				      <th scope="col">วันนัดพิจารณา</th>
				      <th scope="col">วันพิพากษา</th>
				      <th scope="col">คดีดำ</th>
				      <th scope="col">คดีแดง</th>
				      <th scope="col">ครบอุทรณ์</th>
				      <th scope="col">ออกหมายตั้ง</th>
				      <th scope="col">ยึดทรัพย์</th>
				      <th scope="col">ศาล</th>
				      <th scope="col">เบิกเงิน</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?
				  	foreach ($aom_list as $key => $value) {
				  		$withdraw=$ci->m_aom->get_withdraw_by_aom_id($value->id);
				  		$numwith=count($withdraw);
				  		?>
				  		<tr>
					      <td scope="row"><?=($key+1)?></td>
					      <td><a href="<?=@site_url("aom/create/".$value->id)?>"><?=$value->borrower?></a></td>
					      <td><?=$ci->m_time->unix_to_datepicker_Y_2($value->sue_date_limit)?></td>
					      <td><?=$ci->m_time->unix_to_datepicker_Y_2($value->sue_date)?></td>
					      <td><?=$ci->m_time->unix_to_datepicker_Y_2($value->consider_date)?></td>
					      <td><?=$ci->m_time->unix_to_datepicker_Y_2($value->Judge_date)?></td>
					      <td><?=$value->black_case?></td>
					      <td><?=$value->red_case?></td>
					      <td><?=$ci->m_time->unix_to_datepicker_Y_2($value->appeal_date)?></td>
					      <td><?=$ci->m_time->unix_to_datepicker_Y_2($value->warrant_mark_date)?></td>
					      <td><?=$ci->m_time->unix_to_datepicker_Y_2($value->sequester_date)?></td>
					      <td><?=$value->cort?></td>
					      <td><?=$numwith?> ครั้ง</td>
					      <td>
				             <?/*<button type="button" class="btn btn-secondary" onclick="location.href='<?=@site_url("aom/create/".$value->id)?>';">แก้ไข</button>*/?>
				             <button type="button" class="btn btn-danger" onclick="deleteconfirm('<?=@site_url("aom/delete/".$value->id)?>')">ลบ</button>
				          </td>
					    </tr>
				  		<?
				  	}
				  	?>
				    
				  </tbody>
				</table>
				<!-- pagination_wrapper -->
			    <div class="pagination_wrapper">
			      <nav aria-label="Page navigation example">
			        <ul class="pagination">
			          <?
			          if ($pagenum>1&&$pagenum<=$pagecount) {
			            ?>
			            <li class="page-item">
			              <a class="page-link" href="<?=site_url("main/dashboard/".($pagenum-1))?>" aria-label="Previous">
			                <span aria-hidden="true">&laquo;</span>
			                <span class="sr-only">Previous</span>
			              </a>
			            </li>
			            <?
			          }
			          for ($i=1; $i <=$pagecount ; $i++) { 
			            ?>
			            <li class="page-item"><a class="page-link" href="<?=site_url("main/dashboard/".$i)?>"><?=$i?></a></li>
			            <?
			          }
			          ?>          
			          <?
			          if ($pagenum>=1&&$pagenum<$pagecount) {
			            ?>
			            <li class="page-item">
			              <a class="page-link" href="<?=site_url("main/dashboard/".($pagenum+1))?>" aria-label="Next">
			                <span aria-hidden="true">&raquo;</span>
			                <span class="sr-only">Next</span>
			              </a>
			            </li>
			            <?
			          }
			            ?>
			          
			        </ul>
			      </nav>
			    </div>
			    <!-- end pagination_wrapper -->
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
          $(myform).attr("action","<?=site_url("main/aom/")?>");   
          $(myform).attr("method","post");
          $(myform).html('<input type="text" name="stu_keyword" value="'+$("#search_txt").val()+'"><input type="text" name="start_date" value="'+$("#start_date").val()+'"><input type="text" name="end_date" value="'+$("#end_date").val()+'">')
          document.body.appendChild(myform);
          myform.submit();
          $(myform).remove();
        }
      </script>

    </main><!-- /.container -->

    
