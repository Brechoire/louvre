<?php
/**
 * Created by PhpStorm.
 * User: AnCat
 * Date: 02/12/2016
 * Time: 22:39
 */

namespace BookingBundle\Service;

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
//        $session = new Session();
        $result = new Booking();

        $form = $this->form->create(FormBooking::class, $result);

        $form->handleRequest($request);

        if ($request->getMethod() == 'POST')
        {
            $periode = $form['periode']->getData();
            $dateVisite = $form['dateVisite']->getData();

            if ($periode == 1 && $dateVisite == '04/12/2016')
            {
                if ($form->isValid() && $form->isSubmitted())
                {

                    if (date('G') <= 10)
                    {
                        $this->session->set([
                            'dateVisite' => $result->getDateVisite(),
                            'periode' => $result->getPeriode(),
                            'nombreTicket' => $result->getNombreBillet(),
                            'email' => $result->getEmail()
                        ]);
//                        $this->session->set('dateVisite', $result->getDateVisite());
//                        $this->session->set('periode', $result->getPeriode());
//                        $this->session->set('nombreTicket', $result->getNombreBillet());
//                        $this->session->set('email', $result->getEmail());

                    }else{

                        $this->session->getFlashBag()->add('error', 'Attention vous ne pouvez pas réserver pour la periode "Journée" après 14 heure');

                    }
                }
                $this->session->set([
                    'dateVisite' => $result->getDateVisite(),
                    'periode' => $result->getPeriode(),
                    'nombreTicket' => $result->getNombreBillet(),
                    'email' => $result->getEmail()
                ]);
//                    $this->session->set('dateVisite', $result->getDateVisite());
//                    $this->session->set('periode', $result->getPeriode());
//                    $this->session->set('nombreTicket', $result->getNombreBillet());
//                    $this->session->set('email', $result->getEmail());
                $this->session->getFlashBag()->add('error', 'Validation ok');

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
            $request->getSession()->remove('nombreTicket');
            $request->getSession()->remove('dateValide');
            $request->getSession()->remove('dateVisite');
            $request->getSession()->remove('email');
            $request->getSession()->remove('error');
//            $request->getSession()->clear();
        }

        return $request;
    }
}