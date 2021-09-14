<?php  include "include/header.template.php"; ?>
<!-- qrcode-generator-form.php -->

<form action="" method="POST">
    <h3>Provide text/URL to generate qrcode</h3>
    <div class="row">
    <div class="col-6">
        <input type="text" name="texturl" required size="50"
        class="form-control" 
        value="http://khirulnizam.com">
        </div>
    
    </div>
    <br>
    <div class="row">
        <div class="col-6">
        Data to embed in URL: <br>
        </div>
        
    </div>
    <div class="row">
        <div class="col-6">
            Key
            <input type="text" name="key" value="matrixno"
            class="form-control">
        </div>
        <div class="col-6">
            Value
            <input type="text" name="value" value="2039001"
            class="form-control"><br>
        </div>
    </div>

    <button type="submit" name="btnsubmit"
    class="btn btn-primary">
        Generate QR code
    </button>
    
</form>
<hr>
<?php
if(isset($_POST['btnsubmit'])){

    include 'phpqrcode/qrlib.php';//include library phpqrcode
    $texturl = $_POST['texturl']."?idkehadiran=1343&";
    $key=$_POST['key'];
    $value=$_POST['value'];
    $completequery=$texturl."$key=$value";
    $simpleurl="http://khirulnizam.com";

    QRcode::png($simpleurl, 'qrcode.png', QR_ECLEVEL_H, 4);
    
    echo "info in qrcode:<br>
         $simpleurl <br>";
    echo "<img src='qrcode.png'>";
}
?>
<br>
<br>
<?php  include "include/footer.template.php"; ?>


