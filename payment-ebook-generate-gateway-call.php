<?php
//payment-ebook-generate-gateway-call.php

$nama=$_POST['buyername'];
$email=$_POST['buyeremail'];
$telefon=$_POST['phoneno'];
$harga=$_POST['totalprice'];
//insert POST data ke tblorder
//$qinsorder=sqlquery("insert into tblorder (nama, email, telefon,harga, status, tarikh) values (?,?,?,?,?,now())");
//$qinsorder->bindValue(1,$nama);
//$qinsorder->bindValue(2,$email);
//$qinsorder->bindValue(3,$telefon);
//$qinsorder->bindValue(4,$harga);
//$qinsorder->bindValue(5,0);
//$qinsorder->execute();
//get orderid
//$qgetoid=sqlquery("select id from tblorder order by id desc limit 1");
//$qgetoid->execute();
//$getoid = $qgetoid->fetch(PDO::FETCH_ASSOC);
//$oid=$getoid['id']; 
//convert RM1=100
$rmx100=($harga*100);
$some_data = array(
    'userSecretKey'=> 'm8zfj65c-2fzo-gq3b-rwhw-xvneusqy7wuy',
    'categoryCode'=> '2n8qqo61',
    'billName'=> 'Belian buku ebook',
    'billDescription'=> 'Belian buku ebook sebanyak RM'.$harga,
    'billPriceSetting'=>1,
    'billPayorInfo'=>1,
    'billAmount'=>$rmx100,
    'billReturnUrl'=>'http://www.khirulnizam.com',
    'billCallbackUrl'=>'',
    'billExternalReferenceNo'=>'',
    'billTo'=>$nama,
    'billEmail'=>$email,
    'billPhone'=>$telefon,
    'billSplitPayment'=>0,
    'billSplitPaymentArgs'=>'',
    'billPaymentChannel'=>0,
  );  
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_URL, 'https://toyyibpay.com/index.php/api/createBill');  
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);
  $result = curl_exec($curl);
  $info = curl_getinfo($curl);  
  curl_close($curl);
  $obj = json_decode($result,true);
  $billcode=$obj[0]['BillCode'];
?>
<!--SEND USER TO TOYYIBPAY PAYMENT-->
<script type="text/javascript">
    //redirect to payment gateway
   window.location.href="https://toyyibpay.com/<?php echo $billcode;?>"; 
 </script>
