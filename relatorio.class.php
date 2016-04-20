<?php

	class Relatorio{

		public $output;

		/**
		 * @param string $args['title']: Title of the report
		 * @param string $args['description']: Description of the report
		 * @param string $args['filter']: Filter elements
	     * @param array $args['rows']: Query results rows
	     *
	     * @return string report output
		*/

		function init($args){

			$this->set_header($args);
			$this->set_filter($args);
			$this->set_rows($args);

			return $this->output;

		}

		function set_header($args){

			$this->output .= '<form class="print-it" method="POST"><h4 class="titulo-admin">'.$args['title'].'</h4>';
			$this->output .= '<p>'.$args['description'].'</p>';

		}

		function set_filter($args){

			$this->output .= '<div class="panel panel-default pedido_relatorio_filtro">
			<div class="panel-body">
			<div class="form-group">
			<div class="row">';

			foreach ($args['filter'] as $key => $value) {
				$this->output .= '<div class="col-xs-'.$value[2].'">
				<div class="form-group">
				<input value="'.$value[4].'" name="'.$value[0].'" data-toggle="tooltip" data-placement="top" title="" placeholder="'.$value[3].'" id="'.$value[0].'" type="text" class="datepicker2 form-control">
				</div>
				</div>';
			}

			$this->output .= '<input type="submit" data-toggle="tooltip" data-placement="top" title="" class="btn btn-success btn-md" data-target="#myModal" value="Enviar" data-original-title="Filtrar resultados com base nos filtros"> ';
			$this->output .= '<a id="print" class="btn btn-info btn-md">Imprimir</a>
			</div>
			</div>
			</div>
			</div>';

		}

		function set_rows($args){

			$this->output .= '<table class="table table-hover produtos-tabela">

	      	<thead>
	      	<tr>';

		    foreach ($args['rows'] as $key => $value) {
		    	foreach ($value as $key2 => $value2) {
		    		$this->output .= '<th>'.$key2.'</th>';
		    	}
		    	break;
		    }
			        
			$this->output .= '</tr>
			</thead>
      		<tbody>';

      		foreach ($args['rows'] as $key => $value) {
      		    $this->output .= '
  		   		<tr class="  categorias-linha categorias-linha-">';
		   			foreach ($value as $key2 => $value2) {
		   				$this->output .= '<td>'.$value2.'</td>';
		   			}
			    $this->output .= '</tr>';
			}

			$this->output .= '</tbody>
    		</table>
    		</form>
    		<script>
    			$("document").ready(function(){
    				$("#print").click(function(){
    					window.print();
    				})
    			})
    		</script>
    		';

		}

	}

?>