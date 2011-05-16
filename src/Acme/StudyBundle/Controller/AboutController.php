<?php

namespace Acme\StudyBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AboutController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeStudyBundle:About:index.html.twig');
    }
}	
