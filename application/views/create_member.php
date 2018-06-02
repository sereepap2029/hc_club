<main role="main" class="container">
  <!-- user_wrapper -->
  <div class="container">
    <div class="row">
      <div class="col col-md-12">
        <h1><span class="badge badge-info">Create user</span></h1>
      </div>
      <div class="col col-md-12">
        <form id="f-member" method="post" action="<?=site_url("register")?>">
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
            <label for="sex">เพศ</label>
            <select id="sex" class="form-control" name="sex">
                <option>--- เลือกคำนำหน้าชื่อ ---</option>
                <option>ชาย</option>
                <option>หญิง</option>
                <option>อื่นๆ</option>
              </select>
          </div>
          <?
          if (isset($edit)) {
            ?>
            <script type="text/javascript">
              $("#sex").val("<?=$user->sex?>");
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
            <label for="phone">โทรศัพท์</label>
            <input type="text" class="form-control" name="phone" placeholder="" id="" <?if (isset($edit)) { echo "value='".$user->phone."'";}?>>
          </div>
          <div class="form-group">
            <label for="bank_name">ชื่อบัญชี</label>
            <input type="text" class="form-control" name="bank_name" placeholder="" id="" <?if (isset($edit)) { echo "value='".$user->bank_name."'";}?>>
          </div>
          <div class="form-group">
            <label for="bank_acc">เลขที่บัญชี</label>
            <input type="text" class="form-control" name="bank_acc" placeholder="" id="" <?if (isset($edit)) { echo "value='".$user->bank_acc."'";}?>>
          </div>
          <div class="form-group">
            <label for="bank_organization">ธนาคาร</label>
            <input type="text" class="form-control" name="bank_organization" placeholder="" id="" <?if (isset($edit)) { echo "value='".$user->bank_organization."'";}?>>
          </div>
          <div class="form-group">
            <label for="referrer_id">ผู้แนะนำ</label>
            <input type="text" class="form-control" name="referrer_id" placeholder="" id="" <?if (isset($edit)) { echo "value='".$user->referrer_id."'";}?>>
          </div>
          <div class="form-group">
            <label for="email">เลขสมาชิก</label>
            <input type="text" class="form-control" readonly placeholder="Automatic generated" id="" <?if (isset($edit)) { echo "value='".$user->ref_id."'";}?>>
          </div>

          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Username" id="username" <?if (isset($edit)) { echo "value='".$user->username."' disabled";}?>>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter password" id="password" >
          </div>

          <div class="form-group">
            <label for="con_password">Confirm Password</label>
            <input type="password" class="form-control" name="con_password" placeholder="Enter password again" id="con_password" >
          </div>
          <style type="text/css">
            .vid-name{
              margin-top: 20px;
            }
                .detail-pic,.ui-state-highlight2{
                    position: relative;
                    display: inline-block;
                    margin: 20px;
                }
                .detail-pic .pic-del{
                    position: absolute;
                    right: -5px;
                    top: -5px;
                }

          </style>
          <div class="row">
            <div class="col col-md-4 ">
                              <div class="form-group">
                                <label for="name">เอกสาร</label>
                              </div>
                          </div>
            <div class="col col-md-12">
              <!-- The fileinput-button span is used to style the file input field as button -->
              <span class="btn btn-success fileinput-button">
                  <span>Select files...</span>
              <!-- The file input field used as target for the file upload widget -->
              <input id="fileupload" type="file" name="files[]" multiple>
              </span>
              <br>
              <br>
              <!-- The global progress bar -->
              <div id="progress" class="success progress">
                  <div class="progress-bar bg-success progress-meter" role="progressbar" ></div>
              </div>
              <!-- The container for the uploaded files -->
              <div id="pic_detail_holder" class="cell-r"> 

                            <?
                            if(isset($edit)){
                                foreach ($user->item as $key => $value) {
                                    ?>
                                    <div class="detail-pic">
                                        <a class="btn btn-success pic-del" att-id="<?=$value->id?>" href="javascript:;">X</a>
                                        <img src="<?php echo site_url('media/member_item/'.$value->filepath); ?>" width="100" height="100">
                                        <input type="hidden" name="pic_detail[]" value="old_file_picture__<?=$value->id?>">
                                    </div>
                                    <?
                                }
                            }
                            ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col col-md-12">
              <div class="g-recaptcha" data-sitekey="6LctyzgUAAAAAHPcXtfwD6Tv6mPypVxFD2u1BR-5"></div>
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
        $( "#f-member" ).submit();
        
    });
  </script>
  <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?=site_url()?>/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?=site_url()?>/js/jquery.fileupload.js"></script>
<script type="text/javascript">
function form_show(div_class) {
    $(".step-form").fadeOut("fast", function() {
        setTimeout(function() {
            $("." + div_class).fadeIn();
        }, 500);

    });

}
$(function() {

    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = '<?php echo upload_site_url('upload/fileupload');?>';
    $('#fileupload').fileupload({
            url: url,
            dataType: 'json',
            done: function(e, data) {
                //console.log(data);
                $.each(data.result.files, function(index, file) {
                    //console.log(file);
                    $("#pic_detail_holder").append('<div class="detail-pic">'+
                                '<a class="btn btn-success pic-del" att-id="no" href="javascript:;">X</a>'+
                                '<img src="<?php echo site_url('media/temp'); ?>/' + file.name+'" width="100" height="100">'+
                                '<input type="hidden" name="pic_detail[]" value="' + file.name+'">'+
                            '</div>')
                });
            },
            progressall: function(e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-meter').css(
                    'width',
                    progress + '%'
                );
            }
        }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
$(document).on('click', ".pic-del", function(){
                var current_pic=$(this);
                if(confirm('Confirm delete?')) {
                    $("#pic_detail_holder").append('<input type="hidden" name="del_pic[]" value="'+current_pic.attr("att-id")+'">');
                    current_pic.parent().fadeOut(300, function() {
                                            $(this).remove();
                                        });
                }

});
</script>

</body>
</html>

