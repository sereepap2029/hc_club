<?
$ci =& get_instance();
?>
<main role="main" class="container">
  <!-- user_wrapper -->
  <div class="container">
    <div class="row">
      <div class="col col-md-12">
        <h1><span class="badge badge-info">ตั้งค่า</span></h1>
      </div>
      <div class="col col-md-12">
        <form id="f-admin" method="post" action="<?=site_url("office_config")?>">
          <?
          if (isset($edit)) {
            ?>
            <input type="hidden" class="form-control" name="edit" value="<?=$office->id?>">
            <?
          }
          ?>
          <div class="row">
            <div class="col col-md-3 ">
              <h3>ข้อมูลบริษัท</h3>
                <div class="form-group">
                  <label for="name">ขื่อบริษัท</label>
                  <input type="text" class="form-control" name="name" placeholder="" <?if (isset($edit)) { echo "value='".$office->name."'";}?>>                  
                </div>
            </div>
            <div class="col col-md-3 ">
                <div class="form-group">
                  <label for="name">บ้านเลขที่</label>
                  <input type="text" class="form-control" name="home_num" placeholder="" <?if (isset($edit)) { echo "value='".$office->home_num."'";}?>>                  
                </div>
            </div>
            <div class="col col-md-3 ">
                <div class="form-group">
                  <label for="name">หมู่ที่</label>
                  <input type="text" class="form-control" name="moo" placeholder="" <?if (isset($edit)) { echo "value='".$office->moo."'";}?>>                  
                </div>
            </div>
            <div class="col col-md-3 ">
                <div class="form-group">
                  <label for="name">ถนน</label>
                  <input type="text" class="form-control" name="road" placeholder="" <?if (isset($edit)) { echo "value='".$office->road."'";}?>>                  
                </div>
            </div>
            <div class="col col-md-3 ">
                <div class="form-group">
                  <label for="name">ตรอก/ซอย</label>
                  <input type="text" class="form-control" name="soi" placeholder="" <?if (isset($edit)) { echo "value='".$office->soi."'";}?>>                  
                </div>
            </div>
            <div class="col col-md-3 ">
                <div class="form-group">
                  <label for="name">ตำบล/แขวง</label>
                  <input type="text" class="form-control" name="tum" placeholder="" <?if (isset($edit)) { echo "value='".$office->tum."'";}?>>                  
                </div>
            </div>
            <div class="col col-md-3 ">
                <div class="form-group">
                  <label for="name">อำเภอ/เขต</label>
                  <input type="text" class="form-control" name="aum" placeholder="" <?if (isset($edit)) { echo "value='".$office->aum."'";}?>>                  
                </div>
            </div>
            <div class="col col-md-3 ">
                <div class="form-group">
                  <label for="name">จังหวัด</label>
                  <select class="custom-select" id="province" name="province">
                  <?
                  foreach ($ci->m_stringlib->province_type as $key2 => $value2) {
                    ?>
                    <option value="<?=$value2?>"><?=$value2?></option>
                    <?
                  }
                  ?>
                  </select>
                </div>
                <?
                if (isset($edit)) {
                  ?>
                  <script type="text/javascript">
                    $("#province").val("<?=$office->province?>");
                  </script>
                  <?
                }
                ?>
            </div>
          </div>

          <div class="row">
            <div class="col col-md-10 ">
            <h3>บัญชีพยาน</h3>
                <div class="form-group">
                  <label for="name">บัญชีพยาน 1</label>
                  <input type="text" class="form-control" name="witness1" placeholder="" <?if (isset($edit)) { echo "value='".$office->witness1."'";}?>>                  
                </div>
                <div class="form-group">
                  <label for="name">บัญชีพยาน 2</label>
                  <input type="text" class="form-control" name="witness2" placeholder="" <?if (isset($edit)) { echo "value='".$office->witness2."'";}?>>                  
                </div>
                <div class="form-group">
                  <label for="name">บัญชีพยาน 3</label>
                  <input type="text" class="form-control" name="witness3" placeholder="" <?if (isset($edit)) { echo "value='".$office->witness3."'";}?>>                  
                </div>
                <div class="form-group">
                  <label for="name">บัญชีพยาน 4</label>
                  <input type="text" class="form-control" name="witness4" placeholder="" <?if (isset($edit)) { echo "value='".$office->witness4."'";}?>>                  
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

