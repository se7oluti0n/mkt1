<div class="qa-form-function-bar" id="function_bar" style="height:60px;">
	<div class="qa-form-function-item qa-lfloat">
	<table>
		<tr>
			<td>
				<a id="search">PDF</a>
			</td>			
			<td>
				<a id="search">CSV</a>
			</td>
		</tr>
		<tr>			
			<td>
				<a id="search">Remun report</a>
			</td>
		</tr>
	</table>
	</div><br/>
	<div class="qa-form-function-item qa-lfloat">
	<table>
		<tr>
			<td>
				<label id="status_lbl" for="status">{STATUS}</label>
			</td>			
			<td>
				<select id="status">
					{STATUS_VAL}
				</select>
			</td>
			<td>
				<label id="start_date_lbl" for="start_date">{START_DATE}</label>
			</td>
			<td>
				<input type="text" id="start_date">
			</td>
			<td>
				<label id="keyword_lbl" for="keyword">{KEYWORD}</label>
			</td>
			<td>
				<input type="text" id="keyword" size="20">
			</td>
		</tr>
		<tr>			
			<td>
				<label id="sale_method_lbl" for="sale_method">{SALE_METHOD}</label>
			</td>
			<td>				
				<select id="sale_method">
					{SALE_METHOD_VAL}
				</select>
			</td>
			<td>
				<label id="end_date_lbl" for="end_date">{END_DATE}</label>
			</td>
			<td>
				<input type="text" id="end_date">
			</td>
			<td>				
				<label id="ranking_lbl" for="ranking">{RANKING}</label>
			</td>
			<td>									
				<input type="checkbox" id="ranking">
			</td>
		</tr>		
	</table>
	</div><br/>
	<div class="qa-form-function-item qa-rfloat">
		<a id="search">{SEARCH}</a>		
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