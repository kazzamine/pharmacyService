<?php
// src/Entity/AHistorias.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\AHistoriasRepository::class)]
class AHistorias
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $numorden;

    #[ORM\Column(type: 'integer')]
    private $historia;

    #[ORM\Column(type: 'string', length: 1)]
    private $tipodoc;

    #[ORM\Column(type: 'string', length: 20)]
    private $numdoc;

    #[ORM\Column(type: 'string', length: 255)]
    private $aseguradora;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $numseguro;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $fechavalaseg;

    #[ORM\Column(type: 'string', length: 1, nullable: true)]
    private $tipoexencion;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $fechafinexencion;

    #[ORM\Column(type: 'string', length: 255)]
    private $nombre;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $apellido1;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $apellido2;

    #[ORM\Column(type: 'string', length: 1)]
    private $sexo;

    #[ORM\Column(type: 'datetime')]
    private $fechanac;

    #[ORM\Column(type: 'string', length: 20)]
    private $telefono1;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $telefono2;

    #[ORM\Column(type: 'string', length: 1)]
    private $estadocivil;

    #[ORM\Column(type: 'datetime')]
    private $fechaasignacion;

    #[ORM\Column(type: 'string', length: 255)]
    private $direccion;

    #[ORM\Column(type: 'string', length: 255)]
    private $pais;

    #[ORM\Column(type: 'string', length: 10)]
    private $codpostal;

    #[ORM\Column(type: 'string', length: 255)]
    private $poblacion;

    #[ORM\Column(type: 'string', length: 255)]
    private $provincia;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $raza;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $paisnac;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $provincianac;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $poblacionnac;

    #[ORM\Column(type: 'text', nullable: true)]
    private $comentario;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ambito;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $fechaexitus;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $centrosalud;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $npaciente;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $medicocabecera;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $telefonomedico;

    #[ORM\Column(type: 'string', length: 50)]
    private $usuariomod;

    #[ORM\Column(type: 'datetime')]
    private $fechamod;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $idprofesion;

    #[ORM\Column(type: 'string', length: 1, nullable: true)]
    private $tipopaciente;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $titular;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $numordendepen;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $gradoescolar;

    #[ORM\Column(type: 'string', length: 1, nullable: true)]
    private $clasificaih;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $idraza;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $provinciaproc;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $poblacionproc;

    #[ORM\Column(type: 'string', length: 1, nullable: true)]
    private $tipofinanciacion;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $numsegsoc;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $email;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nombre1;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $idhospital;

    #[ORM\Column(type: 'string', length: 1, nullable: true)]
    private $sip;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nommadre;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nompadre;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $numerodir;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $complementodir;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $idplano;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $idtipocalle;

    #[ORM\Column(type: 'string', length: 50)]
    private $usuariocrea;

    #[ORM\Column(type: 'datetime')]
    private $fechacrea;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $idsituconyugal;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $etnia;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $telefono3;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $telefono4;

    #[ORM\Column(type: 'string', length: 1, nullable: true)]
    private $cmce;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $contrasena;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nombrereplegal;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $fechanacreplegal;

    #[ORM\Column(type: 'string', length: 1, nullable: true)]
    private $tipodocreplegal;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $numdocreplegal;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $numinscrip;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $fechaafiliacion;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $nif;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $nmecanograf;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $nacionalidad;

    #[ORM\Column(type: 'string', length: 5, nullable: true)]
    private $gruposanguineo;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $idrh;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $fechafoto;

    #[ORM\Column(type: 'integer')]
    private $autogenerado;

    #[ORM\Column(type: 'boolean')]
    private $permitemail;

    #[ORM\Column(type: 'boolean')]
    private $permitesms;

    #[ORM\Column(type: 'datetime')]
    private $fechainscripcioncs;

    // Define getters and setters for each field...
}