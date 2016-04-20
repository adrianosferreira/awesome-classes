<?php
class Paginacao{

	function set_paginacao($limit, $index, $pedidos_count){
		global $numero_paginas;
		$numero_paginas = ceil($pedidos_count / $limit);

		if((!$index) || ($index == 1)){
			$index = 1;
			$args['offset'] = 0;
		}else{
			$args['offset'] = (($index * $limit) - $limit);
		}

		$args['limit'] = $limit;

		if($index == 'all'){
			$args['offset'] = 0;
			$args['limit'] = 999999;
		}

		return $args;
	}

	function display_paginacao($index, $count, $secao){
		global $numero_paginas;

		if((!$index) || ($index == 1)){
			$index = 1;
		}

		$secao_conteudo = '';
		$secao_conteudo .= '<nav class="do-not-print-it">
		<ul class="pager">';

		if(($index <= 1) || ($index == 'all')){
			$secao_conteudo .= '<li class="disabled"><a>Anterior</a></li> ';					  	
		}else{
			$secao_conteudo .= '<li><a href="'.$secao.($index-1).'">Anterior</a></li> ';					  				  	
		}

		if(($count < $limit) || ($numero_paginas == $index) || ($index == 'all')){
			$secao_conteudo .= '<li class="disabled"><a disabled>Próxima</a></li>';			  	
		}else{
		  	$secao_conteudo .= '<li><a href="'.$secao.($index+1).'">Próxima</a></li>';
		}				    
				
		$secao_conteudo .= '</ul></nav>';

		return $secao_conteudo;
	}

}
?>