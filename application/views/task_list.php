<?
$ci =& get_instance();
$stat = array('active' => "รอ",'complete' => "เสร็จ",'cancel' => "ยกเลิก", );
?><main role="main" class="container">

  <h1 style="text-align: center;">Task</h1>

  <!-- user_wrapper -->
  <div class="container tab-content">

    <div class="row">
      <div class="col col-md-8">
        <button type="button" class="btn btn-primary" onclick="location.href='<?=site_url("task/create")?>';">สั่งงาน</button>
      </div>
    </div>
    <div class="row">
      <div class="col col-md-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="my-task-tab" data-toggle="tab" href="#my-task" role="tab" aria-controls="my-task" aria-selected="true">งานที่ค้าง</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="order-task-tab" data-toggle="tab" href="#order-task" role="tab" aria-controls="order-task" aria-selected="false">งานที่สั่ง</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="complete-task-tab" data-toggle="tab" href="#complete-task" role="tab" aria-controls="complete-task" aria-selected="false">งานที่เสร็จแล้ว</a>
          </li>
        </ul>
      </div>
    </div>

    <div class="row tab-pane fade show active" id="my-task" role="tabpanel" aria-labelledby="my-task-tab">
      <div class="col col-md-12">
      <table class="table table-bordered">
        <tr>
          <th>#</th>
          <th>ชื่องาน</th>
          <th>วันที่สั่งงาน</th>
          <th>สถานะ</th>
          <th>วันที่เสร็จ</th>
          <th>ผู้รับผิดชอบ</th>          
          <th width="150">ตัวเลือก</th>
        </tr>
        <?
        
        foreach ($my_task as $key => $value) {
          ?>
          <tr>
            <td><?=$key+1?></td>
            <td><a href="<?=site_url("task/view/".$value->id)?>"><?=$value->name?></a></td>
            <td><?=$ci->m_time->unix_to_datetimepicker($value->date_create)?></td>    
            <td><?=$stat[$value->status]?></td>
            <td><?=$ci->m_time->unix_to_datetimepicker($value->date_create)?></td>
            <td><?=$user_list[$value->responsible]->firstname." ".$user_list[$value->responsible]->firstname?></td>                       
            <td>              
              <button type="button" class="btn btn-danger" onclick="deleteconfirm('<?=site_url("task/delete/".$value->id)?>')">ลบ</button>
            </td>
          </tr>
          <?
        }
        ?>      
        
      </table>
    </div>
    <!-- pagination_wrapper -->
    <div class="pagination_wrapper">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <?
          if ($pagenum_mytask>1&&$pagenum_mytask<=$pagecount_mytask) {
            ?>
            <li class="page-item">
              <a class="page-link" href="<?=site_url("task/".($pagenum_mytask-1))?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <?
          }
          for ($i=1; $i <=$pagecount_mytask ; $i++) { 
            ?>
            <li class="page-item"><a class="page-link" href="<?=site_url("task/".$i)?>"><?=$i?></a></li>
            <?
          }
          ?>          
          <?
          if ($pagenum_mytask>=1&&$pagenum_mytask<$pagecount_mytask) {
            ?>
            <li class="page-item">
              <a class="page-link" href="<?=site_url("task/".($pagenum_mytask+1))?>" aria-label="Next">
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



    <div class="row tab-pane fade" id="order-task" role="tabpanel" aria-labelledby="order-task-tab">
      <div class="col col-md-12">
      <table class="table table-bordered">
        <tr>
          <th>#</th>
          <th>ชื่องาน</th>
          <th>วันที่สั่งงาน</th>
          <th>สถานะ</th>
          <th>วันที่เสร็จ</th>
          <th>ผู้รับผิดชอบ</th>          
          <th width="150">ตัวเลือก</th>
        </tr>
        <?
        
        foreach ($my_ordertask as $key => $value) {
          ?>
          <tr>
            <td><?=$key+1?></td>
            <td><a href="<?=site_url("task/view/".$value->id)?>"><?=$value->name?></a></td>
            <td><?=$ci->m_time->unix_to_datetimepicker($value->date_create)?></td>    
            <td><?=$stat[$value->status]?></td>
            <td><?=$ci->m_time->unix_to_datetimepicker($value->date_create)?></td>
            <td><?=$user_list[$value->responsible]->firstname." ".$user_list[$value->responsible]->firstname?></td>                       
            <td>              
              <button type="button" class="btn btn-danger" onclick="deleteconfirm('<?=site_url("task/delete/".$value->id)?>')">ลบ</button>
            </td>
          </tr>
          <?
        }
        ?>      
        
      </table>
    </div>
    <!-- pagination_wrapper -->
    <div class="pagination_wrapper">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <?
          if ($pagenum_ordertask>1&&$pagenum_ordertask<=$pagecount_ordertask) {
            ?>
            <li class="page-item">
              <a class="page-link" href="<?=site_url("task/".($pagenum_ordertask-1))?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <?
          }
          for ($i=1; $i <=$pagecount_ordertask ; $i++) { 
            ?>
            <li class="page-item"><a class="page-link" href="<?=site_url("task/".$i)?>"><?=$i?></a></li>
            <?
          }
          ?>          
          <?
          if ($pagenum_ordertask>=1&&$pagenum_ordertask<$pagecount_ordertask) {
            ?>
            <li class="page-item">
              <a class="page-link" href="<?=site_url("task/".($pagenum_ordertask+1))?>" aria-label="Next">
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




    <div class="row tab-pane fade" id="complete-task" role="tabpanel" aria-labelledby="complete-task-tab">
      <div class="col col-md-12">
      <table class="table table-bordered">
        <tr>
          <th>#</th>
          <th>ชื่องาน</th>
          <th>วันที่สั่งงาน</th>
          <th>สถานะ</th>
          <th>วันที่เสร็จ</th>
          <th>ผู้รับผิดชอบ</th>          
          <th width="150">ตัวเลือก</th>
        </tr>
        <?
        
        foreach ($donetask as $key => $value) {
          ?>
          <tr>
            <td><?=$key+1?></td>
            <td><a href="<?=site_url("task/view/".$value->id)?>"><?=$value->name?></a></td>
            <td><?=$ci->m_time->unix_to_datetimepicker($value->date_create)?></td>    
            <td><?=$stat[$value->status]?></td>
            <td><?=$ci->m_time->unix_to_datetimepicker($value->date_create)?></td>
            <td><?=$user_list[$value->responsible]->firstname." ".$user_list[$value->responsible]->firstname?></td>                       
            <td>              
              <button type="button" class="btn btn-danger" onclick="deleteconfirm('<?=site_url("task/delete/".$value->id)?>')">ลบ</button>
            </td>
          </tr>
          <?
        }
        ?>      
        
      </table>
    </div>
    <!-- pagination_wrapper -->
    <div class="pagination_wrapper">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <?
          if ($pagenum_donetask>1&&$pagenum_donetask<=$pagecount_donetask) {
            ?>
            <li class="page-item">
              <a class="page-link" href="<?=site_url("task/".($pagenum_donetask-1))?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <?
          }
          for ($i=1; $i <=$pagecount_donetask ; $i++) { 
            ?>
            <li class="page-item"><a class="page-link" href="<?=site_url("task/".$i)?>"><?=$i?></a></li>
            <?
          }
          ?>          
          <?
          if ($pagenum_donetask>=1&&$pagenum_donetask<$pagecount_donetask) {
            ?>
            <li class="page-item">
              <a class="page-link" href="<?=site_url("task/".($pagenum_donetask+1))?>" aria-label="Next">
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
    </script>

