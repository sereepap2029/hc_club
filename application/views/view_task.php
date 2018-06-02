<?
$ci =& get_instance();
?>
<main role="main" class="container">
  <!-- user_wrapper -->
  <div class="container">
    <div class="row">
      <div class="col col-md-12">
        <h1><span class="badge badge-info"><?=$task->name?></span></h1>
      </div>
      <div class="col col-md-12">
        <form id="f-admin" method="post" action="<?=site_url("task/view")?>">
          <?
          if (isset($edit)) {
            ?>
            <input type="hidden" class="form-control" name="edit" value="<?=$task->id?>">
            <?
          }
          ?>
          <div class="form-group">
            <p><?=$task->work?></p>            
          </div>

          <div class="row">            
            <div class="col col-md-12">
               <h3>ผู้รับงาน</h3>
            </div>        
            <div class="col col-md-4 ">
              <div class="form-group">
              <p><?=$user_list[$task->responsible]->firstname." ".$user_list[$task->responsible]->firstname?></p>
              </div>
            </div> 
          </div>

          <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="status" id="exampleRadios1" value="complete" <?if (isset($edit)&&$task->status=="complete") { echo "checked";}?>>
                  <label class="form-check-label" >
                    เสร็จงาน
                  </label>
                </div>              
              </div>
          
          <div class="form-group" style="text-align: center;">
            <button type="button" class="btn btn-light submit">บันทึก</button>
          </div>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="col col-md-12">
        <h1><span class="badge badge-secondary">comment</span></h1>
      </div>
      <div class="col col-md-12">
        <form id="f-admin2" method="post" action="<?=site_url("task/comment")?>">
          <?
          if (isset($edit)) {
            ?>
            <input type="hidden" class="form-control" name="edit" value="<?=$task->id?>">
            <?
          }
          ?>
          <div class="form-group">
            <textarea class="form-control" name="com_box" style="width: 100%;height: 100px;"></textarea>                     
          </div>          
          <div class="form-group" style="text-align: center;">
            <button type="button" class="btn btn-light submit2">comment</button>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
    <?
    foreach ($comment as $key => $value) {
      ?>
      <div class="col col-md-12">
        <div class="card" style="width: 100%;">
          <div class="card-body">
            <h5 class="card-title"><?=$user_list[$value->user_id]->firstname." ".$user_list[$value->user_id]->firstname?> : <?=$ci->m_time->unix_to_datetimepicker($value->date_create)?></h5>
            <p class="card-text"><?=$value->des?></p>
            
          </div>
        </div>
      </div>
      <?
    }
    ?>
      
    </div>

  </div>
  <!-- end user_wrapper -->
  
</div>
<!-- end rapee_wrapper -->
    

</div>
<!-- end rapee_container -->
<script type="text/javascript">
  $(document).on("click", ".submit", function() {
        $( "#f-admin" ).submit();
        
    });
  $(document).on("click", ".submit2", function() {
        $( "#f-admin2" ).submit();
        
    });
</script>

</body>
</html>

