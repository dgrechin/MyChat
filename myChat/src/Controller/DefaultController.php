<?php
namespace App\Controller;


use App\Entity\Messege;
use App\Form\MessegeType;
use App\Repository\MessegeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
class DefaultController extends AbstractController
{


    /**
     * @Route("", name="messege")
     */
    public function index(Request $request, MessegeRepository $messegeRepository )
    {
        $messegeRequest = new Messege();
        $form = $this->createForm(MessegeType::class, $messegeRequest);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($messegeRequest);
            $manager->flush();
            return $this->redirectToRoute('messege');
        }

        $messeges = $messegeRepository->findOrder();

        return $this->render('default/index.html.twig', [
            'form' => $form->createView(),
            'messeges' => $messeges,
        ]);
    }

}
