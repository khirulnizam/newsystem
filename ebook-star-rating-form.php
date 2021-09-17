<?php include "include/header.template.php" ?>

<?php
    //filename ebook-star-rating-form.php
    //use the previous settings
    include "include/dbconnect.php";

    //embed SQL commands
    $sql = "SELECT * from shortcourses";
    //execute sql commands that will return result set
    $result = mysqli_query($conn, $sql);
    ?>

<div class="row">
  <div class="col-8">
    <?php include "noti.php"; ?>
  <h1>Ebook rating/review</h1>

  <form action="ebook-save-star-rating.php" method="get">

    <select name="ebookid" class="form-control" required>
    <option disabled selected value> -- select an ebook -- </option>
    <?php
    //check records fetched available
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $code=$row['sccode'];
            $title =$row['sctitle'];
            echo "<option value='$code'>$code $title</option>";
        }//end while
    } //end if have records
    else {
        echo "No results";
    }
    ?>
    </select>
    <br>
        Review
        <textarea name="ebookreview" required
        class="form-control" placeholder="Love this ebook to the moon and back..."></textarea>
    <br>
    Cool explainations
    <input id="ratexplain" name="ratexplain" type="text" 
    class="rating" data-size="lg" 
    data-min="0" data-max="5" data-step="1"><br>
    Cool examples
    <input id="ratexample" name="ratexample" type="text" 
    class="rating" data-size="lg" 
    data-min="0" data-max="5" data-step="1"><br>
    Cool overall content
    <input id="rateoverall" name="rateoverall" type="text" 
    class="rating" data-size="lg" step="1"
    data-min="0" data-max="5" data-step="1"><br>

      <button type="submit" class="btn btn-primary">Send ebook rating</button>
    </form>
  </div>
</div>
        
    
<?php include "include/footer.template.php" ?>
