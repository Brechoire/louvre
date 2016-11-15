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

class BookingController extends Controller
{
    /**
     * Page de réservation
     * @Route("/", name="booking")
     * @Template("default/index.html.twig")
     */
    public function indexAction(Request $request)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('BookingBundle:Booking');

        $info = $repository->nbTicket();


        /**
         * Formulaire de réservation
         */
        $booking = new Booking();
        $form = $this->createForm(FormBooking::class, $booking);

        $form->handleRequest($request);

        /**
         * Dump du formulaire
         */
        if ($form->isSubmitted() && $form->isValid()) {
            dump($form->getData());
            die;
        }

        return array(
            'info' => $info,
            'form' => $form->createView()
        );
    }

}