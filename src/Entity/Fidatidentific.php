<?php

// src/Entity/Fidatidentific.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\FidatidentificRepository::class)]
class Fidatidentific
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $iddatidentific;

    #[ORM\Column(type: 'integer')]
    private $numorden;

    #[ORM\Column(type: 'string', length: 1)]
    private $tipomovto;

    #[ORM\Column(type: 'integer')]
    private $anoepisodio;

    #[ORM\Column(type: 'integer')]
    private $numepisodio;

    #[ORM\Column(type: 'string', length: 5)]
    private $idcia;

    #[ORM\Column(type: 'string', length: 5)]
    private $idplano;

    #[ORM\Column(type: 'integer')]
    private $numordentitular;

    #[ORM\Column(type: 'string', length: 255)]
    private $titular;

    #[ORM\Column(type: 'string', length: 255)]
    private $direccion;

    #[ORM\Column(type: 'string', length: 10)]
    private $cpostal;

    #[ORM\Column(type: 'string', length: 255)]
    private $poblacion;

    #[ORM\Column(type: 'string', length: 255)]
    private $provincia;

    #[ORM\Column(type: 'string', length: 255)]
    private $pais;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $numseguro;

    #[ORM\Column(type: 'text', nullable: true)]
    private $observaciones;

    #[ORM\Column(type: 'string', length: 1)]
    private $liberado;

    #[ORM\Column(type: 'datetime')]
    private $fechaliberado;

    #[ORM\Column(type: 'string', length: 1)]
    private $cerrado;

    #[ORM\Column(type: 'datetime')]
    private $fechacierre;

    #[ORM\Column(type: 'string', length: 1)]
    private $auditando;

    #[ORM\Column(type: 'string', length: 50)]
    private $usuariomod;

    #[ORM\Column(type: 'datetime')]
    private $fechamod;

    #[ORM\Column(type: 'string', length: 1)]
    private $datoactivo;

    #[ORM\Column(type: 'datetime')]
    private $fechaepisodio;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $modopago;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $empresa;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $idciatarifa;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $idplanotarifa;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $idestadodatid;

    #[ORM\Column(type: 'datetime')]
    private $fechainicio;

    #[ORM\Column(type: 'datetime')]
    private $fechafin;

    #[ORM\Column(type: 'integer')]
    private $numeroobito;

    #[ORM\Column(type: 'string', length: 1)]
    private $parcial;

    #[ORM\Column(type: 'string', length: 1)]
    private $centrofac;

    #[ORM\Column(type: 'string', length: 5)]
    private $esvirtual;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $idpectipo;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $idpecdeman;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $tratamiento;

    #[ORM\Column(type: 'datetime')]
    private $fechafiliacion;

    #[ORM\Column(type: 'string', length: 20)]
    private $telefono1;

    #[ORM\Column(type: 'string', length: 1)]
    private $tipodoc;

    #[ORM\Column(type: 'string', length: 20)]
    private $numdoc;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $numinscrip;

    #[ORM\Column(type: 'integer')]
    private $idgradodepen;

    #[ORM\Column(type: 'text', nullable: true)]
    private $infoclinica;

    #[ORM\Column(type: 'string', length: 255)]
    private $medico;

    #[ORM\Column(type: 'string', length: 255)]
    private $dossier;

    #[ORM\Column(type: 'string', length: 50)]
    private $usuariocrea;

    #[ORM\Column(type: 'datetime')]
    private $fechacrea;

    #[ORM\Column(type: 'integer')]
    private $idunidad;

    #[ORM\Column(type: 'string', length: 1)]
    private $iditipofactdi;

    #[ORM\Column(type: 'integer')]
    private $linea;

    // Define getters and setters for each field...
}
