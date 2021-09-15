<!-- payment-ebooks-form.php -->
<?php include "include/header.template.php"; ?>
<h3>Tick to buy more than one ebook</h3>
<!-- to add jquery library of javascript -->


<form action="payment-ebook-generate-gateway-call.php" 
method="post">

    <?php
    //filename listing.php
    //use the previous settings
    include "include/dbconnect.php";

    //embed SQL commands
    $sql = "SELECT * from ebooks";
    //execute sql commands that will return result set
    $result = mysqli_query($conn, $sql);

    //check records fetched available
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $bookid=$row['bookid'];
            $title =$row['title'];
            $price =$row['price'];
            echo "<input type='checkbox' name='bookid[]' value='$bookid'
            onclick='calctotal($price, this.checked)' 
            class='checks' data-price='$price'>";
            echo  "(RM$price) $bookid $title <br>";
        }
    } 
    else {
        echo "No results";
    }

    //purge dbconnect
    mysqli_close($conn);
    ?>
    <!-- javascript to calculate total price -->
    <script>
    var total = 0;
    function calctotal(price, toglecheck) {
        //var input = document.getElementById("form");
        //alert (toglecheck);
        if(toglecheck==true){
            this.total=this.total+price;
        }else{
            this.total=this.total-price;
        }
        

        document.getElementById("totalprice").value = total;
    }
    </script>
    <br>
    <div class="row">
        <div class="col-4">
        <input type="text" name="totalprice" id="totalprice"
        readonly value="0.0" 
        class="form-control">
        </div>
        
        <div class="col-4">
        Total price<br>
        </div>  
    </div>
    
    <br>
    <div class="row">
        <div class="col-4">
        Name<br>
        <input type="text" name="buyername" 
        required 
        class="form-control">
        </div>
        
        <div class="col-4">
        Email<br>
        <input type="email" name="buyeremail" 
        required 
        class="form-control">
        </div>  
    </div>
    
    <div class="row">
        <div class="col-4">
        Telephone Number<br>
        <input type="phone" name="phoneno" 
        required 
        class="form-control">
        </div>
        <div class="col-4">
        &nbsp;<br>
        <button type="submit" class="btn btn-primary">
            Checkout Toyyibpay payment gateway &gt;&gt;</button>
        </div>  
    </div>
</form>


<?php 
if(isset($_GET['error'])){
    $error=$_GET['error'];
    echo "<div class='alert alert-warning'>
        $error
    </div>";

}
if(isset($_GET['success'])){
    $success=$_GET['success'];
    echo "<div class='alert alert-success'>
        $success
    </div>";

}
include "include/footer.template.php"; ?>