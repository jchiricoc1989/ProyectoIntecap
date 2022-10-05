<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/ventanaModal.js"></script>
	
</head>
<body>

<div class="fondoModal" id="modal1">
	<div class="modalMensajes">
		<h2 class="textosNotificacion">Error!</h2>
		<!doctype html>

    
<div class="container">
  <main>
   

    <div class="row g-12">
      <div class="col-md-12 col-lg-12">
        <h4 class="mb-3">Billing address</h4>
        <form class="needs-validation" novalidate>
          <div class="row g-3">

            <div class="col-sm-6">
              <label for="firstName" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="" required> 
            </div>
            <div class="col-sm-6">
              <label for="lastName" class="form-label">Apellidos</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
            </div>

            <div class="col-12">
              <label for="username" class="form-label">Usuario</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" id="username" placeholder="Username" required>
              <div class="invalid-feedback">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Correo Electronico <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com">
            </div>

            <div class="col-md-6">
              <label for="country" class="form-label">Country</label>
              <select class="form-select" id="country" required>
                <option value="">Choose...</option>
                <option>United States</option>
              </select>
            </div>

            <div class="col-md-6">
              <label for="state" class="form-label">State</label>
              <select class="form-select" id="state" required>
                <option value="">Choose...</option>
                <option>California</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>
          </div>

          <hr class="my-4">

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="same-address">
            <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
          </div>

    

          <hr class="my-4">

          

        

          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
        </form>
      </div>
    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017â€“2022 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="form-validation.js"></script>
  </body>
</html>

		<a class="btnAceptarNotificacion" href="index.php">Aceptar</a>
	</div>

</div>

<button class="btn btn-success" type="button" onclick="mostrarModal()">
  ventana modal
</button>

</body>
</html>