<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\TestR;
use App\Entity\Bien;
use App\Entity\TypeBien;
use App\Entity\Image;
use App\Entity\Localite;






class FrontController extends Controller
{
    /**
     * @Route("/front", name="front")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/FrontController.php',
        ]);
    }

    /**
     * Listes des biens disponibles.
     * @FOSRest\Get("/list")
     *
     * @return array
     */
    public function allBienAction()
    {
        $repository = $this->getDoctrine()->getRepository(Bien::class);
        $id=1;
        $biens = $repository->AllBiens();
        foreach ($biens as $key => $value) {
            foreach($value->getImages() as $key1=>$image)
            {
            $image->setImage(base64_encode(stream_get_contents($image->getImage())));
            }
            }
        if(!count($biens)){
         $response=array(
             'code'=>1,
             'message'=>'Pas de Bien Trouve',
             'errors'=>null
             
         );
         return new JsonResponse($response, Response::HTTP_NOT_FOUND);

         
        }
        $data =$this->get('jms_serializer')->serialize($biens,'json');

        $response=array(
            'code'=>0,
            'message'=>'Succes',
            'errors'=>null,
            'result'=>json_decode($data)
            
        );
        return new JsonResponse($response, Response::HTTP_OK);

    }

    /**
     * Lists all bien.
     *
     * @FOSRest\Get("/biens")
     *
     * @return array
     */
    public function getBienAction()
    {
        $repository = $this->getDoctrine()->getRepository(Bien::class);

        $biens = $repository->findAll();

        return View::create($biens, Response::HTTP_OK, []);
    }

     /**
     * Create Bien.
     * @FOSRest\Post("/addbien")
     *
     * @return array
     */
    public function addBienAction(Request $request)
    {
        $data = $request->getContent();
        $post=$this->get('jms_serializer')->deserialize($data, 'App\Entity\Bien','json');
        $em = $this->getDoctrine()->getManager();
        $em->persist($post);
        $em->flush();
        return new JsonResponse($post, Response::HTTP_CREATED);
  
    }


    /**
     * Listes des types de biens disponibles.
     * @FOSRest\Get("/types")
     *
     * @return array
     */
    public function TypeBienAction()
    {
        $repository = $this->getDoctrine()->getRepository(TypeBien::class);
        $id=1;
        $biens = $repository->findAll();
        
        if(!count($biens)){
         $response=array(
             'code'=>1,
             'message'=>'Pas de Types Trouve',
             'errors'=>null
             
         );
         return new JsonResponse($response, Response::HTTP_NOT_FOUND);

         
        }
        $data =$this->get('jms_serializer')->serialize($biens,'json');

        $response=array(
            'code'=>0,
            'message'=>'Succes',
            'errors'=>null,
            'result'=>json_decode($data)
            
        );
        return new JsonResponse($response, Response::HTTP_OK);

    }

    /**
     * Listes des localites disponibles.
     * @FOSRest\Get("/localites")
     *
     * @return array
     */
    public function LocaliteAction()
    {
        $repository = $this->getDoctrine()->getRepository(Localite::class);
        $id=1;
        $biens = $repository->findAll();
        
        if(!count($biens)){
         $response=array(
             'code'=>1,
             'message'=>'Pas de Types Trouve',
             'errors'=>null
             
         );
         return new JsonResponse($response, Response::HTTP_NOT_FOUND);

         
        }
        $data =$this->get('jms_serializer')->serialize($biens,'json');

        $response=array(
            'code'=>0,
            'message'=>'Succes',
            'errors'=>null,
            'result'=>json_decode($data)
            
        );
        return new JsonResponse($response, Response::HTTP_OK);

    }

}   
