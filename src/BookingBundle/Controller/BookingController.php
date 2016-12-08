<?php
/**
 * Created by PhpStorm.
 * User: AnCat
 * Date: 02/11/2016
 * Time: 13:47
 */

namespace BookingBundle\Controller;


use BookingBundle\Entity\Booking;
use BookingBundle\Service\FormBooking;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class BookingController extends Controller
{
    /**
     * Page de réservation
     * @Route("/", name="booking")
     * @Template("default/index.html.twig")
     */
    public function indexAction(Request $request)
    {
        $unset = $this->get('booking.app')->unsetSession($request);
        //  dump($_SESSION);

        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('BookingBundle:Booking');
        $info = $repository->nbTicket();

        $form = $this->get('booking.app')->infoBooking($request);

        if ($form->isValid())
        {
            return $this->redirectToRoute('etapeTwo');
        }

        return array(
            'info' => $info,
            'form' => $form->createView(),
            'unset' => $unset
        );
    }

    /**
     * @Route("/etapeTwo", name="etapeTwo")
     * @Template("default/etapeTwo.html.twig")
     */
    public function etapeTwoIndex(Request $request)
    {
        dump($_SESSION);

        $form = $this->get('booking.app')->formVisitorBooking($request);

        return array('form' => $form->createView());

    }

}