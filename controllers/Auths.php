<?php

class Auths extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function inscription()
    {
        if (isset($_SESSION['Utilisateur'])) {
            header("Location: " . URI . "telephones/index");
        }
        if (isset($_POST["inscription"])) {
            if ($this->isValid($_POST)) {
                if ($_POST["mot_de_passe"] === $_POST["c_mot_de_passe"]) {
                    unset($_POST["c_mot_de_passe"], $_POST["inscription"]);
                    $_POST["mot_de_passe"] = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);
                    $_POST["id_role"] = Auth::CLIENT;
                    $auth = new Auth();
                    $auth->inscription($_POST);
                    header("Location: " . URI . "auths/connexion");
                }
            }
        }
        $this->render("inscription");
    }

    public function connexion()
    {
        if (isset($_SESSION['Utilisateur'])) {
            header("Location: " . URI . "telephones/index");
        }

        if (isset($_POST['submit'])) {
            if ($this->isValid($_POST)) {
                $mot_de_passe = $_POST['mot_de_passe'];
                unset($_POST['submit'], $_POST['mot_de_passe']);
                $auth = new Auth();
                $user = $auth->findByEmail($_POST);
                if ($user) {
                    if (password_verify($mot_de_passe, $user->mot_de_passe)) {
                        $_SESSION['Utilisateur'] = $user;
                        header("Location: " . URI . "telephones/index");
                    } else {
                        echo "password invalid";
                    }
                } else {
                    echo "Email or password invalid";
                }
            } else {
                echo "fields invalid, please check it!";
            }
        }
        $this->render('connexion');
    }

    public function deconnexion()
    {
        unset($_SESSION['Utilisateur']);
        $panier = new panier();
        $panier->delAll();
        header("Location: " . URI . "telephones/index");
    }

    public function profil()
    {
        //Recuperation des données de l'utilisateur connecté

        $user = $_SESSION['Utilisateur'];


        if (isset($_POST['modifier'])) {

            unset($_POST['modifier']);
            $id_utilisateur = $_SESSION['Utilisateur']->id_utilisateur;
            $_POST['id_utilisateur'] = $id_utilisateur;
            $auth = new Auth();
            $res = $auth->updateById($_POST);

            if ($res) {

                $user = $auth->findById(compact('id_utilisateur'));
            }
        }
        $this->render('profil', compact('user'));
    }


    public function modifierInfoUser($id_utilisateur)
    {

        if ($id_utilisateur && is_numeric($id_utilisateur)) {
            $id_utilisateur = $id_utilisateur;
            $auth = new Auth();
            $user = $auth->findById(compact('id_utilisateur'));

            if (isset($_POST['enregistrer'])) {

                unset($_POST['enregistrer']);
                $_POST['id_utilisateur'] = $id_utilisateur;
                $auth = new Auth();
                $res = $auth->updateById($_POST);
                if ($res) {
                    $tab['id_utilisateur'] = $id_utilisateur;
                    $user = $auth->findById($tab);
                }
            }
        }

        $this->render('modifierInfoUser', compact('user'));
    }

    /**
     *  fonction permettant d'ajouter un utilisateur par un administrateur
     * void
     */
    public function ajouterUtilisateur()
    {
        if (isset($_POST['ajouter'])) {
            if ($this->isValid($_POST)) {
                if ($_POST["mot_de_passe"] === $_POST["c_mot_de_passe"]) {
                    unset($_POST["c_mot_de_passe"], $_POST["ajouter"]);
                    $_POST["mot_de_passe"] = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);

                    $auth = new Auth();
                    $auth->inscription($_POST);
                    if ($auth) {
                        echo "<script>alert('Utilisateur ajouté avec succès.')</script>";
                    } else {
                        echo "Une erreur est survenue";
                    }
                }
            }
        }
        $this->render('ajouterUtilisateur');
    }
    public function gestionUtilisateurs()
    {
        $user = new Auth();
        $users = $user->getAllUsers();
        $this->render('gestionUtilisateurs', compact('users'));
    }
    public function deleteUser($id_utilisateur)
    {
        if (isset($_SESSION['Utilisateur'])) {
            if ($_SESSION['Utilisateur']->description == 'admin') {
                if (is_numeric($id_utilisateur)) {
                    $user = new Auth();
                    //            $id_user = ["id_user" => $id_user];
                    $user->deleteById(compact('id_utilisateur'));
                    header("Location: " . URI . "auths/gestionUtilisateurs");
                }
            }
        }
    }
}
