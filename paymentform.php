<?php  include "include/header.template.php"; ?>
<!-- paymentform.php -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.js" type="text/javascript"></script>
<script type="text/javascript">$('#formsumbangan').validator().on('submit', function (e) {
  if (e.isDefaultPrevented()) {} else {
	var formdata=$("#formsumbangan").serialize();
	var posto=posturl+'gensumbangan';
	$.post(posto,formdata,function(data){
        $(".prospeksumbangan").html(data);
	});
	return false;
  }
});</script>
<form id="formsumbangan" role="form" action="genarate-gateway-payment-call.php" 
method="post" name="formsumbangan">
<div class="card border-0  mb-3">
<div class="card-body">
<table style="width: 100%; margin: 10px auto 10px auto;">
<tbody>
<tr>
<td style="padding-top: 5px; height: 30px; background-color: #005580; text-align: center; vertical-align: middle;"><span style="font-family: caviar dreams; font-size: 18pt; color: #005580;"><strong><span style="font-size: 16pt;"><span style="font-size: 18pt;"><strong><span style="color: #999999;">≡&nbsp;</span></strong></span><span style="font-family: caviar dreams;"></span><span style="color: #ffffff;">SUMBANGAN </span><span style="color: #999999; font-size: 18pt;">≡</span></span><span style="font-size: 18pt;"></span></strong></span></td>
</tr>
</tbody>
</table>
<div class="form-group"><label class="control-label" for="nama">Nama</label> <input id="nama" class="form-control" name="nama" required="" type="text" value="" placeholder="" data-error="Sila masukkan nama anda" />
<div class="help-block with-errors text-danger small">&nbsp;</div>
</div>
<div class="form-group"><label class="control-label" for="email">Email</label> <input id="email" class="form-control" name="email" required="" type="email" value="" placeholder="" data-error="Sila masukkan email anda" />
<div class="help-block with-errors text-danger small">&nbsp;</div>
</div>
<div class="form-group"><label class="control-label" for="email">Telefon</label> <input id="tel" class="form-control" name="tel" required="" type="number" value="" placeholder="" data-error="Sila masukkan telefon anda" />
<div class="help-block with-errors text-danger small">&nbsp;</div>
</div>
<div class="form-group"><label class="control-label" for="RM">Nilai sumbangan</label><select id="rm" class="form-control" name="rm" required="" data-error="Sila pilih Nilai Kredit"><option value="">--Pilih Nilai Sumbangan--</option><option value="1000">RM1000</option><option value="500">RM500</option><option value="200">RM200</option><option value="100">RM100</option><option value="50">RM50</option><option value="20">RM20</option><option value="10">RM10</option></select>
<div class="help-block with-errors text-danger small">&nbsp;</div>
</div>
<div class="form-group">
<div class="prospeksumbangan">&nbsp;</div>
</div>
<div class="form-group"><button class="btn btn-primary btn-block btn-large btnsumbangan" type="submit">Teruskan pembayaran melalui ToyyibPay &nbsp; &nbsp;<i class="fa fa-caret-right"></i></button></div>
</div>
</div>
</form><hr />
<div align="center"><img src="images/toyyibpay.png" alt="toyyibpay" /></div>


<?php  include "include/footer.template.php"; ?>