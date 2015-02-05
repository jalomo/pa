<HTML>
    <HEAD>
        <TITLE>pagos</TITLE>
       <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	   <script type="text/javascript" src="https://conektaapi.s3.amazonaws.com/v0.3.2/js/conekta.js"></script>
	   <script type="text/javascript">
 
		 // Conekta Public Key
		  Conekta.setPublishableKey('key_Cfc1er1YxbRepKUoV2GRQKQ');
		 
		 // ...
		 var conektaSuccessResponseHandler;
		 var conektaErrorResponseHandler;
		 jQuery(function($) {
		  $("#card-form").submit(function(event) {
		    var $form;
		    $form = $(this);

		    
		/* Previene hacer submit más de una vez */

		    $form.find("button").prop("disabled", true);
		    Conekta.token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);

		    
		/* Previene que la información de la forma sea enviada al servidor */

		    return false;
		  });


		  conektaSuccessResponseHandler = function(token) {
		  var $form;
		  $form = $("#card-form");

		  
		/* Inserta el token_id en la forma para que se envíe al servidor */

		  $form.append($("<input type=\"text\" name=\"conektaTokenId\" />").val(token.id));

		  
		/* and submit */

		  $form.get(0).submit();
		};



		conektaErrorResponseHandler = function(response) {
		  var $form;
		  $form = $("#card-form");

		  
		/* Muestra los errores en la forma */

		  $form.find(".card-errors").text(response.message);
		  $form.find("button").prop("disabled", false);
		};



		});
		</script>
    </HEAD>

    <BODY>
       


    	<form action="" method="POST" id="card-form">
		  <span class="card-errors"></span>
		  <div class="form-row">
		    <label>
		      <span>Nombre del tarjetahabiente</span>
		      <input type="text" size="20" data-conekta="card[name]"/>
		    </label>
		  </div>
		  <div class="form-row">
		    <label>
		      <span>Número de tarjeta de crédito</span>
		      <input type="text" size="20" data-conekta="card[number]"/>
		    </label>
		  </div>
		  <div class="form-row">
		    <label>
		      <span>CVC</span>
		      <input type="text" size="4" data-conekta="card[cvc]"/>
		    </label>
		  </div>
		  <div class="form-row">
		    <label>
		      <span>Fecha de expiración (MM/AAAA)</span>
		      <input type="text" size="2" data-conekta="card[exp_month]"/>
		    </label>
		    <span>/</span>
		    <input type="text" size="4" data-conekta="card[exp_year]"/>
		  </div>
		  <button type="submit">Suscribirse ahora!</button>
		</form>


    </BODY>
</HTML>