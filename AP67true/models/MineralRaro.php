<?php

class MineralRaro extends EntidadEstelar
{
    protected string $dureza; // Escala de Mohs galáctica

    public function __construct(int $id, string $nombre, string $planetaOrigen, int $nivelEstabilidad, string $dureza)
    {
        parent::__construct($id, $nombre, $planetaOrigen, $nivelEstabilidad);
        $this->dureza = $dureza;
    }

    public function getDureza(): string 
    { 
        return $this->dureza; 
    }
    public function setDureza(string $dureza): void 
    { 
        $this->dureza = $dureza; 
    }

    public function reaccionar(): string
    {
        return 'Brilla con intensidad azulada';
    }

    public function getAtributoEspecialNombre(): string
    {
        return 'Dureza';
    }

    public function getAtributoEspecialValor(): string
    {
        return $this->dureza;
    }

    public function setAtributoEspecialValor(string $valor): void
    {
        $this->dureza = $valor;
    }
}

