<?
$ci =& get_instance();
$day_name_arr = array(1 => "จ.",2 => "อ.",3 => "พ.",4 => "พฤ.",5 => "ศ.",6 => "ส.",7 => "อา.", );
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
<style type="text/css">
            .del_guarantee,.del_appeal,.del_borrow,.del_withdraw,.del_withdraw_detail,.del_sold,.del_investigate,.del_payment{
              position: absolute;
              top: 0px;
              right: 0px;
            }
            hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 10px solid rgba(150,0,0,.8);
}
          </style>
<main role="main" class="container">
  <!-- user_wrapper -->
  <div class="container">
    <div class="row">
      <div class="col col-md-12">
        <h1><span class="badge badge-info">เพิ่มข้อมูล งานบังคับคดี</span></h1>
      </div>
    </div>  
    <div class="row">  
      <div class="col col-md-12">
        <form id="f-admin" method="post" action="<?=site_url("bang/create")?>">
          <?
          if (isset($edit)) {
            ?>
            <input type="hidden" class="form-control" name="edit" value="<?=$dat->id?>">
            <?
          }
          ?>
          <div class="row">
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">เลขจัดสรร </label>
                <input type="text" class="form-control" name="group_number" placeholder="" id="group_number" <?if (isset($edit)) { echo "value='".$dat->group_number."'";}?>>
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <label for="surname">กลุ่มจัดสรร</label>
                <input type="text" class="form-control" name="group_name" placeholder="" id="group_name" <?if (isset($edit)) { echo "value='".$dat->group_name."'";}?>>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">วันรับเรื่อง </label>
                <input type="text" class="form-control datepicker" name="date" placeholder="วันรับเรื่อง" id="date" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->date)."'";}?>>
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <label for="surname">เลขที่บัญชี</label>
                <input type="text" class="form-control" name="acc_no" placeholder="" id="acc_no" <?if (isset($edit)) { echo "value='".$dat->acc_no."'";}?>>
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <label for="surname">ศาล</label>
                <input type="text" class="form-control" name="cort" placeholder="" id="cort" <?if (isset($edit)) { echo "value='".$dat->cort."'";}?>>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col col-md-2">
              <div class="form-group">
                <label for="name">เงินต้น</label>
                <input type="text" class="form-control" name="principle" placeholder="" id="principle" <?if (isset($edit)) { echo "value='".$dat->principle."'";}?>>
              </div>
            </div>
            <div class="col col-md-2">
              <div class="form-group">
                <label for="surname">ดอกเบี้ย</label>
                <input type="text" class="form-control" name="interest" placeholder="" id="interest" <?if (isset($edit)) { echo "value='".$dat->interest."'";}?>>
              </div>
            </div>
            <div class="col col-md-2">
              <div class="form-group">
                <label for="surname">เบี้ยปรับ</label>
                <input type="text" class="form-control" name="interest_pk" placeholder="" id="interest_pk" <?if (isset($edit)) { echo "value='".$dat->interest_pk."'";}?>>
              </div>
            </div>
            <div class="col col-md-2">
              <div class="form-group">
                <label for="surname">ค่าทนาย</label>
                <input type="text" class="form-control" name="lawyer_cost" placeholder="" id="lawyer_cost" <?if (isset($edit)) { echo "value='".$dat->lawyer_cost."'";}?>>
              </div>
            </div>
            <div class="col col-md-2">
              <div class="form-group">
                <label for="surname">จำนวนทุนทรัพย์</label>
                <input type="text" class="form-control" id="prin_total" value="0" readonly>
              </div>
            </div>
            
          </div>


          <div class="row">
            <div class="col col-md-3">
              <div class="form-group">
                <label for="surname">ชื่อผู้กู้(ล.1) </label>
                <input type="text" class="form-control" name="borrower" placeholder="" id="borrower" <?if (isset($edit)) { echo "value='".$dat->borrower."'";}?>>
              </div>
            </div>
            <div class="col col-md-3">
              <div class="form-group">
                <label for="surname">เลขบัตรประชาชน</label>
                <input type="text" class="form-control" name="borrower_id" placeholder="" id="borrower_id" <?if (isset($edit)) { echo "value='".$dat->borrower_id."'";}?>>
              </div>
            </div>
            <div class="col col-md-3">
              <div class="form-group">
                <label for="surname">คดีดำ</label>
                <input type="text" class="form-control" name="black_case" placeholder="" id="black_case" <?if (isset($edit)) { echo "value='".$dat->black_case."'";}?>>
              </div>
            </div>
            <div class="col col-md-3">
              <div class="form-group">
                <label for="surname">คดีแดง</label>
                <input type="text" class="form-control" name="red_case" placeholder="" id="red_case" <?if (isset($edit)) { echo "value='".$dat->red_case."'";}?>>
              </div>
            </div>
          </div>

          <div class="row">
            
            <div class="col col-md-4">
              <div class="form-group">
                <label for="surname">สาขา</label>
                <input type="text" class="form-control" name="branch" placeholder="" id="branch" <?if (isset($edit)) { echo "value='".$dat->branch."'";}?>>
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">วันออกจดหมาย </label>
                <input type="text" class="form-control datepicker" name="mail_date" placeholder="" id="mail_date" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->mail_date)."'";}?>>
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">วันที่กู้ </label>
                <input type="text" class="form-control datepicker" name="borrow_date" placeholder="" id="borrow_date" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->borrow_date)."'";}?>>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col col-md-2 ">
                  <div class="form-group">
                    <label for="name">จดหมายครั้งที่ 1 </label>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="borrower_mail_1" id="exampleRadios1" value="y" <?if (isset($edit)&&$dat->borrower_mail_1=="y") { echo "checked";}?>>
                      <label class="form-check-label" >
                        รับ
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="borrower_mail_1" id="exampleRadios2" value="n" <?if (isset($edit)&&$dat->borrower_mail_1=="n") { echo "checked";}?>>
                      <label class="form-check-label" >
                        ไม่รับ
                      </label>
                    </div>                  
                  </div>
              </div>
              <div class="col col-md-2 ">
                  <div class="form-group">
                    <label for="name">จดหมายครั้งที่ 2 </label>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="borrower_mail_2" id="exampleRadios1" value="y" <?if (isset($edit)&&$dat->borrower_mail_2=="y") { echo "checked";}?>>
                      <label class="form-check-label" >
                        รับ
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="borrower_mail_2" id="exampleRadios2" value="n" <?if (isset($edit)&&$dat->borrower_mail_2=="n") { echo "checked";}?>>
                      <label class="form-check-label" >
                        ไม่รับ
                      </label>
                    </div>                   
                  </div>
              </div>
              <div class="col col-md-2 ">
                  <div class="form-group">
                    <label for="name">จดหมายครั้งที่ 3 </label>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="borrower_mail_3" id="exampleRadios1" value="y" <?if (isset($edit)&&$dat->borrower_mail_3=="y") { echo "checked";}?>>
                      <label class="form-check-label" >
                        รับ
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="borrower_mail_3" id="exampleRadios2" value="n" <?if (isset($edit)&&$dat->borrower_mail_3=="n") { echo "checked";}?>>
                      <label class="form-check-label" >
                        ไม่รับ
                      </label>
                    </div>                   
                  </div>
              </div>
          </div>

          <div class="row">
            
            <div class="col col-md-3">
              <div class="form-group">
                <label for="surname">ประเภทสินเชื่อ</label>
                <input type="text" class="form-control" name="types_of_credits" placeholder="" id="types_of_credits" <?if (isset($edit)) { echo "value='".$dat->types_of_credits."'";}?>>
              </div>
            </div>
            <div class="col col-md-3">
              <div class="form-group">
                <label for="name">จำนวนเงินกู้ </label>
                <input type="text" class="form-control" name="loan" placeholder="" id="loan" <?if (isset($edit)) { echo "value='".$dat->loan."'";}?>>
              </div>
            </div>
            <div class="col col-md-3">
              <div class="form-group">
                <label for="name">ดอกเบี้ย ณ วันกู้ </label>
                <input type="text" class="form-control" name="interest_when_borrow" placeholder="" id="borrow_date" <?if (isset($edit)) { echo "value='".$dat->interest_when_borrow."'";}?>>
              </div>
            </div>
            <div class="col col-md-3">
              <div class="form-group">
                <label for="name">ดอกเบี้ย ณ วันฟ้อง </label>
                <input type="text" class="form-control" name="interest_when_sue" placeholder="" id="borrow_date" <?if (isset($edit)) { echo "value='".$dat->interest_when_sue."'";}?>>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col col-md-4">
            <h3>สัญญากู้</h3>
              <div class="form-group">
                <label for="name">เพิ่มสัญญากู้ </label>
                <input type="hidden" id="borrow_number" value="0">
                <button type="button" class="btn btn-success add_borrow">เพิ่ม</button>
                <input type="checkbox" id="is_show_borrow" value="y" checked>
              </div>
            </div>
          </div>
          <div class="row" id="borrow_holder">
            <?
            if (isset($edit)) {
              $g_num=0;
              foreach ($dat->borrow_list as $key => $value) {
                $g_num+=1;
                $id=$value->id;
                ?>
                <div class="col col-md-12 borrow-child">
                  <div class="row">  
                    <div class="col col-md-3">
                            <div class="form-group">
                              <label for="name">วันที่กู้ </label>
                              <input type="text" class="form-control datepicker" name="borrow_date_old[<?=$id?>]" placeholder="" id="" value="<?=$ci->m_time->unix_to_datepicker($value->borrow_date)?>">
                            </div>
                          </div>          
                          <div class="col col-md-3">
                            <div class="form-group">
                              <label for="surname">ประเภทสินเชื่อ</label>
                              <input type="text" class="form-control" name="types_of_credits_old[<?=$id?>]" placeholder="" id="" value="<?=$value->types_of_credits?>">
                            </div>
                          </div>
                          <div class="col col-md-2">
                            <div class="form-group">
                              <label for="name">จำนวนเงินกู้ </label>
                              <input type="text" class="form-control" name="loan_old[<?=$id?>]" placeholder="" id="" value="<?=$value->loan?>">
                            </div>
                          </div>
                          <div class="col col-md-2">
                            <div class="form-group">
                              <label for="name">ดอกเบี้ย ณ วันกู้ </label>
                              <input type="text" class="form-control" name="interest_when_borrow_old[<?=$id?>]" placeholder="" id="" value="<?=$value->interest_when_borrow?>">
                            </div>
                          </div>
                          <div class="col col-md-2">
                            <div class="form-group">
                              <label for="name">ดอกเบี้ย ณ วันฟ้อง </label>
                              <input type="text" class="form-control" name="interest_when_sue_old[<?=$id?>]" placeholder="" id="" value="<?=$value->interest_when_sue?>">
                            </div>
                          </div>
                          <button type="button" class="btn btn-success del_borrow" del-id="<?=$id?>">X</button>
                        </div>  
                        <div class="row">
                              <div class="col col-md-12">
                                <hr>
                              </div>
                            </div>          
                    </div>
                <?
              }
              ?>
              <script type="text/javascript">
                $(function () {
                  $("#borrow_number").val("<?=$g_num?>");
                });
              </script>
              <?
            }
            ?>
          </div>

          <div class="row">
            <div class="col col-md-12">
              <div class="form-group">
                <label for="surname">หลักประกัน </label>
                <textarea class="form-control" name="insurance" style="width: 100%;height: 150px;"><?if (isset($edit)) { echo $dat->insurance;}?></textarea>

              </div>
            </div>
            
          </div>


          
          <div class="row">
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">จำนวนจำเลย </label>
                <input type="text" class="form-control" name="defendant_num" placeholder="" id="defendant_num" <?if (isset($edit)) { echo "value='".$dat->defendant_num."'";}?>>
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">ผ่อนเดือนละ </label>
                <input type="text" class="form-control" name="monthly_pay" placeholder="" id="monthly_pay" <?if (isset($edit)) { echo "value='".$dat->monthly_pay."'";}?>>
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">ชำระภายในวันที่ </label>
                <input type="text" class="form-control" name="pay_time" placeholder="" id="pay_time" <?if (isset($edit)) { echo "value='".$dat->pay_time."'";}else{echo "value='สุดท้าย'";}?>>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">เริ่มชำระงวดแรกภายในวันที่ </label>
                <input type="text" class="form-control" name="start_pay_month" placeholder="" id="start_pay_month" <?if (isset($edit)) { echo "value='".$dat->start_pay_month."'";}?>>
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">เริ่มชำระงวดแรกใน พ.ศ. </label>
                <input type="text" class="form-control" name="start_pay_year" placeholder="" id="start_pay_year" <?if (isset($edit)) { echo "value='".$dat->start_pay_year."'";}?>>
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">ครบกำหนดวันที่ </label>
                <input type="text" class="form-control datepicker" name="end_pay_date" placeholder="" id="end_pay_date" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->end_pay_date)."'";}?>>
              </div>
            </div>
          </div>
          


          <div class="row">
            <div class="col col-md-12">
              <hr>
            </div>
          </div>

          <div class="row">
            <div class="col col-md-4">
            <h3>คนค้ำประกัน</h3>
              <div class="form-group">
                <label for="name">เพิ่มคนค้ำ </label>
                <input type="hidden" id="guarantee_number" value="1">
                <button type="button" class="btn btn-success add_guarantee">เพิ่ม</button>
                <input type="checkbox" id="is_show_guarantee" value="y" checked>
              </div>
            </div>
          </div>
          <div class="row" id="guarantee_holder">
            <?
            if (isset($edit)) {
              $g_num=1;
              foreach ($dat->guarantee as $key => $value) {
                $id=$value->id;
                $g_num+=1;
                ?>
                <div class="col col-md-12 guarantee-child">
                  <div class="row">
                    <div class="col col-md-6 ">
                              <div class="form-group">
                                <label for="name">ชื่อคนค้ำ (ล.<?=$g_num?>) </label>
                                <input type="text" class="form-control" name="guarantee_old[<?=$id?>]" placeholder="" value="<?=$value->guarantee?>">                  
                              </div>
                              <div class="form-group">
                                <label for="name">เลขบัตรประชาชน</label>
                                <input type="text" class="form-control" name="guarantee_id_old[<?=$id?>]" placeholder="" value="<?=$value->guarantee_id?>">                  
                              </div>
                          </div>
                          <div class="col col-md-2 ">
                              <div class="form-group">
                                <label for="name">จดหมายครั้งที่ 1 </label>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="guarantee_mail_1_old[<?=$id?>]" id="exampleRadios1" value="y" <?if ($value->guarantee_mail_1=="y") { echo "checked";}?>>
                                  <label class="form-check-label" >
                                    รับ
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="guarantee_mail_1_old[<?=$id?>]" id="exampleRadios2" value="n" <?if ($value->guarantee_mail_1=="n") { echo "checked";}?>>
                                  <label class="form-check-label" >
                                    ไม่รับ
                                  </label>
                                </div>                  
                              </div>
                              <div class="form-group">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="guarantee_mail_old[<?=$id?>]" id="exampleRadios1" value="y" <?if ($value->guarantee_mail=="y") { echo "checked";}?>>
                                  <label class="form-check-label" >
                                    จดหมายคนค้ำ
                                  </label>
                                </div>              
                              </div>
                          </div>
                          <div class="col col-md-2 ">
                              <div class="form-group">
                                <label for="name">จดหมายครั้งที่ 2 </label>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="guarantee_mail_2_old[<?=$id?>]" id="exampleRadios1" value="y" <?if ($value->guarantee_mail_2=="y") { echo "checked";}?>>
                                  <label class="form-check-label" >
                                    รับ
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="guarantee_mail_2_old[<?=$id?>]" id="exampleRadios2" value="n" <?if ($value->guarantee_mail_2=="n") { echo "checked";}?>>
                                  <label class="form-check-label" >
                                    ไม่รับ
                                  </label>
                                </div>                   
                              </div>
                          </div>
                          <div class="col col-md-2 ">
                              <div class="form-group">
                                <label for="name">จดหมายครั้งที่ 3 </label>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="guarantee_mail_3_old[<?=$id?>]" id="exampleRadios1" value="y" <?if ($value->guarantee_mail_3=="y") { echo "checked";}?>>
                                  <label class="form-check-label" >
                                    รับ
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="guarantee_mail_3_old[<?=$id?>]" id="exampleRadios2" value="n" <?if ($value->guarantee_mail_3=="n") { echo "checked";}?>>
                                  <label class="form-check-label" >
                                    ไม่รับ
                                  </label>
                                </div>                   
                              </div>
                          </div>
                          <button type="button" class="btn btn-success del_guarantee" del-id="<?=$id?>">X</button>
                        </div>
                        <div class="row">
                          <div class="col col-md-3 ">
                              <div class="form-group">
                                <label for="name">บ้านเลขที่</label>
                                <input type="text" class="form-control" name="guarantee_home_num_old[<?=$id?>]" placeholder="" value="<?=$value->guarantee_home_num?>">                  
                              </div>
                          </div>
                          <div class="col col-md-3 ">
                              <div class="form-group">
                                <label for="name">หมู่ที่</label>
                                <input type="text" class="form-control" name="guarantee_moo_old[<?=$id?>]" placeholder="" value="<?=$value->guarantee_moo?>">                  
                              </div>
                          </div>
                          <div class="col col-md-3 ">
                              <div class="form-group">
                                <label for="name">ถนน</label>
                                <input type="text" class="form-control" name="guarantee_road_old[<?=$id?>]" placeholder="" value="<?=$value->guarantee_road?>">                  
                              </div>
                          </div>
                          <div class="col col-md-3 ">
                              <div class="form-group">
                                <label for="name">ตรอก/ซอย</label>
                                <input type="text" class="form-control" name="guarantee_soi_old[<?=$id?>]" placeholder="" value="<?=$value->guarantee_soi?>">                  
                              </div>
                          </div>
                          <div class="col col-md-3 ">
                              <div class="form-group">
                                <label for="name">ตำบล/แขวง</label>
                                <input type="text" class="form-control" name="guarantee_tum_old[<?=$id?>]" placeholder="" value="<?=$value->guarantee_tum?>">                  
                              </div>
                          </div>
                          <div class="col col-md-3 ">
                              <div class="form-group">
                                <label for="name">อำเภอ/เขต</label>
                                <input type="text" class="form-control" name="guarantee_aum_old[<?=$id?>]" placeholder="" value="<?=$value->guarantee_aum?>">                  
                              </div>
                          </div>
                          <div class="col col-md-3 ">
                              <div class="form-group">
                                <label for="name">จังหวัด</label>
                                <select class="custom-select" id="guarantee_province_<?=$id?>" name="guarantee_province_old[<?=$id?>]">
                                <?
                                foreach ($ci->m_stringlib->province_type as $key2 => $value2) {
                                  ?>
                                  <option value="<?=$value2?>"><?=$value2?></option>
                                  <?
                                }
                                ?>
                                </select>
                              </div>
                              <script type="text/javascript">
                                $("#guarantee_province_<?=$id?>").val('<?=$value->guarantee_province?>');
                              </script>
                          </div>
                        </div>
                        
                    </div>
                <?
                
              }
              ?>
              <script type="text/javascript">
                $(function () {
                  $("#guarantee_number").val("<?=$g_num?>");
                });
              </script>
              <?
            }
            ?>
          </div>

          <div class="row">
            <div class="col col-md-12">
              <hr>
            </div>
          </div>



          <div class="row">
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">ครบกำหนดวันฟ้อง </label>
                <input type="text" class="form-control datepicker" name="sue_date_limit" placeholder="" id="sue_date_limit" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->sue_date_limit)."'";}?>>
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">วันฟ้อง </label>
                <input type="text" class="form-control datepicker" name="sue_date" placeholder="" id="sue_date" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->sue_date)."'";}?>>
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">วันนัดพิจารณาคดี </label>
                <input type="text" class="form-control datepicker" name="consider_date" placeholder="" id="consider_date" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->consider_date)."'";}?>>
              </div>
            </div>
            
          </div>

          <div class="row">
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">วันพิพากษา </label>
                <input type="text" class="form-control datepicker" name="Judge_date" placeholder="" id="Judge_date" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->Judge_date)."'";}?>>
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">การพิพากษา </label>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="judge" id="" value="normal" <?if (isset($edit)&&$dat->judge=="normal") { echo "checked";}?>>
                    <label class="form-check-label" >
                      พิพากษา
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="judge" id="" value="judge_agrees" <?if (isset($edit)&&$dat->judge=="judge_agrees") { echo "checked";}?>>
                    <label class="form-check-label" >
                      พิพากษาตามยอม
                    </label>
                  </div> 
              </div>
            </div>
            
          </div>

          <div class="row">
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">ครบอุทธรณ์วันที่</label>
                <input type="text" class="form-control datepicker" name="appeal_date" placeholder="" id="appeal_date" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->appeal_date)."'";}?>>
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">ขออณุมัติไม่อุทธรณ์วันที่</label>
                <input type="text" class="form-control datepicker" name="unappeal_date" placeholder="" id="unappeal_date" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->unappeal_date)."'";}?>>
              </div>
            </div>
            
          </div>

          <div class="row">
            
            <div class="col col-md-4">
              <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="appeal_type" id="" value="order_appeal" <?if (isset($edit)&&$dat->appeal_type=="order_appeal") { echo "checked";}?>>
                    <label class="form-check-label" >
                      คำสั่งอุทธรณ์
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="appeal_type" id="" value="no_appeal" <?if (isset($edit)&&$dat->appeal_type=="no_appeal") { echo "checked";}?>>
                    <label class="form-check-label" >
                      ไม่อุทธรณ์
                    </label>
                  </div> 
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">วันที่ </label>
                <input type="text" class="form-control datepicker" name="appeal_type_date" placeholder="" id="appeal_type_date" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->appeal_type_date)."'";}?>>
              </div>
            </div>
            
          </div>


          <div class="row">
            
            <div class="col col-md-4">
              <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="bank_statement" id="" value="y" <?if (isset($edit)&&$dat->bank_statement=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      statement ธนาคาร
                    </label>
                  </div>
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="we_statement" id="" value="y" <?if (isset($edit)&&$dat->we_statement=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      statement เราทำ
                    </label>
                  </div>
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">พนักงาน </label>
                <input type="text" class="form-control" name="statement_officer" placeholder="" id="statement_officer" <?if (isset($edit)) { echo "value='".$dat->statement_officer."'";}?>>
              </div>
            </div>
            
          </div>

          <div class="row">
            <div class="col col-md-12">
              <hr>
            </div>
          </div>

          <div class="row">
            <div class="col col-md-4">
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="borrower_dead" id="exampleRadios1" value="y" <?if (isset($edit)&&$dat->borrower_dead=="y") { echo "checked";}?>>
                  <label class="form-check-label" >
                    ผู้กู้ได้ถึงแก่ความตาย
                  </label>
                </div>              
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">ผู้รับมรดก</label>
                <input type="text" class="form-control" name="heritage" placeholder="" id="heritage" <?if (isset($edit)) { echo "value='".$dat->heritage."'";}?>>
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">ความสัมพันธ์กับผู้กู้</label>
                <input type="text" class="form-control" name="relate" placeholder="" id="relate" <?if (isset($edit)) { echo "value='".$dat->heritage_relate."'";}?>>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col col-md-4">
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="case_close" id="exampleRadios1" value="y" <?if (isset($edit)&&$dat->case_close=="y") { echo "checked";}?>>
                  <label class="form-check-label" >
                    ปิดบัญชี
                  </label>
                </div>              
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="refrain" id="exampleRadios1" value="y" <?if (isset($edit)&&$dat->refrain=="y") { echo "checked";}?>>
                  <label class="form-check-label" >
                    งด
                  </label>
                </div>              
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="sue_cancel" id="exampleRadios1" value="y" <?if (isset($edit)&&$dat->sue_cancel=="y") { echo "checked";}?>>
                  <label class="form-check-label" >
                    ถอนฟ้อง
                  </label>
                </div>              
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col col-md-12">
              <hr>
            </div>
          </div>
          <div class="row">
            <div class="col col-md-4">
            <h3>สวมสิทธิ์</h3>
            </div>
          </div>

          <div class="row">
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">วันที่ยื่นคำร้อง</label>
                <input type="text" class="form-control datepicker" name="wearing_date" placeholder="วันที่ยื่นคำร้อง" id="wearing_date" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->wearing_date)."'";}?>>
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <label for="surname">ค่านำหมาย</label>
                <input type="text" class="form-control" name="wearing_warrant_cost" placeholder="" id="wearing_warrant_cost" <?if (isset($edit)) { echo "value='".$dat->wearing_warrant_cost."'";}?>>
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <label for="surname">ค่าธรรมเนี่ยม</label>
                <input type="text" class="form-control" name="wearing_warrant_fee" placeholder="" id="wearing_warrant_fee" <?if (isset($edit)) { echo "value='".$dat->wearing_warrant_fee."'";}?>>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col col-md-12">
              <div class="form-group">
                <label for="surname">คำสั่งสวมสิทธิ์</label>
                <input type="text" class="form-control" name="wearing_order" placeholder="" id="wearing_order" <?if (isset($edit)) { echo "value='".$dat->wearing_order."'";}?>>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col col-md-2">
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="wearing_claim" id="exampleRadios1" value="y" <?if (isset($edit)&&$dat->wearing_claim=="y") { echo "checked";}?>>
                  <label class="form-check-label" >
                    คำร้อง
                  </label>
                </div>              
              </div>
            </div>
            <div class="col col-md-2">
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="wearing_receipt" id="exampleRadios1" value="y" <?if (isset($edit)&&$dat->wearing_receipt=="y") { echo "checked";}?>>
                  <label class="form-check-label" >
                    ใบเสร็จ
                  </label>
                </div>              
              </div>
            </div>
            <div class="col col-md-2">
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="wearing_withdraw_y" id="exampleRadios1" value="y" <?if (isset($edit)&&$dat->wearing_withdraw_y=="y") { echo "checked";}?>>
                  <label class="form-check-label" >
                    เบิกสวมสิทธิ์แล้ว
                  </label>
                </div>              
              </div>
            </div>
            <div class="col col-md-2">
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="wearing_withdraw_n" id="exampleRadios1" value="y" <?if (isset($edit)&&$dat->wearing_withdraw_n=="y") { echo "checked";}?>>
                  <label class="form-check-label" >
                    ยังไม่เบิกสวมสิทธิ์
                  </label>
                </div>              
              </div>
            </div>
            <div class="col col-md-2">
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="wearing_c" id="exampleRadios1" value="y" <?if (isset($edit)&&$dat->wearing_c=="y") { echo "checked";}?>>
                  <label class="form-check-label" >
                    คำสั่งสวมสิทธิ์
                  </label>
                </div>              
              </div>
            </div>
          </div>






          <div class="row">
            <div class="col col-md-12">
              <hr>
            </div>
          </div>
          <div class="row">
            <div class="col col-md-4">
            <h3>หมายตั้ง</h3>
            </div>
          </div>
          <div class="row">

            <div class="col col-md-4">
              <div class="form-group">
                  <div class="form-group">
                    <label for="name">วันที่ยื่นคำร้องออกหมายตั้ง </label>
                    <input type="text" class="form-control datepicker" name="request_warrant_mark_date" placeholder="" id="request_warrant_mark_date" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->request_warrant_mark_date)."'";}?>>
                  </div>
              </div>
            </div>
            
            <div class="col col-md-4">
              <div class="form-group">
                  <div class="form-group">
                    <label for="name">วันที่ออกหมาย </label>
                    <input type="text" class="form-control datepicker" name="warrant_mark_date" placeholder="" id="warrant_mark_date" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->warrant_mark_date)."'";}?>>
                  </div>
              </div>
            </div>
            
            
          </div>


          <div class="row">            
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">คืนเงินค่าฤชา </label>
                <input type="text" class="form-control" name="court_cost" placeholder="" id="court_cost" <?if (isset($edit)) { echo "value='".$dat->court_cost."'";}?>>
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">วันที่ </label>
                <input type="text" class="form-control datepicker" name="court_cost_date" placeholder="" id="court_cost_date" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->court_cost_date)."'";}?>>
              </div>
            </div>
            
          </div>
          <div class="row">
            <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="request_warrant_mark" id="" value="y" <?if (isset($edit)&&$dat->request_warrant_mark=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      คำร้องขอออกหมาย
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="cort_warrant_mark" id="" value="y" <?if (isset($edit)&&$dat->cort_warrant_mark=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      บัญชีฤชา
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="warrant_mark" id="" value="y" <?if (isset($edit)&&$dat->warrant_mark=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      ออกหมายตั้ง
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="scan_warrant_mark" id="" value="y" <?if (isset($edit)&&$dat->scan_warrant_mark=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      แสกนแล้ว
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="withdraw_warrant_mark" id="" value="y" <?if (isset($edit)&&$dat->withdraw_warrant_mark=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      เบิกหมายแล้ว
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="unwithdraw_warrant_mark" id="" value="y" <?if (isset($edit)&&$dat->unwithdraw_warrant_mark=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      ยังไม่เบิกหมาย
                    </label>
                  </div>
                </div>
              </div>
          </div>

          <div class="row">
            <div class="col col-md-12">
              <hr>
            </div>
          </div>

          <div class="row">
            <div class="col col-md-4">
            <h3>สืบทรัพย์</h3>
              <div class="form-group">
                <label for="name">เพิ่มสืบทรัพย์ </label>
                <input type="hidden" id="investigate_number" value="0">
                <button type="button" class="btn btn-success add_investigate">เพิ่ม</button>
                <input type="checkbox" id="is_show_investigate" value="y" checked>
              </div>
            </div>
          </div>
          <div class="row" id="investigate_holder">
            <?
            if (isset($edit)) {
              $g_num=0;
              foreach ($dat->investigate as $key => $value) {
                $g_num+=1;
                $id=$value->id;
                ?>
                <div class="col col-md-12 investigate-child">
                  <div class="row">
                    <div class="col col-md-6">
                      <h5>ขนส่ง</h5>
                    </div>
                    <div class="col col-md-6">
                      <h5>ที่ดิน</h5>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col col-md-6">
                      <div class="form-group">
                        <label for="name">จำเลยที่ <?=$g_num?> </label>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="transport_found_old[<?=$id?>]" id="" value="y" <?if (isset($edit)&&$value->transport_found=="y") { echo "checked";}?>>
                            <label class="form-check-label" >
                              พบ
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="transport_found_old[<?=$id?>]" id="" value="n" <?if (isset($edit)&&$value->transport_found=="n") { echo "checked";}?>>
                            <label class="form-check-label" >
                              ไม่พบ
                            </label>
                          </div> 
                      </div>
                    </div>
                    <div class="col col-md-6">
                      <div class="form-group">
                        <label for="name">จำเลยที่ <?=$g_num?> </label>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="land_found_old[<?=$id?>]" id="" value="y" <?if (isset($edit)&&$value->land_found=="y") { echo "checked";}?>>
                            <label class="form-check-label" >
                              พบ
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="land_found_old[<?=$id?>]" id="" value="n" <?if (isset($edit)&&$value->land_found=="n") { echo "checked";}?>>
                            <label class="form-check-label" >
                              ไม่พบ
                            </label>
                          </div> 
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col col-md-6 ">
                              <div class="form-group">
                                <label for="name">วันที่สืบ</label>
                                <input type="text" class="form-control datepicker" name="transport_date_old[<?=$id?>]" placeholder="" value="<?=$ci->m_time->unix_to_datepicker($value->transport_date)?>">                  
                              </div>
                              <div class="form-group">
                                <label for="name">เลขหนังสือ</label>
                                <input type="text" class="form-control" name="transport_book_old[<?=$id?>]" placeholder="" value="<?=$value->transport_book?>">
                              </div>
                              <div class="form-group">
                                <label for="name">ทรัพย์ที่พบ</label>
                                <input type="text" class="form-control" name="transport_property_old[<?=$id?>]" placeholder="" value="<?=$value->transport_property?>">
                              </div>
                              <div class="form-group">
                                <label for="name">หมายเหตุ</label>
                                <textarea class="form-control" name="transport_note_old[<?=$id?>]" style="width: 100%;height: 60px;"><?=$value->transport_note?></textarea>         
                              </div>
                          </div>
                          <div class="col col-md-6 ">
                              <div class="form-group">
                                <label for="name">วันที่สืบ</label>
                                <input type="text" class="form-control datepicker" name="land_date_old[<?=$id?>]" placeholder="" value="<?=$ci->m_time->unix_to_datepicker($value->land_date)?>">                  
                              </div>
                              <div class="form-group">
                                <label for="name">เลขหนังสือ</label>
                                <input type="text" class="form-control" name="land_book_old[<?=$id?>]" placeholder="" value="<?=$value->land_book?>">
                              </div>
                              <div class="form-group">
                                <label for="name">ทรัพย์ที่พบ</label>
                                <input type="text" class="form-control" name="land_property_old[<?=$id?>]" placeholder="" value="<?=$value->land_property?>">
                              </div>
                              <div class="form-group">
                                <label for="name">หมายเหตุ</label>
                                <textarea class="form-control" name="land_note_old[<?=$id?>]" style="width: 100%;height: 60px;"><?=$value->land_note?></textarea>         
                              </div>
                          </div>
                          <button type="button" class="btn btn-success del_investigate" del-id="<?=$id?>">X</button>
                        </div>
                        
                    </div>
                <?
              }
              ?>
              <script type="text/javascript">
                $(function () {
                  $("#investigate_number").val("<?=$g_num?>");
                });
              </script>
              <?
            }
            ?>
          </div>

          <div class="row">
            <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="investigete_close" id="" value="y" <?if (isset($edit)&&$dat->investigete_close=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      ปิดบัญชี
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="investigete_death" id="" value="y" <?if (isset($edit)&&$dat->investigete_death=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      เสียชีวิต
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="investigete_done" id="" value="y" <?if (isset($edit)&&$dat->investigete_done=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      สืบครบแล้ว
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="investigete_undone" id="" value="y" <?if (isset($edit)&&$dat->investigete_undone=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      สืบยังไม่ครบ
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="withdraw_investigete" id="" value="y" <?if (isset($edit)&&$dat->withdraw_investigete=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      เบิกสืบแล้ว
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="unwithdraw_investigete" id="" value="y" <?if (isset($edit)&&$dat->unwithdraw_investigete=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      ยังไม่เบิกสืบ
                    </label>
                  </div>
                </div>
              </div>
          </div>

          <div class="row">
            
            <div class="col col-md-12">
              <div class="form-group">                  
                  <div class="form-group">
                    <label for="name">เอกสารที่ต้องส่ง,โฉนด,สัญญาจำเลย,สัญญาให้(ถ้ามี)</label>
                    <textarea class="form-control" name="investigete_contract_note" style="width: 100%;height: 100px;"><?if (isset($edit)) { echo $dat->investigete_contract_note;}?></textarea>         
                  </div>
                  <div class="form-group">
                    <label for="name">ผู้รับผิดชอบ </label>
                    <input type="text" class="form-control" name="investigete_officer" placeholder="" id="investigete_officer" <?if (isset($edit)) { echo "value='".$dat->investigete_officer."'";}?>>
                  </div>
              </div>
            </div>            
          </div>


          <div class="row">
            <div class="col col-md-12">
              <hr>
            </div>
          </div>

          <div class="row">
            <div class="col col-md-4">
              <h3>ยึดทรัพย์</h3>              
            </div>
          </div>
          <div class="row">
            <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="seize_map" id="" value="y" <?if (isset($edit)&&$dat->seize_map=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      แผนที่
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="seize_photo" id="" value="y" <?if (isset($edit)&&$dat->seize_photo=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      ภาพถ่าย
                    </label>
                  </div>
                </div>
              </div>
            <div class="col col-md-4">
              <div class="form-group">
                  <div class="form-group">
                    <label for="name">ผู้รับผิดชอบ </label>
                    <input type="text" class="form-control" name="seize_officer" placeholder="" id="seize_officer" <?if (isset($edit)) { echo "value='".$dat->seize_officer."'";}?>>
                  </div>
              </div>
            </div>
            
          </div>                   

          <div class="row">
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">วันที่อายัด </label>
                <input type="text" class="form-control datepicker" name="sequester_date" placeholder="" id="sequester_date" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->sequester_date)."'";}?>>
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">วันที่ยึด </label>
                <input type="text" class="form-control datepicker" name="seize_date" placeholder="" id="seize_date" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->seize_date)."'";}?>>
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="finish" id="" value="y" <?if (isset($edit)&&$dat->finish=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      เสร็จ
                    </label>
                  </div>
              </div>
            </div>       
          </div>
          <div class="row">            
            <div class="col col-md-4">
               <div class="form-group">
                 <label for="name">ผู้ถือกรรมสิทธิ์</label>
                 <input type="text" class="form-control" name="seize_owner" placeholder="" id="" <?if (isset($edit)) { echo "value='".$dat->seize_owner."'";}?>>
               </div>
            </div>
            <div class="col col-md-4">
               <div class="form-group">
                 <label for="name">จำเลยที่</label>
                 <input type="text" class="form-control" name="seize_guarantee_num" placeholder="" id="" <?if (isset($edit)) { echo "value='".$dat->seize_guarantee_num."'";}?>>
               </div>
            </div>            
          </div>
          <div class="row">            
            <div class="col col-md-12">
               <div class="form-group">
                 <label for="name">สำนักงานบังคับคดี</label>
                 <input type="text" class="form-control" name="seize_enforce_office" placeholder="" id="" <?if (isset($edit)) { echo "value='".$dat->seize_enforce_office."'";}?>>
               </div>
            </div>           
          </div>
          <div class="row">
            <div class="col col-md-4">
              <div class="form-group">
                  <div class="form-group">
                    <label for="name">ประเภททรัพย์ที่ยึด </label>
                    <input type="text" class="form-control" name="seize_property_type" placeholder="" id="seize_property_type" <?if (isset($edit)) { echo "value='".$dat->seize_property_type."'";}?>>
                  </div>
              </div>
            </div>
            <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="seize_land" id="" value="y" <?if (isset($edit)&&$dat->seize_land=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      ที่ดิน
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="seize_car" id="" value="y" <?if (isset($edit)&&$dat->seize_car=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      รถ
                    </label>
                  </div>
                </div>
              </div>
          </div> 
          <div class="row">            
            <div class="col col-md-12">
               <div class="form-group">
                 <label for="name">ทรัพย์ที่พบ</label>
                 <textarea class="form-control" name="property" style="width: 100%;height: 100px;"><?if (isset($edit)) { echo $dat->property;}?></textarea>         
               </div>
            </div>            
          </div> 
          <div class="row">            
            <div class="col col-md-12">
               <div class="form-group">
                 <label for="name">ทรัพย์ที่ยึด</label>
                 <textarea class="form-control" name="sequester_property" style="width: 100%;height: 150px;"><?if (isset($edit)) { echo $dat->sequester_property;}?></textarea>         
               </div>
            </div>            
          </div>
          <div class="row">
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">ราคาประเมิน </label>
                <input type="text" class="form-control" id="sold_estimate" name="sold_estimate" <?if (isset($edit)) { echo "value='".$dat->sold_estimate."'";}?>>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">เลขที่ใบเสร็จ ณ ที่ทำการ </label>
                <input type="text" class="form-control" id="" name="seize_billing_at_office" <?if (isset($edit)) { echo "value='".$dat->seize_billing_at_office."'";}?>>
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">ค่าเธรรมเนียม </label>
                <input type="text" class="form-control" id="" name="seize_billing_at_office_fee" <?if (isset($edit)) { echo "value='".$dat->seize_billing_at_office_fee."'";}?>>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">เลขที่ใบเสร็จข้ามเขต </label>
                <input type="text" class="form-control" id="" name="seize_billing_outbound" <?if (isset($edit)) { echo "value='".$dat->seize_billing_outbound."'";}?>>
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">ค่าเธรรมเนียม </label>
                <input type="text" class="form-control" id="" name="seize_billing_outbound_fee" <?if (isset($edit)) { echo "value='".$dat->seize_billing_outbound_fee."'";}?>>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tr_14_12" id="" value="y" <?if (isset($edit)&&$dat->tr_14_12=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      ทร. 14,12
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="seize_request" id="" value="y" <?if (isset($edit)&&$dat->seize_request=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      คำร้องขอยึด
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="seize_report" id="" value="y" <?if (isset($edit)&&$dat->seize_report=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      รายงาน
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="seize_deed" id="" value="y" <?if (isset($edit)&&$dat->seize_deed=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      โฉนด
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="seize_price_estimate" id="" value="y" <?if (isset($edit)&&$dat->seize_price_estimate=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      ราคาประเมิน
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="seize_mapandphoto" id="" value="y" <?if (isset($edit)&&$dat->seize_mapandphoto=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      แผนที่/ภาพถ่าย
                    </label>
                  </div>
                </div>
              </div>
          </div>
          <div class="row">
            <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="seize_bill" id="" value="y" <?if (isset($edit)&&$dat->seize_bill=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      ใบเสร็จ
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="withdraw_seize" id="" value="y" <?if (isset($edit)&&$dat->withdraw_seize=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      เบิกยึดแล้ว
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="unwithdraw_seize" id="" value="y" <?if (isset($edit)&&$dat->unwithdraw_seize=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      ยังไม่เบิกยึด
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-4">
              <div class="form-group">
                <label for="name">ผู้นำยึด </label>
                <input type="text" class="form-control" id="" name="seize_lead_officer" <?if (isset($edit)) { echo "value='".$dat->seize_lead_officer."'";}?>>
              </div>
            </div>
              
          </div>
          <div class="row">
            <div class="col col-md-12">
              <hr>
            </div>
          </div>

          <div class="row">
            <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="acc_close" id="" value="y" <?if (isset($edit)&&$dat->acc_close=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      ปิดบัญญชีวันที่
                    </label>
                  </div>
                </div>
            </div>
            <div class="col col-md-3">
              <div class="form-group">
                <input type="text" class="form-control datepicker" name="acc_close_date" placeholder="" id="acc_close_date" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->acc_close_date)."'";}?>>
              </div>
            </div>
            <div class="col col-md-3">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="paybill_enforce" id="" value="y" <?if (isset($edit)&&$dat->paybill_enforce=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      ชำระหนี้บัฃคับคดีวันที่
                    </label>
                  </div>
                </div>
            </div>
            <div class="col col-md-3">
              <div class="form-group">
                <input type="text" class="form-control datepicker" name="paybill_enforce_date" placeholder="" id="paybill_enforce_date" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->paybill_enforce_date)."'";}?>>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="paybill_lawyer" id="" value="y" <?if (isset($edit)&&$dat->paybill_lawyer=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      ชำระค่าทนายวันที่
                    </label>
                  </div>
                </div>
            </div>
            <div class="col col-md-3">
              <div class="form-group">
                <input type="text" class="form-control datepicker" name="paybill_lawyer_date" placeholder="" id="paybill_lawyer_date" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->paybill_lawyer_date)."'";}?>>
              </div>
            </div>
            <div class="col col-md-3">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="payperiod" id="" value="y" <?if (isset($edit)&&$dat->payperiod=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      ส่งงวดแล้ววันที่
                    </label>
                  </div>
                </div>
            </div>
            <div class="col col-md-3">
              <div class="form-group">
                <input type="text" class="form-control datepicker" name="payperiod_date" placeholder="" id="payperiod_date" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->payperiod_date)."'";}?>>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="payperiod_command" id="" value="y" <?if (isset($edit)&&$dat->payperiod_command=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      รอคำสั่งวันที่
                    </label>
                  </div>
                </div>
            </div>
            <div class="col col-md-3">
              <div class="form-group">
                <input type="text" class="form-control datepicker" name="payperiod_command_date" placeholder="" id="payperiod_command_date" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->payperiod_command_date)."'";}?>>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="acc_unwithdraw" id="" value="y" <?if (isset($edit)&&$dat->acc_unwithdraw=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      ยังไม่ถอน
                    </label>
                  </div>
                </div>
            </div>
            <div class="col col-md-3">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="acc_withdraw" id="" value="y" <?if (isset($edit)&&$dat->acc_withdraw=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      ถอนแล้ววันที่
                    </label>
                  </div>
                </div>
            </div>
            <div class="col col-md-3">
              <div class="form-group">
                <input type="text" class="form-control datepicker" name="acc_withdraw_date" placeholder="" id="acc_withdraw_date" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->acc_withdraw_date)."'";}?>>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col col-md-12">
              <hr>
            </div>
          </div>

          <div class="row">
            <div class="col col-md-4">
            <h3>รับค่าใช้จ่ายคืน</h3>
            </div>
          </div>
          <div class="row">
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">ณ ที่ทำการวันที่ </label>
                <input type="text" class="form-control datepicker" name="refund_date" placeholder="" id="refund_date" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->refund_date)."'";}?>>
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">เลขที่เช็ค </label>
                <input type="text" class="form-control " name="refund_checks_number" placeholder="" id="" <?if (isset($edit)) { echo "value='".$dat->refund_checks_number."'";}?>>
              </div>
            </div>   
          </div>
          <div class="row">
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">ข้ามเขตวันที่ </label>
                <input type="text" class="form-control datepicker" name="refund_outbound_date" placeholder="" id="refund_outbound_date" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->refund_outbound_date)."'";}?>>
              </div>
            </div>
            <div class="col col-md-4">
              <div class="form-group">
                <label for="name">เลขที่เช็ค </label>
                <input type="text" class="form-control " name="refund_outbound_checks_number" placeholder="" id="" <?if (isset($edit)) { echo "value='".$dat->refund_outbound_checks_number."'";}?>>
              </div>
            </div>   
          </div>
          <div class="row">
            <div class="col col-md-3">
              <div class="form-group">
                <label for="name">เบอร์โทร </label>
                <input type="text" class="form-control" name="refund_phone" placeholder="" id="refund_phone" <?if (isset($edit)) { echo "value='".$dat->refund_phone."'";}?>>
              </div>
            </div>
            <div class="col col-md-3">
              <div class="form-group">
                <label for="name">หมายเหตุ </label>
                <input type="text" class="form-control" name="refund_note" placeholder="" id="refund_note" <?if (isset($edit)) { echo "value='".$dat->refund_note."'";}?>>
              </div>
            </div>
            <div class="col col-md-3">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="refund_withdraw" id="" value="y" <?if (isset($edit)&&$dat->refund_withdraw=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      นัดถอนวันที่
                    </label>
                  </div>
                </div>
            </div>
            <div class="col col-md-3">
              <div class="form-group">
                <input type="text" class="form-control datepicker" name="refund_withdraw_date" placeholder="" id="refund_withdraw_date" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->refund_withdraw_date)."'";}?>>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="refund_request" id="" value="y" <?if (isset($edit)&&$dat->refund_request=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      คำร้องขอถอน
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="refund_checks" id="" value="y" <?if (isset($edit)&&$dat->refund_checks=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      เช็ค
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="refund_judge" id="" value="y" <?if (isset($edit)&&$dat->refund_judge=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      คำพิพากษา
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="refund_draw" id="" value="y" <?if (isset($edit)&&$dat->refund_draw=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      เบิกถอนแล้ว
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="refund_undraw" id="" value="y" <?if (isset($edit)&&$dat->refund_undraw=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      ยังไม่เบิกถอน
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-4">
              <div class="form-group">
                <label for="name">ผู้รับผิดชอบ </label>
                <input type="text" class="form-control" id="" name="refund_officer" <?if (isset($edit)) { echo "value='".$dat->refund_officer."'";}?>>
              </div>
            </div>
              
          </div>
          <div class="row">
            <div class="col col-md-12">
              <hr>
            </div>
          </div>

          <div class="row">
            <div class="col col-md-4">
            <h3>วางเงินค่าใช้จ่าย</h3>
            <div class="form-group">
                <input type="hidden" id="payment_number" value="0">
                <button type="button" class="btn btn-success add_payment">เพิ่ม</button>
                <input type="checkbox" id="is_show_payment" value="y" checked>
              </div>
            </div>
          </div>
          <div class="row" id="payment_holder">
            <?
            if (isset($edit)) {
              $g_num=0;
              foreach ($dat->payment as $key => $value) {
                $g_num+=1;
                $id=$value->id;
                ?>
                <div class="col col-md-12 payment-child">
                  <div class="row">
                    <div class="col col-md-2 ">
                        <div class="form-group">
                          <label for="name">ครั้งที่ <?=$g_num?></label>                          
                        </div>
                    </div>
                    <div class="col col-md-4 ">
                        <div class="form-group">
                          <label for="name">วันที่วางเงิน</label>
                          <input type="text" class="form-control datepicker" name="payment_date_old[<?=$id?>]" placeholder="" value="<?=$ci->m_time->unix_to_datepicker($value->payment_date)?>">                  
                        </div>
                    </div>
                    <button type="button" class="btn btn-success del_payment" del-id="<?=$id?>">X</button>
                  </div>
                  <div class="row">
                    <div class="col col-md-4">
                      <div class="form-group">
                        <label for="name">เลขที่ใบเสร็จ </label>
                        <input type="text" class="form-control" id="" name="payment_bill_number_old[<?=$id?>]" <?if (isset($edit)) { echo "value='".$value->payment_bill_number."'";}?>>
                      </div>
                    </div> 
                    <div class="col col-md-4">
                      <div class="form-group">
                        <label for="name">ค่าธรรมเนียม </label>
                        <input type="text" class="form-control" id="" name="payment_bill_fee_old[<?=$id?>]" <?if (isset($edit)) { echo "value='".$value->payment_bill_fee."'";}?>>
                      </div>
                    </div>                      
                  </div>
                  <div class="row">
                    <div class="col col-md-2">
                        <div class="form-group">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="payment_request_old[<?=$id?>]" id="" value="y" <?if (isset($edit)&&$value->payment_request=="y") { echo "checked";}?>>
                            <label class="form-check-label" >
                              คำร้องขอวางเงิน
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="col col-md-2">
                        <div class="form-group">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="payment_warrant_old[<?=$id?>]" id="" value="y" <?if (isset($edit)&&$value->payment_warrant=="y") { echo "checked";}?>>
                            <label class="form-check-label" >
                              หมายวางเงิน
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="col col-md-2">
                        <div class="form-group">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="payment_bill_old[<?=$id?>]" id="" value="y" <?if (isset($edit)&&$value->payment_bill=="y") { echo "checked";}?>>
                            <label class="form-check-label" >
                              ใบเสร็จ
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="col col-md-2">
                        <div class="form-group">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="payment_withdraw_old[<?=$id?>]" id="" value="y" <?if (isset($edit)&&$value->payment_withdraw=="y") { echo "checked";}?>>
                            <label class="form-check-label" >
                              เบิกวางเงินแล้ว
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="col col-md-2">
                        <div class="form-group">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="payment_unwithdraw_old[<?=$id?>]" id="" value="y" <?if (isset($edit)&&$value->payment_unwithdraw=="y") { echo "checked";}?>>
                            <label class="form-check-label" >
                              ยังไม่เบิกวางเงิน
                            </label>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col col-md-4">
                      <div class="form-group">
                        <label for="name">ผู้รับผิดชอบ</label>
                        <input type="text" class="form-control" id="" name="payment_officer_old[<?=$id?>]" <?if (isset($edit)) { echo "value='".$value->payment_officer."'";}?>>
                      </div>
                    </div>                      
                  </div>
                        
                </div>
                <?
              }
              ?>
              <script type="text/javascript">
                $(function () {
                  $("#payment_number").val("<?=$g_num?>");
                });
              </script>
              <?
            }
            ?>
          </div>
          <div class="row">
            <div class="col col-md-12">
              <hr>
            </div>
          </div>

          <div class="row">
            <div class="col col-md-4">
              <div class="form-group">
                <h3>ประกาศขาย</h3>
                <input type="hidden" id="sold_number" value="0">
                <button type="button" class="btn btn-success add_sold">เพิ่ม</button>
                <input type="checkbox" id="is_show_sold" value="y" checked>
              </div>
            </div>
            
          </div>
          <div class="row" id="sold_holder">
            <?
            if (isset($edit)) {
              $g_num=0;
              foreach ($dat->sold as $key => $value) {
                $g_num+=1;
                ?>
                <div class="col col-md-12 sold-child">
                  <div class="row">
                    <div class="col col-md-2 ">
                        <div class="form-group">
                          <label for="name">ประกาศขาย นัดที่ <?=$g_num?></label>
                          <input type="text" class="form-control datepicker" name="sold_date_old[<?=$value->id?>]" placeholder="" value="<?=$ci->m_time->unix_to_datepicker($value->sold_date)?>">                   
                        </div>
                    </div>
                    <div class="col col-md-2 ">
                      <div class="form-group">
                        <label for="name">การขาย</label>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="sold_old[<?=$value->id?>]" id="exampleRadios1" value="y" <?if ($value->sold=="y") { echo "checked";}?>>
                          <label class="form-check-label" >
                            ขายได้
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="unsold_old[<?=$value->id?>]" id="exampleRadios1" value="y" <?if ($value->unsold=="y") { echo "checked";}?>>
                          <label class="form-check-label" >
                            ขายไม่ได้
                          </label>
                        </div>                 
                      </div>
                    </div>
                    <div class="col col-md-3 ">
                      <div class="form-group">
                        <label for="name">จำนวนเงิน</label>
                        <input type="text" class="form-control" name="price_sold_old[<?=$value->id?>]" placeholder="" value="<?=$value->price_sold?>">           
                      </div>
                    </div>
                    <div class="col col-md-3 ">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="sold_refrain_old[<?=$value->id?>]" id="exampleRadios1" value="y" <?if ($value->sold_refrain=="y") { echo "checked";}?>>
                          <label class="form-check-label" >
                            งด
                          </label>
                        </div>                 
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="sold_refrain_note_old[<?=$value->id?>]" placeholder="" value="<?=$value->sold_refrain_note?>">           
                      </div>
                    </div>
                    <button type="button" class="btn btn-success del_sold" del-id="<?=$value->id?>">X</button>
                  </div>
                        
                </div>
                <?
              }
              ?>
              <script type="text/javascript">
                $(function () {
                  $("#sold_number").val("<?=$g_num?>");
                });
              </script>
              <?
            }
            ?>
          </div>
          <div class="row">
            <div class="col col-md-12">
              <div class="form-group">
                 <label for="name">หมายเหตุ</label>
                 <textarea class="form-control" name="sold_note" id="sold_note" style="width: 100%;height: 150px;"><?if (isset($edit)) { echo $dat->sold_note;}?></textarea>         
               </div>
            </div>
          </div>
          <div class="row">
            <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="sold_refrain_request" id="" value="y" <?if (isset($edit)&&$dat->sold_refrain_request=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      คำร้องของด
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="sold_report" id="" value="y" <?if (isset($edit)&&$dat->sold_report=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      รายงานการขาย
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="sold_contract" id="" value="y" <?if (isset($edit)&&$dat->sold_contract=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      สัญญาซื้อขาย
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="sold_withdraw" id="" value="y" <?if (isset($edit)&&$dat->sold_withdraw=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      เบิกเงินขายทอดตลาดแล้ว
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-2">
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="sold_unwithdraw" id="" value="y" <?if (isset($edit)&&$dat->sold_unwithdraw=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      ยังไม่เบิกเงินขายทอดตลาด
                    </label>
                  </div>
                </div>
              </div>
              <div class="col col-md-4">
              <div class="form-group">
                <label for="name">ผู้รับผิดชอบ </label>
                <input type="text" class="form-control" id="" name="sold_officer" <?if (isset($edit)) { echo "value='".$dat->sold_officer."'";}?>>
              </div>
            </div>
              
          </div>

          <div class="row">
            <div class="col col-md-12">
              <hr>
            </div>
          </div>

          <div class="row">
            <div class="col col-md-4">
            <h3>ขยายอุทธรณ์</h3>
              <div class="form-group">
                <label for="name">เพิ่มขยายอุทธรณ์ </label>
                <input type="hidden" id="appeal_number" value="0">
                <button type="button" class="btn btn-success add_appeal">เพิ่ม</button>
                <input type="checkbox" id="is_show_appeal" value="y" checked>
              </div>
            </div>
          </div>
          <div class="row" id="appeal_holder">
            <?
            if (isset($edit)) {
              $g_num=0;
              foreach ($dat->appeal as $key => $value) {
                $g_num+=1;
                $id=$value->id;
                ?>
                <div class="col col-md-12 appeal-child">
                  <div class="row">
                    <div class="col col-md-12 ">
                              <div class="form-group">
                                <label for="name">ขยายอุทธรณ์ ครั้งที่ <?=$g_num?></label>
                                <input type="text" class="form-control datepicker" name="extend_appeal_date_old[<?=$id?>]" placeholder="" value="<?=$ci->m_time->unix_to_datepicker($value->extend_appeal_date)?>">                  
                              </div>
                              <div class="form-group">
                                <label for="name">หมายเหตุการขยาย</label>
                                <textarea class="form-control" name="extend_appeal_note_old[<?=$id?>]" style="width: 100%;height: 150px;"><?=$value->extend_appeal_note?></textarea>         
                              </div>
                          </div>
                          <button type="button" class="btn btn-success del_appeal" del-id="<?=$id?>">X</button>
                        </div>
                        
                    </div>
                <?
              }
              ?>
              <script type="text/javascript">
                $(function () {
                  $("#appeal_number").val("<?=$g_num?>");
                });
              </script>
              <?
            }
            ?>
          </div>

          <div class="row">
            <div class="col col-md-12">
              <hr>
            </div>
          </div>


          <div class="row">
            
            <div class="col col-md-12">
              <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="court_order" id="" value="y" <?if (isset($edit)&&$dat->court_order=="y") { echo "checked";}?>>
                    <label class="form-check-label" >
                      คำบังคับ
                    </label>
                  </div>
                  <div class="form-group">
                    <label for="name">วันที่ </label>
                    <input type="text" class="form-control datepicker" name="court_order_date" placeholder="" id="court_order_date" <?if (isset($edit)) { echo "value='".$ci->m_time->unix_to_datepicker($dat->court_order_date)."'";}?>>
                  </div>
                  <div class="form-group">
                    <label for="name">หมายเหตุคำบังคับ</label>
                    <textarea class="form-control" name="court_order_note" style="width: 100%;height: 150px;"><?if (isset($edit)) { echo $dat->court_order_note;}?></textarea>         
                  </div>
              </div>
            </div>            
          </div>



          


          

          <div class="row">
            <div class="col col-md-12">
              <hr>
            </div>
          </div>

          <div class="row">            
            <div class="col col-md-12">
               <h3>ผู้รับเป็นทนายความ</h3>
            </div>        
            <div class="col col-md-4 ">
              <div class="form-group">
                <select class="custom-select" id="responsible_lawyer" name="responsible_lawyer">
                <?
                foreach ($lawyer as $key => $value) {
                  ?>
                  <option value="<?=$value->id?>"><?=$value->prefix."".$value->name." ".$value->lastname?></option>
                  <?
                }
                ?>
                </select>
              </div>
              <?
                if (isset($edit)) {
                ?>
              <script type="text/javascript">
                $("#responsible_lawyer").val('<?=$dat->responsible_lawyer?>');
              </script>
              <?
              }
              ?>
            </div> 
          </div>


          <div class="row">
            <div class="col col-md-12">
              <hr>
            </div>
          </div>

          <div class="row">
            <div class="col col-md-4">
            <h3>เบิกเงิน</h3>
              <div class="form-group">
                <label for="name">เพิ่มการเบิกเงิน </label>
                <input type="hidden" id="withdraw_number" value="0">
                <button type="button" class="btn btn-success add_withdraw">เพิ่ม</button>
                <input type="checkbox" id="is_show_withdraw" value="y" checked>
              </div>
            </div>
          </div>
          <div class="row" id="withdraw_holder">
            <?
            if (isset($edit)&&isset($ci->user_data->perm['money'])) {
              $g_num=0;
              foreach ($dat->withdraw as $key => $value) {
                $g_num+=1;
                $id=$value->id;
                ?>
                <div class="col col-md-12 withdraw-child">
                  <div class="row">
                    <div class="col col-md-12 ">
                              <div class="form-group">
                                <label for="name">เบิกเงิน ครั้งที่ <?=$g_num?></label>                  
                              </div>
                                <div class="row">
                              <div class="col col-md-12">
                                <hr>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col col-md-1">
                              </div>
                              <div class="col col-md-4">
                                <div class="form-group">
                                  <label for="name">เพิ่มรายละเอียด</label>
                                  <input type="hidden" name="withdraw_number_old[<?=$id?>]" value="<?=$g_num?>">
                                  <button type="button" class="btn btn-success add_withdraw_detail" attr-id="<?=$id?>">เพิ่ม</button>
                                </div>
                              </div>
                            </div>
                            <div class="row" id="withdraw_detail_holder_<?=$id?>">
                              <?
                              foreach ($value->withdraw_detail as $key2 => $value2) {
                                ?>
                                <div class="col col-md-12 withdraw_detail-child">
                                  <div class="row">
                                    <div class="col col-md-2">
                                              </div>
                                    <div class="col col-md-10 ">
                                              <div class="form-group">
                                                <label for="name">รายละเอียด</label>
                                                <input type="text" class="form-control" name="withdraw_detail_old[<?=$value2->id?>]" placeholder="" value="<?=$value2->withdraw_detail?>">
                                                <input type="hidden" name="withdraw_id_old[<?=$value2->id?>]" value="<?=$id?>">                  
                                              </div>
                                              <div class="form-group">
                                                <label for="name">จำนวนเงิน</label>
                                                <input type="text" class="form-control" name="price_old[<?=$value2->id?>]" placeholder="" value="<?=$value2->price?>">          
                                              </div>
                                          </div>
                                          <button type="button" class="btn btn-success del_withdraw_detail" del-id="<?=$value2->id?>">X</button>
                                        </div>
                                        
                                    </div>
                                <?
                              }
                              ?>
                            </div>

                            <div class="row">
                              <div class="col col-md-12">
                                <hr>
                              </div>
                            </div>
                          </div>
                          <button type="button" class="btn btn-success del_withdraw" del-id="<?=$id?>">X</button>
                        </div>
                        
                    </div>
                <?
              }
              ?>
              <script type="text/javascript">
                $(function () {
                  $("#withdraw_number").val("<?=$g_num?>");
                });
              </script>
              <?
            }
            ?>
          </div>

          <div class="row">
            <div class="col col-md-12">
              <hr>
            </div>
          </div>

          

          <div class="row">
            <div class="col col-md-12">
              <hr>
            </div>
          </div>
          <div class="row">
            <div class="col col-md-4 ">
              <div class="form-group">
                <label for="name">Template ข้อ.4</label>
                <select class="custom-select" id="section4_template" name="section4_template">
                <?
                foreach ($section4 as $key2 => $value2) {
                  ?>
                  <option value="<?=$value2->id?>"><?=$value2->name?></option>
                  <?
                }
                ?>
                </select>
              </div>
              <?
                if (isset($edit)) {
                ?>
              <script type="text/javascript">
                $("#section4_template").val('<?=$dat->section4_template?>');
              </script>
              <?
              }
              ?>
            </div>
            <div class="col col-md-12">
              <div class="form-group">
                 <label for="name">สำนวนในข้อ 4</label>
                 <textarea class="form-control" name="section4_description" id="section4_description" style="width: 100%;height: 150px;"><?if (isset($edit)) { echo $dat->section4_description;}?></textarea>         
               </div>
            </div>
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
                                  <a data-fancybox data-type="iframe" data-src="<?=site_url("bang/read_item/".$dat->id)?>" href="javascript:;" class="btn btn-success">ดูรูป</a>
                                  <a data-fancybox data-type="iframe" data-src="<?=site_url("bang/read_log/".$dat->id)?>" href="javascript:;" class="btn btn-success">ดูประวัติการบันทึก</a>
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
                                foreach ($dat->item as $key => $value) {
                                    ?>
                                    <div class="detail-pic">
                                        <a class="btn btn-success pic-del" att-id="<?=$value->id?>" href="javascript:;">X</a>
                                        <img src="<?php echo site_url('media/bang_item/'.$value->filepath); ?>" width="100" height="100">
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
              <div class="form-group">
                 <label for="name">หมายเหตุการบันทึก(ผู้ที่กดบันทึกจะถูกบันทึกเก็บเป็นประวัติเอาไว้)</label>
                 <textarea class="form-control" name="bang_log" id="bang_log" style="width: 100%;height: 50px;">บันทึกปกติ</textarea>         
               </div>
            </div>            
          </div>
          <div class="form-group" style="text-align: center;">
            <button type="button" class="btn btn-success submit">บันทึก</button>
            <button type="reset" value="Reset" class="btn btn-secondary">ยกเลิก</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- end user_wrapper -->
  
</main>
<!-- end rapee_wrapper -->

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
$( function() {
    $( "#pic_detail_holder" ).sortable({
      placeholder: "ui-state-highlight2"
    });
    $( "#pic_detail_holder" ).disableSelection();

    var pinc=parseFloat($("#principle").val());
        var inter=parseFloat($("#interest").val());
        var interest_pk=parseFloat($("#interest_pk").val());
        var fire_warrant=parseFloat($("#fire_warrant").val());
        var sum=pinc+inter+interest_pk+fire_warrant;
        $("#prin_total").val(sum);
  } );
</script>
    
<script type="text/javascript">
  $(document).on("change", "#is_show_guarantee", function() {
      var c_perm=$( this );
      if (c_perm.prop( "checked" )){
        $("#guarantee_holder").fadeIn( "slow", function() {});
      }else{
        $("#guarantee_holder").fadeOut( "slow", function() {});
      }
        
    });
  $(document).on("change", "#is_show_appeal", function() {
      var c_perm=$( this );
      if (c_perm.prop( "checked" )){
        $("#appeal_holder").fadeIn( "slow", function() {});
      }else{
        $("#appeal_holder").fadeOut( "slow", function() {});
      }
        
    });
  $(document).on("change", "#is_show_payment", function() {
      var c_perm=$( this );
      if (c_perm.prop( "checked" )){
        $("#payment_holder").fadeIn( "slow", function() {});
      }else{
        $("#payment_holder").fadeOut( "slow", function() {});
      }
        
    });
  $(document).on("change", "#is_show_investigate", function() {
      var c_perm=$( this );
      if (c_perm.prop( "checked" )){
        $("#investigate_holder").fadeIn( "slow", function() {});
      }else{
        $("#investigate_holder").fadeOut( "slow", function() {});
      }
        
    });
  $(document).on("change", "#is_show_borrow", function() {
      var c_perm=$( this );
      if (c_perm.prop( "checked" )){
        $("#borrow_holder").fadeIn( "slow", function() {});
      }else{
        $("#borrow_holder").fadeOut( "slow", function() {});
      }
        
    });
  $(document).on("change", "#is_show_withdraw", function() {
      var c_perm=$( this );
      if (c_perm.prop( "checked" )){
        $("#withdraw_holder").fadeIn( "slow", function() {});
      }else{
        $("#withdraw_holder").fadeOut( "slow", function() {});
      }
        
    });
  $(document).on("change", "#is_show_withdraw_detail", function() {
      var c_perm=$( this );
      if (c_perm.prop( "checked" )){
        $("#withdraw_detail_holder").fadeIn( "slow", function() {});
      }else{
        $("#withdraw_detail_holder").fadeOut( "slow", function() {});
      }
        
    });

  $(document).on("change", "#is_show_sold", function() {
      var c_perm=$( this );
      if (c_perm.prop( "checked" )){
        $("#sold_holder").fadeIn( "slow", function() {});
      }else{
        $("#sold_holder").fadeOut( "slow", function() {});
      }
        
    });
  $(document).on("click", ".add_guarantee", function() {
  $.ajax({
                        method: "POST",
                        url: "<?php echo site_url("bang/add_guarantee"); ?>",
                        data: {
                            "num":$("#guarantee_number").val(),
                        }
                    })
                    .done(function(data) {
                       $("#guarantee_holder").append(data);
                        $("#guarantee_number").val($( ".guarantee-child" ).length+1);
                    });
     
  } );

  $(document).on("click", ".add_appeal", function() {
  $.ajax({
                        method: "POST",
                        url: "<?php echo site_url("bang/add_appeal"); ?>",
                        data: {
                            "num":$("#appeal_number").val(),
                        }
                    })
                    .done(function(data) {
                       $("#appeal_holder").append(data);
                        $("#appeal_number").val($( ".appeal-child" ).length);
                        $('.datepicker').datepicker({
                            dateFormat: 'dd/mm/yy',beforeShow:function(){    
                                                        if($(this).val()!=""){  
                                                            var arrayDate=$(this).val().split("/");       
                                                            arrayDate[2]=parseInt(arrayDate[2])-543;  
                                                            $(this).val(arrayDate[0]+"/"+arrayDate[1]+"/"+arrayDate[2]);  
                                                        }  
                                                        setTimeout(function(){  
                                                            $.each($(".ui-datepicker-year option"),function(j,k){  
                                                                var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                                                                $(".ui-datepicker-year option").eq(j).text(textYear);  
                                                            });               
                                                        },50);  
                                                    }
                        });
                    });
     
  } );
  $(document).on("click", ".add_payment", function() {
  $.ajax({
                        method: "POST",
                        url: "<?php echo site_url("bang/add_payment"); ?>",
                        data: {
                            "num":$("#payment_number").val(),
                        }
                    })
                    .done(function(data) {
                       $("#payment_holder").append(data);
                        $("#payment_number").val($( ".payment-child" ).length);
                        $('.datepicker').datepicker({
                            dateFormat: 'dd/mm/yy',beforeShow:function(){    
                                                        if($(this).val()!=""){  
                                                            var arrayDate=$(this).val().split("/");       
                                                            arrayDate[2]=parseInt(arrayDate[2])-543;  
                                                            $(this).val(arrayDate[0]+"/"+arrayDate[1]+"/"+arrayDate[2]);  
                                                        }  
                                                        setTimeout(function(){  
                                                            $.each($(".ui-datepicker-year option"),function(j,k){  
                                                                var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                                                                $(".ui-datepicker-year option").eq(j).text(textYear);  
                                                            });               
                                                        },50);  
                                                    }
                        });
                    });
     
  } );

  $(document).on("click", ".add_investigate", function() {
  $.ajax({
                        method: "POST",
                        url: "<?php echo site_url("bang/add_investigate"); ?>",
                        data: {
                            "num":$("#investigate_number").val(),
                        }
                    })
                    .done(function(data) {
                       $("#investigate_holder").append(data);
                        $("#investigate_number").val($( ".investigate-child" ).length);
                        $('.datepicker').datepicker({
                            dateFormat: 'dd/mm/yy',beforeShow:function(){    
                                                        if($(this).val()!=""){  
                                                            var arrayDate=$(this).val().split("/");       
                                                            arrayDate[2]=parseInt(arrayDate[2])-543;  
                                                            $(this).val(arrayDate[0]+"/"+arrayDate[1]+"/"+arrayDate[2]);  
                                                        }  
                                                        setTimeout(function(){  
                                                            $.each($(".ui-datepicker-year option"),function(j,k){  
                                                                var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                                                                $(".ui-datepicker-year option").eq(j).text(textYear);  
                                                            });               
                                                        },50);  
                                                    }
                        });
                    });
     
  } );
  $(document).on("click", ".add_borrow", function() {
  $.ajax({
                        method: "POST",
                        url: "<?php echo site_url("bang/add_borrow"); ?>",
                        data: {
                            "num":$("#borrow_number").val(),
                        }
                    })
                    .done(function(data) {
                       $("#borrow_holder").append(data);
                        $("#borrow_number").val($( ".borrow-child" ).length);
                        $('.datepicker').datepicker({
                            dateFormat: 'dd/mm/yy',beforeShow:function(){    
                                                        if($(this).val()!=""){  
                                                            var arrayDate=$(this).val().split("/");       
                                                            arrayDate[2]=parseInt(arrayDate[2])-543;  
                                                            $(this).val(arrayDate[0]+"/"+arrayDate[1]+"/"+arrayDate[2]);  
                                                        }  
                                                        setTimeout(function(){  
                                                            $.each($(".ui-datepicker-year option"),function(j,k){  
                                                                var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                                                                $(".ui-datepicker-year option").eq(j).text(textYear);  
                                                            });               
                                                        },50);  
                                                    }
                        });
                    });
     
  } );
  $(document).on("click", ".add_withdraw", function() {
  $.ajax({
                        method: "POST",
                        url: "<?php echo site_url("bang/add_withdraw"); ?>",
                        data: {
                            "num":$("#withdraw_number").val(),
                        }
                    })
                    .done(function(data) {
                       $("#withdraw_holder").append(data);
                        $("#withdraw_number").val($( ".withdraw-child" ).length);
                    });
     
  } );


  $(document).on("click", ".add_withdraw_detail", function() {
    var ele=$(this);
  $.ajax({
                        method: "POST",
                        url: "<?php echo site_url("bang/add_withdraw_detail"); ?>",
                        data: {
                            "id":ele.attr("attr-id"),
                        }
                    })
                    .done(function(data) {
                       $("#withdraw_detail_holder_"+ele.attr("attr-id")).append(data);
                    });
     
  } );

  $(document).on("click", ".add_sold", function() {
    var ele=$(this);
  $.ajax({
                        method: "POST",
                        url: "<?php echo site_url("bang/add_sold"); ?>",
                        data: {
                            "num":$("#sold_number").val(),
                        }
                    })
                    .done(function(data) {
                       $("#sold_holder").append(data);
                        $("#sold_number").val($( ".sold-child" ).length);
                        $('.datepicker').datepicker({
                            dateFormat: 'dd/mm/yy',beforeShow:function(){    
                                                        if($(this).val()!=""){  
                                                            var arrayDate=$(this).val().split("/");       
                                                            arrayDate[2]=parseInt(arrayDate[2])-543;  
                                                            $(this).val(arrayDate[0]+"/"+arrayDate[1]+"/"+arrayDate[2]);  
                                                        }  
                                                        setTimeout(function(){  
                                                            $.each($(".ui-datepicker-year option"),function(j,k){  
                                                                var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                                                                $(".ui-datepicker-year option").eq(j).text(textYear);  
                                                            });               
                                                        },50);  
                                                    }
                        });
                    });
     
  } );


  $(document).on("click", ".del_guarantee", function() {
    var id = $(this).attr("del-id");
    $(this).parent().parent().fadeOut( "slow", function() {                            
                       var num = parseInt($("#guarantee_number").val());
                            num=num-1;
                            $("#guarantee_number").val(num);
                            $("#f-admin").append('<input type="hidden" name="del_guarantee[]" value="'+id+'">');
      $(this).remove();
    });  
  } );

  $(document).on("click", ".del_appeal", function() {
    var id = $(this).attr("del-id");
    $(this).parent().parent().fadeOut( "slow", function() {                            
                       var num = parseInt($("#appeal_number").val());
                            num=num-1;
                            $("#appeal_number").val(num);
                            $("#f-admin").append('<input type="hidden" name="del_appeal[]" value="'+id+'">');
      $(this).remove();
    });  
  } );
  $(document).on("click", ".del_payment", function() {
    var id = $(this).attr("del-id");
    $(this).parent().parent().fadeOut( "slow", function() {                            
                       var num = parseInt($("#payment_number").val());
                            num=num-1;
                            $("#payment_number").val(num);
                            $("#f-admin").append('<input type="hidden" name="del_payment[]" value="'+id+'">');
      $(this).remove();
    });  
  } );
  $(document).on("click", ".del_investigate", function() {
    var id = $(this).attr("del-id");
    $(this).parent().parent().fadeOut( "slow", function() {                            
                       var num = parseInt($("#investigate_number").val());
                            num=num-1;
                            $("#investigate_number").val(num);
                            $("#f-admin").append('<input type="hidden" name="del_investigate[]" value="'+id+'">');
      $(this).remove();
    });  
  } );
  $(document).on("click", ".del_borrow", function() {
    var id = $(this).attr("del-id");
    $(this).parent().parent().fadeOut( "slow", function() {                            
                       var num = parseInt($("#borrow_number").val());
                            num=num-1;
                            $("#borrow_number").val(num);
                            $("#f-admin").append('<input type="hidden" name="del_borrow[]" value="'+id+'">');
      $(this).remove();
    });  
  } );
  $(document).on("click", ".del_withdraw", function() {
    var id = $(this).attr("del-id");
    $(this).parent().parent().fadeOut( "slow", function() {                            
                       var num = parseInt($("#withdraw_number").val());
                            num=num-1;
                            $("#withdraw_number").val(num);
                            $("#f-admin").append('<input type="hidden" name="del_withdraw[]" value="'+id+'">');
      $(this).remove();
    });  
  } );
  $(document).on("click", ".del_sold", function() {
    var id = $(this).attr("del-id");
    $(this).parent().parent().fadeOut( "slow", function() {                            
                       var num = parseInt($("#sold_number").val());
                            num=num-1;
                            $("#sold_number").val(num);
                            $("#f-admin").append('<input type="hidden" name="del_sold[]" value="'+id+'">');
      $(this).remove();
    });  
  } );
  $(document).on("click", ".del_withdraw_detail", function() {
    var id = $(this).attr("del-id");
    $(this).parent().parent().fadeOut( "slow", function() {     
    $("#f-admin").append('<input type="hidden" name="del_withdraw_detail[]" value="'+id+'">');             
      $(this).remove();
    });  
  } );
  $(document).on("click", ".submit", function() {
        $( "#f-admin" ).submit();
        
    });
  $(document).on("change", "#interest,#principle,#interest_pk,#fire_warrant", function() {
        var pinc=parseFloat($("#principle").val());
        var inter=parseFloat($("#interest").val());
        var interest_pk=parseFloat($("#interest_pk").val());
        var fire_warrant=parseFloat($("#fire_warrant").val());
        var sum=pinc+inter+interest_pk+fire_warrant;
        $("#prin_total").val(sum);
        
    });
  $(document).on("change", "#section4_template", function() {
        $.ajax({
                        method: "POST",
                        url: "<?php echo site_url("bang/ajax_get_section4"); ?>",
                        data: {
                            "id":$("#section4_template").val(),
                        }
                    })
                    .done(function(data) {
                       $("#section4_description").val(data['des']);
                    });
        
    });
  $(function () {
    $("[data-fancybox]").fancybox({
      iframe : {
        css : {
          width : '95%',height : '95%'
        }
      }
    });
                $('.datetimepicker').datetimepicker({
                  //datepicker:false,
                    //format: 'H:i'
                });
                $('.datepicker').datepicker({
                  //datepicker:false,
                    dateFormat: 'dd/mm/yy',beforeShow:function(){    
                                                        if($(this).val()!=""){  
                                                            var arrayDate=$(this).val().split("/");       
                                                            arrayDate[2]=parseInt(arrayDate[2])-543;  
                                                            $(this).val(arrayDate[0]+"/"+arrayDate[1]+"/"+arrayDate[2]);  
                                                        }  
                                                        setTimeout(function(){  
                                                            $.each($(".ui-datepicker-year option"),function(j,k){  
                                                                var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                                                                $(".ui-datepicker-year option").eq(j).text(textYear);  
                                                            });               
                                                        },50);  
                                                    }
                });
            });
</script>

</body>
</html>

