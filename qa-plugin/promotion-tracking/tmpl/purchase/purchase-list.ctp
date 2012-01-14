<div class="qa-form-function-bar" id="function_bar" style="height:60px;">
	<div class="qa-form-function-item qa-lfloat">
		<table>
			<tr>
				<td><a id = "pdf" style="display: inline-block">{PDF}</a></td>
				<td><a id = "csv" style="display: inline-block">{CSV}</a></td>
			</tr>
			<tr>
				<td colspan="2"><a id="report" style="display: inline-block">{REMUN_REPORT}</a></td>
			</tr>
		</table>
	</div>
	<div class="qa-form-function-item qa-rfloat">
		<table>
			<tr>
				<td>
				<select id="seaching_time">
					{SEARCHING_TIME}
				</select></td>
				<td><label id="start_date_lbl" for="start_date">{START_DATE}</label></td>
				<td>
				<input type="text" id="start_date">
				</td>
				<td><label id="year_lbl" for="year">{YEAR}</label></td>
				<td>
				<select id = "year">
					{YEAR_VAL}
				</select></td>
				<td><label id="uid_lbl" for="uid">{UID}</label></td>
				<td>
				<input type="text" id="uid">
				</td>
				<td><a id="view">{VIEW}</a></td>
			</tr>
			<tr>
				<td> &nbsp; </td>
				<td><label id="end_date_lbl" for="end_date">{END_DATE}</label></td>
				<td>
				<input type="text" id="end_date">
				</td>
				<td><label id="month_lbl" for="month">{MONTH}</label></td>
				<td>
				<select id = "month">
					{MONTH_VAL}
				</select></td>
				<td><label id="pid_lbl" for="pid">{PID}</label></td>
				<td>
				<input type="text" id="pid">
				</td>
			</tr>
		</table>
	</div>
</div>
<div class="qa-form-content"></div>
<script>
    $(function() {
        $("#start_date").datepicker({
            duration : '',
            showTime : true,
            stepMinutes : 1,
            stepHours : 1,
        });
        $("#end_date").datepicker({
            duration : '',
            showTime : true,
            stepMinutes : 1,
            stepHours : 1,
        });
    });
</script>