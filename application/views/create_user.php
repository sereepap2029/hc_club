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
            <input type="password" class="form-control" name="password" placeholder="Automatic generated send via email" id="password" >
          </div>

          <div class="form-group" >
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
                                <?
                                if (isset($edit)) {
                                  ?>
                                  <a data-fancybox data-type="iframe" data-src="<?=site_url("admin_user/read_item/".$user->id)?>" href="javascript:;" class="btn btn-success">ดูรูป</a>                                  
                                  <?
                                }
                                ?>
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
                                        <img src="<?php echo site_url('media/admin_item/'.$value->filepath); ?>" width="100" height="100">
                                        <input type="hidden" name="pic_detail[]" value="old_file_picture__<?=$value->id?>">
                                    </div>
                                    <?
                                }
                            }
                            ?>
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
$(function () {
    $("[data-fancybox]").fancybox({
      iframe : {
        css : {
          width : '95%',height : '95%'
        }
      }
    });
});
</script>

</body>
</html>

