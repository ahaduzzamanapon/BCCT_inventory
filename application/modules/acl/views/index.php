<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="page-content">     
  <div class="content">
    <ul class="breadcrumb" style="margin-bottom: 20px;">
      <li> <a href="<?=base_url('dashboard')?>" class="active"> Dashboard </a> </li>
      <li> <a href="<?=base_url('acl')?>" class="active"> <?=$module_title; ?> </a></li>
      <li><?=$meta_title; ?> </li>
    </ul>

    <div class="row">
      <div class="col-md-12">
        <div class="grid simple horizontal green">
          <div class="grid-title">
            <h4><span class="semi-bold"><?=$meta_title; ?></span></h4>
            <div class="pull-right">
              <a href="<?=base_url('acl/create_user')?>" class="btn btn-blueviolet btn-xs btn-mini"> Create User </a>
            </div>            
          </div>

          <div class="grid-body ">
            <div id="infoMessage"><?php echo $message;?></div>   
            <form method="get" action="">
              <div class="row">
                <div class="col-md-2">     
                  <input type="text" name="name" value="<?=$_GET['name']?>" class="form-control input-sm" placeholder="Name"> 
                </div>

                <div class="col-md-2">     
                  <input type="text" name="username" value="<?=$_GET['username']?>" class="form-control input-sm" placeholder="Username"> 
                </div>
                <div class="col-md-1">
                  <div class="pull-right ">
                    <button type="submit" class="btn btn-blueviolet btn-mini"><i class="icon-ok"></i> Search</button>
                  </div>
                </div>
              </div>
            </form>

            <table class="table table-hover table-bordered dataTable  table-flip-scroll cf">
              <thead class="cf">
                <tr>
                  <th>SL</th>
                  <th>Full Name</th>
                  <th>Username</th>                        
                  <th>Email Address</th>
                  <th>Department</th>
                  <th>Designation</th>
                  <th width="80">Status</th>                  
                  <th width="120">Group</th>
                  <th width="120">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $sl = $pagination['current_page'];
                foreach ($users as $user):
                  $sl++;
                ?>
                <tr>
                  <td><?=$sl.'.'?></td>
                  <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
                  <td><?php echo $user->username;?></td>
                  <td><?php echo $user->email;?></td>
                  <!-- <td><?php //echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td> -->
                  <td><?php echo $user->dept_name;?></td>
                  <td><?php echo $user->desig_name;?></td>
                  <td> 
                    <?php 
                    echo ($user->active) ? anchor("acl/deactivate/".$user->id, strtoupper(lang('index_active_link')), array('class' => 'label label-success')) : anchor("acl/activate/". $user->id, strtoupper(lang('index_inactive_link')), array('class' => 'label label-important'));
                    ?>
                  </td>
                  <td>
                    <?php 
                    foreach ($user->groups as $group):
                          //echo anchor("#", htmlspecialchars($group->description,ENT_QUOTES,'UTF-8'), array('class' => 'btn btn-primary btn-xs btn-mini'));
                         //echo anchor("acl/edit_group/".$group->id, strtoupper($group->description), array('class' => 'label label-important'));
                      echo '<span class="btn btn-primary btn-xs btn-mini" style="background-color:#6b64d0;margin-bottom:1px;">'.htmlspecialchars($group->name,ENT_QUOTES,'UTF-8').'</span>';
                    echo '&nbsp;';
                    endforeach;
                    ?>

                  </td>
                  <td><?php echo anchor("acl/edit_user/".$user->id, 'Edit','class="btn btn-mini btn-primary"') ;?>&nbsp;<a class="btn btn-mini btn-primary" href="<?=base_url("acl/user_delete/".$user->id)?>" onclick="return confirm('Be careful! Are you sure you want to delete this user?');">Delete</a></td>
                      <?php /*?><td>
                        <div class="btn-group">
                          <button class="btn btn-mini btn-primary">Action</button>
                          <button class="btn btn-mini btn-primary dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span> </button>
                          <ul class="dropdown-menu">
                            <li><?php echo anchor("acl/edit_user/".$user->id, 'Edit User') ;?></li>
                            <li class="divider"></li>
                            <li><a href="#">Delete</a></li>
                          </ul>
                        </div> 
                      </td><?php */?>
                    </tr>
                  <?php endforeach;?>
                </tbody>
              </table>

              <div class="row">
                <div class="col-sm-4 col-md-4 text-left" style="margin-top: 20px;"> Total <span style="color: green; font-weight: bold;"><?php echo $total_rows; ?> Users </span></div>
                <div class="col-sm-8 col-md-8 text-right">
                  <?php echo $pagination['links']; ?>
                </div>
              </div>

            </div>

          </div>
        </div>
      </div>

    </div> <!-- END ROW -->

  </div>
</div>