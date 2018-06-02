<main role="main" class="container">
  <!-- user_wrapper -->
  <div class="container">
    <div class="row">
      <div class="col col-md-12">
        <h1><span class="badge badge-info">Task</span></h1>
      </div>
      <div class="col col-md-12">
        <form id="f-admin" method="post" action="<?=site_url("task/create")?>">
          <?
          if (isset($edit)) {
            ?>
            <input type="hidden" class="form-control" name="edit" value="<?=$task->id?>">
            <?
          }
          ?>

          <div class="form-group">
            <label for="name">ขื่องาน</label>
            <input type="text" class="form-control" name="name" placeholder="Enter name" id="name" <?if (isset($edit)) { echo "value='".$task->name."'";}?>>
          </div>

          <div class="form-group">
            <label for="surname">รายละเอียดงาน</label>
            <input type="text" class="form-control" name="work" placeholder="Enter surname" id="work" <?if (isset($edit)) { echo "value='".$task->work."'";}?>>
          </div>

          <div class="row">            
            <div class="col col-md-12">
               <h3>ผู้รับงาน</h3>
            </div>        
            <div class="col col-md-4 ">
              <div class="form-group">
                <select class="custom-select" id="responsible" name="responsible">
                <?
                foreach ($user_list as $key => $value) {
                  ?>
                  <option value="<?=$value->id?>"><?=$value->firstname." ".$value->lastname?></option>
                  <?
                }
                ?>
                </select>
              </div>
            </div> 
          </div>
          
          <div class="form-group" style="text-align: center;">
            <button type="button" class="btn btn-light submit">บันทึก</button>
            <button type="reset" value="Reset" class="btn btn-dark">ยกเลิก</button>
          </div>
        </form>
      </div>
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
</script>

</body>
</html>

