<?php
require_once 'qa-tracking-config.php';

class PDF extends FPDF
{
	function ImprovedTable( $data)
	{
		// Column widths
		$w = array(40, 30, 25, 25, 20, 20, 20, 20, 20, 20, 20);
		// Header
		//for($i=0;$i<count($header);$i++)
		//$this->Cell($w[$i],7,$header[$i],1,0,'C');

		//Draw Header Line 1
		$this->Cell($w[0],7,'',1,0,'C');
		$this->Cell($w[1],7,'Total',1,0,'C');
		$this->Cell($w[2]+$w[3],7,'New/Returning',1,0,'C');
		$this->Cell($w[4]+$w[5]+$w[6]+$w[7],7,'Browser',1,0,'C');
		$this->Cell($w[8]+$w[9]+$w[10],7,'Terminal',1,0,'C');
		$this->Ln();

		//Draw header line 2
		$this->Cell($w[0],7,'',1,0,'C');
		$this->Cell($w[1],7,'',1,0,'C');
		$this->Cell($w[2],7,'New',1,0,'C');
		$this->Cell($w[3],7,'Returning',1,0,'C');
		$this->Cell($w[4],7,'IE',1,0,'C');
		$this->Cell($w[5],7,'FF',1,0,'C');
		$this->Cell($w[6],7,'CR',1,0,'C');
		$this->Cell($w[7],7,'SF',1,0,'C');
		$this->Cell($w[8],7,'PC',1,0,'C');
		$this->Cell($w[9],7,'SP',1,0,'C');
		$this->Cell($w[9],7,'MB',1,0,'C');
		$this->Ln();

		//Draw Promotion view
		$this->Cell($w[0],7,'Promotion view','LR',0,'C');
		$this->Cell($w[1],7,number_format($data['pv_new']+$data['pv_return']),'LR',0,'R');
		$this->Cell($w[2],7,number_format($data['pv_new']),'LR',0,'R');
		$this->Cell($w[3],7,number_format($data['pv_return']),'LR',0,'R');
		$this->Cell($w[4],7,number_format($data['pv_ie']),'LR',0,'R');
		$this->Cell($w[5],7,number_format($data['pv_ff']),'LR',0,'R');
		$this->Cell($w[6],7,number_format($data['pv_chr']),'LR',0,'R');
		$this->Cell($w[7],7,number_format($data['pv_sf']),'LR',0,'R');
		$this->Cell($w[8],7,number_format($data['pv_pc']),'LR',0,'R');
		$this->Cell($w[9],7,number_format($data['pv_sp']),'LR',0,'R');
		$this->Cell($w[9],7,number_format($data['pv_mb']),'LR',0,'R');
		$this->Ln();
		
		//Draw Promotion view
		$this->Cell($w[0],7,'Promotion click','LR',0,'C');
		$this->Cell($w[1],7,number_format($data['pc_new']+$data['pc_return']),'LR',0,'R');
		$this->Cell($w[2],7,number_format($data['pc_new']),'LR',0,'R');
		$this->Cell($w[3],7,number_format($data['pc_return']),'LR',0,'R');
		$this->Cell($w[4],7,number_format($data['pc_ie']),'LR',0,'R');
		$this->Cell($w[5],7,number_format($data['pc_ff']),'LR',0,'R');
		$this->Cell($w[6],7,number_format($data['pc_chr']),'LR',0,'R');
		$this->Cell($w[7],7,number_format($data['pc_sf']),'LR',0,'R');
		$this->Cell($w[8],7,number_format($data['pc_pc']),'LR',0,'R');
		$this->Cell($w[9],7,number_format($data['pc_sp']),'LR',0,'R');
		$this->Cell($w[10],7,number_format($data['pc_mb']),'LR',0,'R');
		
		
		$this->Ln();
		//Draw Promotion view
		$this->Cell($w[0],7,'Buy Count','LR',0,'C');
		$this->Cell($w[1],7,number_format($data['buy_count']),'LR',0,'R');
		$this->Cell($w[2],7,'','LR',0,'C');
		$this->Cell($w[3],7,'','LR',0,'C');
		$this->Cell($w[4],7,'','LR',0,'C');
		$this->Cell($w[5],7,'','LR',0,'C');
		$this->Cell($w[6],7,'','LR',0,'C');
		$this->Cell($w[7],7,'','LR',0,'C');
		$this->Cell($w[8],7,'','LR',0,'C');
		$this->Cell($w[9],7,'','LR',0,'C');
		$this->Cell($w[9],7,'','LR',0,'C');
		$this->Ln();
		
		$this->Cell($w[0],7,'Buy on clicks','LR',0,'C');
		$this->Cell($w[1],7,number_format(($data['pc_new'] + $data['pc_return'] > 0)?$data['buy_count'] * 100 / ($data['pc_new'] + $data['pc_return']):0 ),'LR',0,'R');
		$this->Cell($w[2],7,'','LR',0,'C');
		$this->Cell($w[3],7,'','LR',0,'C');
		$this->Cell($w[4],7,'','LR',0,'C');
		$this->Cell($w[5],7,'','LR',0,'C');
		$this->Cell($w[6],7,'','LR',0,'C');
		$this->Cell($w[7],7,'','LR',0,'C');
		$this->Cell($w[8],7,'','LR',0,'C');
		$this->Cell($w[9],7,'','LR',0,'C');
		$this->Cell($w[9],7,'','LR',0,'C');
		$this->Ln();
		
		$this->Cell($w[0],7,'Amount','LR',0,'C');
		$this->Cell($w[1],7,number_format($data['amount'] ),'LR',0,'R');
		$this->Cell($w[2],7,'','LR',0,'C');
		$this->Cell($w[3],7,'','LR',0,'C');
		$this->Cell($w[4],7,'','LR',0,'C');
		$this->Cell($w[5],7,'','LR',0,'C');
		$this->Cell($w[6],7,'','LR',0,'C');
		$this->Cell($w[7],7,'','LR',0,'C');
		$this->Cell($w[8],7,'','LR',0,'C');
		$this->Cell($w[9],7,'','LR',0,'C');
		$this->Cell($w[9],7,'','LR',0,'C');
		$this->Ln();
		
		// Data
		/*	foreach($data as $row)
		 {
		$this->Cell($w[0],6,$row[0],'LR');
		$this->Cell($w[1],6,$row[1],'LR');
		$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
		$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
		$this->Ln();
		}*/
		// Closing line
		$this->Cell(array_sum($w),0,'','T');
	}
}
// Register biz function
$function_array = array(
	'init' => array('func' => 'init_paging', 'args' => $params),
	'get_data' => array('func' => 'get_data', 'args' => $params),
	'get_pdf' => array('func' => 'get_pdf', 'args' => $params),
);

if (!do_tracking_request_process()) {
	echo '{"ret": "NG"}';
} 

/*-- Bussiness functions (public use) --*/
function init_paging(){
	global $qa_db;
	$args = func_get_args();
	
	$sample_param = $args[0]['sample_param']; // just show how to get parame 
	
	// Get template for the page
	$analytics_template = template_factory::create('analytics/tracking-analytics');
	
	renderInputField($analytics_template, null);
	
	
	//$analytics_template->set_data('tracking-analytics', '{SAVE_CHANGE_BTN}', 'SAVE CHANGE');
	$html = $analytics_template->get_html();	
	echo $html; // return HTML code for analytics page
}

function get_data(){
	global $qa_db;
	$args = func_get_args();

	$start_date = $args[0]['start_date']; // just show how to get parame
	$end_date = $args[0]['end_date'];
	//echo $start_date.' '.$end_date;
	// Get template for the page
	$data = getAnalyticsData($start_date, $end_date);
	$analytics_template = template_factory::create('analytics/tracking-analytics');

	renderInputField($analytics_template, $data);

	
	
	$html = $analytics_template->get_html();
	echo $html; // return HTML code for analytics page
}
/*-- /Bussiness functions (public use) --*/


function renderInputField($analytics_template, $data)
{
	// Tim nam hien tai va nam lon nhat ghi trong du lieu
/*	$my_t=getdate(date("U"));
	$current_year = $my_t['year'];
	$my_t2 = getdate(getMaxYear());
	$max_year = $my_t2['year'];*/
	$maxDate = getMaxDate();
	// Tao list cac nam
/*	$year_list = array();
	for( $y = $current_year; $y <= $max_year; $y++)
	{
	array_push($year_list, $y);
	}
	
	$analytics_template->set_data('tracking-analytics', '{YEAR_VAL}',
	array( 'selected' => 1,
	'options' => $year_list)
											);	
	
	// Tao list cac thang
	$month_list = array();
	for($i = 1; $i <= 12; $i++)
	{
	array_push($month_list, $i);
	}
	
	$analytics_template->set_data('tracking-analytics', '{MONTH_VAL}',
											array( 'selected' => 1,
	'options' => $month_list)
	);
	*/
	
	
		
	$analytics_template->set_data('tracking-analytics', '{STATUS}', 'STATUS');
	$analytics_template->set_data('tracking-analytics', '{START_DATE}', 'START DATE');
	$analytics_template->set_data('tracking-analytics', '{END_DATE}', 'END DATE');
	$analytics_template->set_data('tracking-analytics', '{YEAR}', 'YEAR');
	$analytics_template->set_data('tracking-analytics', '{SALE_METHOD}', 'SALE METHOD');
	$analytics_template->set_data('tracking-analytics', '{MONTH}', 'MONTH');
	$analytics_template->set_data('tracking-analytics', '{VIEW}', 'VIEW');
	$analytics_template->set_data('tracking-analytics', '{PDF}', 'PDF');
	$analytics_template->set_data('tracking-analytics', '{CSV}', 'CSV');
	$analytics_template->set_data('tracking-analytics', '{MAX_DATE}', $maxDate);
	
	$analytics_template->set_data('tracking-analytics', '{PV_LBL}', 'Promotion views');
	$analytics_template->set_data('tracking-analytics', '{PV_TOTAL}', $data['pv_new'] + $data['pv_return']);
	$analytics_template->set_data('tracking-analytics', '{PV_NEW}', $data['pv_new']);
	$analytics_template->set_data('tracking-analytics', '{PV_RETURN}', $data['pv_return'] );
	$analytics_template->set_data('tracking-analytics', '{PV_IE}',  $data['pv_ie']);
	$analytics_template->set_data('tracking-analytics', '{PV_FF}',  $data['pv_ff']);
	$analytics_template->set_data('tracking-analytics', '{PV_CHR}',  $data['pv_chr']);
	$analytics_template->set_data('tracking-analytics', '{PV_SF}',  $data['pv_sf']);
	$analytics_template->set_data('tracking-analytics', '{PV_PC}',  $data['pv_pc']);
	$analytics_template->set_data('tracking-analytics', '{PV_SP}',  $data['pv_sp']);
	$analytics_template->set_data('tracking-analytics', '{PV_MB}',  $data['pv_mb']);
	
	$analytics_template->set_data('tracking-analytics', '{PC_LBL}', 'Promotion Click');
	$analytics_template->set_data('tracking-analytics', '{PC_TOTAL}',  $data['pc_new'] + $data['pc_return']);
	$analytics_template->set_data('tracking-analytics', '{PC_NEW}', $data['pc_new']);
	$analytics_template->set_data('tracking-analytics', '{PC_RETURN}', $data['pc_return']);
	$analytics_template->set_data('tracking-analytics', '{PC_IE}', $data['pc_ie']);
	$analytics_template->set_data('tracking-analytics', '{PC_FF}', $data['pc_ff']);
	$analytics_template->set_data('tracking-analytics', '{PC_CHR}', $data['pc_chr']);
	$analytics_template->set_data('tracking-analytics', '{PC_SF}', $data['pc_sf']);
	$analytics_template->set_data('tracking-analytics', '{PC_PC}', $data['pc_pc']);
	$analytics_template->set_data('tracking-analytics', '{PC_SP}', $data['pc_sp']);
	$analytics_template->set_data('tracking-analytics', '{PC_MB}', $data['pc_mb']);
	
	$analytics_template->set_data('tracking-analytics', '{BUY_COUNT_LBL}', 'Buy Count');
	$analytics_template->set_data('tracking-analytics', '{BUY_ON_CLICK_LBL}', 'Buy on click');
	$analytics_template->set_data('tracking-analytics', '{AMOUNT_LBL}', 'Amount');
	$analytics_template->set_data('tracking-analytics', '{BUY_COUNT_TOTAL}', $data['buy_count']);
	
	$analytics_template->set_data('tracking-analytics', '{BUY_ON_CLICK_TOTAL}', ($data['pc_new'] + $data['pc_return'] > 0)?$data['buy_count'] * 100 / ($data['pc_new'] + $data['pc_return']):0 );
	$analytics_template->set_data('tracking-analytics', '{AMOUNT_TOTAL}', $data['amount']);
}

/*-- Private functions (local use) --*/
function getMaxDate()
{
	// Tim ra ngay gan nhat co trong database

	$result = qa_db_query_sub('SELECT max(date) as max_date FROM qaec_analytics ');
	return qa_db_read_one_value($result);
}

function getAnalyticsData($start_date, $end_date)
{
	
	$result = qa_db_query_sub('SELECT sum(pv_new) as pv_new, sum(pv_returning) as pv_return,  sum(pv_ie) as pv_ie,'. 
'sum(pv_firefox) as pv_ff'. 
',  sum(pv_chrome) as pv_chr,  sum(pv_safari) as pv_sf,  sum(pv_pc) as pv_pc'.
',  sum(pv_sp) as pv_sp,  sum(pv_m) as pv_mb,'.
'sum(pc_new) as pc_new, sum(pc_returning) as pc_return,  sum(pc_ie) as pc_ie, sum(pc_firefox) as pc_ff '.  
',  sum(pc_chrome) as pc_chr,  sum(pc_safari) as pc_sf,  sum(pc_pc) as pc_pc'.
',  sum(pc_sp) as pc_sp,  sum(pc_m) as pc_mb, sum(buy_count) as buy_count, sum(amount) as amount'.
' FROM qaec.qaec_analytics '.
'WHERE date >= $ and date <= $', $start_date, $end_date);
	return qa_db_read_one_assoc($result);

}


function get_pdf()
{
	global $qa_db;
	$args = func_get_args();
	
	$start_date = $args[0]['start_date']; // just show how to get parame
	$end_date = $args[0]['end_date'];
	//echo $start_date.' '.$end_date;
	// Get template for the page
	$data = getAnalyticsData($start_date, $end_date);
	$pdf = new PDF('L','mm','A4');
	$pdf->SetFont('Arial','',14);
	$pdf->AddPage();
	$pdf->ImprovedTable($data);
	$pdf->Output('analytics.pdf','D');
}
/*-- /Private functions (local use) --*/

/*
	Omit PHP closing tag to help avoid accidental output
*/