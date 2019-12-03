<?php 
    $Webcam=$_POST["webcam"];
    $Fname=$_POST["fname"];
    $Lname=$_POST["lname"];
    $Storeid=$_POST["storeid"];
    $Storename=$_POST["storename"];
    $Tpd=$_POST["tpd"];
    $Empno=$_POST["empno"];
    $Street=$_POST["street"];
    $Additional=$_POST["city"];
    $Zip=$_POST["zip"];
    $Place=$_POST["place"];
    $Country=$_POST["country"];
    $Phonecode=$_POST["phonecode"];
    $Phone=$_POST["phone"];
    $Email=$_POST["email"];
    
 ?>

<html>
  <head>
    <style >
      .button2 {background-color: #008CBA;
        border: none;
        color: white;
        padding: 15px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
              } /* Blue */

    </style>
    <title>PC Nails Camera</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet" />
    <link href="csssetu/main.css" rel="stylesheet" />
  </head>
  <body>
    <div class="s002">

      <form method="get">
        <div class="inner-form">
          <div class="input-field first-wrap">
        
            <input id="search" type="text" name="time"  placeholder="Employee Name or Hour of Transaction" />
          </div>
          <div class="input-field second-wrap">
            <div class="icon-wrap">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"></path>
              </svg>
            </div>
            <input class="datepicker" id="depart" type="text" name="date" placeholder="date" />
          </div>
          <div class="input-field fifth-wrap">
            <button class="btn-search" type="submit" formaction="/well.php" value="Search">SEARCH</button>
          
          </div>
        </div>
  <center><button type="ss" class="button2" formaction=" /finalsetu/setup.php"">Setup Page</button><br></br></center>

      </form>

    </div>
    <script src="jssetu/extention/choices.js"></script>
    <script src="jssetu/extention/flatpickr.js"></script>
    <script>
      flatpickr(".datepicker",
      {});

    </script>
    <script>
      const choices = new Choices('[data-trigger]',
      {
        searchEnabled: false,
        itemSelectText: '',
      });

    </script>

  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
<?php 
  $file =fopen("test.txt", "a");
    fwrite($file, $Webcam);
    fwrite($file,$Fname);
    fwrite($file, $Lname);
    fwrite($file, $Storeid);
    fwrite($file, $Storename);
    fwrite($file, $Tpd);
    fwrite($file, $Empno);
    fwrite($file, $Street);
    fwrite($file, $Additional);
    fwrite($file, $Zip);
    fwrite($file, $Place);
    fwrite($file, $Country);
    fwrite($file, $Phonecode);
    fwrite($file, $Phone);
    fwrite($file, $Email);
    fclose($file);

 ?>