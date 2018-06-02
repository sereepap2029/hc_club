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
        <table class="table table-bordered" style="margin-top: 20px;">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">ชื่อ-นามสกุล</th>
              <th scope="col">วันที่</th>
              <th scope="col">หมายเหตุ</th>
            </tr>
          </thead>
          <tbody>
            <?
            foreach ($log_list as $key => $value) {
              ?>
              <tr>
                <td scope="row"><?=($key+1)?></td>
                <td><?=$value->user_data->firstname." ".$value->user_data->lastname?></td>
                <td><?=$ci->m_time->unix_to_datetimepicker($value->time)?></td>
                <td><?=$value->description?></td>
              </tr>
              <?
            }
            ?>
            
          </tbody>
        </table>
      </div>
    </div>

    </main><!-- /.container -->


