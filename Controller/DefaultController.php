<?php

namespace ne0shad0w\GapiBundle\GapiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ne0shad0w\GapiBundle\GapiBundle\Pclass\gapi;
use Symfony\Component\Serializer\Exception\Exception;
use Symfony\Component\Debug\Exception\ClassNotFoundException;

class DefaultController extends Controller
{
    public function indexAction()
    {
		if ( $this->container->hasParameter('gapi_user') && $this->container->hasParameter('gapi') && $this->container->hasParameter('gapi_file')){
			$user = $this->container->getParameter('gapi_user') ;
			$ga = new \ne0shad0w\GapiBundle\GapiBundle\Pclass\gapi($user,$this->get('kernel')->locateResource('@GapiBundle/Pclass/'.$this->container->getParameter('gapi_file')));
			return $this->render('GapiBundle:Default:dashboard.html.php', array('user'=>$user,'token' => $ga->getToken(), 'ga_ids'=>$this->container->getParameter('gapi')  ));
		} else {
			return $this->render('GapiBundle:Default:vide.html.twig');
		}
    }
}
