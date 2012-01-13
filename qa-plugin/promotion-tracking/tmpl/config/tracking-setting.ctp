<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
<link rel="stylesheet" type="text/css" href="tracking-setting.css" />
</head>
<div class="qa-form-company-info" id="company_info"
	style="height: 60px;">
	<div class="qa-form-company-info qa-lfloat">
		<table>
			<tr>
				<td><label id="company_info_lbl" for="company_info">{COMPANY_INFO}</label>
				</td>
			</tr>
			<tr>
				<td><label id="company_name_lbl" for="company_name">{COMPANY_NAME}</label>
				</td>
				<td><input type="text" id="company_name" size="30">
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><label id="department_lbl" for="department">{DEPARTMENT}</label>
				</td>
				<td><input type="text" id="department" size="30">
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><label id="contact_lbl" for="contact">{CONTACT}</label>
				</td>
				<td><input type="text" id="contact" size="30">
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><label id="email_lbl" for="email">{EMAIL}</label>
				</td>
				<td><input type="text" id="email" size="30">
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><label id="mobile_lbl" for="mobile">{MOBILE}</label>
				</td>
				<td><input type="text" id="mobile" size="30">
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><label id="tel_lbl" for="tel">{TEL}</label>
				</td>
				<td><input type="text" id="tel" size="30">
				</td>
				<td><label id="fax_lbl" for="fax">{FAX}</label>
				</td>
				<td><input type="text" id="fax" size="30"></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><label id="city_pref_lbl" for="city_pref">{CITY_PREF}</label>
				</td>
				<td><select id="city_pref"> {CITY_PREF_VAL}
				</select>
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><label id="address1_lbl" for="address1">{ADDRESS1}</label>
				</td>
				<td><input type="text" id="address1" size="80">
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><label id="address2_lbl" for="address2">{ADDRESS2}</label>
				</td>
				<td><input type="text" id="address2" size="80">
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><label id="memo_lbl" for="memo">{MEMO}</label>
				</td>
				<td><input type="text" id="memo" size="80">
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>
	</div>
	<br />
	<div class="qa-form-company-info-item qa-rfloat">
		<a id="company_info_save">{SAVE}</a>
	</div>
</div>

<div class="qa-form-ads-plan">
	<div class="qa-form-ads-plan qa-lfloat" id="qa_plan_type">
		<table>
			<tr>
				<td><label id="ads_plan_lbl" for="ads_plan">{ADS_PLAN}</label>
				</td>
			</tr>
			<tr>
				<td><label id="plan_type_lbl" for="plan_type">{PLAN_TYPE}</label>
				</td>
				<td><select id="plan_type"> {PLAN_TYPE_VAL}
				</select>
				</td>
				<td><input type="text" id="plan_type_input" size="10">
				</td>
			</tr>
		</table>
	</div>
	<div class="qa-form-ads-plan qa-rfloat">
		<a id="ads_plan_save">{SAVE}</a>
	</div>
</div>

<div class="qa-form-tracking">
	<div class="qa-form-tracking qa-lfloat">
		<table>
			<tr>
				<td><label id="tracking_lbl" for="tracking">{TRACKING}</label>
				</td>
			</tr>
			<tr>
				<td><label id="root_url_lbl" for="root_url">{ROOT_URL}</label>
				</td>
				<td><input type="text" id="root_url" size="40">
				</td>


			</tr>
			<tr>
				<td><label id="cookie_lbl" for="cookie">{COOKIE}</label>
				</td>
				<td><select id="cookie"> {COOKIE_VAL}
				</select>
				</td>
			</tr>
			<tr>
				<td COLSPAN=3><input type="radio" name="cookie_day"
					id="cookie_3days" /> <label id="cookie_3days_lbl"
					for="cookie_3days">{COOKIE_3DAYS}</label> <input type="radio"
					name="cookie_day" id="cookie_7days" /> <label
					id="cookie_7days_lbl" for="cookie_7days">{COOKIE_7DAYS}</label> <input
					type="radio" name="cookie_day" id="cookie_30days" /> <label
					id="cookie_30days_lbl" for="cookie_30days">{COOKIE_30DAYS}</label>
				</td>
			</tr>
			<tr>
				<td COLSPAN="2"><label id="returning_time_lbl"
					for="returning_time">{RETURNING_TIME}</label> <input type="text"
					id="returning_time" size="5">h</td>
			</tr>
		</table>
	</div>
	<div class="qa-form-tracking qa-rfloat">
		<a id="tracking_save">{SAVE}</a>
	</div>
</div>
</html>