<?php

include 'config.php';







	$query="SELECT DISTINCT hotel from hotel WHERE end like '".$_POST["hotel"]."' ";

	$result = mysqli_query($dbcon, $query);

   echo "<option>";

    echo "Hotel";

    echo "</option>";

	while($row=mysqli_fetch_array($result))

    {

        ?>

        <option>

            <?php echo $row['hotel']; ?>

        </option>

        <?php



    }

    ?>

                            

