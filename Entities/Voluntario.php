<?php
/**
 * Created by PhpStorm.
 * User: eroca
 * Date: 16/04/2019
 * Time: 22:08
 */

class Voluntario
{
    private $usuario;
    private $apellidos;
    private $dni;
    private $fechaNacimiento;
    private $direccion;
    private $n;
    private $portal;
    private $piso;
    private $letra;
    private $zonaReside;
    private $correoElectronico;
    private $telef1;
    private $telef2;
    private $password1;
    private $password2;

    public function __construct($usuario=" ",$apellidos=" ",$dni=" ",$fechaNacimiento=" ",$direccion=" ",$n=" ",$portal=" ",$piso=" ",$letra=" ",$zonaReside=" ", $correoElectronico=" ",$telef1=" ",$telef2=" ",$password1=" ",$password2=" ")
    {
        $this->usuario=$usuario;
        $this->apellidos=$apellidos;
        $this->dni=$dni;
        $this->fechaNacimiento=$fechaNacimiento;
        $this->direccion=$direccion;
        $this->n=$n;
        $this->portal=$portal;
        $this->piso=$piso;
        $this->letra=$letra;
        $this->zonaReside=$zonaReside;
        $this->correoElectronico=$correoElectronico;
        $this->telef1=$telef1;
        $this->telef2=$telef2;
        $this->password1=$password1;
        $this->password2=$password2;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->usuario;
    }

    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->usuario = $nombre;
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
    public function getZonaReside()
    {
        return $this->zonaReside;
    }

    /**
     * @param string $zonaReside
     */
    public function setZonaReside($zonaReside)
    {
        $this->zonaReside = $zonaReside;
    }

    /**
     * @return string
     */
    public function getCorreoElectronico()
    {
        return $this->correoElectronico;
    }

    /**
     * @param string $correoElectronico
     */
    public function setCorreoElectronico($correoElectronico)
    {
        $this->correoElectronico = $correoElectronico;
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
    public function getPassword1()
    {
        return $this->password1;
    }

    /**
     * @param string $password1
     */
    public function setPassword1($password1)
    {
        $this->password1 = $password1;
    }

    /**
     * @return string
     */
    public function getPassword2()
    {
        return $this->password2;
    }

    /**
     * @param string $password2
     */
    public function setPassword2($password2)
    {
        $this->password2 = $password2;
    }

    public function mostrar()
    {
        echo "nombre ".$this->nombre." apellidos ".$this->apellidos." dni ".$this->dni." fecha Nacimiento ".$this->fechaNacimiento." direccion ".$this->direccion.
            " n ".$this->n." portal ".$this->portal." letra ".$this->letra." zonaReside ".$this->zonaReside." correoElectronico ".$this->correoElectronico.
            " telefono 1 ".$this->telef1." telefono 2 ".$this->telef2." password 1 ".$this->password1." password 2 ".$this->password2;
    }
}