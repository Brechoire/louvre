<?php
/**
 * Created by PhpStorm.
 * User: AnCat
 * Date: 02/12/2016
 * Time: 22:39
 */

namespace BookingBundle\Service;

use BookingBundle\Form\FormBookingVisitorType;
use Doctrine\ORM\EntityManager;
use BookingBundle\Repository\BookingRepository;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use BookingBundle\Entity\Booking;
use BookingBundle\Form\FormBooking;

class BookingService
{
    /**
     * @var EntityManager
     */
    protected $doctrine;

    /**
     * @var FormFactory
     */
    protected $form;

    /**
     * @var Session
     */
    protected $session;

    /**
     * BookingService constructor.
     * @param EntityManager $doctrine
     * @param Session $session
     * @param FormFactory $form
     */
    public function __construct(EntityManager $doctrine, FormFactory $form, Session $session)
    {
        $this->doctrine = $doctrine;
        $this->form = $form;
        $this->session = $session;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\Form\FormInterface
     */
    public function infoBooking(Request $request)
    {
        $result = new Booking();

        $form = $this->form->create(FormBooking::class, $result);

        $form->handleRequest($request);

        if ($request->getMethod() == 'POST')
        {
            if ($form->isValid() && $form->isSubmitted())
            {
                $form->getData();
                $periode = $form['periode']->getData();
                $dateVisite = $form['dateVisite']->getData();

                if ($periode == 1 && $dateVisite == '07/12/2016')
                {
                    if (date('G') < 14)
                    {
                        $this->session->set('dateVisite', $form['dateVisite']->getData());
                        $this->session->set('periode', $form['periode']->getData());
                        $this->session->set('nombreBillet', $form['nombreBillet']->getData());
                        $this->session->set('email', $form['email']->getData());
                        $this->session->set('valide', '1');


                        $this->session->getFlashBag()->add('success', 'Formulaire valide !');

                    }
                }else{
                    $this->session->set('dateVisite', $form['dateVisite']->getData());
                    $this->session->set('periode', $form['periode']->getData());
                    $this->session->set('nombreBillet', $form['nombreBillet']->getData());
                    $this->session->set('email', $form['email']->getData());
                    $this->session->set('valide', '1');
                    $this->session->getFlashBag()->add('success', 'Formulaire valide !');

                }

            }
        }

        return $form;
    }

    public function formVisitorBooking(Request $request)
    {
        $form = $this->form->create(FormBookingVisitorType::class);
        $form->handleRequest($request);
        if ($request->getMethod() == 'POST')
        {
            if ($form->isValid() && $form->isSubmitted())
            {

            }
        }

        return $form;

    }

    /**
     * @param Request $request
     * @return Request
     */
    public function unsetSession(Request $request)
    {

        if ($request->hasSession()){
            $request->getSession()->remove('nombreBillet');
            $request->getSession()->remove('dateValide');
            $request->getSession()->remove('dateVisite');
            $request->getSession()->remove('email');
            $request->getSession()->remove('error');
//            $request->getSession()->clear();
        }

        return $request;
    }
}