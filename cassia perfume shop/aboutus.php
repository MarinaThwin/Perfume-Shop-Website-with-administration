<?php 
include 'admin/conn.php';
include 'header.php';
if (!empty($_SESSION['user'])) {
  $user_name = $_SESSION['user'];
  $query = "select * from user where username='$user_name'";
  $go_query = mysqli_query($connection, $query);
  
  while ($out = mysqli_fetch_array($go_query)) {
      $user_name = $out['username'];
      $email = $out['email'];
     
  }
}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../css/aboutUs.css" rel="stylesheet" type="text/css" />

<style>
.container .about #explainText{
    text-align: center;
}
.container .about #title{
    background-color: #efefef;
}
</style>
</head>

<body style="background-color:#ffedf1;">
<?php if(empty($_SESSION['user'])) ?>
    
<table style="background-color:#ffedf1;">  

    <div class="3photo">
        <img src="Photo/about-slider.jpg">
    </div>

    <div class="Title" style="background-color:#ffedf1;text-align: center;">
        <b><h1>About Us</b></h1> 
    </div>
</table >       

  <tr>
<td><br /><br /></td>
</tr>

    <section class="container">
        <div class="Title">
            <b><h2>WELCOME TO CASSIA</b></h2>
            <p id="explainText">We believe our platform gives us the ability to create positive change through our operations, an engaged CASSIA community and the power of our brand. The key pillars of our social impact agenda are sustainability, diversity and inclusion, supply chain and community. As a company that is continuously innovating and constantly learning about impacts, we expect to realize continuous progress in the years ahead.  </p>
        </div>
    <div class="about">
        <table >
            <tr>
            	 <td id="imgRow"><img src="Photo/about1.webp" ></td>
                <td id="title"><b><h2>Our Mission</b></h2><span id="explainText">CASSIA has been a well-known figure in the industry since 2009. Headquartered in Qatar, our expansion into the US market since 2017 has continued the tradition of excellence in customer service. Thanks to our incredible brand partnerships we provide authentic fragrances at the lowest prices, top-notch services, and continue to expand our variety to cater to your needs.
                </span>
                </td>
            </tr>
            
            <tr>
            <td><br /><br /></td>
            </tr>

            <tr >
                <td id="title"><b><h2>Our Product Guarantee</b></h2><span id="explainText">Cassia.com stands behind every package we ship. We DO NOT carry any knockoffs or imitations. We only carry authentic brand-name fragrances.Thanks to our direct purchases from brands and their respective distributers in large quantities, Cassia.com offers competitive prices to customers and an unbeatable special price list to wholesalers. For more information contact us via email at info@Cassia.com.
                    <br /><br />
                    </span>
                </td>
                <td id="imgRow"><img src="Photo/about2.webp"></td>
            </tr>
            <tr>
            <td><br /><br /></td>
            </tr>

            <tr>
                <td id="imgRow"><img src="Photo/about3.webp" ></td>
               <td id="title"><b><h2>Exceptional Customer Service</b></h2><span id="explainText">Your satisfaction is of utmost importance to our team at CASSIA. We strive to cater to your business and personal perfume needs of any volume. We provide 24/7 customer service via email info@cassia.com, and if you’d like to speak to our customer service team, contact us at 09-123456789 from Monday to Friday at 8AM to 6PM. Do not hesitate to contact us with any questions so we can ensure that you are delighted with your purchase.
               </span>
               </td>
           </tr>
           
           <tr>
           <td><br /><br /></td>
           </tr>

        <tr>
        <td><br /><br /></td>
        </tr>

        </section>
</table>
</div>
<?php include'contactUs.php'; ?>
</body>
</html>
