<?php

class Commandes extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }


    public function gestionCommandes()
    {

        $commande = new Commande();
        $commandes = $commande->getAllCommandes();
        $this->render('gestionCommande', compact('commandes'));
    }


    public function modifierCommande($id_commande)
    {
        if ($id_commande && is_numeric($id_commande)) {
            $_SESSION['idCommandeAModifier'] = $id_commande;
            $commande = new Commande();
            $infoCommande = $commande->findById(compact('id_commande'));
        }

        if (isset($_POST['enregistrerModification'])) {
            $id_commande = $_SESSION['idCommandeAModifier'];
            unset($_POST['enregistrerModification']);
            $_POST['id_commande'] = $id_commande;
            $commande = new Commande();
            $result = $commande->updateById($_POST);

            $nouvelleValeurCommande = $commande->findById(compact('id_commande'));
            $_SESSION['commande'] = $nouvelleValeurCommande;
            if ($result) {
                header("Location: " . URI . "commandes/gestionCommandes");
            } else {
                echo "<script> alert('Une erreur est survenue');</script>";
                header("Location: " . URI . "commandes/modifierCommande");
            }
        }


        $this->render('modifierCommande', compact('infoCommande'));
    }


    public function deleteCommande($id_commande)
    {
        if (isset($_SESSION['Utilisateur'])) {
            if ($_SESSION['Utilisateur']->description == 'admin') {
                if (is_numeric($id_commande)) {
                    $commande = new Commande();
                    $commande->deleteById(compact('id_commande'));
                    header("Location: " . URI . "commandes/gestionCommandes");
                }
            }
        }
    }


    /**
     * Cette methode permet de voir les données d'une commande
     */
    public function voirCommande($id_commande)
    {
        if ($id_commande && is_numeric($id_commande)) {
            $_SESSION['idCommandeAVoir'] = $id_commande;
            $commande = new Commande();
            $infoCommande = $commande->findById(compact('id_commande'));
        }
        $this->render('voirCommande', compact('infoCommande'));
    }

    /**
     *  fonction permettant d'ajouter une commande par un administrateur
     * void
     */
    public function ajouterCommande()
    {
        if (isset($_POST['ajouter'])) {
            if ($this->isValid($_POST)) {
                unset($_POST['ajouter']);
                $commande = new Commande();
                $result = $commande->insererCommande($_POST);
                if ($result) {
                    echo "<script>alert('Commande ajouté avec succès.')</script>";
                } else {
                    echo "Une erreur est survenue";
                }
            }
        }
        $this->render('ajouterCommande');
    }
    //Fonction qui permet de visualiser le contenu entier de la commande
    public function checkout()
    {
        $user = $_SESSION['Utilisateur'];

        $this->render('checkout');
    }
}
