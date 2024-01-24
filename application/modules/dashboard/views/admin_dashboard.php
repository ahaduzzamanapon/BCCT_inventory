
<style>
    .tiles-container {
    margin-left: 0px;
    margin-right: 0px;
    box-shadow: 0px 0px 7px 1px #adadad;
}
</style>
<div class="page-content">
    <div class="content">
        <div class="page-title">
            <h3>Welcome to Dashboard<strong>, <?php echo $this->session->userdata('first_name')?></strong></h3>
        </div>

        <div class="row"
        style="box-shadow: 0px 0px 7px 1px #adadad;margin: 8px;padding: 4px;display: flex;flex-wrap: wrap;background: white;border-radius: 5px;">
            <h3><strong>Requisition</strong></h3><br>
            <div class="row" style="width: -webkit-fill-available;">
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12  m-b-20">
                    <div class="row tiles-container">
                        <div class="col-md-4 no-padding">
                            <div class="tiles red" style="padding:20px;">
                                <i class="fa fa-dashboard" style="font-size: 38px;"></i>
                            </div>
                        </div>
                        <div class="col-md-8 no-padding">
                            <div class="tiles white text-center">
                                <h2 class="semi-bold text-error weather-widget-big-text no-margin"
                                    style="padding-top: 6px; padding-bottom: 6px; "><?=$total_data?></h2>
                                <div class="tiles-title blend m-b-5"><a href="<?=base_url('requisition/index')?>"
                                        style="font-size: 14px;">Total Requisition</a></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12  m-b-20">
                    <div class="row tiles-container">
                        <div class="col-md-4 no-padding">
                            <div class="tiles blue" style="padding:20px;">
                                <i class="fa fa-dashboard" style="font-size: 38px;"></i>
                            </div>
                        </div>
                        <div class="col-md-8 no-padding">
                            <div class="tiles white text-center">
                                <h2 class="semi-bold text-error weather-widget-big-text no-margin"
                                    style="padding-top: 6px; padding-bottom: 6px; "><?=$total_pending?></h2>
                                <div class="tiles-title blend m-b-5"><a href="<?=base_url('requisition/request_list')?>"
                                        style="font-size: 14px;">Total Pending</a></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12  m-b-20">
                    <div class="row tiles-container">
                        <div class="col-md-4 no-padding">
                            <div class="tiles purple" style="padding:20px;">
                                <i class="fa fa-dashboard" style="font-size: 38px;"></i>
                            </div>
                        </div>
                        <div class="col-md-8 no-padding">
                            <div class="tiles white text-center">
                                <h2 class="semi-bold text-error weather-widget-big-text no-margin"
                                    style="padding-top: 6px; padding-bottom: 6px; "><?=$total_approve?></h2>
                                <div class="tiles-title blend m-b-5"><a href="<?=base_url('requisition/approve_list')?>"
                                        style="font-size: 14px;">Total Approve</a></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12  m-b-20">
                    <div class="row tiles-container">
                        <div class="col-md-4 no-padding">
                            <div class="tiles green" style="padding:20px;">
                                <i class="fa fa-dashboard" style="font-size: 38px;"></i>
                            </div>
                        </div>
                        <div class="col-md-8 no-padding">
                            <div class="tiles white text-center">
                                <h2 class="semi-bold text-error weather-widget-big-text no-margin"
                                    style="padding-top: 6px; padding-bottom: 6px; "><?=$total_rejected?></h2>
                                <div class="tiles-title blend m-b-5"><a href="<?=base_url('requisition/rejected_list')?>"
                                        style="font-size: 14px;">Total Rejected</a></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <?php if(!$this->ion_auth->in_group('User')){ ?>

        <div class="row" 
        style="box-shadow: 0px 0px 7px 1px #adadad;margin: 8px;padding: 4px;display: flex;flex-wrap: wrap;background: white;border-radius: 5px;">
            <h3 class="col-md-12"><strong>Purchase</strong></h3> <br>

            <div class="row" style="width: -webkit-fill-available;">
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12   m-b-20">
                    <div class="row tiles-container">
                        <div class="col-md-4 no-padding">
                            <div class="tiles red" style="padding:20px;">
                                <i class="fa fa-dashboard" style="font-size: 38px;"></i>
                            </div>
                        </div>
                        <div class="col-md-8 no-padding">
                            <div class="tiles white text-center">
                                <h2 class="semi-bold text-error weather-widget-big-text no-margin"
                                    style="padding-top: 6px; padding-bottom: 6px; "><?=$total_datap?></h2>
                                <div class="tiles-title blend m-b-5"><a href="<?=base_url('purchase/index')?>"
                                        style="font-size: 14px;">Total Purchase</a></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12  m-b-20">
                    <div class="row tiles-container">
                        <div class="col-md-4 no-padding">
                            <div class="tiles blue" style="padding:20px;">
                                <i class="fa fa-dashboard" style="font-size: 38px;"></i>
                            </div>
                        </div>
                        <div class="col-md-8 no-padding">
                            <div class="tiles white text-center">
                                <h2 class="semi-bold text-error weather-widget-big-text no-margin"
                                    style="padding-top: 6px; padding-bottom: 6px; "><?=$total_pendingp?></h2>
                                <div class="tiles-title blend m-b-5"><a href="<?=base_url('purchase/purchase_pending')?>"
                                        style="font-size: 14px;">Total Pending</a></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12  m-b-20">
                    <div class="row tiles-container">
                        <div class="col-md-4 no-padding">
                            <div class="tiles purple" style="padding:20px;">
                                <i class="fa fa-dashboard" style="font-size: 38px;"></i>
                            </div>
                        </div>
                        <div class="col-md-8 no-padding">
                            <div class="tiles white text-center">
                                <h2 class="semi-bold text-error weather-widget-big-text no-margin"
                                    style="padding-top: 6px; padding-bottom: 6px; "><?=$total_approvep?></h2>
                                <div class="tiles-title blend m-b-5"><a href="<?=base_url('purchase/purchase_approved')?>"
                                        style="font-size: 14px;">Total Approve</a></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12  m-b-20">
                    <div class="row tiles-container">
                        <div class="col-md-4 no-padding">
                            <div class="tiles green" style="padding:20px;">
                                <i class="fa fa-dashboard" style="font-size: 38px;"></i>
                            </div>
                        </div>
                        <div class="col-md-8 no-padding">
                            <div class="tiles white text-center">
                                <h2 class="semi-bold text-error weather-widget-big-text no-margin"
                                    style="padding-top: 6px; padding-bottom: 6px; "><?=$total_rejectedp?></h2>
                                <div class="tiles-title blend m-b-5"><a href="<?=base_url('purchase/purchase_rejected')?>"
                                        style="font-size: 14px;">Total Rejected</a></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

       
        <style></style>
        <?php
        if ($total_data != 0) {
           $percent_pending = ($total_pending / $total_data) * 100;
           $percent_approve = ($total_approve / $total_data) * 100;
           $percent_rejected = ($total_rejected / $total_data) * 100;
        }else{
           $percent_pending = 0;
           $percent_approve = 0;
           $percent_rejected = 0;
        }

        if ($total_datap != 0) {
           $percent_pendingp = ($total_pendingp / $total_datap) * 100;
           $percent_approvep = ($total_approvep / $total_datap) * 100;
           $percent_rejectedp = ($total_rejectedp / $total_datap) * 100;
        }else{
           $percent_pendingp = 0;
           $percent_approvep = 0;
           $percent_rejectedp = 0;
        }
         ?>
        <div class="row">
            <div class="col-md-6">
                <div style="background: #fff;padding-top: 15px;box-shadow: 0px 0px 7px 1px #adadad;margin: 9px;border-radius: 5px;">
                    <canvas id="myChart" style="width:100%"></canvas>
                </div>

                <script>
                const xValues = [
                    'Total Pending',
                    'Total Approve',
                    'Total Rejected'
                ];
                const yValues = [<?=$percent_pending?>, <?=$percent_approve?>, <?=$percent_rejected?>];
                const barColors = [
                    "#b91d47",
                    "#00aba9",
                    "#2b5797"
                ];

                new Chart("myChart", {
                    type: "pie",
                    data: {
                        labels: xValues,
                        datasets: [{
                            backgroundColor: barColors,
                            data: yValues
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: "Requisition Status"
                        }
                    }
                });
                </script>
            </div>
            <?php if(!$this->ion_auth->in_group('User')){ ?>

            <div class="col-md-6">
                <div style="background: #fff;padding-top: 15px;box-shadow: 0px 0px 7px 1px #adadad;margin: 9px;border-radius: 5px;">
                    <canvas id="myChartp" style="width:100%"></canvas>
                </div>
                <script>
                const xValuesp = [
                    'Total Pending',
                    'Total Approve',
                    'Total Rejected'
                ];
                const yValuesp = [<?=$percent_pendingp?>, <?=$percent_approvep?>, <?=$percent_rejectedp?>];
                // const barColors = [
                //     "#b91d47",
                //     "#00aba9",
                //     "#2b5797"
                // ];

                new Chart("myChartp", {
                    type: "pie",
                    data: {
                        labels: xValuesp,
                        datasets: [{
                            backgroundColor: barColors,
                            data: yValuesp
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: "Purchase Status"
                        }
                    }
                });
                </script>
            </div>

            <?php } ?>
        </div>
    </div>
</div>
</div>