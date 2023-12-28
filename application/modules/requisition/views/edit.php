<div class="page-content">     
   <div class="content">  
      <ul class="breadcrumb">
         <li><a href="<?=base_url('dashboard')?>" class="active"> Dashboard </a></li>
         <li><a href="<?=base_url('my_requisition')?>" class="active"><?=$module_name?></a></li>
         <li><?=$meta_title; ?></li>
      </ul>
      <div class="row">
         <div class="col-md-12">
            <div class="grid simple horizontal red">
               <div class="grid-title">
                  <h4><span class="semi-bold"><?=$meta_title; ?></span></h4>
                  <div class="pull-right">                
                     <a href="<?=base_url('my_requisition')?>" class="btn btn-blueviolet btn-xs btn-mini"> My Requisition List</a>  
                  </div>
               </div>
               <div class="grid-body">
                  <?php if($this->session->flashdata('success')):?>
                     <div class="alert alert-success">
                        <?=$this->session->flashdata('success');;?>
                     </div>
                  <?php endif; ?>
                  
                  <?php 
                  $attributes = array('id' => 'jsvalidate');
                  echo form_open_multipart("requisition/edit",$attributes);
                  echo validation_errors();
                  ?>
                  <input type="hidden" name="id" value="<?= $info->id?>">
                  <div class="row">
                     <div class="col-md-12">
                        <fieldset>
                           <legend>Requisition Information</legend>
                           <div class="row form-row" style="font-size: 16px; color: black;">
                              <div class="col-md-4">
                                 Applicant Name: <strong><?=$info->first_name?></strong> 
                              </div>
                              <div class="col-md-4">
                                 Designation Name: <strong><?=$info->desig_name?></strong> 
                              </div>
                              <div class="col-md-4">
                                 Department Name: <strong><?=$info->dept_name?></strong> 
                              </div>
                           </div>

                           <div class="row form-row">
                              <div class="col-md-6">
                                 <label class="form-label">Requisition Title <span class='required'>*</span></label>
                                 <?php echo form_error('title');?>
                                 <input name="title" value="<?= $info->title?>" type="text" class="form-control input-sm" placeholder=""> 
                              </div>
                              <div class="col-md-12">
                                 <p style="text-align: center; color: black; font-size: 18px;">The products / materials described below are intended to be supplied for official use. </p>
                              </div>
                              <div class="col-md-4">
                           <table class="table table-bordered col-md-12">
                                 <thead>
                                    <tr>
                                       <th>Approver Name</th>
                                       <th>Remark</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    foreach ($final_appruver as $key => $value) {
                                       $this->db->select('first_name');
                                       $this->db->where('id',$value->id);
                                       $query = $this->db->get('users')->row();
                                       echo '<tr><td>'.$query->first_name.'</td><td>'.$value->Remark.'</td></tr>';

                                    }
                                    ?>
                                 </tbody>
                           </table>
                        </div>
                        <div class="col-md-4">
                           <table class="table table-bordered col-md-12">
                                 <thead>
                                    <tr>
                                       <th>Verifier Name</th>
                                       <th>Remark</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    foreach ($approve_reject_user as $key => $value) {
                                       $this->db->select('first_name');
                                       $this->db->where('id',$value->id);
                                       $query = $this->db->get('users')->row();
                                       echo '<tr><td>'.$query->first_name.'</td><td>'.$value->Remark.'</td></tr>';
                                    }
                                    ?>
                                 </tbody>
                           </table>
                        </div>
                           </div>

                           <div class="row form-row">
                              <div class="col-md-12"> 
                                 <h4 class="semi-bold margin_left_15">Item List <em style="color: #f73838; font-size: 15px;">Click <strong>Add More</strong> button for adding more item. </em></h4>
                                 <style type="text/css">
                                    #appRowDiv td{padding: 5px; border-color: #ccc;}
                                    #appRowDiv th{padding: 5px;text-align:center;border-color: #ccc; color: black;}                        
                                 </style>                              
                                 <div class="col-md-12" >
                                    <input type="hidden" value="<?=count($items)?>" id="count">
                                    <table width="100%" border="1" id="appRowDiv" style="border:1px solid #a09e9e;">
                                       <tr>
                                          <th width="20%">Category<span class="required">*</span></th>
                                          <th width="20%">Sub Category <span class="required">*</span></th>
                                          <th width="20%">Item Name <span class="required">*</span></th>
                                          <th width="20%">Qty. Request</th>
                                          <th width="20%">Remark</th>
                                          <th width="8%"> <a href="javascript:void();" id="addRow"  class="label label-success"> <i  class="fa fa-plus-circle"></i> Add More</a> </th>
                                       </tr>
                                       <?php foreach($items as $key => $val){?>
                                       <tr>
                                          <td> <span><?=$val->category_name?></span> <input type="hidden" name="item_cate_id[]" value="<?= $val->item_cate_id?>"></td>
                                          <td> <span><?=$val->sub_cate_name?></span> <input type="hidden" name="item_sub_cate_id[]" value="<?= $val->item_sub_cate_id?>"></td>
                                          <td> <span><?=$val->item_name?></span> <input type="hidden" name="item_id[]" value="<?= $val->item_id?>"></td>
                                          <td><input name="qty_request[]"  type="text" class="form-control input-sm" value="<?= $val->qty_request?>"></td>
                                          <td><textarea name="remark[]"   class="form-control input-sm"><?= $val->remark?></textarea></td>
                                          <td> <a href="javascript:void();" class="label label-important" onclick="removeRow(this)"> <i class="fa fa-minus-circle"></i> Remove </a></td>
                                       </tr>
                                       <?php }?>
                                       <tr></tr>
                                    </table>
                                 </div>
                              </div>
                           </div>

                        </fieldset>
                     </div>
                  </div>
                  <div class="form-actions">  
                     <div class="pull-right">
                        <button type="submit" class="btn btn-primary btn-cons"><i class="icon-ok"></i> Save</button>
                     </div>
                  </div>
                  <?php echo form_close();?>

               </div>  <!-- END GRID BODY -->              
            </div> <!-- END GRID -->
         </div>

      </div> <!-- END ROW -->

   </div>
</div>

<?php
// $item_data = '';
// foreach ($items as $key => $value) {
//    $item_data .= '<option value="'.$key.'">'.$value.'</option>';
// }

$category_data = '';
foreach ($categories as $key => $value) {
   $category_data .= '<option value="'.$key.'">'.$value.'</option>';
}
?>

<script type="text/javascript">
   $(document).ready(function() {
      //Load First row
      // addNewRow();

      // JS Validation
      $('#jsvalidate').validate({
         // focusInvalid: false, 
         ignore: "",
         rules: {
            title: { required: true },
            schedule_type: { required: true },
            date: { required: true },
            date_end: { required: true },
            venue: { required: true }
         },

         invalidHandler: function (event, validator) {
            //display error alert on form submit    
         },

         errorPlacement: function (label, element) { // render error placement for each input type   
            $('<span class="error"></span>').insertAfter(element).append(label)
            var parent = $(element).parent('.input-with-icon');
            parent.removeClass('success-control').addClass('error-control');  
         },

         highlight: function (element) { // hightlight error inputs
            var parent = $(element).parent();
            parent.removeClass('success-control').addClass('error-control'); 
         },

         unhighlight: function (element) { // revert the change done by hightlight

         },

         success: function (label, element) {
            var parent = $(element).parent('.input-with-icon');
            parent.removeClass('error-control').addClass('success-control'); 
         },

         submitHandler: function (form) {
            form.submit();
         }
      });
   });   


   // 'name[]': { required: true },
   // event_title: { required: "#officeOther:selected" },
   // event_date: { required: true },
   // event_name_chair: { required: true }


   // Hide/Show Function
   $('.invitationDiv').hide();
   $('#schedule_type').change(function(){
      var id = $('#schedule_type').val();
      // alert(id);
      if(id == 'Invitation'){
         $('.invitationDiv').show();
         $('.appointmentDiv').hide();
      }else{
         $('.invitationDiv').hide();
         $('.appointmentDiv').show();
      }
   });


   // Add multiple person
   $("#addRow").click(function(e) {
      addNewRow();
   }); 
   //remove row
   function removeRow(id){ 
      $(id).closest("tr").remove();
   }
   //add row function
   function addNewRow(){
      var sl=$('#count').val();
      var items = '';
      items+= '<tr>';
      items+= '<td><select name="item_cate_id[]" class="form-control input-sm" id="category_'+sl+'" ><?php echo $category_data;?></select></td>';
      items+= '<td><select name="item_sub_cate_id[]"  id="subcategory_'+sl+'" class="sub_category_val_'+sl+' form-control input-sm"><option value="">-- Select One --</option></select></td>';
      items+= '<td><select name="item_id[]" class="item_val_'+sl+' form-control input-sm"><option value="">-- Select One --</option></select></td>';
      items+= '<td><input name="qty_request[]" value="" type="text" class="form-control input-sm"></td>';
      items+= '<td><textarea name="remark[]" value=""  class="form-control input-sm"></textarea></td>';
      items+= '<td> <a href="javascript:void();" class="label label-important" onclick="removeRow(this)"> <i class="fa fa-minus-circle"></i> Remove </a></td>';
      items+= '</tr>';
      $('#count').val(sl+1);
      $('#appRowDiv tr:last').after(items);
      category_dd(sl);
      subcategory_dd(sl);
   } 

   function category_dd(sl){
      //Category Dropdown
      $('#category_'+sl).change(function(){
         $('.sub_category_val_'+sl).addClass('form-control input-sm');
         $('.sub_category_val_'+sl+' > option').remove();
         var id = $('#category_'+sl).val();

         $.ajax({
            type: "POST",
            url: hostname +"common/ajax_get_sub_category_by_category/" + id,
            success: function(func_data)
            {
               // console.log(func_data);
               $.each(func_data,function(id,name)
               {
                  var opt = $('<option />');
                  opt.val(id);
                  opt.text(name);
                  $('.sub_category_val_'+sl).append(opt);
               });
            }
         });
      });
   }

   function subcategory_dd(sl){
      //Category Dropdown
      $('#subcategory_'+sl).change(function(){
         $('.item_val_'+sl).addClass('form-control input-sm');
         $(".item_val_"+sl+"> option").remove();
         var id = $('#subcategory_'+sl).val();

         $.ajax({
            type: "POST",
            url: hostname +"common/ajax_get_item_by_sub_category/" + id,
            success: function(func_data)
            {
               $.each(func_data,function(id,name)
               {
                  var opt = $('<option />');
                  opt.val(id);
                  opt.text(name);
                  $('.item_val_'+sl).append(opt);
               });
            }
         });
      });
   }

</script>  