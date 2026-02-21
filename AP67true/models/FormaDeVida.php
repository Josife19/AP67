<?php

class FormaDeVida extends EntidadEstelar
{
    protected string $dieta; // Carbono, Silicio, Energía

    public function __construct(int $id, string $nombre, string $planetaOrigen, int $nivelEstabilidad, string $dieta)
    {
        parent::__construct($id, $nombre, $planetaOrigen, $nivelEstabilidad);
        $this->dieta = $dieta;
    }

    public function getDieta(): string 
    { 
        return $this->dieta; 
    }
    public function setDieta(string $dieta): void 
    { 
        $this->dieta = $dieta; 
    }

    public function reaccionar(): string
    {
        return 'Emite un pulso electromagnético';
    }

    public function getAtributoEspecialNombre(): string
    {
        return 'Dieta';
    }

    public function getAtributoEspecialValor(): string
    {
        return $this->dieta;
    }

    public function setAtributoEspecialValor(string $valor): void
    {
        $this->dieta = $valor;
    }
}

