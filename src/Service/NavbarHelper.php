<?php


namespace App\Service;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NavbarHelper extends AbstractController
{

    //Home

    public function retrieveCoursesLoggedIn(): array
    {
        $navbar = array();
        $navbar['menu1'] = "home";
        $navbar['menu1link'] = 'href="' . $this->generateUrl('elearn'). '"';
        $navbar['menu2'] = "courses";
        $navbar['menu2link'] = 'href="' . $this->generateUrl('courses'). '"';
        $navbar['menu5'] = "";
        $navbar['menu5link'] = '';
        $navbar['menu3'] = "My courses";
        $navbar['menu3link'] = 'href="' . $this->generateUrl('myEnrolls'). '"';
        $navbar['menu4'] = "Logout";
        $navbar['menu4link'] = 'href="' . $this->generateUrl('app_logout'). '"';
        return $navbar;
    }

    public function retrieveCoursesLoggedOut(): array
    {
        $navbar = array();
        $navbar['menu1'] = "home";
        $navbar['menu1link'] = 'href="' . $this->generateUrl('elearn'). '"';
        $navbar['menu2'] = "courses";
        $navbar['menu2link'] = 'href="' . $this->generateUrl('courses'). '"';
        $navbar['menu5'] = "";
        $navbar['menu5link'] = '';
        $navbar['menu4'] = "register";
        $navbar['menu4link'] = 'href="' . $this->generateUrl('app_register'). '"';
        $navbar['menu3'] = "Login";
        $navbar['menu3link'] = 'href="' . $this->generateUrl('app_login'). '"';
        return $navbar;
    }


}