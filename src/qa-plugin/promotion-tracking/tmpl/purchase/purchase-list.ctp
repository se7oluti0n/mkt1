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
				<select id="searching_time">
					{SEARCHING_TIME}
				</select></td>
				<td><label id="start_date_lbl" for="start_date">{START_DATE}</label></td>
				<td>
				<input type="text" id="start_date">
				</td>
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
			dateFormat : 'yy-mm-dd',
			changeMonth : true,
			changeYear : true,
			minDate : '2012-01-01',
			maxDate : '{MAX_DATE}'
		});
		$('#start_date').attr('readOnly', 'true');
		$("#end_date").datepicker({
			duration : '',
			showTime : true,
			stepMinutes : 1,
			stepHours : 1,
			dateFormat : 'yy-mm-dd',
			changeMonth : true,
			changeYear : true,
			minDate : '2012-01-01',
			maxDate : '{MAX_DATE}'
		});
		$('#end_date').attr('readOnly', 'true');
	});

    //Event binder
    $('#view').click(function() {
        var cmd = "load-content";
        var type = $('#searching_time').val();
        var uid = $('#uid').val();
        var pid = $('#pid').val();
        var start = $('#start_date').val();
        var end = $('#end_date').val();
        $.get("qa-plugin/promotion-tracking/qa-ajax-purchase-list.php", 
            {cmd : cmd, search_type: type, uid: uid, pid: pid, start: start, end: end}, 
            function(data) {
            	$('.qa-form-content').html(data);
            }
		);
	});
    
    $('#searching_time').change(function() {
    	$.get("qa-plugin/promotion-tracking/qa-ajax-purchase-list.php", 
            {cmd : "max-date", type: this.value}, function(data) {
            	$("#start_date").val('');
            	$("#start_date").datepicker("option", "maxDate", data);
            	$("#end_date").val('');
                $("#end_date").datepicker("option", "maxDate", data);
            }
		);
	});
	
	function page_click(page) {
		var cmd = 'load-page-number';
		//page = $(obj).text() - 1;
		$.get("qa-plugin/promotion-tracking/qa-ajax-purchase-list.php", 
    	    {cmd : cmd, page: page}, function(data) {
            	$('.qa-form-content').html(data);
            }
		);
	};
	
	// Save history of current qa-main    
	his = '';

	function savePage() {
    	his = $('.qa-form-content').html();
	}

	function restorePage() {
    	$('.qa-form-content').html(his);
	}

	function purchaseDetail(num) {
    	var cmd = "load-detail";
    	savePage();
    	$.get("qa-plugin/promotion-tracking/qa-ajax-purchase-list.php", 
        	{cmd : cmd, num : num}, function(data) {
        	$('.qa-form-content').html(data);
    	});
	}
</script>