<?php

include 'config.php';







	$query="SELECT DISTINCT air from airlines WHERE `end` like '".$_POST["DISLIST"]."'";

	$result = mysqli_query($dbcon, $query);

    echo "<option>";

    echo "Airlines";

    echo "</option>";

while($row=mysqli_fetch_array($result))

    {

        ?>

        <option>

            <?php echo $row['air']; ?>
            
        </option>

        <?php



    }

    ?>

