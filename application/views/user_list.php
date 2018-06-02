<main role="main" class="container">

  <h1 style="text-align: center;">All users</h1>

  <!-- user_wrapper -->
  <div class="container">

    <div class="row">
      <div class="col col-md-8">
        <button type="button" class="btn btn-primary" onclick="location.href='<?=site_url("admin_user/create")?>';">Create users</button>
      </div>
    </div>

    <div class="row">
      <div class="col col-md-12">
      <table class="table table-bordered">
        <tr>
          <th>#</th>
          <th>Username</th>
          <th>สร้าง/แก้ไข Account</th>
          <th>จัดการข้อมูล</th>
          <th>ลบข้อมูล</th>
          <th>การเงิน</th>
          <th>Template</th>
          <th>Print</th>
          
          <th width="150">ตัวเลือก</th>
        </tr>
        <?
        foreach ($user_list as $key => $value) {
          ?>
          <tr>
            <td><?=$key+1?></td>
            <td><a href="#!"><?=$value->username?></a></td>
            <td><input type="checkbox" name="user_permission" class="c_perm" u-id="<?=$value->id?>" value="account" <?if(isset($value->perm['account'])){ echo "checked";}?>></td>
            <td><input type="checkbox" name="user_permission" class="c_perm" u-id="<?=$value->id?>" value="data" <?if(isset($value->perm['data'])){ echo "checked";}?>></td>            
            <td><input type="checkbox" name="user_permission" class="c_perm" u-id="<?=$value->id?>" value="delete" <?if(isset($value->perm['delete'])){ echo "checked";}?>></td>            
            <td><input type="checkbox" name="user_permission" class="c_perm" u-id="<?=$value->id?>" value="money" <?if(isset($value->perm['money'])){ echo "checked";}?>></td>            
            <td><input type="checkbox" name="user_permission" class="c_perm" u-id="<?=$value->id?>" value="template" <?if(isset($value->perm['template'])){ echo "checked";}?>></td>            
            <td><input type="checkbox" name="user_permission" class="c_perm" u-id="<?=$value->id?>" value="print" <?if(isset($value->perm['print'])){ echo "checked";}?>></td>            
            <td>
              <button type="button" class="btn btn-secondary" onclick="location.href='<?=site_url("admin_user/create/".$value->id)?>';">แก้ไข</button>
              <button type="button" class="btn btn-danger" onclick="deleteconfirm('<?=site_url("admin_user/delete/".$value->id)?>')">ลบ</button>
            </td>
          </tr>
          <?
        }
        ?>      
        
      </table>
    </div>
    </div>

    <!-- pagination_wrapper -->
    <div class="pagination_wrapper">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <?
          if ($pagenum>1&&$pagenum<=$pagecount) {
            ?>
            <li class="page-item">
              <a class="page-link" href="<?=site_url("admin_user/".($pagenum-1))?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <?
          }
          for ($i=1; $i <=$pagecount ; $i++) { 
            ?>
            <li class="page-item"><a class="page-link" href="<?=site_url("admin_user/".$i)?>"><?=$i?></a></li>
            <?
          }
          ?>          
          <?
          if ($pagenum>=1&&$pagenum<$pagecount) {
            ?>
            <li class="page-item">
              <a class="page-link" href="<?=site_url("admin_user/".($pagenum+1))?>" aria-label="Next">
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
  <!-- end user_wrapper -->
  
</main>
<!-- end rapee_wrapper -->
    <script type="text/javascript">
      function deleteconfirm(link){
        if (confirm("Confirm Delete")) {
            window.open(link,"_self")
        };
    }
    $(document).on("change", ".c_perm", function() {
      var c_perm=$( this );
      var state="del";
      if (c_perm.prop( "checked" )){
        state="ins";
      }
        $.ajax({
                        method: "POST",
                        url: "<?php echo site_url("admin_user/ajax_set_perm"); ?>",
                        data: {
                            "id": c_perm.attr("u-id"),
                            "perm": c_perm.val(),
                            "state": state,
                        }
                    })
                    .done(function(data) {
                      if (data['flag']=="1") {
                        c_perm.prop( "checked", true );
                      }else if(data['flag']=="0"){
                        c_perm.prop( "checked", false );
                      }else{
                        alert("some wrong");
                      }
                    });     
        
    });
    </script>

