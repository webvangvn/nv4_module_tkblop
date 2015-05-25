<!-- BEGIN: main -->
	<div class="tieude">{CAUHINH.0}</div>
<!-- BEGIN: block_table-->
	<form id="search_tkb" name="frm_search" method="post" align="center">
	<div align="center">	
		<select name="keywords" >
			<option value="0">Chọn lớp cần tra</option>
		<!-- BEGIN: loop_ds-->
			<option value={LOP}>{LOP}</option>
		<!-- END: loop_ds -->
		</select>
	<button id="button_submit" value="click" type="submit">Tra cứu</button></p>
	</div>
</form>
<!-- END: block_table -->
	<br />
<!-- BEGIN: block_tablekq -->
	<!-- BEGIN: block_search -->
			<!-- BEGIN: block_tieude -->
				<div class="tieudetkb">THỜI KHOÁ BIỂU LỚP {LOPCHON}<br />
				<a class="ngayad">Áp dụng từ ngày: {CAUHINH.1}</a></div>
			<!-- END: block_tieude -->
			<!-- BEGIN: block_ca -->
			<div class="buoi">{BUOI}</div>
			<table height="160" class="tieude" style="border-collapse:collapse;border-color:#999999" cellpadding="2" cellspacing="2" width="100%" border="1">
			<tr class = "thu">
				<td>Tiết</td>
				<td>Thứ 2</td>
				<td>Thứ 3</td>
				<td>Thứ 4</td>
				<td>Thứ 5</td>
				<td>Thứ 6</td>
				<td>Thứ 7</td>
			</tr>
			<!-- END: block_ca -->
			<!--BEGIN:loop_kq -->
			<tr class = "tiet">
				<td>{TIET.0}</td>
				<td>{TIET.1}</td>
				<td>{TIET.2}</td>
				<td>{TIET.3}</td>
				<td>{TIET.4}</td>
				<td>{TIET.5}</td>
				<td>{TIET.6}</td>
			</tr>
			<!--END:loop_kq -->
	<!-- END: block_search -->
			</table>
<!-- END: block_tablekq -->
<!-- BEGIN: block_thongbao-->
	<br />
	<div class="tkbbottom">
		<a class="chuy">Chú ý:</a><br />
		<a class="tkbck">Thời khoá biểu chính khoá:</a><br />
		<a class="tbsc">- Buổi sáng vào học lúc: {CAUHINH.2}</a><br />
		<a class="tbsc">- Buổi chiều vào học lúc: {CAUHINH.3}</a><br />
	</div>
<!-- END: block_thongbao -->
<!-- END: main -->
