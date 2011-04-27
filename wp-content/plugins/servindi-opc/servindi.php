<?php
/*
Plugin Name: Servindi-Opciones
Plugin URI: http://diego.lermagomez.com
Description: Opciones generales para el sitio web SERVINDI. (Desarrollado para <a href="http://www.servindi.org/">SERVINDI</a>)
Author: Diego Lerma
Version: 0.1
Author URI: http://diego.lermagomez.com
*/

/*  
	Copyright 2009  Diego Lerma  (email : diegolerma@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

/* 
Name: servindi_install
Description: Crea la tabla necesaria para guardar la información y generar el servindi
*/
add_action('activate_servindi-opc/servindi-opc.php', 'servindi_install');
function servindi_install()
{
//	echo "Se creo la tabla";
	add_option("servindi_audio", "HTML", "URI ultimo audio", 'yes');
	add_option("servindi_nacional", "HTML", "URI ultimo audio nacional", 'yes');
	add_option("servindi_video", "HTML", "URI ultimo video", 'yes');
}

### Function: Poll Administration Menu
add_action('admin_menu', 'servindi_menu');
function servindi_menu() {
	if (function_exists('add_menu_page')) {
//		add_menu_page(page_title, menu_title, access_level/capability, file, [function], [icon_url]);
		add_menu_page("servindi", "servindi", 6, __FILE__, 'servindi_main', plugins_url('servindi-opc/img/cog.png'));
	}
//	if (function_exists('add_submenu_page')) {
//		add_submenu_page(parent, page_title, menu_title, access_level/capability, file, [function]);
		add_submenu_page(__FILE__, "Opciones Servindi", "Cambiar opciones", 6, __FILE__,"servindi_main");
//	}

// Add a new submenu under Options:
//add_options_page('Test Options', 'Test Options', 8, 'testoptions', 'mt_options_page');
// Add a new submenu under Manage:
//add_management_page('Test Manage', 'Test Manage', 8, 'testmanage', 'mt_manage_page');
// Add a new top-level menu (ill-advised):
//add_menu_page('Test Toplevel', 'Test Toplevel', 8, __FILE__, 'mt_toplevel_page');
// Add a submenu to the custom top-level menu:
//add_submenu_page(__FILE__, 'Test Sublevel', 'Test Sublevel', 8, 'sub-page', 'mt_sublevel_page');
// Add a second submenu to the custom top-level menu:
//add_submenu_page(__FILE__, 'Test Sublevel 2', 'Test Sublevel 2', 8, 'sub-page2', 'mt_sublevel_page2');
}


function servindi_main() {
	global $wpdb;
?><div class="wrap">
	<h2>Opciones web Servindi</h2><?php 
	$hayMensaje = false;
	if ( $_POST["accion"] == 1 ){
/* INICIO : Acciones para el formulario PRIMER PASO */
		$audio = $_POST["f_audio"];
		$nacional = $_POST["f_nacional"];
		$video = $_POST["f_video"];
		if ( get_option("servindi_audio") ){
			update_option("servindi_audio",$audio);
		} else {
			add_option("servindi_audio", $audio, "URI ultimo audio", 'yes');
		}
		if ( get_option("servindi_nacional") ){
			update_option("servindi_nacional",$nacional);
		} else {
			add_option("servindi_nacional", $nacional, "URI ultimo audio", 'yes');
		}
		if ( get_option("servindi_video") ){
			update_option("servindi_video",$video);
		} else {
			add_option("servindi_video", $video, "URI ultimo video", 'yes');
		}
		$hayMensaje = true;
		$mensaje = "Todos los datos de audio y video fueron actualizados con exito";
/* FIN : Acciones para el formulario PRIMER PASO */
	}
	if ( $hayMensaje ) {?>
	<div style="background-color: rgb(255, 251, 204);" id="message" class="updated fade">
		<p><?php echo $mensaje; ?></p>
	</div>
	<?php } ?>
	
	<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post" name="nservindi" id="nservindi">
	<?php if( !isset($_POST["accion"]) ) {
/* INICIO : Formulario PRIMER PASO para la generacion del servindi */
	?>	<p>Por favor, indique las opciones que va a cambiar</p>
		<input type="hidden" name="accion" value="1" />
		<table class="form-table">
			<tbody>
				<tr class="form-field">
					<td><label for="f_video">Video</label><br /></td>
					<td><textarea name="f_video"><?php if ( get_option("servindi_video") ){ echo stripslashes(get_option("servindi_video")); } else { echo "No hay data registrada"; } ?></textarea><br />Ancho m&aacute;ximo 240px (Recomendado 240x195)</td>
				</tr>
				<tr class="form-field">
					<td><label for="f_audio">Audio Internacional</label></td>
					<td><input type="text" name="f_audio" value="<?php if ( get_option("servindi_audio") ){ echo get_option("servindi_audio"); } else { echo "No hay registros"; } ?>" /></td>
				</tr>
				<tr class="form-field">
					<td><label for="f_audio">Audio Nacional</label></td>
					<td><input type="text" name="f_nacional" value="<?php if ( get_option("servindi_nacional") ){ echo get_option("servindi_nacional"); } else { echo "No hay registros"; } ?>" /></td>
				</tr>

			</tbody>
		</table>
		<p class="submit"><input name="goservindi" id="goservindi" class="button-primary" value="Cambiar opciones de la web servindi" type="submit" /></p><?php 
/* FIN : Formulario PRIMER PASO para la generacion del servindi */
		} elseif( $_POST["accion"] == 1 ) { ?>
		<p><img src="http://www.servindi.org/img/logo.jpg" width="194" height="120" /></p>
	<?php } ?>
	</form>
</div>
<?php
}

/*
Funciones de apoyo
*/
function servindi_getDia($dia){
	$dias[1] = "Lunes";
	$dias[2] = "Mártes";
	$dias[3] = "Miercoles";
	$dias[4] = "Jueves";
	$dias[5] = "Viernes";
	$dias[6] = "Sábado";
	$dias[7] = "Domingo";

	return $dias[$dia];
}
function servindi_getMes($mes){
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

?>