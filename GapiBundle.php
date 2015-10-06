<?php

namespace ne0shad0w\GapiBundle\GapiBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class GapiBundle extends Bundle
{
	//public function load_module(){		return array( array("nom"=>"Garderie" , "route"=>"gestion_garderie" , "icone"=>"glyphicon-link") );		}


	public function dashboard_module(){		
			
		return array( array("html"=>'GapiBundle:Default:index',"type"=>"render" ) );		
			
	}

	public function adm_module(){		
		return true;
	}

	public function user_module(){		
		return false;
	}
	/*public function menu_module($lang){	
		
		return $menu = array('titre'=>'evenement', 
							'sousmenu'=> array( 
											'menu.ajoutEvent'=>'gestion_evenement_add', 
											'menu.listeEvent'=>'gestion_evenement_list'
											) 
							);
	}*/

}
