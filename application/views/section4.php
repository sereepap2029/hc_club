<main role="main" class="container">

  <h1 style="text-align: center;">รูปแบบสำนวนสำหรับข้อ 4</h1>

  <!-- user_wrapper -->
  <div class="container">

    <div class="row">
      <div class="col col-md-8">
        <button type="button" class="btn btn-primary" onclick="location.href='<?=site_url("template/create_section4")?>';">เพิ่มสำนวน</button>
      </div>
    </div>

    <div class="row">
      <div class="col col-md-12">
      <table class="table table-bordered">
        <tr>
          <th>#</th>
          <th>name</th>          
          <th width="150">ตัวเลือก</th>
        </tr>
        <?
        foreach ($user_list as $key => $value) {
          ?>
          <tr>
            <td><?=$key+1?></td>
            <td><a href="#!"><?=$value->name?></a></td>                       
            <td>
              <button type="button" class="btn btn-secondary" onclick="location.href='<?=site_url("template/create_section4/".$value->id)?>';">แก้ไข</button>
              <button type="button" class="btn btn-danger" onclick="deleteconfirm('<?=site_url("template/delete_section4/".$value->id)?>')">ลบ</button>
            </td>
          </tr>
          <?
        }
        ?>      
        
      </table>
    </div>
    </div>

    <!-- pagination_wrapper -->
    <div class="pagination_wrapper">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <?
          if ($pagenum>1&&$pagenum<=$pagecount) {
            ?>
            <li class="page-item">
              <a class="page-link" href="<?=site_url("template/create_section4/".($pagenum-1))?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <?
          }
          for ($i=1; $i <=$pagecount ; $i++) { 
            ?>
            <li class="page-item"><a class="page-link" href="<?=site_url("template/create_section4/".$i)?>"><?=$i?></a></li>
            <?
          }
          ?>          
          <?
          if ($pagenum>=1&&$pagenum<$pagecount) {
            ?>
            <li class="page-item">
              <a class="page-link" href="<?=site_url("template/create_section4/".($pagenum+1))?>" aria-label="Next">
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

