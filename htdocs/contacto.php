<?php
define('_EXEC', 1);
require_once 'header.php';
?>
<div class="container spaceTop">
    <div class="content full">
        <div class="span12">
            <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=es&callback=iniciar"></script>
            <script>
                function iniciar() {
                    var latlng = new google.maps.LatLng(21.1500095,-86.9063787);
                    var mapOptions = {
                        center: new google.maps.LatLng(21.1500095,-86.9063787),
                        zoom: 16,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    var map = new google.maps.Map(document.getElementById("map"),mapOptions);
                    var image ='images/mapmarker.png';
                    var mylatlng = new google.maps.LatLng(21.1500095,-86.9063787);
                    var beachMarker = new google.maps.Marker({
                        position:mylatlng,
                        map:map,
                        icon:image,
                        animation: google.maps.Animation.BOUNCE,
                        title:"Ubicacion: Laki'n"
                    });
                }
            </script>
            <div id="con">
                <div id="map"></div>
            </div>
        </div>
        <div class="span6 widget">
		<form name="frmdata" method="post" action="send.php" id="frmdata">
					<div class="formText">
							<div class="groupText">
							<br />
								<label>Nombre:</label>
								<input type="text" name="txtName" value="" placeholder="Ingrese su Nombre" required/>
							</div>

							<div class="groupText">
							<br />
								<label>Apellido:</label>
								<br />
								<input type="text" name="txtlastName" value="" placeholder="Ingrese su Apellido" required/>
							</div>

							<div class="groupText1">
								<label>Correo:</label>
								<br />
								<input type="email" name="txtEmail" value="" placeholder="Ingrese su Correo" required/>
							</div>
							<div class="groupArea">
								<label>Comentarios:</label>
								<textarea name="txtComments" placeholder="Ingrese sus Comentarios" required></textarea>
							</div>
							<div class="btnComments">
								<button name="btnSend">Enviar</button>
							</div>
					</div>
			</form>
        </div>
        <div class="span6 widget">
		<div class="reserv">
				<h3>Reservaciones</h3>
				<p><b>+52(998) 303 74 78</b></p>
				<br>
				<p><b>+52(998) 125 48 55</b></p>
				<br>
				<p><b>+52(998) 147 80 14</b></p>
				<h3>E-mail</h3>
				<p><b>noqueno_cancun@hotmail.com</b></p>
				<br>
			</div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>