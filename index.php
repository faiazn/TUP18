<?php
include 'config.php';
?>
    <?php
    session_start();
    if (isset($_REQUEST['sbmt'])) {
      $hotel=$_REQUEST['hotel'];
      $_SESSION['hotel']=$hotel;
      echo "Hotel selected! Book rooms from below";
      
    }
    if (isset($_REQUEST['sbt'])) {
      $hotel=$_SESSION['hotel'];
      $cin=$_REQUEST['cin'];
      $cin=date("Y-m-d", strtotime($cin));
      $cout=$_REQUEST['cout'];
      $cout=date("Y-m-d", strtotime($cout));
      $adult=$_REQUEST['adult'];
      $kid=$_REQUEST['kid'];
      mysqli_query($dbcon, "INSERT into room (hotelname,cin,cout,adult,kid) VALUES ('$hotel','$cin','$cout','$adult','$kid')");
      echo $hotel;
      echo "Room Booked";
      echo $cin;
      echo $cout;
      echo "adult";
      echo $adult;
      echo "kid";
      echo $kid;



    }
    ?>
<!DOCTYPE html>
<html>
<title>Travel Agency</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/jquery.min.js"></script>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
.myLink {display: none}
img{
  max-width: 100%
}
table{
  background-color: white;
  color: black
}
.awesomeText{
  height: 50px;
  width: 300px;
  font-size: 25px;
  color: white
}
</style>
<body class="w3-light-grey">

<!-- Navigation Bar -->
<div class="w3-bar w3-black w3-large">
  <a href="#" class="w3-bar-item w3-button w3-green w3-mobile"><i class="fa fa-bed w3-margin-right"></i>Home</a>
  <a href="#hotels" class="w3-bar-item w3-button w3-mobile">Hotels</a>
  <a href="#rentals" class="w3-bar-item w3-button w3-mobile">Rental</a>
  <a href="#about" class="w3-bar-item w3-button w3-mobile">About</a>
  <a href="#contact" class="w3-bar-item w3-button w3-mobile">Contact</a>
  <a href="#contact" class="w3-bar-item w3-button w3-right w3-green w3-mobile">Book Now</a>
</div>
<!-- Header -->
<header class="w3-display-container w3-content" style="max-width:1500px;">
  <img class="w3-image" src="img/1.jpg" alt="The Hotel" style="min-width:1000px" width="1500" height="800">

  <div class="w3-display-topmiddle" style="width:65%">
    <div class="w3-bar w3-black">
      <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Flight');"><i class="fa fa-plane w3-margin-right"></i>Flight</button>
      <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Hotel');"><i class="fa fa-bed w3-margin-right"></i>Hotel</button>
      <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Car');"><i class="fa fa-car w3-margin-right"></i>Rental</button>
    </div>

    <!-- Tabs -->
    <div id="Flight" class="w3-container w3-white w3-padding-16 myLink">
      <h3>Travel the world with us</h3>
      <div class="w3-row-padding" style="margin:0 -16px;">
        <div class="w3-half">
          <!--:::::::::::::::::::::::::::::::::::::-->
           <form action=""  method="post">

                        
</form>
          <!--:::::::::::::::::::::::::::::::::::::-->

        </div>
        <div class="w3-half">
        <!---:::::::::::NID shuru::::::::::::::-->


                            <form action=""  method="post">
                            <input type="text" name="name" placeholder="Your Name">

                            <input type="text" name="phnno" placeholder="Your Phone no.">

                        <select onchange="getdis(this.value);" name="from">
                             <option>From</option>
<?php
$query  = "Select DISTINCT start from airlines";
$result = mysqli_query($dbcon, $query);
while ($row = mysqli_fetch_array($result)) {
?>
               <option>
                    <?php
    echo $row['start'];
?>
               </option>
                <?php
    
}
?>

                        </select>

                        


                    <select name="end" class="col-md-3 col-sm-3 col-xs-3" id="dis" onchange="getUZ(this.value);">
                            <option>To</option>
         
                     </select>

                        <select name="UpaZilla" class="col-md-3 col-sm-3 col-xs-3" id="UpaZ" onchange="getUN(this.value);">
                            <option>Airlines</option>

                        </select>
                       
                          <input type="number" name="seats" placeholder="Number of seats">

                     



                        <input type="submit" value="Book!" class="w3-button w3-green" name="sub">
                        <a href="//localhost/index.php"><button class="w3-button w3-red">Reset</button></a>
                    </form>





         <!---:::::::::NID sesh:::::::::::::-->



        </div>
      </div>
      <p>
    </div>

    <div id="Hotel" class="w3-container w3-white w3-padding-16 myLink">
      <h3>Find the best hotels</h3>
      <p>Book a hotel with us and get the best fares and promotions.</p>
      <p>We know hotels - we know comfort.</p>
      <form>
       <select name="place" onchange="gethotel(this.value);">
                             <option>From</option>
<?php
$query  = "Select DISTINCT end from hotel";
$result = mysqli_query($dbcon, $query);
while ($row = mysqli_fetch_array($result)) {
?>
               <option>
                    <?php
    echo $row['end'];
?>
               </option>
                <?php
    
}
?>

                        </select>
                        <select id="hotel" name="hotel">
                          <option>Hotel</option>
                        </select>
                        <input type="submit" name="sbmt" value="Select Hotel" class="w3-button w3-green">
                        </form>

      
    </div>



    <div id="Car" class="w3-container w3-white w3-padding-16 myLink">
      <h3>Best car rental in the world!</h3>
      <p><span class="w3-tag w3-deep-orange">DISCOUNT!</span> Special offer if you book today: 25% off anywhere in the world with CarServiceRentalRUs</p>
      <input class="w3-input w3-border" type="text" placeholder="Pick-up point">
      <p><button class="w3-button w3-green">Search Availability</button></p>
    </div>
  </div>

  <div class="w3-display-middle">
      <?php
  $from="";
  $to="";
  $air="";
  $seat="";
  $name="";
  $phn="";
if (isset($_REQUEST['sub'])) {

  $from=$_REQUEST['from'];
  $to=$_REQUEST['end'];
  $air=$_REQUEST['UpaZilla'];
  $seat=$_REQUEST['seats'];
  $name=$_REQUEST['name'];
  $phn=$_REQUEST['phnno'];
  echo "<div class='awesomeText'>Thank Your For your interest sir. Your ticket Has been booked!</div>";
  
}
$dsp  = mysqli_query($dbcon, "UPDATE airlines set seat=seat-'$seat' where start like '$from' and `end` like '$to' and air like '$air'");
$dsp1  = mysqli_query($dbcon, "insert into guest (Name,phnno,airline,start,end,seat) VALUES ('$name','$phn','$air','$from','$to','$seat')");







?>

  </div>


</header>


<!-- Page content -->
<div class="w3-content" style="max-width:1532px;">

  <div class="w3-container w3-margin-top" id="hotels">
    <h3 class="w3-xxlarge">Hotels</h3>
    <p>Make yourself at home is our slogan. We offer the best beds in the industry. Sleep well and rest well.</p>
  </div>
  
  <div class="w3-row-padding">
  <form>
    <div class="w3-col m3">
      <label><i class="fa fa-calendar-o"></i> Check In</label>
      <input class="w3-input w3-border" name="cin" type="date" placeholder="DD MM YYYY">
    </div>
    <div class="w3-col m3">
      <label><i class="fa fa-calendar-o"></i> Check Out</label>
      <input class="w3-input w3-border" name="cout" type="date" placeholder="DD MM YYYY">
    </div>
    <div class="w3-col m2">
      <label><i class="fa fa-male"></i> Adults</label>
      <input class="w3-input w3-border" name="adult" type="number" placeholder="Number of adults">
    </div>
    <div class="w3-col m2">
      <label><i class="fa fa-child"></i> Kids</label>
      <input class="w3-input w3-border" name="kid" type="number" placeholder="Number of kids">
    </div>
    <input type="submit" name="sbt" value="Book Hotel" class="w3-button w3-black">
    </form>

  </div>

  <div class="w3-row-padding w3-padding-16">
    <div class="w3-third w3-margin-bottom">
      <img src="img/2.jpg" alt="Norway" style="width:100%">
      <div class="w3-container w3-white">
        <h3>Hotel Ocean Paradise</h3>
        <h6 class="w3-opacity">From 1000 Taka</h6>
        <p>Best Hotels In Town</p>
        <p>500<sup>2</sup></p>
        <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i></p>
        
      </div>
    </div>
    <div class="w3-third w3-margin-bottom">
      <img src="img/3.jpg" alt="Norway" style="width:100%">
      <div class="w3-container w3-white">
        <h3>Double Room</h3>
        <h6 class="w3-opacity">From 3000 Taka</h6>
        <p>King-size bed</p>
        <p>25m<sup>2</sup></p>
        <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i> <i class="fa fa-tv"></i></p>
        
      </div>
    </div>
    <div class="w3-third w3-margin-bottom">
      <img src="img/4.jpg" alt="Norway" style="width:100%">
      <div class="w3-container w3-white">
        <h3>Deluxe Dining Hall</h3>
        <h6 class="w3-opacity">From 1000 Taka</h6>
        <p>100 people capacity</p>
        <p>200<sup>2</sup></p>
        <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i> <i class="fa fa-tv"></i> <i class="fa fa-glass"></i> <i class="fa fa-cutlery"></i></p>
        
      </div>
    </div>
  </div>

  <div class="w3-container w3-margin-top" id="rentals">
    <h3 class="w3-xxlarge">Rentals</h3>
    <p>Dont worry about your transport when you arrive, we are here for you.</p>
  </div>
  <!--:::copy:::-->
  
  <div class="w3-row-padding w3-padding-16 w3-center">
        <div class="w3-container w3-white">
        <h3>Shagor Tori Car Rental</h3>
        <h6 class="w3-opacity">From 500 Taka</h6>
        <p>Best Car Rental In Town</p>
        <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i></p>
        <form>
          <input type="text" name="tornam" placeholder="Your Name">
          <input type="text" name="phnnumber" placeholder="Your Phone number" maxlength="11">
          <input type="date" name="date" placeholder="select date"> 
          <select name="place" onchange="gethotel1(this.value);">
                             <option>Area</option>
<?php
$query  = "Select DISTINCT end from hotel";
$result = mysqli_query($dbcon, $query);
while ($row = mysqli_fetch_array($result)) {
?>
               <option>
                    <?php
    echo $row['end'];
?>
               </option>
                <?php
    
}
?>

                        </select>
                        <select id="hotel1" name="hotelname">
                          <option>Pick Up from</option>
                        </select>
                        <input type="submit" name="submitrent" value="Book Car" class="w3-green w3-button">

        </form>
        <?php
        $nam="";
        $phnnumber="";
        $place="";
        $hotelname="";
        $date="";
        if (isset($_REQUEST['submitrent'])) {
          $nam=$_REQUEST['tornam'];
          $phnnumber=$_REQUEST['phnnumber'];
          $place=$_REQUEST['place'];
          $hotelname=$_REQUEST['hotelname'];
          $date=$_REQUEST['date'];
          $date=date("Y-m-d", strtotime($date));
          $dsp  = mysqli_query($dbcon, "update carrent set carno=carno-1 where  end like '$hotelname'");
          $dsp1  = mysqli_query($dbcon, "insert into carcustomer(name,phoneno,area,hotel,date) VALUES('$nam','$phnnumber','$place','$hotelname','$date')");

          echo "Car will be there on time!";

        }
        ?>
      </div>
    <div class="w3-content w3-center w3-margin-bottom">
      <img src="img/10.jpg" alt="Norway" style="width:100%">

   </div>
    
  </div>
  
    <div class="w3-row w3-large w3-center" id="about">
      <div class="w3-container w3-white">
        <h3 class="w3-xxlarge">About</h3>
      <h6>Our hotel is one of a kind. It is truely amazing. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Our hotel is one of a kind. It is truely amazing. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Our hotel is one of a kind. It is truely amazing. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</h6>
    <p>We accept: <i class="fa fa-credit-card w3-large"></i> <i class="fa fa-cc-mastercard w3-large"></i> <i class="fa fa-cc-amex w3-large"></i> <i class="fa fa-cc-cc-visa w3-large"></i><i class="fa fa-cc-paypal w3-large"></i></p>
      </div>
    </div>

  <div class="w3-row w3-large w3-center" style="margin:32px 0">
    <div class="w3-third"><i class="fa fa-map-marker w3-text-red"></i>66, Mohakhali, Dhaka</div>
    <div class="w3-third"><i class="fa fa-phone w3-text-red"></i> Phone: +8801521442407</div>
    <div class="w3-third"><i class="fa fa-envelope w3-text-red"></i> Email: moshiur.bracu@gmail.com</div>
  </div>



  <div class="w3-panel w3-red w3-leftbar w3-padding-32">
    <h6><i class="fa fa-info w3-deep-orange w3-padding w3-margin-right"></i> On demand, we can offer playstation, babycall, children care, dog equipment, etc.</h6>
  </div>

  

  <div class="w3-container w3-padding-32 w3-black w3-opacity w3-card-2 w3-hover-opacity-off" style="margin:32px 0;">
    <h2>Get the best offers first!</h2>
    <p>Join our newsletter.</p>
    <label>E-mail</label>
    <input class="w3-input w3-border" type="text" placeholder="Your Email address">
    <button type="button" class="w3-button w3-red w3-margin-top">Subscribe</button>
  </div>

  <div class="w3-container" id="contact">
    <h2>Contact</h2>
    <p>If you have any questions, do not hesitate to ask them.</p>
    <i class="fa fa-map-marker w3-text-red" style="width:30px"></i>66, Mohakhali, Dhaka<br>
    <i class="fa fa-phone w3-text-red" style="width:30px"></i> Phone: +8801521442407<br>
    <i class="fa fa-envelope w3-text-red" style="width:30px"> </i> Email: moshiur.bracu@gmail.com<br>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Email" required name="Email"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message" required name="Message"></p>
      <p><button class="w3-button w3-black w3-padding-large" type="submit">SEND MESSAGE</button></p>
    </form>
  </div>

<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-padding-32 w3-black w3-center w3-margin-top">
  <h5>Find Us On</h5>
  <div class="w3-xlarge w3-padding-16">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
  <p>Powered by <a href="https://www.facebook.com/moshiurrahmaan" target="_blank" class="w3-hover-text-green">Moshiur Rahman</a></p>
</footer>

<!-- Add Google Maps -->
<script>
function myMap()
{
  myCenter=new google.maps.LatLng(41.878114, -87.629798);
  var mapOptions= {
    center:myCenter,
    zoom:12, scrollwheel: false, draggable: false,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

  var marker = new google.maps.Marker({
    position: myCenter,
  });
  marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->
<script>
// Tabs
function openLink(evt, linkName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("myLink");
  for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-green", "");
  }
  document.getElementById(linkName).style.display = "block";
  evt.currentTarget.className += " w3-green";
}
// Click on the first tablink on load
document.getElementsByClassName("tablink")[0].click();
</script>
<script type="text/javascript">
                            function getUZ(val)
                            {

                                $.ajax({
                                    type: "POST",
                                    url: "getuz.php",
                                    data: 'DISLIST=' + val,
                                    success: function (data) {
                                        $("#UpaZ").html(data);
                                    }

                                });
                            }


                            function getdis(val)
                            {

                                $.ajax({
                                    type: "POST",
                                    url: "getdis.php",
                                    data: 'DIVLIST=' + val,
                                    success: function (data) {
                                        $("#dis").html(data);
                                    }

                                });
                            }

                            function getUN(val)
                            {

                                $.ajax({
                                    type: "POST",
                                    url: "getun.php",
                                    data: 'UZLIST=' + val,
                                    success: function (data) {
                                        $("#Union").html(data);
                                    }

                                });
                            }
                            function gethotel(val)
                            {

                                $.ajax({
                                    type: "POST",
                                    url: "gethotel.php",
                                    data: 'hotel=' + val,
                                    success: function (data) {
                                        $("#hotel").html(data);
                                    }

                                });
                            }
                              function gethotel1(val)
                            {

                                $.ajax({
                                    type: "POST",
                                    url: "gethotel.php",
                                    data: 'hotel=' + val,
                                    success: function (data) {
                                        $("#hotel1").html(data);
                                    }

                                });
                            }
                 </script>

</body>
</html>
