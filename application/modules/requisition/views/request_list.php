<div class="page-content">     
   <div class="content">  
      <ul class="breadcrumb" style="margin-bottom: 20px;">
         <li> <a href="<?=base_url('dashboard')?>" class="active"> Dashboard </a> </li>
         <li> <a href="javascript:void()" class="active"> <?=$module_name?> </a></li>
         <li> <?=$meta_title;?> </li>
      </ul>

      <div class="row">
         <div class="col-md-12">
            <div class="grid simple ">
               <div class="grid-title">
                  <h4><span class="semi-bold"><?=$meta_title; ?></span></h4>
                  <div class="pull-right">
                     <!-- <a href="<?=base_url('my_requisition/create')?>" class="btn btn-blueviolet btn-xs btn-mini"> Create Requisition</a> -->
                  </div>            
               </div>

               <div class="grid-body ">
                  <?php if($this->session->flashdata('success')):?>
                     <div class="alert alert-success">
                        <?=$this->session->flashdata('success');?>
                     </div>
                  <?php endif; ?>
                  <table class="table table-hover table-condensed" border="0">
                     <thead>
                        <tr>
                           <th style="width:10px;"> SL </th>
                           <th style="width:200px;">Title</th>
                           <th style="width:100px;">Created</th>
                           <th style="width:100px;">Updated</th>
                           <th style="width:50px;">Status</th>
                           <th style="width:40px; text-align: right;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php 
                        $sl=$pagination['current_page'];
                        foreach ($results as $row):
                           $sl++;

                        if($row->status == 2) {
                           $status = '<span class="label label-success">Approved</span>';
                        }elseif($row->status == 3) {
                           $status = '<span class="label">Rejected</span>';
                        }else{
                           $status = '<span class="label label-important">Pending</span>';
                        }
                        ?>
                        <tr>
                           <td class="v-align-middle"><?=$sl.'.'?></td>
                           <td class="v-align-middle"><?=$row->title; ?></td>
                           <td class="v-align-middle"><?=date('d M, Y h:i A', strtotime($row->created)); ?>
                           </td>
                           <td class="v-align-middle"><?=date('d M, Y h:i A', strtotime($row->updated)); ?>                              
                           </td>
                           <td> <?=$status?></td>
                           <td align="right">
                              <?=anchor("requisition/change_status/".encrypt_url($row->id), 'Approval Status', array('class' => 'btn btn-blueviolet btn-mini'))?>
                              <?=anchor("requisition/details/".encrypt_url($row->id), 'Details', array('class' => 'btn btn-primary btn-mini'))?>
                           </td>
                        </tr>
                     <?php endforeach;?>                      
                  </tbody>
               </table>

               <div class="row">
                  <div class="col-sm-4 col-md-4 text-left" style="margin-top: 20px;"> Total <span style="color: green; font-weight: bold;"><?php echo $total_rows; ?> Requisition </span></div>
                  <div class="col-sm-8 col-md-8 text-right">
                     <?php echo $pagination['links']; ?>
                  </div>
               </div>

            </div>

         </div>
      </div>
   </div>

</div> <!-- END Content -->

</div>