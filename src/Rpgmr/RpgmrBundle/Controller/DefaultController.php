<?php

namespace Rpgmr\RpgmrBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller {

    /**
     * @Route("/", name="home")
     * @Template()
     */
    public function indexAction() {
        $response = $this->forward('RpgmrBundle:Fato:index');

        return $response;
    }

}
