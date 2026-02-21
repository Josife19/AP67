<?php

class GestorEntidad
{
    public function __construct()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (!isset($_SESSION['entidades']) || !is_array($_SESSION['entidades'])) {
            $_SESSION['entidades'] = [];
        }

        if (!isset($_SESSION['next_id']) || !is_int($_SESSION['next_id'])) {
            $_SESSION['next_id'] = 1;
        }
    }

    public function crear(EntidadEstelar $entidad): void
    {
        $_SESSION['entidades'][] = $entidad;
    }

    public function generarId(): int
    {
        $id = $_SESSION['next_id'];
        $_SESSION['next_id']++;
        return $id;
    }

    /** @return EntidadEstelar[] */
    public function listar(): array
    {
        return $_SESSION['entidades'];
    }

    public function buscarPorId(int $id): ?EntidadEstelar
    {
        foreach ($_SESSION['entidades'] as $entidad) {
            if ($entidad instanceof EntidadEstelar && $entidad->getId() === $id) {
                return $entidad;
            }
        }
        return null;
    }

    public function actualizar(EntidadEstelar $actualizada): void
    {
        foreach ($_SESSION['entidades'] as $i => $entidad) {
            if ($entidad instanceof EntidadEstelar && $entidad->getId() === $actualizada->getId()) {
                $_SESSION['entidades'][$i] = $actualizada;
                return;
            }
        }
    }

    public function eliminar(int $id): void
    {
        foreach ($_SESSION['entidades'] as $i => $entidad) {
            if ($entidad instanceof EntidadEstelar && $entidad->getId() === $id) {
                unset($_SESSION['entidades'][$i]);
                $_SESSION['entidades'] = array_values($_SESSION['entidades']);
                return;
            }
        }
    }
}

