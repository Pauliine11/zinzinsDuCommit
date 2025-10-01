<?php 

namespace App\Controllers;

use App\Utils\AbstractController;
use App\Models\User;

class LoginController extends AbstractController
{
    public function index ()
    {
        //Si mon client click sur submit
        if(isset($_POST['connexion'])){
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            $this->totalCheck("email", $email);
            $this->totalCheck("password", $password);

        }
        require_once(__DIR__ . "/../Views/login.view.php");
    }
}