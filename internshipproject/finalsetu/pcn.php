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
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    
      <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.css"> -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker.min.css"> 
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker-standalone.css"> 
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js"></script>
        <script>
            $(function(){
              $('.datepicker').datepicker();

            });
        </script>
        <title>PCNails</title>
        <style>
            div.relative {
              position: relative;
              left: 680;    
              text-shadow: 2px 2px #FF0000;       
            }
            div.file {
                position: relative;
                font-size: 35px;
                left: 50px;
            }

            input[type=button], input[type=submit], input[type=reset]{
              background-color: ;
              border: none;
              color: white;
              padding: 8px 16px;
              text-decoration: none;
              margin: 1px 1px;
              font-size: 50px;
              cursor: pointer;
              text-shadow: 2px 2px green;
            }
             input[type=text]{
              background-color: black;
              border-style: solid;
              border-color: green;
              color: white;
              padding: 8px 16px;
              text-decoration: none;
              margin: 1px 1px;
              font-size: 30px;
              cursor: pointer;  
             }
        </style>
        <script>
        	function displayDate(){
        		document.getElementById("showDate").innerHTML = Date();

        	}
        </script>
    </head>
        <div class="file"><h1 style="text-shadow: 2px 2px #FF0000;"><center>File Manager</center></h1></div>

<body style="background: ; background-repeat: no-repeat; background-size: cover;">
	  	<iframe style="align-self: center;" " src="http://free.timeanddate.com/clock/i6uynimx/n176/szw110/szh110/hoc222/hbw6/cf100/hgr0/hcw2/hcd88/fan2/fas20/fdi70/mqc000/mqs3/mql13/mqw4/mqd94/mhc000/mhs3/mhl13/mhw4/mhd94/mmc000/mml5/mmw1/mmd94/hwm2/hhs2/hhb18/hms2/hml80/hmb18/hmr7/hscf09/hss1/hsl90/hsr5" frameborder="0" width="110" height="110"></iframe>


    <form action="welcome_get.php" method="get">
    <div style="font-size: 30px;text-shadow: 2px 2px green"><center>Date:<input type="date" name="date"><br></center></div><br>
    <div><center>Format : MM-DD-YY <i style="color: red">example: 06-25-2019</i></center></div>
    <div style="font-size: 30px;text-shadow: 2px 2px green"><center>Time:<input type="Time" name="time"><br></center></div><br>
    <div><center>Format : Hour:Minute:Second <i style="color: red">example: 14:30:49</i></center></div>
    <div class="relative"><input type="submit" value="Search"></div>
    </form>

</body>
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