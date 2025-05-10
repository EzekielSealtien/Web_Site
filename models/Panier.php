<?php

class Panier
{
    const PANIERS = "Paniers";

    public function __construct()
    {
        if (!(isset($_SESSION[self::PANIERS]))) {
            $_SESSION[self::PANIERS] = [];
        }
    }

    public function ajouter($id_telephone, $quantite)
    {
        $_SESSION[self::PANIERS][$id_telephone] = $quantite;
    }

    public function supprimer($id_telephone)
    {
        unset($_SESSION[self::PANIERS][$id_telephone]);
    }
    public function delAll()
    {
        unset($_SESSION[self::PANIERS]);
    }


    public function getAll()
    {
        $telephones = [];
        // [1,12]
        foreach ($_SESSION[self::PANIERS] as $id_telephone => $quantite) {
            $telephone = new Telephone();
            // [0,[12,telephone]]
            $telephones[] = [$quantite, $telephone->getOneById(compact('id_telephone'))];
        }
        return $telephones;
    }
}
