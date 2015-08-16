<?php
define('_EXEC', 1);
require_once 'header.php';
?>
<div class="container spaceTop">
    <div class="content">
        <div class="span12">
            <div id="slider-wrapper">
                <div id="slider">
				<?php
				$querySlider = $database->select('images','*',[
					'type' => 'slider',
					'ORDER' => 'id DESC',
					'LIMIT' => 6
				]);
				foreach($querySlider as $slider)
				{
					?>
					<a href="javascript:void();">
                        <img src="Images/<?php echo $slider['name']; ?>"/>
                        <p>Bienvenidos</p>
                    </a>
					<?php
				}
				?>
                </div>
                <a href="javascript:void();" class="mas">&rsaquo;</a>
                <a href="javascript:void();" class="menos">&lsaquo;</a>
            </div>
        </div>

        <div class="span12 widget">
		<?php
		$logo = $database->select('images','*',[
					'type' => 'logo',
					'ORDER' => 'id DESC',
				]);
		?>
            <h2 class="title">BIENVENIDOS AL RESTAURANTE ¿NO QUE NO?</h2>
            <figure class="left">
                <img src="images/<?php echo $logo[0]['name']; ?>" src="" width="250"/>
            </figure>
            <p>Restaurante de mariscos y carnes, excelente ambiente, música en vivo los fines de semana, familiar, contamos con alberca para chicos y grandes, así como brincolín para los niños, Televisión con cable para disfrutar de los partidos deportivos, Rockola y promociones entre semana. ¿No que no se ponía bueno el asunto?</p>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="sidebar">
        <div class="span12 widget">
		<br />
		<?php
		$imageDay = $database->select('images','*',[
					'type' => 'imageDay',
					'ORDER' => 'id DESC',
				]);
		?>
            <h4 class="title">IMAGEN DEL DÍA</h4>
			  <figure class="leftthree">
                <img src="images/<?php echo $imageDay[0]['name']; ?>" src=""/>
            </figure>
        </div>
		<div class="span12 widget">
		<br />
		<?php
		$quality = $database->select('images','*',[
					'type' => 'quality',
					'ORDER' => 'id DESC',
				]);
		?>
            <h4 class="title">CALIDAD</h4>
			  <figure class="leftthree">
                <img src="images/<?php echo $quality[0]['name']; ?>" src=""/>
            </figure>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
