<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>MoviesDA</title>
        <meta name="viewport" content="width=device-width initial-scale=1.0" >
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <script src="js/bootstrap.bundle.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <head>
        <body>
        <?php 
        if(isset($_POST["submit"]))
        {
            $con = mysqli_connect('localhost','root','','detail');
            if(!$con)
            {
                echo "not connected";
            }
            $movie = "spider man";
            $theator = "Ranil";
            $time = "10.00";
            $result = mysqli_query($con,"select * from `seatbooking` where movie='$movie' and theators='$theator' and time='$time'");
            $row = mysqli_fetch_assoc($result);
            $seat = array();
            $seat = explode(',',$row["seat"]);
            
        }
        else
        {
            $seat = array();
        }
        
            

        if(isset($_POST["lastStep"]))
        {
                $con = mysqli_connect('localhost','root','','detail');
            if(!$con)
            {
                echo "Not connect";
            }
            $price = $_POST["price"];
            $time = $_POST["time"];
            $theator = $_POST["theator"];
            $user="nimal";
            $movie="spider man";

            if(isset($_POST['seat']))
            {
                $seat = implode(',',$_POST['seat']);
                //$subject=implode(',',$_POST['subject']);
            }

            

            $result = mysqli_query($con,"INSERT INTO `seatbooking`(`userName`,`movie`,`theators`,`time`,`seat`) VALUES('$user','$movie','$theator','$time','$seat')");
            if(!$result)
            {
                echo "no insertion";
            }

        }
           
        ?>
      <section class="container-fluid header">
                <nav>
                    <a href="#"><img src="logo.png" class="float-end">
                        <div class="menues ">
                            <!--<i class="fa fa-times" onclick="hideMenu()" ></i>-->
                            <ul class="nav nav-pills " role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" data-bs-toggle="pill" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-bs-toggle="pill" href="#">MOVIES</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-bs-toggle="pill" href="#">THEATORS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="pill" href="#">Time & Booking</a>
                                  </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="pill" href="#">INFO</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mx-auto d-block text-box">
                            <h1 class="display-1"><strong>Welcome to Ticket Booking </strong></h1>
                            <button type="button" class="btn btn-outline-danger">Book Your Ticket</button>
                        </div>
                       <!----<i class="fa fa-bars" onclick="showMenu()"></i>---->
                </nav>
            </section>
      <section style="background-color:#050A30">    
          <form action="seatBooking.php" method="post">
            <section class="movieinfo">
                <h1 id="#demo">Spider Man NoWay Home</h1>
                <div class="row">
                    <div class="moviesimg-col">
                        <img src="spiderman.jpg">
                    </div>
                    <div class="movies-col">
                        <h1>THEATERS</h1>
                        <p>We are providing all theater facility in jaffna city</p>
                        <div class="dropdown" style="margin:20px">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" >
                              Select the Theater
                            </button>
                            <select class="dropdown-menu" name="theator">
                              <option value="Rigal"><a class="dropdown-item" href="#">Rigal</a></option>
                              <option  value="Ranil"><a class="dropdown-item" href="#">Ranil</a></option>
                              <option  value="Selva"><a class="dropdown-item" href="#">Selva</a></option>
                              <option  value="BigShow"><a class="dropdown-item" href="#">BigShow</a></option>
                            </select>
                        </div>
                          
                        <h1>THEATERS</h1>
                        <p>We are providing all theater facility in jaffna city</p>
                        <div class="dropdown" >
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                              Pick you Time
                            </button>
                            <select class="dropdown-menu" name="time">
                              <option  value="8.00"><a class="dropdown-item" href="#">8.00AM</a></option>
                              <option value="12.00"><a class="dropdown-item" href="#">12.00PM</a></option>
                              <option  value="3.00"><a class="dropdown-item" href="#">3.00PM</a></option>
                              <option  value="7.00"><a class="dropdown-item" href="#">7.00PM</a></option>
                              <option  value="10.00"><a class="dropdown-item" href="#">10.00PM</a></option>
                            </select>
                            <input type="submit" name="submit" value="check the available Seats" class="btn btn-outline-danger"><!--seatChecking()-->
                        </div>
                    </div> 
                  </div>
              </div>
            </section>
            
            <section class="seatBooking">
              <h1 >Book Your Seat</h1>
              <div class="movie-container">
                <label>Pick a movie:</label>
                <select id = "movie" name="price">
                  <option value="10">Avengers: Endgame ($10)</option>
                  <option value="12">Joker ($12)</option>
                  <option value="8">Toy Story 4 ($8)</option>
                  <option value="9">The Lion King ($9)</option>
                </select>
              </div>
               <ul class="showcase">
                  <li>
                    <div class="seat"></div>
                    <small>N/A</small>
                  </li>
            
                  <li>
                    <div class="seat selected"></div>
                    <small>Selected</small>
                  </li>
            
                  <li>
                    <div class="seat occupied"></div>
                    <small>Occupied</small>
                  </li>
                </ul>
            
                <div class="container" >
                  <div class="screen"></div>
                  <div class="rowscreen">
                    <div class="seat_num">00</div>
                    <div class="seat_num">01</div>
                    <div class="seat_num">02</div>
                    <div class="seat_num">03</div>
                    <div class="seat_num">04</div>
                    <div class="seat_num">05</div>
                    <div class="seat_num">06</div>
                    <div class="seat_num">07</div>
                    <div class="seat_num">08</div>
                  </div>
                  <div class="rowscreen">
                    <div class="seat_num">A1</div>
                    <input type="checkbox" class="seat" name="seat[]" value="01" <?php echo in_array('01',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="02" <?php echo in_array('02',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="03" <?php echo in_array('03',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="04" <?php echo in_array('04',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="05" <?php echo in_array('05',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="06" <?php echo in_array('06',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="07" <?php echo in_array('07',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="08" <?php echo in_array('08',$seat) ? 'disabled readonly':''; ?>>
                  </div>
                  <div class="rowscreen">
                    <div class="seat_num">A2</div>
                    <input type="checkbox" class="seat" name="seat[]" value="09" <?php echo in_array('09',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="10" <?php echo in_array('10',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="11" <?php echo in_array('11',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="12" <?php echo in_array('12',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="13" <?php echo in_array('13',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="14" <?php echo in_array('14',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="15" <?php echo in_array('15',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="16" <?php echo in_array('16',$seat) ? 'disabled readonly':''; ?>>
                  </div>
            
                  <div class="rowscreen">
                    <div class="seat_num">A3</div>
                    <input type="checkbox" class="seat" name="seat[]" value="17" <?php echo in_array('17',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="18" <?php echo in_array('18',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="19" <?php echo in_array('19',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="20" <?php echo in_array('20',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="21" <?php echo in_array('21',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="22" <?php echo in_array('22',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="23" <?php echo in_array('23',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="24" <?php echo in_array('24',$seat) ? 'disabled readonly':''; ?>>
                  </div>
            
                  <div class="rowscreen">
                    <div class="seat_num">A4</div>
                    <input type="checkbox" class="seat" name="seat[]" value="25" <?php echo in_array('25',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="26" <?php echo in_array('26',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="27" <?php echo in_array('27',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="28" <?php echo in_array('28',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="29" <?php echo in_array('29',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="30" <?php echo in_array('30',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="31" <?php echo in_array('31',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="32" <?php echo in_array('32',$seat) ? 'disabled readonly':''; ?>>
                  </div>
            
                  <div class="rowscreen">
                    <div class="seat_num">A5</div>
                    <input type="checkbox" class="seat" name="seat[]" value="33" <?php echo in_array('33',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="34" <?php echo in_array('34',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="35" <?php echo in_array('35',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="36" <?php echo in_array('36',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="37" <?php echo in_array('37',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="38" <?php echo in_array('38',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="39" <?php echo in_array('39',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="40" <?php echo in_array('40',$seat) ? 'disabled readonly':''; ?>>
                  </div>
            
                  <div class="rowscreen">
                    <div class="seat_num">A6</div>
                    <input type="checkbox" class="seat" name="seat[]" value="41" <?php echo in_array('41',$seat) ? 'disabled readonly':''; ?>> 
                    <input type="checkbox" class="seat" name="seat[]" value="42" <?php echo in_array('42',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="43" <?php echo in_array('43',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="44" <?php echo in_array('44',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="45" <?php echo in_array('45',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="46" <?php echo in_array('46',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="47" <?php echo in_array('47',$seat) ? 'disabled readonly':''; ?>>
                    <input type="checkbox" class="seat" name="seat[]" value="48" <?php echo in_array('48',$seat) ? 'disabled readonly':''; ?>>
                  </div>
                </div>
            
                <p class="text" >
                  You have selected <span id="count">0</span> seats for a price of $<span id="total">0</span>
                </p>
                <script src="style.js"></script>

            </section>
            <input type="submit" name="lastStep" value="submit">
          </form>  

          <footer class="footer">
            <div class="container">
                <div class="row">
                    <center>
                        <div class="footer-col">
                            <h4>follow us</h4>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>

                        </div>
                    </center>

                </div>
            </div>
         </footer>
    </section>
        </body>
</html>