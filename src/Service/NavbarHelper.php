<?php


namespace App\Service;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NavbarHelper extends AbstractController
{

    //Courses

    public function retrieveCoursesLoggedInNav(): array
    {
        $navbar = array();
        $navbar['menu1'] = "home";
        $navbar['menu1link'] = 'href="' . $this->generateUrl('elearn'). '"';
        $navbar['active1'] = ' ';

        $navbar['menu2'] = "courses";
        $navbar['menu2link'] = 'href="' . $this->generateUrl('courses'). '"';
        $navbar['active2'] = ' active';

        $navbar['menu5'] = "";
        $navbar['menu5link'] = '';
        $navbar['active5'] = ' ';

        $navbar['menu3'] = "My courses";
        $navbar['menu3link'] = ' href="' . $this->generateUrl('myEnrolls'). '"';
        $navbar['active3'] = ' ';

        $navbar['menu4'] = "Logout";
        $navbar['menu4link'] = 'href="' . $this->generateUrl('app_logout'). '"';
        $navbar['active4'] = ' ';
        return $navbar;
    }


    public function retrieveCoursesLoggedOutNav(): array
    {
        $navbar = array();
        $navbar['menu1'] = "home";
        $navbar['menu1link'] = 'href="' . $this->generateUrl('elearn'). '"';
        $navbar['active1'] = '';
        $navbar['menu2'] = "courses";
        $navbar['menu2link'] = 'href="' . $this->generateUrl('courses'). '"';
        $navbar['active2'] = ' active ';
        $navbar['menu5'] = "";
        $navbar['menu5link'] = '';
        $navbar['active5'] = ' ';
        $navbar['menu4'] = "register";
        $navbar['menu4link'] = 'href="' . $this->generateUrl('app_register'). '"';
        $navbar['active4'] = ' ';
        $navbar['menu3'] = "Login";
        $navbar['menu3link'] = 'href="' . $this->generateUrl('app_login'). '"';
        $navbar['active3'] = ' ';
        return $navbar;
    }

    // Register
    public function retrieveRegisterNav(): array
    {
        $navbar = array();
        $navbar['menu1'] = "home";
        $navbar['menu1link'] = 'href="' . $this->generateUrl('elearn'). '"';
        $navbar['active1'] = '';
        $navbar['menu2'] = "courses";
        $navbar['menu2link'] = 'href="' . $this->generateUrl('courses'). '"';
        $navbar['active2'] = '  ';
        $navbar['menu5'] = "";
        $navbar['menu5link'] = '';
        $navbar['active5'] = ' ';
        $navbar['menu4'] = "register";
        $navbar['menu4link'] = 'href="' . $this->generateUrl('app_register'). '"';
        $navbar['active4'] = 'active ';
        $navbar['menu3'] = "Login";
        $navbar['menu3link'] = 'href="' . $this->generateUrl('app_login'). '"';
        $navbar['active3'] = ' ';
        return $navbar;
    }

    // Login
    public function retrieveLoginNav(): array
    {
        $navbar = array();
        $navbar['menu1'] = "home";
        $navbar['menu1link'] = 'href="' . $this->generateUrl('elearn'). '"';
        $navbar['active1'] = '';
        $navbar['menu2'] = "courses";
        $navbar['menu2link'] = 'href="' . $this->generateUrl('courses'). '"';
        $navbar['active2'] = '  ';
        $navbar['menu5'] = "";
        $navbar['menu5link'] = '';
        $navbar['active5'] = ' ';
        $navbar['menu4'] = "register";
        $navbar['menu4link'] = 'href="' . $this->generateUrl('app_register'). '"';
        $navbar['active4'] = '';
        $navbar['menu3'] = "Login";
        $navbar['menu3link'] = 'href="' . $this->generateUrl('app_login'). '"';
        $navbar['active3'] = ' active ';
        return $navbar;
    }

    // My orders

    public function retrieveMyOrdersNav(): array
    {
        $navbar = array();
        $navbar['menu1'] = "home";
        $navbar['menu1link'] = 'href="' . $this->generateUrl('elearn'). '"';
        $navbar['active1'] = ' ';

        $navbar['menu2'] = "courses";
        $navbar['menu2link'] = 'href="' . $this->generateUrl('courses'). '"';
        $navbar['active2'] = ' ';

        $navbar['menu5'] = "";
        $navbar['menu5link'] = '';
        $navbar['active5'] = ' ';

        $navbar['menu3'] = "My courses";
        $navbar['menu3link'] = ' href="' . $this->generateUrl('myEnrolls'). '"';
        $navbar['active3'] = ' active ';

        $navbar['menu4'] = "Logout";
        $navbar['menu4link'] = 'href="' . $this->generateUrl('app_logout'). '"';
        $navbar['active4'] = ' ';
        return $navbar;
    }

}