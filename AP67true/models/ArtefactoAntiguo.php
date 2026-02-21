<?php

class ArtefactoAntiguo extends EntidadEstelar
{
    protected string $antiguedad; // Años luz

    public function __construct(int $id, string $nombre, string $planetaOrigen, int $nivelEstabilidad, string $antiguedad)
    {
        parent::__construct($id, $nombre, $planetaOrigen, $nivelEstabilidad);
        $this->antiguedad = $antiguedad;
    }

    public function getAntiguedad(): string 
    { 
        return $this->antiguedad; 
    }
    public function setAntiguedad(string $antiguedad): void 
    { 
        $this->antiguedad = $antiguedad; 
    }

    public function reaccionar(): string
    {
        return 'Reproduce un mensaje en una lengua muerta';
    }

    public function getAtributoEspecialNombre(): string
    {
        return 'Antigüedad';
    }

    public function getAtributoEspecialValor(): string
    {
        return $this->antiguedad;
    }

    public function setAtributoEspecialValor(string $valor): void
    {
        $this->antiguedad = $valor;
    }
}

