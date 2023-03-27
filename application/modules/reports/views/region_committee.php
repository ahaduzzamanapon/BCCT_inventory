<style type="text/css">
  @media print {
    .printable, #printDiv{
       display: block !important;
    }
   .non-printable,  #details{
         display: none !important;

   }
}
</style>

<div class="page-content">     
   <div class="content">  
      <ul class="breadcrumb" style="margin-bottom: 20px;">
         <li> <a href="<?=base_url()?>" class="active"> Dashboard </a> </li>
         <li> <a href="javascript:void()" class="active"><?=$module_name?> </a></li>
         <li><?=$meta_title; ?> </li>
      </ul>

      <div class="row">
         <div class="col-md-12">
            <div class="grid simple ">
               <div class="grid-title">
                  <h4><span class="semi-bold"><?=$meta_title; ?></span></h4>
                  <div class="pull-right">
                     <a > <input class="btn btn-primary btn-xs btn-mini" type="button" onclick="printSpecificContents('printDiv')" value="Print" media="print" id="details"/></a>
                  </div>            
               </div>

                

               <div class="grid-body " id="printDiv">
                  <div id="infoMessage"><?php //echo $message;?></div>            
                  <?php if($this->session->flashdata('success')):?>
                     <div class="alert alert-success">
                        <?=$this->session->flashdata('success');?>
                     </div>
                  <?php endif; ?>
                  <table class="table table-hover table-condensed">
                     <thead>
                        <tr>
                           <th style="width:2%"> SL </th>
                           <th style="width:30%">Committee Name</th>
                           <th style="width:25%">Session Start Date</th>
                           <th style="width:25%">Session End Date</th>
                           <th style="width:20%">Region Office Name</th>
                           <th style="width:15%">Committee Status</th>
                           <th style="width:15%; text-align: center;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php 
                        $sl=0;
                        foreach ($results as $row):
                           $sl++;
                        if($row->is_current == 1) {
                           $status = 'Current';
                        }else{
                           $status = 'Expired';
                        }
      
                        ?>
                        <tr>
                           <td class="v-align-middle"><?=$sl.'.'?></td>
                           <td> <strong><?=$row->committee_name?> </strong> </td>
                          <td class="v-align-middle"><?=$row->session_start_date; ?></td>
                           <td class="v-align-middle"><?=$row->session_end_date; ?></td>
                           <td class="v-align-middle"><?=$row->region_name; ?></td>
                           <td> <?=$status?></td>
						   <td id="details"><a class="btn btn-mini btn-primary" type="ffuru" media="print" href="<?=base_url('committee/region_details/'.$row->id)?>">Details</a></td>
                              <?php /*?><td class="v-align-middle">
                                 <div class="btn-group"> <a class="btn btn-mini btn-info dropdown-toggle btn-demo-space" data-toggle="dropdown" href="#"> Info <span class="caret"></span> </a>
                                    <ul class="dropdown-menu">
                                       <li><?php echo anchor("committee/region_update/".$row->id, 'Update') ;?></li>
                                       <li class="divider"></li>
                                       <li><a href="<?=base_url('committee/region_details/'.$row->id)?>">Details</a></li>
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

   </div> <!-- END Content -->

</div>
<script>
 function printContents(id)
{
    var contents = $("#"+id).html();

    if ($("#printDiv").length == 0)
    {
    var printDiv = null;
    printDiv = document.createElement('div');
    printDiv.setAttribute('id','printDiv');
    printDiv.setAttribute('class','printable');
    $(printDiv).appendTo('body');
    }

    $("#printDiv").html(contents);

    window.print();

    $("#printDiv").remove();


}
</script>