<?php

class AuthController extends AbstractController
{
    public function login() : void
    {
        $this->render("login", []);
    }

    public function checkLogin() : void
    {
        // si le login est valide => connecter puis rediriger vers la home
        // $this->redirect("index.php");

        // sinon rediriger vers login
        // $this->redirect("index.php?route=login");
    }

    public function register() : void
    {
        $this->render("register", []);
    }

    public function checkRegister() : void
    {
        $um = new UserManager();
    
        if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]))
        {   
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $email = htmlspecialchars($_POST['email']);
            $hashPassword = password_hash($password, PASSWORD_BCRYPT);
    
            $user = new User($username, $email, $hashPassword, "USER", new DateTime());
            $um->create($user);
    
            if($user->getId() !== null)
            {
                $_SESSION["user"] = $user;
                $this->redirect("index.php");
            }
            else
            {
                   header("Location: index.php?route=register");
            }
        }
        else
        {
             $this->redirect("index.php");
        }
    }
    

    public function logout() : void
    {
        session_destroy();

        $this->redirect("index.php");
    }
}