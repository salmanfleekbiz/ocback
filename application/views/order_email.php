<html><head></head><body><table align="center" border="0" cellpadding="0" cellspacing="0" width="80%"><tr><td align="center" bgcolor="#000000" style="padding: 18px 0 18px 0;"><p style="color:#ffffff"><?= $firstp; ?></p></td></tr><tr><td bgcolor="#ffffff" style="padding:15px; text-align:center;"><table border="0" cellpadding="5" cellspacing="0" width="100%" style="text-align:left; font-size:12px; border:1px solid #cdcdcd;"><thead><tr style="background:#68ac23; color:#ffffff;"><th>Provider</th><th>Device</th><th>Condition</th><th>Offer</th><th>Quantity</th><th>Subtotal</th></tr></thead><tbody>
<?php
foreach ($odetails as $item){
?>
<tr><td><?= $item['provider']; ?></td><td><?= $item['device'].' '.$item['storage']; ?></td><td><?= $item['condition']; ?></td><td>$<?= $item['offer']; ?></td><td><?= $item['quantity']; ?></td><td>$<?= $item['subtotal']; ?></td></tr>
<?php
}
?>
</tbody></table><p style="font-size: 11px;"><b><i>*Item must be deactivated from you account and/or paid off from any carrier installment agreement (for cellular items only)</i></b></p><table style="border:1px solid #cdcdcd;" border="0" cellpadding="10" cellspacing="0" width="100%"><tr><td style="width: 50%"></td><td style="text-align: right;"><h2 style="font-size:14px; margin:0; text-transform:uppercase;">Order Total: <span id="total">$<?= $order[0]['amount']; ?></span></h2></td></tr></table></td></tr><tr align="left"><td style="font-size:12px; color:#2d2d2d; padding:5px 15px;"><table style="border:1px solid #cdcdcd;" border="0" cellpadding="10" cellspacing="0" width="100%"><tr><td><h4 style="font-size:13px; text-transform:uppercase; margin-bottom:5px;"><b>Contact Information</b></h4><hr style="border:0; border-top:1px solid #cdcdcd;"><p style="font-size:12px; line-height: 20px;"><b>Name: </b><?= $order[0]['first_name'].' '.$order[0]['last_name']; ?><br/><b>Email: </b><?= $order[0]['email']; ?><br/><b>Phone: </b><?= $order[0]['phone']; ?></p></td><td><h4 style="font-size:13px; text-transform:uppercase; margin-bottom: 5px;"><b>Shipping Information</b></h4><hr style="border:0; border-top:1px solid #cdcdcd;">
<p style="font-size:12px; line-height:20px;">
<b>Trade Details: </b><?= $order[0]['trade_details']; ?><br/>
<?php
if($order[0]['trade_details'] == "Prepaid Label" || $order[0]['trade_details'] == "Shipping Kit with Prepaid Label"){
	echo '<b>Address: </b>'.$order[0]['address'].'<br/>'.$order[0]['zip'].', '.$order[0]['city'].', '.$order[0]['state'];
}
?>
</p>
</td></tr>
<?php if($order[0]['pay_type']!=3){ ?>
<tr><td colspan="2"><h4 style="font-size:13px; text-transform:uppercase; margin-bottom:5px;"><b>Payment Method</b></h4><hr style="border:0; border-top:1px solid #cdcdcd;"><p style="font-size:12px; line-height:20px;"><?php
if($order[0]['pay_type']==1){
echo '<b>Payment Method: </b>Paypal<br/>';
echo '<b>Paypal Email: </b>'.(!empty($order[0]['paypal_email']) ? $order[0]['paypal_email'] : $order[0]['email']) . '<br/>';
}
else if($order[0]['pay_type']==2){
echo '<b>Payment Method: </b>Check<br/>';
echo '<b>Check Type: </b>'.($order[0]['check_type'] == "e_check" ? 'E-Check - Receive check via E-Mail, You print out.' : 'Mailed Check - Receive your check in the mail 3-5 business days after your order is processed.') . '<br/>';
}
?></p></td></tr>
<?php } ?>
</table></td></tr></table></body></html>