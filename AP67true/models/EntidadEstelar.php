<?php

class EntidadEstelar
{
    protected int $id;
    protected string $nombre;
    protected string $planetaOrigen;
    protected int $nivelEstabilidad; // 1-10

    public function __construct(int $id, string $nombre, string $planetaOrigen, int $nivelEstabilidad)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->planetaOrigen = $planetaOrigen;
        $this->nivelEstabilidad = $nivelEstabilidad;
    }

    public function getId(): int 
    { 
        return $this->id; 
    }
    public function getNombre(): string 
    { 
        return $this->nombre; 
    }
    public function getPlanetaOrigen(): string 
    { 
        return $this->planetaOrigen; 
    }
    public function getNivelEstabilidad(): int 
    { 
        return $this->nivelEstabilidad; 
    }

    public function setNombre(string $nombre): void 
    { 
        $this->nombre = $nombre; 
    }
    public function setPlanetaOrigen(string $planetaOrigen): void 
    { 
        $this->planetaOrigen = $planetaOrigen; 
    }
    public function setNivelEstabilidad(int $nivelEstabilidad): void 
    { 
        $this->nivelEstabilidad = $nivelEstabilidad; 
    }

    public function getTipo(): string
    {
        return (new ReflectionClass($this))->getShortName();
    }

public function reaccionar(): string {
        return "La entidad estelar reacciona ante una situación dada.";
    }
public function getAtributoEspecialNombre(): string {
        return "Atributo especial";
    }
public function getAtributoEspecialValor(): string {
        return "Valor especial";
    }
public function setAtributoEspecialValor(string $valor): void {
        // Este método no hace nada en la clase base
    }
}

