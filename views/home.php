<?php

namespace views;

session_start();
error_reporting(0);

//var_dump($datosServicios);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../scss/home.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Faster+One&family=Kavivanar&family=Parisienne&family=Playball&display=swap" rel="stylesheet">

</head>

<body>
	<?php
	//var_dump($datosServicios)
	?>

	<nav id="cabecera" style="box-shadow: 0 5px 10px rgba(0, 0, 0, 0.6);">

		<div class="pos-f-t">
			<nav class="navbar navbar-dark" id="nav">
				<div>
				<?php
				if ($_SESSION["nombre"] != null || $_SESSION["nombre"] != "") {
					print("<button type='button' class='btn btn-info' data-toggle='modal' data-target='#exampleModal' data-whatever='@mdo'>RESERVAR</button>");
				}
				?>
					
				</div>
				<div>
					<img src="../img/logo.png" alt="Logo" style="max-height: 100px;">
				</div>
				<?php
				if ($_SESSION["nombre"] == null || $_SESSION["nombre"] == "") {
					print("<button type='button' class='btn btn-info'><a id='globalLink' href='../views/login.php'>Login</a></button>");
				} else {
					print('<button class="navbar-toggler" type="button" id="perfil" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">');
					print('<img src="../img/cerrar-detalles-peluqueria.jpg" alt="Imagen de la persona" style="max-height: 60px; max-width: 60px;">');
					//<!--<span class="navbar-toggler-icon"></span>-->
					print('</button>');
				}
				?>


			</nav>
		</div>

		<div class="collapse" id="navbarToggleExternalContent">
			<div class=" p-4" style="background-color: #222222;">
				<hr class="my-3">
				<h5 class="text-white h4" style="color:green;"><?php echo $_SESSION["nombre"] . " " .  $_SESSION["apellido"] ?> </h5>
				<ul id='globalLink'>
					<li>
						<a class="text-white" href="#">Ajustes Perfil</a>
					</li>
					<li>
						<a class="text-white" href="#">Mis citas</a>
					</li>
					<li>
						<a class="text-white" href="../controller/cerrarSesion.php">Cerrar Sesion</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- HACER LOS PRINT HASTA AQUI -->



	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top: 100px;">
		<ol class="carousel-indicators" style="z-index: 2;">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="../img/barber-gbab82b18b_1280.jpg" alt="First slide" style="max-height: 650px;">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="../img/cerrar-detalles-peluqueria.jpg" alt="Second slide" style="max-height: 650px;">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="../img/hair-salon-g8ce4d22b9_1280.jpg" alt="Third slide" style="max-height: 650px;">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

	<!-- Modal pedir cita-->

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content" style="background-color: #222222; color:#f3efe0">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Pedir Cita</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#f3efe0">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Día</label>
							<input type="date" class="form-control" id="recipient-name" style="background-color: transparent;">
						</div>
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Tramo horario</label>
							<select class="form-control" name="" id="" style="background-color: transparent;">
								<option value="">HORA 1</option>
								<option value="">Hora 2</option>
							</select>
						</div>
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Peluquero</label>
							<select class="form-control" name="" id="" style="background-color: transparent;">
								<option value="" style="background-color: transparent;">Peluquero 1</option>
								<option value="">Peluquero 2</option>
							</select>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Reservar</button>
						</div>

					</form>
				</div>

			</div>
		</div>
	</div>


	<!-- Div servicios-->
	<div id="nav">
		<div class="container p-4 pb-0" style="padding-top: 3rem;" id="nav">
			<!-- Section: Links -->
			<section class="">
				<!--Grid row-->

				<div class="row">
					<!-- Grid column -->
					<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-2">
						<button id="card" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">BARBA</button>
					</div>

					<!-- Grid column -->
					<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-2">
						<button id="card" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">CORTE</button>

					</div>
					<!-- Grid column -->
					<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-2">
						<button id="card" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">TINTE</button>

					</div>

					
					<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
							<div class="card">
							<img src="../img/hair-salon-g8ce4d22b9_1280.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">BARBA</h5>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio inventore veniam eligendi architecto ex distinctio?</p>
								<p class="card-text"><b>PRECIO:</b> 12€</p>
								<button type="submit" class="btn btn-primary">SERVICIOS</button>
							</div>
						</div>
							</div>
						</div>
					</div>

				</div>
				<!--Grid row-->
			</section>
			<!-- Section: Links -->
		</div>
	</div>

	<div style="width:100%; background-color:#f3efe0; padding-top: 3rem; padding-bottom:3rem;">
		<div class="container marketing">
			<div class="row featurette">
				<div class="col-md-7 order-md-2">
					<h2 class="">SOBRE NOSOTROS</h2>
					<p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi iusto debitis maxime quos doloribus harum, odio est reprehenderit earum consequuntur pariatur cum voluptatibus alias at facere adipisci maiores nulla voluptates.</p>
					<button type='button' class='btn btn-info' style="text-align: end;"><a id='globalLink' href='../views/login.php'>CONOCENOS</a></button>
				</div>
				<div class="col-md-5 order-md-1">
					<img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="800" height="800" src="../img/barber-gbab82b18b_1280.jpg" alt="" style="border-radius: 10px;">

				</div>
			</div>
		</div>
	</div>



	<!--          FOOTER          -->

	<footer class="text-center text-lg-start text-white" style="background-color: #222222">
		<!-- Grid container -->
		<div class="container p-4 pb-0">
			<!-- Section: Links -->
			<section class="">
				<!--Grid row-->
				<div class="row">
					<!-- Grid column -->
					<div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-4">
						<h6 class="text-uppercase mb-4 font-weight-bold">
							Tony's Barber Shop
						</h6>
						<p>
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut itaque iusto, veritatis quia,
							laboriosam excepturi vel odit suscipit, harum fuga totam earum nesciunt doloremque temporibus
							deleniti magnam soluta minima nulla!
						</p>
					</div>
					<!-- Grid column -->

					<hr class="w-100 clearfix d-md-none" />


					<!-- Grid column -->
					<div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-4">
						<h6 class="text-uppercase mb-4 font-weight-bold">
							Mapa
						</h6>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3203.0315622705753!2d-6.2720192244087505!3d36.601548878872755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0dd06f575c0d4d%3A0x2c017d9f6d9a114e!2sC.%20Mar%20Cant%C3%A1brico%2C%2011500%20El%20Puerto%20de%20Sta%20Mar%C3%ADa%2C%20C%C3%A1diz!5e0!3m2!1ses!2ses!4v1683375910365!5m2!1ses!2ses" width="200" height="150" style="border:0; border-radius: 10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>

					<!-- Grid column -->
					<hr class="w-100 clearfix d-md-none" />

					<!-- Grid column -->
					<div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-4">
						<h6 class="text-uppercase mb-4 font-weight-bold">Contacto</h6>
						<p><i class="fas fa-home mr-3"></i>Cadiz, El Puerto de Santa Maria 11500 </p>
						<p><i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
						<p><i class="fas fa-phone mr-3"></i> + 34 653 66 79 29</p>
						<p><i class="fas fa-phone mr-3"></i> + 34 692 71 89 63</p>
					</div>
					<!-- Grid column -->
				</div>
				<!--Grid row-->
			</section>
			<!-- Section: Links -->

			<hr class="my-3">

			<!-- Section: Copyright -->
			<section class="p-3 pt-0">
				<div class="row d-flex align-items-center">
					<!-- Grid column -->
					<div class="col-md-6 col-lg-6 text-center text-md-start">
						<!-- Copyright -->
						<div class="p-3">
							© 2022 Copyright:
							<a class="text-white" href="#">Antonio Ocaña</a>
						</div>
						<!-- Copyright -->
					</div>

					<!-- Grid column -->
					<div class="col-md-6 col-lg-6 ml-lg-0 text-center text-md-end">
						<!-- Facebook -->
						<a class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i class="fab fa-facebook-f"></i></a>

						<!-- Twitter -->
						<a class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i class="fab fa-twitter"></i></a>

						<!-- Google -->
						<a class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i class="fab fa-google"></i></a>

						<!-- Instagram -->
						<a class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i class="fab fa-instagram"></i></a>
					</div>
					<!-- Grid column -->
				</div>
			</section>
			<!-- Section: Copyright -->
		</div>

		<br>
	</footer>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>