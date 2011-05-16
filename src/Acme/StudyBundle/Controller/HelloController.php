<?php 

namespace Acme\StudyBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HelloController extends Controller
{

    public function indexAction($name)
    {

	
        return $this->render('AcmeStudyBundle:Hello:index.html.twig', array('name' => $name));
    }
}
