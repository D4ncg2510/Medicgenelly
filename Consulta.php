<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="copyright" content="MACode ID, https://macodeid.com/">
  <link rel="icon" href="../assets/img/LOGOs.png">
  <title>Medicgenely</title>
  <link rel="stylesheet" href="../assets/css/maicons.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">
  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">
  <link rel="stylesheet" href="../assets/css/theme.css">
  <style>
    body {
      font-family: 'Times New Roman', Times, serif;
    }
    .container1 {
      max-width: 800px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form-group {
      margin-bottom: 15px;
    }
    .form-group label {
      display: block;
      margin-bottom: 5px;
    }
    .form-group input, .form-group textarea, .form-group select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    .doctor-slider {
      margin-bottom: 20px;
    }
    .doctor-slider img {
      width: 100px;
      height: 100px;
      border-radius: 8px; /* Para que sean cuadradas */
      display: block;
      margin: 0 auto;
      object-fit: cover;
    }
    .doctor-slider p {
      text-align: center;
      margin-top: 10px;
    }
    .selected-doctor {
      text-align: center;
      margin-top: 20px;
    }
    .selected-doctor img {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
    }
    #map {
      height: 400px;
      width: 100%;
      margin-top: 20px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light shadow-sm">
  <div class="container10">
    <a class="navbar-brand" href="index.html"><span class="text-primary">Medic</span>genely</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupport">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.html">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="formulario.html">Cita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="doctors.html">Perfil</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-primary ml-lg-3" href="login.html">Salir</a>
        </li>
      </ul>
    </div> <!-- .navbar-collapse -->
  </div> <!-- .container -->
</nav>

<div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/Consul.jpg);">
  <div class="banner-section">
    <div class="container text-center wow fadeInUp">
      <nav aria-label="Breadcrumb">
        <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Cita Medica</li>
        </ol>
      </nav>
      <h1 class="font-weight-normal">Agendar Cita Medica</h1>
    </div> <!-- .container -->
  </div> <!-- .banner-section -->
</div> <!-- .page-banner -->

<div class="container1">
  <div class="form-group">
    <label for="specialty">Seleccionar Especialidad</label>
    <select id="specialty" name="specialty">
      <option value="cardiologia">Cardiología</option>
      <option value="dermatologia">Dermatología</option>
      <option value="neurologia">Neurología</option>
      <option value="pediatria">Pediatría</option>
      <!-- Agrega más especialidades según sea necesario -->
    </select>
  </div>

  <div class="form-group">
    <label for="doctor">Seleccionar Doctor</label>
    <div id="doctorCarousel" class="owl-carousel owl-theme doctor-slider">
      <div class="item" data-doctor="Dra. Maria Fernanda Solis Velazquez" data-img="../assets/img/doctors/doctor_1.jpg"><img src="../assets/img/doctors/doctor_1.jpg" alt="Doctor 1"><p>Dra. Maria Fernanda Solis Velazquez</p></div>
      <div class="item" data-doctor="Dr. Ismael Carmona Castillo" data-img="../assets/img/doctors/doctor_2.jpg"><img src="../assets/img/doctors/doctor_2.jpg" alt="Doctor 2"><p>Dr. Ismael Carmona Castillo</p></div>
      <div class="item" data-doctor="Dra. Marisela García López" data-img="../assets/img/doctors/doctor_3.jpg"><img src="../assets/img/doctors/doctor_3.jpg" alt="Doctor 3"><p>Dra. Marisela García López</p></div>
      <div class="item" data-doctor="Dra. Margarita Zuñiga Rodríguez" data-img="../assets/img/doctors/Dco34.jpeg"><img src="../assets/img/doctors/Dco34.jpeg" alt="Doctor 4"><p>Dra. Margarita Zuñiga Rodríguez</p></div>
      <div class="item" data-doctor="Dra. Sofia Muñoz Sosa" data-img="../assets/img/doctors/Doca21.jpeg"><img src="../assets/img/doctors/Doca21.jpeg" alt="Doctor 5"><p>Dra. Sofia Muñoz Sosa</p></div>
      <div class="item" data-doctor="Dra. Consuelo Noriega Moreno" data-img="../assets/img/doctors/Dpca1.jpeg"><img src="../assets/img/doctors/Dpca1.jpeg" alt="Doctor 6"><p>Dra. Consuelo Noriega Moreno</p></div>
      <div class="item" data-doctor="Dra. Ivette Acosta Dominguez" data-img="../assets/img/doctors/docm1.jpeg"><img src="../assets/img/doctors/docm1.jpeg" alt="Doctor 7"><p>Dra. Ivette Acosta Dominguez</p></div>
      <div class="item" data-doctor="Dr. Ruben Esquivel Maquedo" data-img="../assets/img/doctors/doc22.jpeg"><img src="../assets/img/doctors/doc22.jpeg" alt="Doctor 8"><p>Dr. Ruben Esquivel Maquedo</p></div>
      <div class="item" data-doctor="Dra. Margarita Cardozo Torres" data-img="../assets/img/doctors/doc33.jpeg"><img src="../assets/img/doctors/doc33.jpeg" alt="Doctor 9"><p>Dra. Margarita Cardozo Torres</p></div>
    </div>
    <input type="hidden" id="selectedDoctor" name="selectedDoctor">
  </div>

  <div class="selected-doctor" id="selectedDoctorDisplay">
    <p>No hay doctor seleccionado</p>
  </div>

  <div class="form-group">
    <label for="appointmentDate">Fecha y Hora</label>
    <input type="datetime-local" id="appointmentDate" name="appointmentDate">
  </div>

  <div class="form-group">
    <label for="name">Nombre Completo</label>
    <input type="text" id="name" name="name" required>
  </div>

  <div class="form-group">
    <label for="condition">Padecimiento</label>
    <textarea id="condition" name="condition" rows="3" required></textarea>
  </div>

  <div class="form-group">
    <label for="address">Lugar de Residencia</label>
    <input type="text" id="address" name="address" required>
  </div>

  <div class="form-group">
    <label for="curp">CURP</label>
    <input type="text" id="curp" name="curp" required>
  </div>

  <div class="form-group">
    <label for="email">Correo Electrónico</label>
    <input type="email" id="email" name="email" required>
  </div>
<!--
  <div class="form-group">
    <label for="postalCode">Código Postal</label>
    <input type="text" id="postalCode" name="postalCode" required>
    <button type="button" class="btn btn-primary" onclick="findHospitals()">Buscar Hospitales Cercanos</button>
  </div>

  <div id="map"></div>
-->
  <button type="submit" class="btn btn-primary btn-block">Agendar Cita</button>
</div>

<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>
<script>
  $(document).ready(function(){
    $('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      items:3
    });

    $('.item').on('click', function(){
      $('.item').removeClass('selected');
      $(this).addClass('selected');
      var doctorName = $(this).data('doctor');
      var doctorImg = $(this).data('img');
      $('#selectedDoctor').val(doctorName);
      $('#selectedDoctorDisplay').html('<img src="' + doctorImg + '" alt="' + doctorName + '"><p>' + doctorName + '</p>');
    });
  });

  function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -34.397, lng: 150.644},
      zoom: 8
    });
    var geocoder = new google.maps.Geocoder();
    var service = new google.maps.places.PlacesService(map);

    document.getElementById('postalCode').addEventListener('change', function() {
      geocodeAddress(geocoder, map, service);
    });
  }

  function geocodeAddress(geocoder, map, service) {
    var address = document.getElementById('postalCode').value;
    geocoder.geocode({'address': address}, function(results, status) {
      if (status === 'OK') {
        map.setCenter(results[0].geometry.location);
        map.setZoom(14);

        var request = {
          location: results[0].geometry.location,
          radius: '5000',
          type: ['hospital']
        };

        service.nearbySearch(request, function(results, status) {
          if (status === google.maps.places.PlacesServiceStatus.OK) {
            for (var i = 0; i < results.length; i++) {
              createMarker(results[i], map);
            }
          }
        });
      } else {
        alert('Geocode was not successful for the following reason: ' + status);
      }
    });
  }

  function createMarker(place, map) {
    var marker = new google.maps.Marker({
      map: map,
      position: place.geometry.location
    });

    google.maps.event.addListener(marker, 'click', function() {
      infowindow.setContent(place.name);
      infowindow.open(map, this);
    });
  }
  
  google.maps.event.addDomListener(window, 'load', initMap);
</script>
</body>
</html>
