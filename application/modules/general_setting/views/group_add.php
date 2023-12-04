<div class="page-content">     
  <div class="content">  
    <ul class="breadcrumb">
      <li> <a href="<?=base_url()?>" class="active"> Dashboard </a> </li>
     <!--  <li> <?=$module_name?> </li> -->
      <li><?=$meta_title; ?></li>
    </ul>

    <div class="row">
       <div class="col-md-8">
          <div class="grid simple horizontal red">
             <div class="grid-title">
              <h4><span class="semi-bold"><?=$meta_title; ?></span></h4>
              <div class="pull-right">                
                <a href="<?=base_url('general_setting/group')?>" class="btn btn-blueviolet btn-xs btn-mini"> group List</a>  
              </div>
             </div>
             <div class="grid-body">
              <!-- <form id="form_traditional_validation" action="#"> -->
              <!-- <div id="infoMessage"><?php //echo $message;?></div> -->
              <div><?php //echo validation_errors(); ?></div>
              <?php if($this->session->flashdata('success')):?>
                  <div class="alert alert-success">
                      <a class="close" data-dismiss="alert">&times;</a>
                      <?php echo $this->session->flashdata('success');;?>
                  </div>
              <?php endif; ?>

              <?php 
              $attributes = array('id' => 'group_validate');
              echo form_open_multipart("general_setting/group_add", $attributes);?>

              <div class="row form-row">
                <div class="col-md-6">
                  <label class="form-label">Group Name</label>
                  <?php echo form_error('group_name'); ?>
                  <input name="group_name" id="group_name" type="text" value="<?=set_value('group_name')?>" class="form-control input-sm" placeholder="">
                </div>
                <div class="col-md-6" style="box-shadow: 0px 0px 2px 1px #999999;">
                    <h4 class="form-label">Send Permission</h4>
                    <div class="btn btn-primary btn-xs btn-mini" style="margin-top: 3px;">
                      <input type="checkbox" name="permission[]" value=1 class="group_control">Create
                    </div><br>
                  <div class="btn btn-success btn-xs btn-mini" style="margin-top: 3px;">
                      <input type="checkbox" name="permission[]" value=2 class="group_control">Approve
                    </div><br>
                  <div class="btn btn-danger btn-xs btn-mini" style="margin-top: 3px;">
                      <input type="checkbox" name="permission[]" value=3 class="group_control">Reject
                    </div><br>
                  <div class="btn btn-warning btn-xs btn-mini" style="margin-top: 3px;">
                      <input type="checkbox" name="permission[]" value=4 class="group_control">Delivery
                    </div><br>
                  <div class="btn btn-warning btn-xs btn-mini" style="margin-top: 3px;">
                      <input type="checkbox" name="permission[]" value=5 class="group_control">View Report
                    </div><br>
                  <?php 
                  $pw_list=$this->db->get('groups')->result();
                  ?>
                  <?php foreach($pw_list as $pw):?>
                    <div class="btn btn-primary btn-xs btn-mini" style="margin-top: 3px;">
                      <input type="checkbox" name="pw[]" value="<?=$pw->id?>" class="group_control">Pass To <?=$pw->name?>
                    </div><br>
                  <?php endforeach;?>
                
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

<script type="text/javascript">
   $(document).ready(function() {
      $('#group_validate').validate({
      // focusInvalid: false, 
      ignore: "",
      rules: {
         group_name: {
            required: true
         },
      },

    });
   });   
</script>