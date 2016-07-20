<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 31/05/2016
 * Time: 01:40
 */

namespace App\general;


class constante
{
    public $HTTP              = "https://";
    public $URL               = "portail.cridip.com/";
    public $ASSETS            = "view/assets/";
    public $SOURCES           = "https://ns342142.ip-5-196-76.eu/gc/";
    public $NOM_SITE          = "PORTAIL CRIDIP";
}
class redirect extends constante
{
    /**
     * @param array $dos Il permet d'envoyer à la fonction la liste des dossiers à parcourir sous forme de tableau
     * @param bool|true $assets Permet d'insérer de manière automatique le dossier 'assets'
     * @param bool $sources Renvoie les informations vers le fichiers DataSources de CRIDIP
     * @return string Suivant le bool $assets, il retourne la redirection sous format de lien(string)
     */
    public function getUrl($dos = array(), $assets = true, $sources = false)
    {

        if($assets === true)
        {
            return $this->HTTP.$this->URL.$this->ASSETS.$this->parseArray($dos);
        }elseif($sources === true){
            return $this->SOURCES;
        }else{
            return $this->HTTP.$this->URL.$this->parseArray($dos);
        }

    }


    /**
     * @param $dos array Permet de parser sous forme string le tableau array=$dos
     * @return string retourne un format standard de link HTML
     */
    private function parseArray($dos)
    {
        return implode("/", $dos);
    }

    public function redirect($view = null, $sub = null, $data = null, $type = null, $service = null, $text = null){

        if(!empty($view)){$redirect = "index.php?view=".$view;}
        if(!empty($sub)){$redirect .= "&sub=".$sub;}
        if(!empty($data)){$redirect .= "&data=".$data;}
        if(!empty($type)){$redirect .= "&".$type."=".$service."&text=".$text;}

        header("Location: ".$this->getUrl(array(), false).$redirect);

    }

}