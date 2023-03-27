<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?=$headding?></title>
	<style type="text/css">
		.priview-body{font-size: 16px;color:#000;margin: 25px;}
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
		.table td, .table th{border:0px solid #ddd;}
		.table tr.bottom-separate td,
		.table tr.bottom-separate td .table td{border-bottom:1px solid #ddd;}
		.borner-none td{border:0px solid #ddd;}
		.headding td, .total td{border-top:1px solid #ddd;border-bottom:1px solid #ddd;}
		.table td{padding:5px;}
		.text-center{text-align:center;}
		.text-right{text-align:right;}
		b{font-weight:500;}
	</style>
</head>
<body>
	<div class="priview-body">
		<div class="priview-header">
			<p class="text-center">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার  <br><span style="font-size:20px;">জাতীয় স্থানীয় সরকার ইনস্টিটিউট</span><br> ২৯, আগারগাঁও, শেরে বাংলা নগর, ঢাকা - ১২০৭ । <span style="font-size:12px;">www.nilg.gov.bd</span></p>
		</div>

		<div class="priview-memorandum">
			<div class="row">
				<div class="col-12 text-center">
					<div style="font-size:18px;"><u><?=$headding?></u></div>
					<?php //!empty($division->name_bn)?'বিভাগ : '.$division->name_bn.'<br>':''?>
					তারিখঃ <?=date_bangla_calender_format(date('d-m-Y'))?>
				</div>
			</div>
		</div>

		<div class="priview-demand">
			<table class="table table-hover table-bordered report">
				<thead class="headding">
					<tr>
						<td class="text-center">নং</td>
						<td class="text-left">বিভাগের নাম</td>
						<td class="text-right">সিটি কর্পোরেশন</td>
						<td class="text-right">জেলা পরিষদ</td>
						<td class="text-right">পৌরসভা</td>
						<td class="text-right">উপজেলা পরিষদ</td>
						<td class="text-right">ইউনিয়ন পরিষদ</td>
						<td class="text-right">মোট</td>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td class="text-center">1</td>
						<td class="text-left">Name</td>
						<td class="text-right"><?=eng2bng(45)?></td>
						<td class="text-right">4</td>
						<td class="text-right">4</td>
						<td class="text-right">4</td>
						<td class="text-right">5</td>
						<td class="text-right">5</td>
					</tr>
				</tbody>

				<tfoot class="headding">
					<tr>
						<td class="text-right" colspan="2">সর্বমোটঃ</td>
						<td class="text-right">33</td>
						<td class="text-right">33</td>
						<td class="text-right">33</td>
						<td class="text-right">33</td>
						<td class="text-right">33</td>
						<td class="text-right">33</td>
					</tr>
				</tfoot>

			</table>
		</div>
	</div>
</body>
</html>


