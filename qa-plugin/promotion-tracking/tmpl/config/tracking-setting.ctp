<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
	<div class="qa-form-function-bar" style="height:345px;" id="company_info">
		<div class="qa-form-function-item qa-lfloat">
			<table>
				<tr>
					<th><label id="company_info_lbl" for="company_info">{COMPANY_INFO}</label></th>
				</tr>
				<tr>
					<td><label id="company_name_lbl" for="company_name">{COMPANY_NAME}</label></td>
					<td>
					<input type="text" id="company_name" size="30">
					</td>
				</tr>
				<tr>
					<td><label id="department_lbl" for="department">{DEPARTMENT}</label></td>
					<td>
					<input type="text" id="department" size="30">
					</td>
				</tr>
				<tr>
					<td><label id="contact_lbl" for="contact">{CONTACT}</label></td>
					<td>
					<input type="text" id="contact" size="30">
					</td>
					<td></td>
					<td><label id="pr_tel_lbl" for="pr_tel">{PR_TEL}</label><label id="pr_tel_val_lbl" for="pr_tel_val">{PR_TEL_VAL}</label></td>
				</tr>
				<tr>
					<td><label id="email_lbl" for="email">{EMAIL}</label></td>
					<td>
					<input type="text" id="email" size="30">
					</td>
					<td></td>
					<td><label id="pr_mobile_lbl" for="pr_mobile">{PR_MOBILE}</label><label id="pr_mobile_val_lbl" for="pr_mobile_val">{PR_MOBILE_VAL}</label></td>
				</tr>
				<tr>
					<td><label id="mobile_lbl" for="mobile">{MOBILE}</label></td>
					<td>
					<input type="text" id="mobile" size="30">
					</td>
				</tr>
				<tr>
					<td><label id="tel_lbl" for="tel">{TEL}</label></td>
					<td>
					<input type="text" id="tel" size="30">
					</td>
					<td><label id="fax_lbl" for="fax">{FAX}</label></td>
					<td>
					<input type="text" id="fax" size="30">
					</td>
				</tr>
				<tr>
					<td><label id="city_pref_lbl" for="city_pref">{CITY_PREF}</label></td>
					<td>
					<select id="city_pref">
						{CITY_PREF_VAL}
					</select></td>
				</tr>
				<tr>
					<td><label id="address1_lbl" for="address1">{ADDRESS1}</label></td>
					<td colspan="3">
					<input type="text" id="address1" size="80">
					</td>
				</tr>
				<tr>
					<td><label id="address2_lbl" for="address2">{ADDRESS2}</label></td>
					<td colspan="3">
					<input type="text" id="address2" size="80">
					</td>
				</tr>
				<tr >
					<td><label id="memo_lbl" for="memo">{MEMO}</label></td>
					<td colspan="4" >
					<textarea  cols=80 id="memo" size="80" 	style="resize:none"/>
					</td>
				</tr>
			</table>
		</div>
		<br style="clear:both">
		<div class="qa-form-function-item qa-rfloat">
			<a id="company_info_save">{SAVE}</a>
		</div><br/>
		
	</div>
	<br style="clear:both">
	<div class="qa-form-function-bar" style="height:75px;">
		<div class="qa-form-function-item qa-lfloat" id="qa_plan_type">
			<table >
				<tr>
					<th><label id="ads_plan_lbl" for="ads_plan">{ADS_PLAN}</label></th>
				</tr>
				<tr>
					<td><label id="plan_type_lbl" for="plan_type">{PLAN_TYPE}</label></td>
					<td  size="10">
					<select id="plan_type">
						{PLAN_TYPE_VAL}
					</select></td>
					<td>
					<input type="text" id="plan_type_input" size="10">
					</td>
				</tr>
			</table>
		</div>
		<br style="clear:both">
		<div class="qa-form-function-item qa-rfloat">
			<a id="ads_plan_save">{SAVE}</a>
		</div>
	</div>
	
	<br style="clear:both">
	<div id="tracking" class="qa-form-function-bar" style="height:137px;">
		<div class="qa-form-function-item qa-lfloat">
			<table>
				<tr>
					<th><label id="tracking_lbl" for="tracking">{TRACKING}</label></th>
				</tr>
				<tr> <td></td></tr>
				<tr>
					<td><label id="root_url_lbl" for="root_url">{ROOT_URL}</label></td>
					<td>
					<input type="text" id="root_url" size="40">
					</td>
				</tr>
				<tr>
					<td><label id="cookie_lbl" for="cookie">{COOKIE}</label></td>
					<td>
					<select id="cookie">
						{COOKIE_VAL}
					</select></td>
				</tr>
				<tr id="cookies" style="display:none">
				<td></td>
					<td COLSPAN=3>
					<input type="radio" name="cookie_day"
					id="cookie_3days" />
					<label id="cookie_3days_lbl"
					for="cookie_3days">{COOKIE_3DAYS}</label>
					<input type="radio"
					name="cookie_day" id="cookie_7days" />
					<label
					id="cookie_7days_lbl" for="cookie_7days">{COOKIE_7DAYS}</label>
					<input
					type="radio" name="cookie_day" id="cookie_30days" />
					<label
					id="cookie_30days_lbl" for="cookie_30days">{COOKIE_30DAYS}</label></td>
				</tr>
				<tr>
					<td COLSPAN="2"><label id="returning_time_lbl"
					for="returning_time">{RETURNING_TIME}</label>
					<input type="text"
					id="returning_time" size="5">
					h</td>
				</tr>
			</table>
		</div>
		<br style="clear:both">
		<div class="qa-form-function-item qa-rfloat">
			<a id="tracking_save">{SAVE}</a>
		</div>
	</div>
	
</html>