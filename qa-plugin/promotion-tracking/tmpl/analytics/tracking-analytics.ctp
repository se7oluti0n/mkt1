<div class="qa-form-function-bar" id="function_bar" style="height:60px;">
	<div class="qa-form-function-item qa-lfloat">
	<table>
		<tr>
			<td>
				<a id="pdf">{PDF}</a>
			</td>
			<td>		
				<a id="csv">{CSV}</a>
			</td>		
		<tr>
	</table>
	</div>
	<div class="qa-form-function-item qa-rfloat">
	<table>
		<tr>
			<td>
				<label id="start_date_lbl" for="start_date">{START_DATE}</label>
			</td>
			<td>
				<input type="text" id="start_date">
			</td>
			<td>
				<label id="end_date_lbl" for="end_date">{END_DATE}</label>
			</td>
			<td>
				<input type="text" id="end_date">
			</td>
			<td>
				<a id="view">{VIEW}</a>	
			</td>
		</tr>
		<!--  tr>	
			<td>
				<label id="year_lbl" >{YEAR}</label>
			</td>
			<td>
				<select>
					{YEAR_VAL}
				</select>
			</td>
			
			<td>				
				<label id="month_lbl">{MONTH}</label>
			</td>
			<td>									
				<select>
					{MONTH_VAL}
				</select>
			</td>
		</tr -->		
	</table>
			
	</div>
</div>

<div class="qa-form-content">
	
	<br style="clear:both">
	<table  width="100%">
		<tr align="center">
			<td> </td>
			<td id="total_col_lbl">Total </td>
			<td colspan="2" id="newreturn_col_lbl">New / Returning </td>
			<td colspan="4">Brower </td>
			<td colspan="3">Terminal</td>
			
		</tr>
		<tr align="center">
			<td></td>
			<td> </td>
			<td>New</td>
			<td>Returning</td>
			<td>IE</td>
			<td>FF</td>
			<td>CR</td>
			<td>SF</td>
			<td>pc</td>
			<td>sp</td>
			<td>m</td>
			
		</tr>
		<tr align="center">
			<td id="pro_view_lbl">{PV_LBL}</td>
			<td id="pv_total">{PV_TOTAL} hits </td>
			<td id="pv_new">{PV_NEW}</td>
			<td id="pv_return">{PV_RETURN}</td>
			<td id="pv_ie">{PV_IE}</td>
			<td id="pv_ff">{PV_FF}</td>
			<td id="pv_chr">{PV_CHR}</td>
			<td id="pv_sf">{PV_SF}</td>
			<td id="pv_pc">{PV_PC}</td>
			<td id="pv_sp">{PV_SP}</td>
			<td id="pv_mb">{PV_MB}</td>
			
		</tr>
		<tr align="center">
			<td id="pro_click_lbl">{PC_LBL}</td>
			<td id="pc_total">{PC_TOTAL} hits </td>
			<td id="pc_new">{PC_NEW}</td>
			<td id="pc_return">{PC_RETURN}</td>
			<td id="pc_ie">{PC_IE}</td>
			<td id="pc_ff">{PC_FF}</td>
			<td id="pc_chr">{PC_CHR}</td>
			<td id="pc_sf">{PC_SF}</td>
			<td id="pc_pc">{PC_PC}</td>
			<td id="pc_sp">{PC_SP}</td>
			<td id="pc_mb">{PC_MB}</td>
			
		</tr>
			
		</tr>
		<tr align="center">
			<td id="buy_count_lbl">{BUY_COUNT_LBL}</td>
			<td id="buy_count_total">{BUY_COUNT_TOTAL} Times </td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			
		</tr>
		<tr align="center">
			<td>{BUY_ON_CLICK_LBL}</td>
			<td>{BUY_ON_CLICK_TOTAL} % </td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			
		</tr>
		<tr align="center">
			<td>{AMOUNT_LBL}</td>
			<td>{AMOUNT_TOTAL} USD </td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			
		</tr>
	</table>
	
</div>

<script>
	$(function() {
		$( "#start_date" ).datepicker({
			duration: '',  
			showTime: true,
			changeMonth : true,
			changeYear : true,
			stepMinutes: 1,  
			stepHours: 1, 
			minDate: '2012-01-01',
			dateFormat: 'yy-mm-dd',
			maxDate: '{MAX_DATE}'
			
			
		});
		$( "#end_date" ).datepicker({
			duration: '',  
			showTime: true,  
			changeMonth : true,
			changeYear : true,
			stepMinutes: 1,  
			stepHours: 1,  
			dateFormat: 'yy-mm-dd',
			minDate: '2012-01-01',
			maxDate: '{MAX_DATE}'
			
		});
	});
	
</script>