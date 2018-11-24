<!DOCTYPE html>
<html>
	<head>
		<title>Generador m3u TvHeadend - Generator m3u TvHeadend</title>
		<meta name="description" content="Generador lista TvHeadend m3u - Generator list TvHeadend m3u">
		<meta name="author" content="alebupal">
		<link rel='stylesheet' href='vendor/bootstrap-4.0.0/dist/css/bootstrap-grid.min.css' type='text/css' media='all' />
		<link rel='stylesheet' href='vendor/bootstrap-4.0.0/dist/css/bootstrap-reboot.min.css' type='text/css' media='all' />
		<link rel='stylesheet' href='vendor/bootstrap-4.0.0/dist/css/bootstrap.min.css' type='text/css' media='all' />
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<br><br>
					<form role="form" action="generar.php" method="post">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="ip_tvheadend">IP TvHeadend</label>
								<input type="text" class="form-control" id="ip_tvheadend" name="ip_tvheadend" placeholder="192.168.1.1" required value="">
							</div>
							<div class="form-group col-md-6">
								<label for="puerto_tvheadend">Puerto/Port TvHeadend</label>
								<input type="number" class="form-control" id="puerto_tvheadend" name="puerto_tvheadend" placeholder="9981" required value="">
							</div>
						</div>
						<div class="form-group">
							<label for="usuario_tvheadend">Usuario/User Tvheadend</label>
							<input type="text" class="form-control" name="usuario_tvheadend" placeholder="Usuario/User Tvheadend" required value="">
						</div>
						<div class="form-group">
							<label for="contrasena_tvheadend">Contraseña/Password Tvheadend</label>
							<input type="password" class="form-control" name="contrasena_tvheadend" placeholder="Contraseña/Password Tvheadend" required value="">
						</div>
						<hr>
						<div class="form-group">
							<label for="usuario_lista">Usuario/User m3u</label>
							<input type="text" class="form-control" name="usuario_lista" placeholder="Usuario/User m3u" required >
						</div>
						<div class="form-group">
							<label for="contrasena_lista">Contraseña/Password m3u</label>
							<input type="password" class="form-control" name="contrasena_lista" placeholder="Contraseña/Password m3u" required >
						</div>
						<button type="submit" class="btn btn-primary btn-block">Generar/Generate</button>
					</form>
				</div>
			</div>
		</div>
		<footer class="footer text-center mt-2">
			<div class="container">
				<span class="text-muted">1.0 - <a href="" target="_blank">GitHub</a> - alebupal - <a href="https://www.paypal.me/alebupal" target="_blank">PayPal</a></span>
			</div>
		</footer>
		<script type='text/javascript' src='vendor/jquery-3.3.1.min.js'></script>
		<script type='text/javascript' src='vendor/bootstrap-4.0.0/dist/js/bootstrap.bundle.min.js'></script>
		<script type='text/javascript' src='vendor/bootstrap-4.0.0/dist/js/bootstrap.min.js'></script>
	</body>
</html>
