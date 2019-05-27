<?php
/**
 * Created by PhpStorm.
 * User: eroca
 * Date: 07/05/2019
 * Time: 21:29
 */

class Socio
{
    private $nombre;
    private $apellidos;
    private $dni;
    private $fechaNacimiento;
    private $direccion;
    private $n;
    private $portal;
    private $piso;
    private $letra;
    private $poblacion;
    private $codigoPostal;
    private $provincia;
    private $mail;
    private $telef1;
    private $telef2;
    private $password;
    private $aportacion;
    private $iban;
    private $banco;
    private $oficina;
    private $dc;
    private $cuenta;


    public function __construct($nombre="",$apellidos="",$dni="",$fechaNacimiento="",$direccion="",$n="",$portal="",$piso="", $letra="",$poblacion="", $codigoPostal="",$provincia="",$mail="",$telef1="",$telef2="",$password="", $aportacion="", $iban="", $banco="", $oficina="", $dc="", $cuenta="")
    {
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->dni=$dni;
        $this->fechaNacimiento=$fechaNacimiento;
        $this->direccion=$direccion;
        $this->n=$n;
        $this->portal=$portal;
        $this->piso=$piso;
        $this->letra=$letra;
        $this->poblacion=$poblacion;
        $this->provincia=$provincia;
        $this->mail=$mail;
        $this->telef1=$telef1;
        $this->telef2=$telef2;
        $this->password=$password;
        $this->aportacion=$aportacion;
        $this->iban=$iban;
        $this->banco=$banco;
        $this->oficina=$oficina;
        $this->dc=$dc;
        $this->cuenta=$cuenta;
        $this->codigoPostal=$codigoPostal;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param string $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @param string $dni
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    /**
     * @return string
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * @param string $fechaNacimiento
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    /**
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param string $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @return string
     */
    public function getN()
    {
        return $this->n;
    }

    /**
     * @param string $n
     */
    public function setN($n)
    {
        $this->n = $n;
    }

    /**
     * @return string
     */
    public function getPortal()
    {
        return $this->portal;
    }

    /**
     * @param string $portal
     */
    public function setPortal($portal)
    {
        $this->portal = $portal;
    }

    /**
     * @return string
     */
    public function getPiso()
    {
        return $this->piso;
    }

    /**
     * @param string $piso
     */
    public function setPiso($piso)
    {
        $this->piso = $piso;
    }

    /**
     * @return string
     */
    public function getLetra()
    {
        return $this->letra;
    }

    /**
     * @param string $letra
     */
    public function setLetra($letra)
    {
        $this->letra = $letra;
    }

    /**
     * @return string
     */
    public function getPoblacion()
    {
        return $this->poblacion;
    }

    /**
     * @param string $poblacion
     */
    public function setPoblacion($poblacion)
    {
        $this->poblacion = $poblacion;
    }

    /**
     * @return mixed
     */
    public function getCodigoPostal()
    {
        return $this->codigoPostal;
    }

    /**
     * @param mixed $codigoPostal
     */
    public function setCodigoPostal($codigoPostal)
    {
        $this->codigoPostal = $codigoPostal;
    }

    /**
     * @return string
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * @param string $provincia
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;
    }

    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return string
     */
    public function getTelef1()
    {
        return $this->telef1;
    }

    /**
     * @param string $telef1
     */
    public function setTelef1($telef1)
    {
        $this->telef1 = $telef1;
    }

    /**
     * @return string
     */
    public function getTelef2()
    {
        return $this->telef2;
    }

    /**
     * @param string $telef2
     */
    public function setTelef2($telef2)
    {
        $this->telef2 = $telef2;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getAportacion()
    {
        return $this->aportacion;
    }

    /**
     * @param string $aportacion
     */
    public function setAportacion($aportacion)
    {
        $this->aportacion = $aportacion;
    }

    /**
     * @return string
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @param string $iban
     */
    public function setIban($iban)
    {
        $this->iban = $iban;
    }

    /**
     * @return string
     */
    public function getBanco()
    {
        return $this->banco;
    }

    /**
     * @param string $banco
     */
    public function setBanco($banco)
    {
        $this->banco = $banco;
    }

    /**
     * @return string
     */
    public function getOficina()
    {
        return $this->oficina;
    }

    /**
     * @param string $oficina
     */
    public function setOficina($oficina)
    {
        $this->oficina = $oficina;
    }

    /**
     * @return string
     */
    public function getDc()
    {
        return $this->dc;
    }

    /**
     * @param string $dc
     */
    public function setDc($dc)
    {
        $this->dc = $dc;
    }

    /**
     * @return string
     */
    public function getCuenta()
    {
        return $this->cuenta;
    }

    /**
     * @param string $cuenta
     */
    public function setCuenta($cuenta)
    {
        $this->cuenta = $cuenta;
    }

}