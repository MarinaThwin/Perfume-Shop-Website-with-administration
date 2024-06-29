<?php
session_start();
include 'admin/conn.php';

$order_id = $_SESSION['oder_id'];

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />

    <title>
        Order Confirmation
    </title>

    <style type="text/css">

		html { 
            width: 100%;
            
        }

		/* Prevents Webkit and Windows Mobile platforms from changing default font sizes. */
		body {
			-webkit-text-size-adjust: none;
			-ms-text-size-adjust: none;
		}

		* {
			margin: 0;
			padding: 0;
		}
        body{
            background-color: #ebf2fa !important;
            font-size: 1.2rem !important;
            font-family: 'Poppins', sans-serif;
           
        }

		table { border-spacing: 0; }

		/* Resolves the Outlook 2007, 2010, and Gmail td padding issue. */
		table td { border-collapse: collapse; }

		a {
			
			
			text-decoration: none;
		}

		/* Forces Hotmail to display emails at full width. */
		.ExternalClass { width: 100%; }

		/* Forces Hotmail to display normal line spacing. */
		.ExternalClass,
		.ExternalClass p,
		.ExternalClass span,
		.ExternalClass font,
		.ExternalClass td,
		.ExternalClass div { line-height: 100%; }

		/* Weird Yahoo links and border bottom */
		.yshortcuts a {
		    border-bottom: none !important;
		}

		@media only screen and (max-width:599px){

			body { width: auto !important; }

			table[class="table600"]{
				width: 480px !important;
				margin: 0 auto !important;
				text-align: center !important;
			}

			img[class="fluid"]{
				display:block !important;
				width: 100% !important;
				max-width: 100% !important;
				height: auto !important;
			}

			table[class="table1-3"]{
				width: 100% !important;
			}

			table[class="header-blocks"]{
				width: 100% !important;
				text-align: center !important;
			}

			table[class="ef-logo"]{
				text-align: center !important;
			}

			td[class="header-thmb"]{
				width: 33.3% !important;
			}

			img[class="social-btn-thmb"]{
				width: 100% !important;
				height: auto !important;
			}

			[class="footer-column"] {
				width: 100% !important;
				text-align: center !important;
			}

			[class="footer-contacts"] {
				width: 100%;
				text-align: center !important;
			}

			[class="table95"] {
				width: 95% !important;
			}

			[class="topBarCol"] {
				width: 100% !important;
				text-align: center !important;
			}

			[class="viewLink"] {
				display: block !important;
				padding: 10px !important;
			}

			[class="mainDate"] {
				text-align: center !important;
			}

			[class="fullWidth"] {
				width: 100% !important;
			}

		}

		@media only screen and (max-width: 500px){

			[class="header-blocks"] {
				display: block !important;
			}

			[class="logo-hours"]{
				display: none !important;
				width: 0 !important;
				overflow: hidden !important;
				float: left !important;
				max-height: 0 !important;
			}

		}

		@media only screen and (max-width: 479px){

			body { width: auto !important; }

			table[class="table600"]{
				width: 390px !important;
			}

			[class="social-btn"] {
				display: block !important;
				width: 100% !important;
			}

			[class="social-btn"] a {
				display: block !important;
				padding: 3px 0 !important;
			}

			[class="social-btn"] img {
				width: auto !important;
			}
			[class="intro"]{
				text-align:center !important;
			}
			[class="order-id"]{
				margin:0 auto !important;
			}
			[class="order-list"] td{
				text-align:center !important;
			}
			[class="order-list"] [class="pr-name"]{
				text-align:left !important;
			}
			[class="order-list-item"]{
				line-height:1.25;
			}
			[class="order-list-item"] td{
				padding-top:15px !important;
			}
			[class="order-list-subtotal"] td{
				text-align:right !important;
			}
			[class="subtotal-val"]{
				padding-right:10px !important;
			}
		}

		@media screen and (max-width: 390px) {

			table[class="table600"]{
				width: 320px !important;
			}

			div[class="note_scale"]{
				font-size: 11px !important;
				line-height: normal !important;
			}

			[class="footer-column"]{
				width: 100% !important;
			}

			[class="header-blocks"] {
				display: none !important;
				width: 0 !important;
				overflow: hidden !important;
				float: left !important;
				max-height: 0 !important;
			}
		}
    </style>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!-- font awsome cdn link -->
        <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
</head>

<body>
<?php include 'header.php'; ?>
<table width="100%" cellspacing="0" cellpadding="0" border="0" style="line-height: 1;">
        <tr>
            <td valign="top" align="center">
                <table class="table600" width="90%" cellspacing="0" cellpadding="0" border="0" align="center" style="border-collapse: collapse;">
                    
                    <tr>
                        <td valign="top" align="left">
                            <table class="table600" width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="border-collapse: collapse; text-align: left; margin-top:3.4rem">
                                <tr>
                                    <td valign="top" style="font-size: 20px; line-height: 1;">
                                        <div>Dear <?php echo $_SESSION['user']; ?>, <span style="white-space: nowrap;">Thank You For Your Order!</span></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" height="10" style="font-size: 0; line-height: 0;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td valign="top" style="font-size: 18px; line-height: 1;">
                                        <span>
                                            Your Order ID is <a style="color: #718355;" href="#"><b><span>#</span><?php echo $order_id ?></b></a>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" height="20" style="font-size: 0; line-height: 0;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td valign="top" style="font-size: 15px; line-height: 1.5;">
                                        <span>We have started processing your order. The shipping confirmation & payment will be emailed shortly.</span>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td valign="top" height="20" style="font-size: 0; line-height: 0;">&nbsp;</td>
                                </tr>
                                
                                <tr>
                                    <td valign="top" height="20" style="font-size: 0; line-height: 0;">&nbsp;</td>
                                </tr>
                            </table>
                </td>
        </tr>
                    

                    <tr>
        <td>
            <table class="table95" width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="border-collapse: collapse;">
                <tr>
                    <td class="order-list" valign="top">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="border-collapse: collapse;">
                            <thead>
                                <tr>
                                    <td class="pr-name" width="43%" style="font-weight: 600; border: solid #e0e0e0; border-width: 1px 0; padding: 10px 0; vertical-align: top; color:#333; font-size:20px;">Item Details</td>
                                    <td class="pr-price" width="15%" style="font-weight: 600; border: solid #e0e0e0; border-width: 1px 0; padding: 10px 0; vertical-align: top; text-align: right; color:#333; font-size:20px;" align="right">Price</td>
                                    
                                    <td class="pr-qty" width="10%" style="font-weight: 600; border: solid #e0e0e0; border-width: 1px 0; padding: 10px 0; vertical-align: top; text-align: right; color:#333; font-size:20px;" align="right">Qty</td>
                                    <td class="pr-amount" width="17%" style="font-weight: 600; border: solid #e0e0e0; border-width: 1px 0; padding: 10px 0; vertical-align: top; text-align: right; color:#333; font-size:20px;" align="right">Amount</td>
                                </tr>
                            </thead>
                            <tbody>
                               
                                    <tr>
                                    <?php 
                                   $total = 0;
                                   $query = "SELECT orderdetail.*,product.* from orderdetail left join product on orderdetail.productid=product.productid where orderdetail.orderid='$order_id'";
                                   $go_query = mysqli_query($connection, $query);
                                   while ($out = mysqli_fetch_array($go_query)) {
                                       $product_name = $out['productname'];
                                       $price = $out['price'];
                                       $qty = $out['productqty'];
                                       $unit_price = $qty * $price;
                                       $total += $unit_price;
                                        
                                       
                                    
                                    ?>
                                        <td colspan="5" style="border-bottom: 1px solid #e0e0e0; padding: 5px 0 10px;" valign="top">
                                            <table class="order-list-item" width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="border-collapse: collapse; font-size:15px; color:#333;">
                                                <tr>
                                                    <td class="pr-name" width="43%" style=" vertical-align: top; text-align: left" align="left" valign="top">
                                                       
                                                            
                                                            <span style="padding-top:4px; font-size: 16px; color: #333; line-height: 50px; vertical-align: top;"><?php echo $product_name ?></span>
                                                        
                                                    </td>
                                                    <td width="15%" style="white-space:nowrap; text-align:right; padding-top:10px; vertical-align: top;" valign="top"><Span>$</Span>
                                                        <?php echo $price ?>
                                                    </td>
                                                
                                                    <td width="10%" style="text-align:right; padding-top:10px; vertical-align: top;" valign="top">
                                                    <?php echo $qty ?>
                                                    </td>
                                                    <td width="17%" style="text-align:right; padding-top:10px; vertical-align: top;" valign="top"><span>$</span>
                                                       <?php echo $unit_price ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" style="padding: 10px 0 15px;" valign="top">
                                    <table class="order-list-subtotal" cellspacing="0" cellpadding="0" border="0" align="right" style="border-collapse: collapse; font-size:16px; color:#333; text-align:right;">
                                   
                                       
                                        <tr>
                                            <td style="padding-top:5px;" valign="top"><b>TOTAL:</b></td>
                                            <td class="subtotal-val" style="padding:5px 0 0 30px;" valign="top"><b><span>$</span> <?php echo $total ?></b></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
            <tr>
                <td height="1" bgcolor="#e0e0e0" style="font-size: 0; line-height: 0;">&nbsp;</td>
            </tr>
            <tr>
                <td valign="top" height="25" style="font-size: 0; line-height: 0;">&nbsp;</td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td valign="top" align="center">
        <table class="table95" width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="border-collapse: collapse;">
            <tr>
                <td class="shipping-info" valign="top">
                            <?php
                                $query = "SELECT * from orders where orderid='$order_id'";
                                $go_query = mysqli_query($connection, $query);
                                while ($out = mysqli_fetch_array($go_query)) {
                                $name = $out['deliveryname'];
                                $phone = $out['deliveryphone'];
                                $address = $out['deliveryaddress'];
                                }
                            ?>
                    <table class="fullWidth" width="290" cellspacing="0" cellpadding="0" border="0" align="left" style="border-collapse: collapse; font-size:17px; line-height:1.5;color:#333;">
                        <tr>
                            <td valign="top"><b>Customer Information</b></td>
                        </tr>
                        <tr>
                            <td valign="top" height="10" style="font-size: 0; line-height: 0;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td valign="top">
                                Customer Name: <?php echo $name; ?>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                Phone: <?php echo $phone; ?>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                Shipping Address: <?php echo $address; ?>
                            </td>
                        </tr>
                    </table>                       
                </td>
            </tr>
                
        </table>
    </td>
</tr>
</table>
<?php include 'contactUs.php'; ?>
</body>
</html>