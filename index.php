<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>City parking</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>

  <body>
  <style>
    .animated{
      background-image: url('car.gif');
      background-repeat: no-repeat;
      background-size: 100%;

    }
  </style>
  <center>
  <div class="animated">
<img src="logo.jpg">
  <h1 style="background-color:white; width:500px;">Parking Lot Management System</h1><h2 style="color:black;"><a href="add.php" style="display:bloack; background-color:black; color:white; ">Manage Parking Lots</a></h2></center><br></div>
    <div id="map"></div>

    <script>
      var customLabel = {
        full: {
          label: 'F'
        },
        empty: {
          label: 'E'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(0.3275252,32.6150209),
          zoom: 14
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('spots2.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var status = markerElem.getAttribute('status');
              var type = markerElem.getAttribute('type');
               var cars = markerElem.getAttribute('cars');
			        var maxcars = markerElem.getAttribute('maxcars');
      var intoinfo=address+ " Maximum Cars: "+ maxcars +" ||| Parking Status: "+ status + " ||Total in: "+ cars;
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = intoinfo
              infowincontent.appendChild(text);
              var icon = customLabel[status] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
if(type=="full"){
//alert("full");
var cityCircle = new google.maps.Circle({
               strokeColor: '#fcccc',
               strokeOpacity: 0.8,
               strokeWeight: 2,
              fillColor: '#fcccc',
              fillOpacity: 0.35,
              map: map,
              center: point,
              radius:  1000
            });

}else{
  var cityCircle = new google.maps.Circle({
               strokeColor: '#bbfffcc',
               strokeOpacity: 0.8,
               strokeWeight: 2,
              fillColor: '#bbfffcc',
              fillOpacity: 0.35,
              map: map,
              center: point,
              radius:  500
            });

}
               
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsrWPDoCaeGEE7z3N7n8ZKPrQ5KQ4HRz0&callback=initMap">
    </script>
  </body>
</html>