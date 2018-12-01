<?php

include 'config.php';







	$query="SELECT DISTINCT end from airlines WHERE start like '".$_POST["DIVLIST"]."' ";

	$result = mysqli_query($dbcon, $query);

   echo "<option>";

    echo "To";

    echo "</option>";

	while($row=mysqli_fetch_array($result))

    {

        ?>

        <option>

            <?php echo $row['end']; ?>

        </option>

        <?php



    }

    ?>

                            

