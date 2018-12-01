<?php

                define('DB_USER', 'root');

                define('DB_PSWD', '');

                define('DB_HOST', 'localhost');

                define('DB_NAME', 'travel');

               


                //database connection setup and error check

                $dbcon = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);

                if ($dbcon->connect_error) {

                    die("Connection failed: " . $dbcon->connect_error);

                }



?>