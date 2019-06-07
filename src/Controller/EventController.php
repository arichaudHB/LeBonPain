<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    private $eventService;
    public function __construct( EventService $eventService ){
        $this->eventService = $eventService;
    }
    /**
     * @Route("/events", name="event_list")
     */
    public function list( Request $request ){
        $query = $request->query->get('query');
        if( !empty( $query ) ){
            $events = $this->eventService->search( $query );
        }else{
            $events = $this->eventService->getAll();
        }
        return $this->render( 'event/list.html.twig', array(
            'events' => $events,
        ));
    }
    /**
     * @Route("/event/add", name="event_add")
     */
    public function add( Request $request ){
        $event = new Event();
        $form = $this->createForm( EventType::class, $event );
        $form->handleRequest( $request );
        if( $form->isSubmitted() && $form->isValid() ){
            $em = $this->getDoctrine()->getManager();
            $event->setCreatedAt( new \DateTime() );
            
            $ruser = $em->getRepository('App:User')->findOneBy( array() );
            $event->setOwner( $ruser );
            $em->persist( $event );
            $em->flush();
            return $this->redirectToRoute( 'event_show', array(
                'id' => $event->getId(),
            ));
        }
        return $this->render( 'event/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    /**
     * @Route("/event/{id}", name="event_show",
     *     requirements = { "id" = "\d+" }
     * )
     */
    public function show( $id ){
        return $this->render( 'event/show.html.twig', array(
            'event' => $this->eventService->get( $id ),
        ));
    }
}
