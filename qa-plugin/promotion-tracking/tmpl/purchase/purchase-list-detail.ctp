<span><b> Purchase detail</b></span>
<br style="clear:both">
<br />
<table border="1px" rules="none">
	<tr>
		<th>Order id:</th>
		<td>{OID}</td>
	</tr>
	<tr>
		<th>Buy time:</th>
		<td>{ORDER_TIME}</td>
	</tr>
	<tr>
		<th>Amount:</th>
		<td>{AMOUNT}</td>
	</tr>
	<tr>
		<th>Details:</th>
		<td>{DETAIL}</td>
	</tr>
	<tr>
		<th>User id:</th>
		<td>{UID}</td>
	</tr>
	<tr>
		<th>PID:</th>
		<td>{PID}</td>
	</tr>
	<tr>
		<th>Click time:</th>
		<td>{CLK_TIME}</td>
	</tr>
	<tr>
		<th>session id:</th>
		<td>{SID}</td>
	</tr>
	<tr>
		<th>User agent:</th>
		<td>{USER_AGENT}</td>
	</tr>
	<tr>
		<th>IP:</th>
		<td>{IP}</td>
	</tr>
	<tr>
		<th>Refer:</th>
		<td><a>{URL}</a></td>
	</tr>
</table>
<br style="clear:both">
<div class="qa-form-function-item qa-lfloat">
	<a id="pdf" class="qa-form-basic-button">{PDF}</a>&nbsp;
</div>
<div class="qa-form-function-item qa-rfloat">
	<a id="back" class="qa-form-basic-button">{BACK}</a>&nbsp;
</div>
<br/>


<script>
	$("#back").click(restorePage);
</script>