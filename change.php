<!-- kép váltogatós -->
<body  onload = "startTimer()">
       <center>
<div class="w3-container w3-padding-64 w3-pale-red w3-grayscale-min w3-center" id="valtogatos">

      <script type = "text/javascript" class="valtozo">
          function displayNextImage() {
              x = (x === images.length - 1) ? 0 : x + 1;
              document.getElementById("img").src = images[x];
          }

          function displayPreviousImage() {
              x = (x <= 0) ? images.length - 1 : x - 1;
              document.getElementById("img").src = images[x];
          }

          function startTimer() {
              setInterval(displayNextImage, 1500);
          }
          
          var images = [], x = -1;
          images[0] = "/change/olaszp.jpg";
          images[1] = "/change/hpizza.jpg";
          images[2] = "/change/heart2.jpg";
          images[3] = "/change/valentine.jpg";
      </script>

 
        <body onload = "startTimer()">
       <button type="button" class="btn btn-outline-dark" onclick="displayPreviousImage()">Előző</button>

       <img id="img" style='display:block; margin-left: auto;
  margin-right: auto; width:700px; height:500px; object-fit: cover' src="/change/olaszp.jpg" />

        <button type="button" class="btn btn-outline-dark" onclick="displayNextImage()">Következő</button>
      </body>
    </div>
      </center>

    </body>
