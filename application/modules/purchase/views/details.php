<div class="page-content">     
   <div class="content">  
      <ul class="breadcrumb">
         <li><a href="<?=base_url('dashboard')?>" class="active"> Dashboard </a></li>
         <li><a href="<?=base_url('my_requisition')?>" class="active"><?=$module_name?></a></li>
         <li><?=$meta_title; ?></li>
      </ul>
      <style type="text/css">
         .tg  {border-collapse:collapse;border-spacing:0; border: 0px solid red;}
         .tg td{font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#bbb;color:#00000;background-color:#E0FFEB; vertical-align: middle;}
         .tg th{font-size:14px;font-weight:bold;padding:3px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#bbb;color:#493F3F;background-color:#bce2c5;text-align: center;}
         .tg .tg-khup{background-color:#efefef;vertical-align:top; color: black; text-align: right; width: 150px;}
         .tg .tg-ywa9{background-color:#ffffff;vertical-align:top; color: black;}
      </style>          

      <div class="row">
         <div class="col-md-12">
            <div class="grid simple horizontal red">
               <div class="grid-title">
                  <h4><span class="semi-bold"><?=$meta_title; ?></span></h4>
                  <div class="pull-right">                
                     <a href="<?=base_url('purchase')?>" class="btn btn-blueviolet btn-xs btn-mini"> Purchase List</a>  
                     <!-- <a href="<?=base_url('my_appointment/details/'.encrypt_url($info->id))?>" class="btn btn-blueviolet btn-xs btn-mini">Details</a> -->
                  </div>
               </div>

               <div class="grid-body"  id="printableArea">
                  <?php if($this->session->flashdata('success')):?>
                     <div class="alert alert-success">
                        <?=$this->session->flashdata('success');;?>
                     </div>
                  <?php endif; ?>

                  <div class="row">
                     <div class="col-md-12">
                        <table class="tg" width="100%">
                           <tr>
                              <th class="tg-khup"> Supplier Name </th>
                              <td class="tg-ywa9"><?=$info->supplier_name?></td>
                              <th class="tg-khup"> Created </th>
                              <td class="tg-ywa9"><?=date('d M, Y h:i A', strtotime($info->created)); ?></td>
                           </tr> 
                           <tr>
                              <th class="tg-khup"> Purchase Item List </th>
                              <td class="tg-ywa9" colspan="6">
                                 <table>
                                    <tr>
                                       <th>SL</th>
                                       <th>Item Name (Unit)</th>
                                       <th>Purchase Qty.</th>
                                       <th>Remarks</th>
                                    </tr>
                                    <?php 
                                    $sl=0;
                                    foreach($items as $item){ 
                                       $sl++;
                                       ?>
                                       <tr>
                                          <td><?=$sl?></td>
                                          <td><?=$item->item_name?></td>
                                          <td><?=$item->pur_quantity?></td>
                                          <td><?=$item->remark?></td>
                                       </tr>
                                       <?php } ?>
                                    </table>
                                 </td>
                              </tr>
                              <?php //} ?>

                           </table>
                        </div>
                     </div>

                  </div>  <!-- END GRID BODY -->              
               </div> <!-- END GRID -->
            </div>

         </div> <!-- END ROW -->

      </div>
   </div>