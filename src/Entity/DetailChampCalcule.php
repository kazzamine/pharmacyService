<?php

namespace App\Entity;

trait DetailChampCalcule {

    public function getPrixHt(): ?float {
        
        return (float) number_format(($this->prixunitaire * $this->quantite),2, '.', '');
    }

    public function getPrixTva(): ?float {
        
        $prixTva = (float) number_format((($this->getPrixHt() * $this->getTva()) / 100),2, '.', '');
        return (float) number_format(($prixTva - (($prixTva * $this->getRemise()) / 100)),2, '.', '');
    }
    
    
     public function getPrixTvaFormat() {
        $prixTva = ($this->getPrixHt() * $this->getTva()) / 100;
        $tva =$prixTva - (($prixTva * $this->getRemise()) / 100); 
        if ($tva<>0){
             return number_format($tva, 2, ',', ' ')  ;
       
        }
        return '-';
    }
    
    

    public function getPrixRemise(): ?float {
        return ((($this->getPrixHt())) * ($this->remise) / 100);
    }
    
    
     public function getPrixRemiseFormat(){
         if (((($this->getPrixHt())) * ($this->remise) / 100) !=0){
         
        return  number_format(((($this->getPrixHt())) * ($this->remise) / 100), 2, ',', ' ');
         }
         return '-';
    }

    public function getPrixTtc(): ?float {
        return $this->getPrixHt() + $this->getPrixTva() - $this->getPrixRemise();
    }
    
     public function getPrixTtcFormat(){
        return number_format($this->getPrixHt() + $this->getPrixTva() - $this->getPrixRemise(), 2, ',', ' ')    ;
    }


    public function getPrixTtcSansRemise(): ?float {
        return $this->getPrixHt() + $this->getPrixTva();
    }
    
     public function getPrixTtcSansRemiseFormat(): ?float {    
         return number_format($this->getPrixHt() + $this->getPrixTva(), 2, ',', ' ')    ;
    }
    
    

    public function getTvaFomat() {
        if (!empty($this->tva)) {
            return number_format($this->tva, 2, ',', ' ') . '%';
        } else
            return '-';
    }

    public function getRemiseFomat() {
        if (!empty($this->remise)) {
            return number_format($this->remise, 2, ',', ' ') . '%';
        } else
            return '-';
    }

    public function getQuantiteFormat() {

        return number_format($this->quantite, 2, ',', ' ') ;
    }

    public function getPrixunitaireFomat() {

        return number_format($this->prixunitaire, 2, ',', ' ');
    }

}
