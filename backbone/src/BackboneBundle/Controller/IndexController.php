<?php
namespace BackboneBundle\Controller;

use BackboneBundle\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    public function indexAction() {
        return $this->render('BackboneBundle:Index:index.html.twig');
    }

    public function getAllAction() {
        $books = $this->getDoctrine()->getRepository('BackboneBundle:Book')->findAll();
        $books_json = $this->container->get('serializer')->serialize($books, 'json');

        return new Response($books_json, 200, array('Content-Type', 'application/json'));
    }

    public function getAction($id) {
        $book = $this->getDoctrine()->getRepository('BackboneBundle:Book')->find($id);
        $book_json = $this->container->get('serializer')->serialize($book, 'json');

        return new JsonResponse($book_json);
    }

    public function addAction() {
        $book = new Book();
        $book->setTitle($_POST['title']);
        $book->setAuthor($_POST['author']);
        $book->setReleaseDate(date('Y-m-d'));
        $book->setKeywords($_POST['keywords']);
        $book->setImage($_POST['image']);

        $em = $this->getDoctrine()->getManager();
        $em->persist($book);
        $em->flush();

        return new JsonResponse(array('id' => $book->getId()));
    }

    public function updateAction($id) {
        $em = $this->getDoctrine()->getManager();

        /**
         * @var \BackboneBundle\Entity\Book $book;
         */
        $book = $em->getRepository('BackboneBundle:Book')->find($id);

        if(empty($book)) {
            return new JsonResponse(array('error' => 1), 404);
        }

        $book->setTitle($_POST['title']);
        $book->setAuthor($_POST['author']);
        $book->setReleaseDate(date('Y-m-d'));
        $book->setKeywords($_POST['keywords']);
        $book->setImage($_POST['image']);

        $em->flush();

        return new JsonResponse(array('error' => 0));
    }

    public function deleteAction($id) {
        $em = $this->getDoctrine()->getManager();

        $book = $em->getRepository('BackboneBundle:Book')->find($id);

        if(empty($book)) {
            return new JsonResponse(array('error' => 1), 404);
        }

        $em->remove($book);
        $em->flush();

        return new JsonResponse(array('error' => 0));
    }
}