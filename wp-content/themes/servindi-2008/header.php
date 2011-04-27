<div id="nav">
	<ul>
		<li class="page_item"><a href="<?php bloginfo('url'); ?>">Inicio</a></li>
		<?php wp_list_pages('depth=1&title_li='); ?>
	</ul>
</div>

<!-- header -->
<div id="header">
	<div id="buscador"><form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
	<input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" size="12" style="border:1px solid #9ed652" /><input type="submit" id="searchsubmit" value="Buscar" style="border:1px solid #9ed652" />
	</form></div>
	<h1 id="logo-text"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('description'); ?></a></h1>
	<h2 id="slogan"></h2>
</div>
<!-- header End -->

<!-- header photo -->
<div id="cabecera"><a href="<?php bloginfo('url'); ?>"><img src="http://www.servindi.org/img/logo.jpg" alt="<?php bloginfo('name'); ?>" border="0" width="194" height="120" /></a></div>
<!-- header photo end -->

<!-- menu -->
<div class="menu">
<ul><?php 
$categorias = get_categories('&hide_empty=0');
//	echo collapsing_category_menu();
	foreach($categorias as $cat){
		if ( $cat->category_parent == "0" ){
			echo "<li><a href=\"" . get_category_link($cat->cat_ID) . "\" title=\"" . $cat->category_description . "\">" . $cat->cat_name . "<!--[if IE 7]><!--></a><!--<![endif]-->";
			$padre =  get_categories("child_of=" . $cat->cat_ID);
			if ( count($padre) > 0 ){
				echo "<!--[if lte IE 6]> <table> <tr> <td> <![endif]--><ul>";
				foreach ($padre as $hijo) {
					echo "<li><a href=\"" . get_category_link($hijo->cat_ID) . "\" title=\"" . $hijo->category_description . "\">" . $hijo->cat_name . "</a></li>";
				}
				echo "</ul>";
			}
			echo "<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>";
			
		} else {
			
		}
	}
 ?></ul>
</div>
<!-- menu end -->
<div align="center"><div style="background-color: #009B00; color: White; font-size: 13pt; font-weight: bold; width:870px;">Comunicaci&oacute;n intercultural para un mundo m&aacute;s humano y diverso</div></div>
