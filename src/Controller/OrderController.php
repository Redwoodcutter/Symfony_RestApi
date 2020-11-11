<?php 

namespace App\Controller;

use App\Entity\OrderPost;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Serializer;
/**
 * @Route("/order")
 */
class OrderController extends AbstractController 
{   
    /**
    * @Route("/{page}", name="order_list", defaults={"page": 5}, requirements={"page"="\d+"})
    */
    public function list($page = 1, Request $request)
    {
        $limit = $request->get('limit',10);
        $repository = $this->getDoctrine()->getRepository(OrderPost::class);
        $items = $repository->findAll();

        return $this->json(
            [
                'page' => $page,
                'limit' => $limit,
                'data' => array_map(function($item){
                    return $this->generateUrl('order_by_company_name',['company_name' => $item->getCompanyName()]);
                }, $items)
            ]
            
        );
    }
    /**
     * @Route ("/post/{id}", name="order_by_id", requirements={"id"="\d+"}, methods={"GET"})
     * @ParamConverter("post", class="App:OrderPost")
     */
    public function post($post)
    {
        return $this->json($post);
    }
    /**
     * @Route("/post/{company_id}", name="order_by_company_name", methods={"GET"})
     * @ParamConverter("post", class="App:OrderPost", options={"mapping":{"company_name":"companyId"}})
     */
    public function postByCompany($post)
    {   
        return $this->json($post);
    }
    /**
     * @Route("/add", name="order_add", methods={"POST"})
     */
    public function add(Request $request)
    {
        /** @var Serizalizer $serializer */
        $serializer = $this->get('serializer');

        $orderPost = $serializer->deserialize($request->getContent(), OrderPost::class, 'json');

        $em=$this->getDoctrine()->getManager();
        $em->persist($orderPost);
        $em->flush();

        return $this->json($orderPost);
    }
     /**
     * @Route("/post/{id}", name="order_delete", methods={"DELETE"})
     */
    public function delete(OrderPost $post)
    {
        $em=$this->getDoctrine()->getManager();
        $em->remove($post);
        $em->flush();

        return $this->json(null, Response::HTTP_NO_CONTENT);

    }
}