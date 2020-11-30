<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Breadcrumb
{
    private $breadcrumbs = array();
    private $debut = '<nav aria-label="breadcrumb"><ol class="breadcrumb">';
    private $fin = '</ol></nav>';
    
    public function __construct($params = array())
    {
        if (count($params) > 0) {
            $this->initialize($params);
        }
    }
    
    private function initialize($params = array())
    {
        if (count($params) > 0) {
            foreach ($params as $key => $val) {
                if (isset($this->{'_' . $key})) {
                    $this->{'_' . $key} = $val;
                }
            }
        }
    }
    
    function ajouter_lien($titre, $href = "#")
    {
        if (!$titre)
            return;
        
        $this->breadcrumbs[] = array(
            'titre' => $titre,
            'href' => $href
        );
    }
    
    function rendu()
    {
        if ($this->breadcrumbs) {
            $breadcrumb = $this->debut;
            foreach ($this->breadcrumbs as $key => $crumb) {
                $other_key = array_keys($this->breadcrumbs);
                if (end($other_key) == $key) {
                    $breadcrumb .= '<li class="breadcrumb-item" aria-current="page">' . $crumb['titre'] . '</li>';
                } else {
                    $breadcrumb .= '<li class="breadcrumb-item"><a href="' . $crumb['href'] . '">' . $crumb['titre'] . '</a></li>';
                }
            }
            return $breadcrumb . $this->fin . PHP_EOL;
        }
        return '';
    }
}