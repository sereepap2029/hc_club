<?
$ci =& get_instance();
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
<main role="main" class="container-fluid">
      <div class="container-fluid">
      <div class="row">
        <div class="col col-md-4">
          <?
          foreach ($pic_list as $key => $value) {
            $ext=explode("_", $value->filepath);
                        $new_ext=$ext[count($ext)-1];
            ?>
            <div class="detail-pic">
                <a class="button" href="#<?=$value->id?>"><img src="<?php echo site_url('media/aom_item/'.$value->filepath); ?>" width="100" height="100"></a>
                <a href="<?php echo site_url('media/aom_item/'.$value->filepath); ?>"><?=$new_ext?></a>
            </div>
            <?
          }
          ?>
        </div>
        <div class="col col-md-8">
          <div class="owl-carousel owl-theme">
            <?
            foreach ($pic_list as $key => $value) {
              ?>
              <div class="item" data-hash="<?=$value->id?>">
                <img src="<?php echo site_url('media/aom_item/'.$value->filepath); ?>" width="100%">                
              </div>
              <?
            }
            ?>
            
            
          </div>
          <style type="text/css">
                .detail-pic,.ui-state-highlight2{
                    position: relative;
                    display: inline-block;
                    margin: 20px;
                }

          </style>
          <hr>
          
        </div>
      </div>
    </div>

    </main><!-- /.container -->
    <script>
            $(document).ready(function() {
              $('.owl-carousel').owlCarousel({
                items: 1,
                loop: false,
                center: true,
                margin: 10,
                dots:false,
                callbacks: true,
                URLhashListener: true,
                autoplayHoverPause: true,
                startPosition: 'URLHash'
              });
            })
          </script>


