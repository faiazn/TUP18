    <?php

    include 'config.php';
     $uz=$_POST["UZLIST"];






    	$query="SELECT  seat from airlines WHERE air like '".$_POST["DISLIST"]."'";

    	$result = mysqli_query($dbcon, $query);

        echo "<option>";

        echo "Select Union";

        echo "</option>";

        while($row=mysqli_fetch_array($result))

        {

            ?>

            <option>

                <?php echo $row['UNLIST']; ?>

            </option>

            <?php



        }

        ?>



    	

