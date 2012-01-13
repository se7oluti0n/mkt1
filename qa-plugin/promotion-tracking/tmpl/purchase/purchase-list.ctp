<div class="qa-form-function-bar" id="function_bar" style="height:60px;">
	<div class="qa-form-function-item qa-lfloat">
	<table>
		<tr>
			<td>
				<a id = "pdf">{PDF}</a>
			</td>
			<td>
				<a id = "csv">{CSV}</a>
			</td>
			<td>
				<select id="seaching_time">
					{SEARCHING_TIME}
				</select>
			</td>
			<td>
				<label id="start_date_lbl" for="start_date">{START_DATE}</label>
			</td>
			<td>
				<input type="text" id="start_date">
			</td>
			<td>
				<label id="year_lbl" for="year">{YEAR}</label>
			</td>
			<td>
				<select id = "year">
					{YEAR_VAL}
				</select>
			</td>
			<td>
				<label id="uid_lbl" for="uid">{UID}</label>
			</td>
			<td>
				<input type="text" id="uid"> 
			</td>
			<td>
				<a id="view">{VIEW}</a>
			</td>
		</tr>
		<tr>			
			<td colspan="2">
				<a id="report">{REMUN_REPORT}</a>
			</td>
			<td> &nbsp; </td>
			<td>
				<label id="end_date_lbl" for="end_date">{END_DATE}</label>
			</td>
			<td>
				<input type="text" id="end_date">
			</td>
			<td>
				<label id="month_lbl" for="month">{MONTH}</label>
			</td>
			<td>
				<select id = "month">
					{MONTH_VAL}
				</select>
			</td>
			<td>
				<label id="pid_lbl" for="pid">{PID}</label>
			</td>
			<td>
				<input type="text" id="pid"> 
			</td>
		</tr>		
	</table>
	</div>
</div>

<div class="qa-form-content">
	<div class="qa-pr-pages" id="upper_pager"><span class="qa-pr-nextprev">«</span><span class="qa-pr-current">1</span><a id="page_u_1">2</a><a class="qa-pr-nextprev" id="next_page_u">»</a></div>
	<br style="clear:both">
	<table class="qa-pr-table" id="promotion_table" width="100%">
		<tr><th width="20px">NO</th><th width="400px">PRODUCT_NAME</th><th width="100px">PRODUCT_EC_ID</th></tr>		
		{PROMOTION_LIST_VAL}
	</table>
	<div class="qa-pr-pages" id="lower_pager"><span class="qa-pr-nextprev">«</span><span class="qa-pr-current">1</span><a id="page_l_1">2</a><a class="qa-pr-nextprev" id="next_page_l">»</a></div>
	<br style="clear:both">
	<div class="qa-form-function-item qa-rfloat">
		<a id="save_change">{SAVE_CHANGE_BTN}</a>&nbsp;
	</div><br/>
</div>

<script>
	$(function() {
		$( "#start_date" ).datepicker({
			duration: '',  
			showTime: true,
			stepMinutes: 1,  
			stepHours: 1,  
		});
		$( "#end_date" ).datepicker({
			duration: '',  
			showTime: true,  
			stepMinutes: 1,  
			stepHours: 1,  
		});
	});
</script>