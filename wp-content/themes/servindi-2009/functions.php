<?php
function dia($dia){
	$dias[1] = "Lunes";
	$dias[2] = "Mártes";
	$dias[3] = "Miercoles";
	$dias[4] = "Jueves";
	$dias[5] = "Viernes";
	$dias[6] = "Sábado";
	$dias[7] = "Domingo";

	return $dias[$dia];
}
function mes($mes){

	$meses[1] = "Enero";
	$meses[2] = "Febrero";
	$meses[3] = "Marzo";
	$meses[4] = "Abril";
	$meses[5] = "Mayo";
	$meses[6] = "Junio";
	$meses[7] = "Julio";
	$meses[8] = "Agosto";
	$meses[9] = "Septiembre";
	$meses[10] = "Octubre";
	$meses[11] = "Noviembre";
	$meses[12] = "Diciembre";


	return $meses[$mes];

}
function servindi_thumb($content) {
	
//	$doc = new DOMDocument();
//	if(@$doc->loadHTML($content)) {
//		$images=$doc->getElementsByTagName("img");
//		$nimages=$images->length;
//		if($nimages) {
//			print_r($nimages);
//			$ni=rand(1,$nimages)-1;
//			$src=$images->item($ni)->getAttribute('src');
			return "";
//		}
//	}
}

if (function_exists("register_sidebars")) register_sidebars(1, array('before_widget' => "",'after_widget' => "")); ?>
