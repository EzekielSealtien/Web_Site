<?php

class Telephones extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $telephone = new Telephone();
        $telephones = $telephone->getAllTelephones();
        $this->render('index', compact('telephones'));
    }

    public function ajouterProduit()
    {
        if (isset($_SESSION['Utilisateur'])) {
            if ($_SESSION['Utilisateur']->description == 'admin') {
                if (isset($_POST["ajouter"])) {
                    if ($this->isValid($_POST)) {
                        unset($_POST["ajouter"]);
                        $telephone = new Telephone();
                        $telephone->ajouter($_POST);
                        global $oPDO;
                        $id_telephone = $oPDO->lastInsertId();
                        $this->importImage($id_telephone);
                        header("Location: " . URI . "telephones/gestionProduits");
                        return;
                    } else { ?>
                        <script>
                            alert("Veuillez renseigner tous les champs!!!")
                        </script>
<?php
                    }
                }
                $this->render('ajouterProduit');
            }
        }
        $this->render('index');
    }

    public function admin()
    {

        if (isset($_SESSION['Utilisateur'])) {
            if ($_SESSION['Utilisateur']->description == 'admin') {
                $telephone = new Telephone();
                $telephones = $telephone->getAllTelephones();
                $this->render('admin', compact('telephones'));
                return;
            }
        }
        header("Location: " . URI . "telephones/index");
    }

    public function supprimer($id_telephone)
    {
        if (isset($_SESSION['Utilisateur'])) {
            if ($_SESSION['Utilisateur']->description == 'admin') {
                if (is_numeric($id_telephone)) {
                    $telephone = new Telephone();
                    //$id_telephone = ["id_telephone" => $id_telephone];
                    $telephone->supprimer(compact('id_telephone'));
                    header("Location: " . URI . "telephones/gestionProduits");
                }
            }
        }
    }


    public
    function importImage($id_telephone)
    {
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
            $image_name = $_FILES["image"]["name"];
            $image_tmp = $_FILES["image"]["tmp_name"];
            $image_destination = "assets/images/" . basename($image_name); // Chemin de destination du fichier sur le serveur

            // Vérifier que le fichier est une image (facultatif mais recommandé)
            // images/a-2-1634829071.JPG
            $image_type = strtolower(pathinfo($image_destination, PATHINFO_EXTENSION));
            // jpg
            if (!in_array($image_type, array("jpg", "jpeg", "png", "gif", "webp"))) {
                echo "Seules les images JPG, JPEG, PNG et GIF sont autorisées.";
                exit();
            }

            // Déplacer l'image téléchargée vers le dossier spécifié
            if (move_uploaded_file($image_tmp, ROOT . $image_destination)) {
                $image = new Image();
                $data = [
                    "id_telephone" => $id_telephone,
                    "chemin_image" => $image_destination
                ];
                $image->ajouter($data);
            }
        }
    }
    public function gestionProduits()
    {
        $telephone = new Telephone();
        $telephones = $telephone->getAllTelephones();
        $this->render('gestionProduits', compact('telephones'));
    }

    public function modifierProduit($id_telephone)
    {

        if ($id_telephone && is_numeric($id_telephone)) {
            $id_telephone = $id_telephone;
            $tel = new Telephone();
            $telephone = $tel->getOneById(compact('id_telephone'));


            if (isset($_POST['modify'])) {
                unset($_POST['modify']);
                $_POST['id_telephone'] = $id_telephone;
                $res = $tel->updateTelById($_POST);
                if ($res) {
                    $this->importImage($id_telephone);
                    header("Location: " . URI . "telephones/gestionProduits");
                }
            }
        }
        $this->render('modifierProduit', compact('telephone'));
    }
    public function recherche()
    {
        if (isset($_POST['recherche'])) {
            $recherche = $_POST['recherche'];
            $telephone = new Telephone();
            $telephones = $telephone->getTelephoneByRecherche($recherche);
            if ($telephones && !empty($telephones)) {
                $this->render('index', compact('telephones'));
            } else {

                $this->render('notfound');
                exit;
            }
        }
    }
}
