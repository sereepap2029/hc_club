<main role="main" class="container">
  <!-- user_wrapper -->
  <div class="container">
    <div class="row">
      <div class="col col-md-12">
        <h1><span class="badge badge-info">ทนายความ</span></h1>
      </div>
      <div class="col col-md-12">
        <form id="f-admin" method="post" action="<?=site_url("lawyer/create")?>">
          <?
          if (isset($edit)) {
            ?>
            <input type="hidden" class="form-control" name="edit" value="<?=$lawyer->id?>">
            <?
          }
          ?>
          <div class="form-group">
            <label for="prefix">คำนำหน้าชื่อ</label>
            <select id="prefix" class="form-control" name="prefix">
                <option>--- เลือกคำนำหน้าชื่อ ---</option>
                <option>นาย</option>
                <option>นาง</option>
                <option>นางสาว</option>
                <option>เด็กหญิง</option>
                <option>เด็กชาย</option>
              </select>
          </div>
          <?
          if (isset($edit)) {
            ?>
            <script type="text/javascript">
              $("#prefix").val("<?=$lawyer->prefix?>");
            </script>
            <?
          }
          ?>

          <div class="form-group">
            <label for="name">ขื่อ</label>
            <input type="text" class="form-control" name="name" placeholder="Enter name" id="name" <?if (isset($edit)) { echo "value='".$lawyer->name."'";}?>>
          </div>

          <div class="form-group">
            <label for="surname">นามสกุล</label>
            <input type="text" class="form-control" name="lastname" placeholder="Enter surname" id="lastname" <?if (isset($edit)) { echo "value='".$lawyer->lastname."'";}?>>
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" name="email" placeholder="Enter E-mail" id="email" <?if (isset($edit)) { echo "value='".$lawyer->email."'";}?>>
          </div>
          <div class="form-group">
            <label for="email">เบอร์โทร</label>
            <input type="text" class="form-control" name="phone" placeholder="Enter Phone" id="phone" <?if (isset($edit)) { echo "value='".$lawyer->phone."'";}?>>
          </div>

          <div class="form-group">
            <label for="rank">ทนายความชั้นที่</label>
            <select id="rank" class="form-control" name="rank">
                <option value="หนึ่ง">หนึ่ง</option>
                <option value="สอง">สอง</option>
                <option value="สาม">สาม</option>
                <option value="สี่">สี่</option>
                <option value="ห้า">ห้า</option>
              </select>
          </div>
          <?
          if (isset($edit)) {
            ?>
            <script type="text/javascript">
              $("#rank").val("<?=$lawyer->rank?>");
            </script>
            <?
          }
          ?>
          <div class="form-group">
            <label for="email">ใบอนุญาติที่</label>
            <input type="text" class="form-control" name="licence" placeholder="Enter licence" id="licence" <?if (isset($edit)) { echo "value='".$lawyer->licence."'";}?>>
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

