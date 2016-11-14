<?php
/**
 * Created by PhpStorm.
 * User: AnCat
 * Date: 02/11/2016
 * Time: 13:47
 */

namespace BookingBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BookingController extends Controller
{
    /**
     * Page de réservation
     * @Route("/", name="booking")
     * @Template("default/index.html.twig")
     */
    public function indexAction()
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('BookingBundle:Booking');

        $info = $repository->nbTicket();
        dump($info);
        return array('info' => $info);
    }
}