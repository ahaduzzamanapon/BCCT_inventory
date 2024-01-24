<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="page-content">     
  <div class="content">
    <ul class="breadcrumb" style="margin-bottom: 20px;">
      <li> <a href="<?=base_url()?>" class="active"> Dashboard </a> </li>
      <li> <a href="<?=base_url()?>" class="active"> <?=$module_title; ?> </a></li>
      <li><?=$meta_title; ?> </li>
    </ul>

    <div class="row">
      <div class="col-md-8">
        <div class="grid simple horizontal green">
          <div class="grid-title">
            <h4><span class="semi-bold"><?=$meta_title; ?></span></h4>
            <div class="pull-right">
              <a href="<?=base_url('acl/create_group_type')?>" class="btn btn-primary btn-xs btn-mini"> Create Group Type</a>  
            </div>            
          </div>

          <div class="grid-body ">
            <div id="infoMessage"><?php //echo $message;?></div>
            <?php if($this->session->flashdata('success')):?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success');?>
                </div>
            <?php endif; ?>

            <table class="table table-hover table-bordered dataTable  table-flip-scroll cf">
                <thead class="cf">
                  <tr>
                    <th>SL</th>
                    <th>Type Name</th>
                    <th>Type Name Bangla</th>
                    <th>Description</th>
                    <th width="150">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  $sl = 0;
                  foreach ($results as $row):
                    $sl++;
                ?>
                    <tr>
                      <td><?=$sl.'.'?></td>
                      <td><?php echo $row->group_type_en;?></td>
                      <td><?php echo $row->group_type_bn;?></td>
                      <td><?php echo $row->type_description;?></td>
					  <td><?php echo anchor("acl/edit_group_type/".$row->id, 'Edit','class="btn btn-mini btn-primary"') ;?>&nbsp;<a class="btn btn-mini btn-primary" href="#">Delete</a></td>
                      <?php /*?><td>
                        <div class="btn-group">
                          <button class="btn btn-mini btn-success">Action</button>
                          <button class="btn btn-mini btn-success dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span> </button>
                          <ul class="dropdown-menu">
                            <li><?php echo anchor("acl/edit_group_type/".$row->id, 'Edit') ;?></li>
                            <li class="divider"></li>
                            <li><a href="#">Delete</a></li>
                          </ul>
                        </div> 
                      </td><?php */?>
                    </tr>
                  <?php endforeach;?>
                </tbody>
            </table>
 
          </div>

        </div>
      </div>
    </div>

    </div> <!-- END ROW -->

  </div>
</div>