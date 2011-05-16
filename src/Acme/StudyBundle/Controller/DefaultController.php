<?php

namespace Acme\StudyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeStudyBundle:Default:index.html.twig');
    }
}
