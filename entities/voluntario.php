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

    public function __construct($usuario=" ",$apellidos=" ",$dni=" ",$fechaNacimiento=" ",$direccion=" ",$n=" ",$portal=" ",$piso=" ",
                                $letra=" ",$zonaReside=" ", $correoElectronico=" ",$telef1=" ",$telef2=" ",$password1=" ",$password2=" ")
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


    public function getNombre() {return $this->usuario;}

    public function setNombre($nombre) { $this->usuario = $nombre;}

    public function getApellidos() {return $this->apellidos;}

    public function setApellidos($apellidos){$this->apellidos = $apellidos;}

    public function getDni(){ return $this->dni;}

    public function setDni($dni){ $this->dni = $dni;}

    public function getFechaNacimiento(){ return $this->fechaNacimiento;}

    public function setFechaNacimiento($fechaNacimiento){ $this->fechaNacimiento = $fechaNacimiento;}

    public function getDireccion(){ return $this->direccion;}

    public function setDireccion($direccion){ $this->direccion = $direccion;}

    public function getN(){ return $this->n;}

    public function setN($n){ $this->n = $n;}

    public function getPortal(){ return $this->portal;}

    public function setPortal($portal){ $this->portal = $portal;}

    public function getPiso(){ return $this->piso;}

    public function setPiso($piso){ $this->piso = $piso;}

    public function getLetra(){ return $this->letra;}

    public function setLetra($letra){ $this->letra = $letra;}

    public function getZonaReside(){ return $this->zonaReside;}

    public function setZonaReside($zonaReside){ $this->zonaReside = $zonaReside;}

    public function getCorreoElectronico(){ return $this->correoElectronico;}

    public function setCorreoElectronico($correoElectronico){ $this->correoElectronico = $correoElectronico;}

    public function getTelef1(){ return $this->telef1;}

    public function setTelef1($telef1){ $this->telef1 = $telef1;}

    public function getTelef2(){ return $this->telef2;}

    public function setTelef2($telef2){ $this->telef2 = $telef2;}

    public function getPassword1(){ return $this->password1;}

    public function setPassword1($password1){ $this->password1 = $password1;}

    public function getPassword2(){ return $this->password2;}

    public function setPassword2($password2){ $this->password2 = $password2;}
}