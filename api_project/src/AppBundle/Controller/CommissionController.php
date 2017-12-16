<?php
/**
 * Created by PhpStorm.
 * User: Massamba
 * Date: 12/16/17
 * Time: 2:09 AM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Commission;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CommissionController extends Controller
{

    /**
     * @Get("/commissions")
     */
    public function getCommissionsAction( Request $request ){

        $commissions = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Commission')
            ->findAll();
        /* @var $commissions Commission[] */

        return new JsonResponse($this->format($commissions));
        
    }

    /**
     * @Get("/commissions/{id_user}")
     */
    public function getCommissionAction( Request $request ){
        $commissions = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Commission')
            ->findByUser( $request->get('id_user') );
        /* @var $commissions[] Commission */

        if ( count( $commissions) === 0  )
            return new JsonResponse(['message' => 'No commission for this user'], Response::HTTP_NOT_FOUND);


        return new JsonResponse( $this->format($commissions) );
    }

    private function format( $commissions ){

        $formatted = [];
        foreach ($commissions as $commission ) {
            $formatted[] = [
                'id' => $commission->getId(),
                'date' => $commission->getDate()->format("Y-m-d"),
                'heure'=> $commission->getDate()->format("h:i:s"),
                'cashback' => $commission->getCashback(),
                'marchant' => $commission->getMerchant()->getName(),
                'user' => $commission->getUser()->getName()
            ];
        }

        return $formatted ;
    }

}