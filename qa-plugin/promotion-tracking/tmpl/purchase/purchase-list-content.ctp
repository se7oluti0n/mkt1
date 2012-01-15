
<!-- should move this to php file for automatically making -->
<div class="qa-pr-pages" id="upper_pager">
	<span class="qa-pr-nextprev">«</span>
	<span class="qa-pr-current">1</span>
	<a id="page_u_1">2</a>
	<a class="qa-pr-nextprev" id="next_page_u">»</a>
</div>
<br style="clear:both">
<table class="qa-pr-table" id="promotion_table" width="100%">
	<tr>
		<th width="10px"> No </th>
		<th> Order id </th>
		<th> Amount </th>
		<th> Remun </th>
		<th> Order details </th>
		<th> UID </th>
		<th> PID </th>
		<th> Click time </th>
		<th> Buy time </th>
		<th> &nbsp; </th>
	</tr>
	{PROMOTION_LIST_VAL}
</table>
<!-- should move this to php file for automatically making -->
<div class="qa-pr-pages" id="lower_pager">
	<span class="qa-pr-nextprev">«</span>
	<span class="qa-pr-current">1</span>
	<a id="page_u_1">2</a>
	<a class="qa-pr-nextprev" id="next_page_u">»</a>
</div>
<br style="clear:both">
<div class="qa-form-function-item qa-rfloat">
	<a id="save_change">{SAVE_CHANGE_BTN}</a>&nbsp;
</div>
<br/>

<script>
	$('#save_change').click(function(){
        alert('You have clicked on me!');
    })
</script>