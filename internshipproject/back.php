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
      .s002 {
          min-height: 100vh;
          display: -ms-flexbox;
          display: flex;
          -ms-flex-pack: center;
              justify-content: center;
          -ms-flex-align: center;
              align-items: center;
          font-family: 'Poppins', sans-serif;
          background: url("../imagessetu/Searchs_002.png");
          background-size: cover;
          background-position: center center;
          padding: 15px;
        }

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

      <form method="post" action="index.php">
        <div class="inner-form">
          <div class="input-field first-wrap">
        
            <input id="search" type="text" name="back"  placeholder="Enter the new image URL" />
          </div>
          <div class="input-field fifth-wrap">
            <button class="btn-search" type="submit" formaction="/index.php" value="Search">Change</button>


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