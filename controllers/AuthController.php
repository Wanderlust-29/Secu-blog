<?php

class AuthController extends AbstractController
{
    public function login() : void
    {
        $this->render("login", []);
    }

    public function checkLogin() : void
    {
        if(isset($_POST["email"]) && isset($_POST["password"]))
        {
            $um = new UserManager();
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            $user = $um->findByEmail($email);

            if($user->getId() !== null)
            {
                if(password_verify($password, $user->getPassword()))
                {
                    $_SESSION["user"] = $user;
                    $this->redirect("index.php");
                }
                else
                {
                    header("Location: index.php?route=login");
                }
            }
            else
            {
                header("Location: index.php?route=login");
            }
        }
        else
        {
            header("Location: index.php?route=login");
            exit();
        }
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
                   exit();
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