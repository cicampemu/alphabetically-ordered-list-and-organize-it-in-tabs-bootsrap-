<?php $letter = ''; ?>
<ul class="nav nav-tabs" id="myTabs">
					<?php
					// iterating through lista_adheridos_filtrada array with for loop
						for($i = $infLimit; $i <= $supLimit; $i++){ 
							$adherido = $lista_adheridos_filtrada[$i];
							$nombreAdherido = $adherido->getNombreEntidad();
							$initial = strtoupper($nombreAdherido[0]);
							// if there is a change in the first letter of the elements of the list, then output the letter in a tab that will control (data-toggle=tab) the display of content (href="#.$letter.").
							if($letter != $initial){
								$letter = $initial;
								echo "<li role=\"presentation\"><a data-toggle=\"tab\" href=\"#".$letter."\">".$letter."</a></li>";
							}
														
							} ?>
</ul>
<div class="tab-content">
					<?php
					// output all the links in alphabetical order.
					for($i = $infLimit; $i <= $supLimit; $i++){ 
							$adherido = $lista_adheridos_filtrada[$i];
							$nombreAdherido = $adherido->getNombreEntidad();
							$initial = strtoupper($nombreAdherido[0]);
							// if there is a change in the first letter of each link, then output a div to divide the content by letter and separate it with div with the letter as ID.
							if($letter != $initial){
								// if the first letter is not empty (means don't output at the first iteration, as $letter is first equal to 0), then close the div previously open.
								if($letter != ''){
									echo '</div>';
								}
							$letter = $initial;
							echo '<div id="'.$initial.'" class="tab-pane active">';
							}
					echo '<li><a target="_blank" title="'.$nombreAdherido.'" href="' . $protocol . '://'.$_SERVER["SERVER_NAME"].'/empresas/'.$adherido->getNombreFicha(). '.htm' . ((isset($_REQUEST["lang"]) && $_REQUEST["lang"] == "en") ? "?lang=en": "") . '">'.$nombreAdherido.'</a></li>';
					
					} ?>
</div>
