<main role="main" class="container">
  <!-- user_wrapper -->
  <div class="container">
    <div class="row">
      <div class="col col-md-12">
        <h1><span class="badge badge-info">Create user</span></h1>
      </div>
      <div class="col col-md-12">
        <form id="f-admin" method="post" action="<?=site_url("admin_user/create")?>">
          <?
          if (isset($edit)) {
            ?>
            <input type="hidden" class="form-control" name="edit" value="<?=$user->id?>">
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
              $("#prefix").val("<?=$user->prefix?>");
            </script>
            <?
          }
          ?>

          <div class="form-group">
            <label for="name">ขื่อ</label>
            <input type="text" class="form-control" name="name" placeholder="Enter name" id="name" <?if (isset($edit)) { echo "value='".$user->firstname."'";}?>>
          </div>

          <div class="form-group">
            <label for="surname">นามสกุล</label>
            <input type="text" class="form-control" name="surname" placeholder="Enter surname" id="surname" <?if (isset($edit)) { echo "value='".$user->lastname."'";}?>>
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" name="email" placeholder="Enter E-mail" id="email" <?if (isset($edit)) { echo "value='".$user->email."'";}?>>
          </div>

          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Automatic generated" id="username" <?if (isset($edit)) { echo "value='".$user->username."' disabled";}?>>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Automatic generated send via email" id="password" <?if (isset($edit)) { echo "value='".$user->password."'";}?>>
          </div>

          <div class="form-group" >
            <label for="con_password">Confirm Password</label>
            <input type="password" class="form-control" name="con_password" placeholder="Enter password again" id="con_password" <?if (isset($edit)) { echo "value='".$user->password."'";}?>>
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

