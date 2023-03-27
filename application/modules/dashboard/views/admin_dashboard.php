<div class="page-content">
   <div class="content">
      <div class="page-title"> <i class="fa fa-dashboard"></i>
         <h3>Dashboard</h3>
      </div>

      <div class="row">
         <div class="col-md-3 m-b-20">
            <div class="row tiles-container">
               <div class="col-md-4 no-padding">
                  <div class="tiles red" style="padding:20px;">
                     <i class="fa fa-dashboard" style="font-size: 38px;"></i>
                  </div>
               </div>
               <div class="col-md-8 no-padding">
                  <div class="tiles white text-center">
                     <h2 class="semi-bold text-error weather-widget-big-text no-margin" style="padding-top: 6px; padding-bottom: 6px; "><?=$total_data?></h2>
                     <div class="tiles-title blend m-b-5"><a href="<?=base_url('requisition/index')?>" style="font-size: 16px;">Total Requisition</a></div>
                     <div class="clearfix"></div>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-md-3 m-b-20">
            <div class="row tiles-container">
               <div class="col-md-4 no-padding">
                  <div class="tiles blue" style="padding:20px;">
                     <i class="fa fa-dashboard" style="font-size: 38px;"></i>
                  </div>
               </div>
               <div class="col-md-8 no-padding">
                  <div class="tiles white text-center">
                     <h2 class="semi-bold text-error weather-widget-big-text no-margin" style="padding-top: 6px; padding-bottom: 6px; "><?=$total_pending?></h2>
                     <div class="tiles-title blend m-b-5"><a href="<?=base_url('requisition/request_list')?>" style="font-size: 16px;">Total Pending</a></div>
                     <div class="clearfix"></div>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-md-3 m-b-20">
            <div class="row tiles-container">
               <div class="col-md-4 no-padding">
                  <div class="tiles purple" style="padding:20px;">
                     <i class="fa fa-dashboard" style="font-size: 38px;"></i>
                  </div>
               </div>
               <div class="col-md-8 no-padding">
                  <div class="tiles white text-center">
                     <h2 class="semi-bold text-error weather-widget-big-text no-margin" style="padding-top: 6px; padding-bottom: 6px; "><?=$total_approve?></h2>
                     <div class="tiles-title blend m-b-5"><a href="<?=base_url('requisition/approve_list')?>" style="font-size: 16px;">Total Approve</a></div>
                     <div class="clearfix"></div>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-md-3 m-b-20">
            <div class="row tiles-container">
               <div class="col-md-4 no-padding">
                  <div class="tiles green" style="padding:20px;">
                     <i class="fa fa-dashboard" style="font-size: 38px;"></i>
                  </div>
               </div>
               <div class="col-md-8 no-padding">
                  <div class="tiles white text-center">
                     <h2 class="semi-bold text-error weather-widget-big-text no-margin" style="padding-top: 6px; padding-bottom: 6px; "><?=$total_rejected?></h2>
                     <div class="tiles-title blend m-b-5"><a href="<?=base_url('requisition/rejected_list')?>" style="font-size: 16px;">Total Rejected</a></div>
                     <div class="clearfix"></div>
                  </div>
               </div>
            </div>
         </div>
      </div> <!-- /row -->

      <div class="row">
         <div class="col-md-6 m-b-20">
            <div class="row tiles-container">
               <div class="col-md-12 no-padding">
                  <div class="tiles white text-center">
                     <div class="tiles-title blend m-b-5"><a href="<?=base_url('purchase/fiscal_year/1')?>" style="font-size: 18px;">2019-2020 Fiscal Year Purchase</a></div>
                     <div class="clearfix"></div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 m-b-20">
            <div class="row tiles-container">
               <div class="col-md-12 no-padding">
                  <div class="tiles white text-center">
                     <div class="tiles-title blend m-b-5"><a href="<?=base_url('purchase/fiscal_year/2')?>" style="font-size: 18px;">2020-2021 Fiscal Year Purchase</a></div>
                     <div class="clearfix"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="row">
         <div class="col-md-12">
            <div style="background: #fff; padding-top: 15px">
               <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
               <script>
                  zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
                  ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
               </script>
               <style>
                  .zc-ref {
                     display: none;
                  }
                  #myChart-wrapper {
                     margin: auto;
                  }
               </style>
               <div id='myChart'><a class="zc-ref" href="https://www.zingchart.com/">Charts by ZingChart</a></div>
               <script>
               var mySeries = [{
                  values: [<?=$total_pending?>],
                  text: 'Total Pending'
               }, {
                  values: [<?=$total_approve?>],
                  text: 'Total Approve'
               }, {
                  values: [<?=$total_rejected?>],
                  text: 'Total Rejected'
               }

               ];

               var myConfig = {
                  type: "pie",
                  globals: {
                     fontFamily: 'sans-serif'
                  },
                  legend: {
                     verticalAlign: 'middle',
                     toggleAction: 'remove',
                     marginRight: 60,
                     width: 100,
                     alpha: 0.1,
                     borderWidth: 0,
                     highlightPlot: true,
                     item: {
                        fontColor: "#373a3c",
                        fontSize: 12
                     }
                  },
                  backgroundColor: "#fff",
                  palette: ["#0099CC", "#007E33", "#FF8800"],
                  title: {
                    text: "Requistition Statistics",
                    backgroundColor: 'white',
                    color: '#606060'
                 },
                 plot: {
                  refAngle: 270,
                  detach: false,
                  valueBox: {
                     text: "%v",
                     fontColor: "#fff"
                  },
                  highlightState: {
                     borderWidth: 2,
                     borderColor: "#000"
                  }
               },
               tooltip: {
                  placement: 'node:out',
                  borderColor: "#373a3c",
                  borderWidth: 2
               },
               // title: [{
               //    text: "কর্মকর্তা/কর্মচারীর পরিসংখ্যান",
               //    fontSize: 25,
               //    textAlign: "left",
               //    fontColor: "#373a3c"
               // }],
               series: mySeries

            };

            zingchart.render({
               id: 'myChart',
               data: myConfig,
               height: 500,
               width: 725
            });


            zingchart.node_click = function(p) {

               var SHIFT_ACTIVE = p.ev.shiftKey;
               var sliceData = mySeries[p.plotindex];
               isOpen = (sliceData.hasOwnProperty('offset-r')) ? (sliceData['offset-r'] !== 0) : false;
               if (isOpen) {
                  sliceData['offset-r'] = 0;
               } else {
                  if (!SHIFT_ACTIVE) {
                     for (var i = 0; i < mySeries.length; i++) {
                        mySeries[i]['offset-r'] = 0;
                     }
                  }
                  sliceData['offset-r'] = 20;
               }

               zingchart.exec('myChart', 'setdata', {
                  data: myConfig
               });
            }
         </script>
      </div>
   </div>
</div> <!-- /row -->

<?php /*
<br><br>
<div class="row">
   <script src="https://code.highcharts.com/highcharts.js"></script>
   <div id="container" style="width:100%; height:400px;"></div>
   <script type="text/javascript">
      Highcharts.chart('container', {
         chart: {
            type: 'column'
         },
         title: {
            text: 'Requistition Statistics'
         },
         subtitle: {
            text: ''
         },
         xAxis: {
            type: 'category',
            labels: {
               rotation: -45,
               style: {
                  fontSize: '13px',
                  fontFamily: 'Verdana, sans-serif'
               }
            }
         },
         yAxis: {
            min: 0,
            title: {
               text: 'Requistition'
            }
         },
         legend: {
            enabled: false
         },
         tooltip: {
            pointFormat: '<b>{point.y:.0f}</b>'
         },
         series: [{
            name: 'Month',
            data: [
            ['January', 8],
            ['February', 5],
            ['March', 5],
            ['April', 10],
            ['May', 0],
            ['June', 0],
            ['July', 0],
            ['August', 0],
            ['September', 0],
            ['October', 0],
            ['November', 0],
            ['December', 0]
            ],
            dataLabels: {
               enabled: true,
               rotation: -90,
               color: '#FFFFFF',
               align: 'right',
                                 format: '{point.y:.0f}', // one decimal
                                 y: 10, // 10 pixels down from the top
                                 style: {
                                    fontSize: '13px',
                                    fontFamily: 'Verdana, sans-serif'
                                 }
                              }
                           }]
                        });
                     </script>
                  </div>  <!-- /row -->

                  */ ?>

               </div>
            </div>



