<?php

namespace App\Controller;

use App\Entity\Enrolls;
use App\Repository\CoursesRepository;
use App\Repository\EnrollsRepository;
use App\Service\NavbarHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use App\Controller\Elearn_modelController;

class ElearnController extends AbstractController
{
    
	private $session;
	private $elearn_model;
	private $validator;
	
	public function __construct(SessionInterface $session, Elearn_modelController $elearn_model, ValidatorInterface $validator)
    {
		$this->session = $session;
		$this->elearn_model = $elearn_model;
        $this->validator = $validator;
    }
	
		
	/**
     * @Route("/elearn", name="elearn")
     */
    public function index(): Response
    {
        return $this->render('elearn/home.html.twig', [
            'controller_name' => 'ElearnController',
        ]);
    }

    /**
     * @Route("/courses", name="courses")
     */
    public function courses(NavbarHelper $navbarHelper, CoursesRepository $coursesRepository): Response
    {

        if (!$this->getUser()) {
            //The user isn't logged in
            $navbar = $navbarHelper->retrieveCoursesLoggedOutNav();
        } else {
            //The user is logged in
            $navbar = $navbarHelper->retrieveCoursesLoggedInNav();
        }

        $courses = $coursesRepository->findAll();



        return $this->render('elearn/courses.html.twig', [
            'controller_name' => 'ElearnController', 'navbar' => $navbar, 'courses' => $courses
        ]);
    }

    /**
     * @Route("/enroll/{id?}", name="enroll")
     */
    public function enroll(NavbarHelper $navbarHelper, EnrollsRepository  $enrollsRepository, $id, CoursesRepository $coursesRepository): Response
    {

        if (!$this->getUser()) {
            //The user isn't logged in
            $this->addFlash('error', 'You need to be signed in.');
            return $this->redirectToRoute('courses');
        }
        else if($enrollsRepository->findBy(array('user' => $this->getUser()->getId(), 'course' => $id))){
            $this->addFlash('error', 'You are already enrolled in this course');
            return $this->redirectToRoute('courses');
        }
        else {
            //The user is logged in
            if ($id and $coursesRepository->find($id)) {
                $enroll = new Enrolls();
                $enroll->setUser($this->getUser());
                $enroll->setEnrollDate(new \DateTime('now'));
                $enroll->setCourse($coursesRepository->find($id));

                //Inserting new Order in the database.
                $em = $this->getDoctrine()->getManager();
                $em->persist($enroll);
                $em->flush();

                $this->addFlash('success', 'Enroll successfully completed. Thank you.');
                return $this->redirectToRoute('courses');
            } else {
                $this->addFlash('error', 'Something went wrong!Please try again.');
                return $this->redirectToRoute('courses');
            }
        }
    }


    /**
     * @Route("/MyEnrolls", name="myEnrolls")
     */
    public function myEnrolls(NavbarHelper $navbarHelper, EnrollsRepository  $enrollsRepository): Response
    {

        if (!$this->getUser()) {
            //The user isn't logged in
            $this->addFlash('error', 'You need to be signed in.');
            return $this->redirectToRoute('courses');
        } else {
            $navbar = $navbarHelper->retrieveMyOrdersNav();
            $enrolls = $enrollsRepository->findBy(array('user' => $this->getUser()->getId()));

            return $this->render('elearn/myCourses.html.twig', [
                'controller_name' => 'BakeryController', 'navbar' => $navbar, 'enrolls' => $enrolls
            ]);
        }
    }



}
