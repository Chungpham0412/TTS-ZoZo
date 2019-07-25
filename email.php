<?php 
$html = '<h2>Xin chào bạn: '.$od['name'].'</h2>';
$html .='Flatize đã nhận được đơn hàng của quý khách.<br> Chúng tôi sẽ gửi thông báo đến quý khách ngay khi sản phẩm được giao cho đơn vị vận chuyển.';
$html .= 'Cảm ơn bạn đã tin tưởng Flatize Shop.';
$html .='<table border="1" cellpadding="10" cellspacing="0">
	<thead>
		<tr>
			<th>STT</th>
			<th>Tên sản phẩm</th>
			<th>Màu sắc</th>
			<th>Kích thước</th>
			<th>Giá</th>
			<th>Số lượng</th>
			<th>Thành tiền</th>
		</tr>
	</thead>';
	$html .='<tbody>';
		$n=1; if($carts) : foreach ($carts as $c) :
		$html .='<tr>';
			$html .='<td>'.$n.'</td>';
			$html .='<td>'.$c['name'].'</td>';
			$html .='<td>'.$c['colorBuy'].'</td>';
			$html .='<td>'.$c['sizeBuy'].'</td>';
			$html .='<td>'.number_format( $c['price']).'đ'.'</td>';
			$html .='<td>'.$c['quantity'].'</td>';
			$html .='<td>'.number_format( $c['price']*$c['quantity']).'đ'.'</td>';
		$html .='</tr>';
		$n++; endforeach; endif;
	$html .='</tbody>';
	$html .='<tr>
		<td><b>Tổng cộng</b></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>'.number_format(tong_tien()).'đ'.'</td>
	</tr>';
$html .='</table>';
?>