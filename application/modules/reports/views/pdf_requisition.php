<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?=$headding?></title>
  <style type="text/css">
    body{font-family: 'Tahoma'}
    .priview-body{font-size: 16px;color:#000;margin: 25px; }
    .priview-header{margin-bottom: 10px;text-align:center;}
    .priview-header div{font-size: 18px;}
    .priview-memorandum, .priview-from, .priview-to, .priview-subject, .priview-message, .priview-office, .priview-demand, .priview-signature{padding-bottom: 20px;}
    .priview-office{text-align: center;}
    .priview-imitation ul{list-style: none;}
    .priview-imitation ul li{display: block;}
    .date-name{width: 20%;float: left;padding-top: 23px;text-align: right;}
    .date-value{width: 70%;float:left;}
    .date-value ul{list-style: none;}
    .date-value ul li{text-align: center;}
    .date-value ul li.underline{border-bottom: 1px solid black;}
    .subject-content{text-decoration: underline;}
    .headding{border-top:1px solid #000;border-bottom:1px solid #000;}

    .col-1{width:8.33%;float:left;}
    .col-2{width:16.66%;float:left;}
    .col-3{width:25%;float:left;}
    .col-4{width:33.33%;float:left;}
    .col-5{width:41.66%;float:left;}
    .col-6{width:50%;float:left;}
    .col-7{width:58.33%;float:left;}
    .col-8{width:66.66%;float:left;}
    .col-9{width:75%;float:left;}
    .col-10{width:83.33%;float:left;}
    .col-11{width:91.66%;float:left;}
    .col-12{width:100%;float:left;}

    .table{width:100%;border-collapse: collapse;}
    .table td, .table th{border:1px solid #ddd;}
    .table tr.bottom-separate td,
    .table tr.bottom-separate td .table td{border-bottom:1px solid #ddd;}
    .borner-none td{border:0px solid #ddd;}
    .headding td, .total td{border-top:1px solid #ddd;border-bottom:1px solid #ddd;}
    .table th{padding:5px;}
    .table td{padding:5px;}
    .text-center{text-align:center;}
    .text-right{text-align:right;}
    .report_date{text-align: right; font-size: 14px;}
    b{font-weight:500;}
  </style>

  <style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0; width: 100%}
    .tg td{border-color:#ccc;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
      overflow:hidden;padding:3px 6px;word-break:normal;}
      .tg th{border-color:#ccc;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
        font-weight:normal;overflow:hidden;padding:3px 6px;word-break:normal;}
        .tg .tg-y6fn{background-color:#c0c0c0;text-align:left;vertical-align:top}
        .tg .tg-0lax{text-align:left;vertical-align:top}
      </style>
    </head>
    <body>
      <div class="priview-body">
        <div class="priview-header">
          <p class="text-center">
            <span style="font-size:20px;font-weight: bold;">BCCT Inventory Management System</span>
            <br> <span style="font-size: 14px;">Address </span>
            <!-- <br><span style="font-size:12px;">www.scouts.gov.bd</span> -->
          </p>
        </div>

        <div class="priview-memorandum">
         <div class="row">
          <div class="col-12 text-center">
           <div style="font-size:18px;"><u><?=$headding?></u></div>
           <br>
           <!-- <span style="font-size: 14px;">Date From: <?=$date_from?> - Date To: <?=$date_to?></span> -->
         </div>
       </div>
     </div>

     <div class="priview-demand">
       <div class="report_date">Report Date: <?=date('d-m-Y')?></div>
       <table class="table table-hover table-bordered report">
        <thead class="headding">
         <tr>
          <th class="text-center" width="20">SL</th>
          <th class="text-left" width="80">Datetime</th>     
          <th class="text-left" width="150">Requisition Title</th>
          <th class="text-center" width="100">Name</th>
          <th class="text-left" width="100">Designation</th>     
          <th class="text-left" width="150">Department</th>            
        </tr>
      </thead>

      <tbody>
       <?php 
       $i=0;
               //$total_group=$total_member=$grandTotalGroup=$grandTotalMember=0;

       foreach ($results['summary'] as $key => $row) { 
        $i++;
                  //$total += $row->quantity;
        ?>
        <tr>
         <td class="text-center"><?=$i?>.</td>
         <td class="text-left"><?=$row->created?></td>                 
         <td class="text-left"><?=$row->title?></td>                 
         <td class="text-left"><?=$row->first_name?></td>
         <td class="text-left"><?=$row->dept_name?></td>
         <td class="text-left"><?=$row->desig_name?></td>
       </tr>
       <tr>
       <td colspan="6">
          <table class="tg">
            <thead>
              <tr>
                <th class="tg-y6fn">Item Name</th>
                <th class="tg-y6fn">Quantity</th>
                <th class="tg-y6fn">Unit</th>
                <th class="tg-y6fn">Remark</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($results['details'][$key] as $row2) { ?>
              <tr>
                <td class="tg-0lax"><?=$row2->item_name?></td>
                <td class="tg-0lax"><?=$row2->qty_approve?></td>
                <td class="tg-0lax"><?=$row2->unit_name?></td>
                <td class="tg-0lax"><?=$row2->remark?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>      
</div>

</div>

</body>
</html>


