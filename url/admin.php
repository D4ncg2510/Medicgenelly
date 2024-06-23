<?php
session_start();
$varsesion = $_SESSION['correo'];
if($varsesion==null || $varsesion='' /*|| $varse==null || $varse=''*/){
    echo "no tienes acceso";
    die();
  }
  ?>
  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="../assets/img/LOGOs.png">
  <meta name="copyright" content="MACode ID, https://macodeid.com/">
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
    .table-container {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      margin-top: 30px;
    }
    .table {
      width: 80%;
      margin: auto;
      border-collapse: collapse;
    }
    .table th, .table td {
      border: 1px solid #ddd;
      padding: 8px;
    }
    .table th {
      background-color: #f2f2f2;
      text-align: center;
    }
    .btn {
      margin: 5px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light shadow-sm">
  <div class="container10">
    <a class="navbar-brand" href="#"><span class="text-primary">Medic</span>genely</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupport">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.html">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="formulario.html">Asesoramiento</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="doctors.html">Doctores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.html">Perfil</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-primary ml-lg-3" href="index.html">Salir</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/imagenfona.jpg);">
  <div class="banner-section">
    <div class="container text-center wow fadeInUp">
      <nav aria-label="Breadcrumb">
        <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Administrador</li>
        </ol>
      </nav>
      <h1 class="font-weight-normal">Registros y datos de usuarios registrado</h1>
    </div> <!-- .container -->
  </div> <!-- .banner-section -->
</div> <!-- .page-banner -->

<section class="about_section layout_padding">
  <div class="container">
    <div class="table-container">
      <h2>Administración de registros y datos del usuario</h2>
      <table class="table" id="userTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <!-- Aquí se agregarán las filas de usuarios -->
        </tbody>
      </table>
      <button class="btn btn-primary" onclick="addUser()">Agregar Usuario</button>
    </div>
  </div>
</section>

<script>
  let userIdCounter = 1;

  document.getElementById('searchForm').addEventListener('submit', function(e) {
    e.preventDefault();
    let searchValue = document.getElementById('searchInput').value.toLowerCase();
    let table = document.getElementById('userTable');
    let tr = table.getElementsByTagName('tr');
    for (let i = 1; i < tr.length; i++) {
      let td = tr[i].getElementsByTagName('td');
      let match = false;
      for (let j = 0; j < td.length - 1; j++) {
        if (td[j].textContent.toLowerCase().indexOf(searchValue) > -1) {
          match = true;
        }
      }
      tr[i].style.display = match ? '' : 'none';
    }
  });

  function addUser() {
    let table = document.getElementById('userTable').getElementsByTagName('tbody')[0];
    let newRow = table.insertRow();
    let idCell = newRow.insertCell(0);
    let nameCell = newRow.insertCell(1);
    let emailCell = newRow.insertCell(2);
    let actionsCell = newRow.insertCell(3);

    idCell.textContent = userIdCounter++;
    nameCell.innerHTML = '<input type="text" placeholder="Nombre">';
    emailCell.innerHTML = '<input type="email" placeholder="Email">';
    actionsCell.innerHTML = '<button onclick="saveUser(this)" class="btn btn-success">Guardar</button> <button onclick="deleteUser(this)" class="btn btn-danger">Eliminar</button>';
  }

  function saveUser(button) {
    let row = button.parentNode.parentNode;
    let nameInput = row.cells[1].getElementsByTagName('input')[0];
    let emailInput = row.cells[2].getElementsByTagName('input')[0];

    if (nameInput.value && emailInput.value) {
      row.cells[1].textContent = nameInput.value;
      row.cells[2].textContent = emailInput.value;
      button.textContent = 'Editar';
      button.className = 'btn btn-primary';
      button.setAttribute('onclick', 'editUser(this)');
    } else {
      alert('Por favor, complete todos los campos');
    }
  }

  function editUser(button) {
    let row = button.parentNode.parentNode;
    let name = row.cells[1].textContent;
    let email = row.cells[2].textContent;

    row.cells[1].innerHTML = '<input type="text" value="' + name + '">';
    row.cells[2].innerHTML = '<input type="email" value="' + email + '">';
    button.textContent = 'Guardar';
    button.className = 'btn btn-success';
    button.setAttribute('onclick', 'saveUser(this)');
  }

  function deleteUser(button) {
    if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
      let row = button.parentNode.parentNode;
      row.parentNode.removeChild(row);
    }
  }
</script>

</body>
</html>
