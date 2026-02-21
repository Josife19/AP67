<?php

class EntidadController
{
    private GestorEntidad $gestor;

    public function __construct(GestorEntidad $gestor)
    {
        $this->gestor = $gestor;
    }

    public function index(): void
    {
        $entidades = $this->gestor->listar();

        $porPagina = 5; // requisito del PDF (ejemplo 5 por página)
        $total = count($entidades);
        $totalPaginas = max(1, (int)ceil($total / $porPagina));

        $pagina = (int)($_GET['page'] ?? 1);
        if ($pagina < 1) $pagina = 1;
        if ($pagina > $totalPaginas) $pagina = $totalPaginas;

        $entidadesPagina = array_slice($entidades, ($pagina - 1) * $porPagina, $porPagina);

        include __DIR__ . '/../views/lista.php';
    }

    public function crear(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tipo = $_POST['tipo'] ?? '';
            $nombre = trim((string)($_POST['nombre'] ?? ''));
            $planeta = trim((string)($_POST['planeta'] ?? ''));
            $estabilidad = (int)($_POST['estabilidad'] ?? 0);
            $especial = trim((string)($_POST['especial'] ?? ''));

            $id = $this->gestor->generarId();
            $entidad = $this->fabricarEntidad($tipo, $id, $nombre, $planeta, $estabilidad, $especial);

            if ($entidad !== null) {
                $this->gestor->crear($entidad);
            }

            header('Location: index.php');
            exit;
        }

        $modo = 'crear';
        $entidad = null;
        include __DIR__ . '/../views/form.php';
    }

    public function editar(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int)($_POST['id'] ?? 0);
            $tipo = (string)($_POST['tipo'] ?? '');
            $nombre = trim((string)($_POST['nombre'] ?? ''));
            $planeta = trim((string)($_POST['planeta'] ?? ''));
            $estabilidad = (int)($_POST['estabilidad'] ?? 0);
            $especial = trim((string)($_POST['especial'] ?? ''));

            $entidad = $this->fabricarEntidad($tipo, $id, $nombre, $planeta, $estabilidad, $especial);
            if ($entidad !== null) {
                $this->gestor->actualizar($entidad);
            }

            header('Location: index.php');
            exit;
        }

        $id = (int)($_GET['id'] ?? 0);
        $entidad = $this->gestor->buscarPorId($id);
        if ($entidad === null) {
            header('Location: index.php');
            exit;
        }

        $modo = 'editar';
        include __DIR__ . '/../views/form.php';
    }

    public function eliminar(): void
    {
        $id = (int)($_GET['id'] ?? 0);
        if ($id > 0) {
            $this->gestor->eliminar($id);
        }
        header('Location: index.php');
        exit;
    }

    private function fabricarEntidad(string $tipo, int $id, string $nombre, string $planeta, int $estabilidad, string $especial): ?EntidadEstelar
    {
        // Nota: el PDF sugiere validación robusta como opcional (no lo implementamos). Aun así,
        // dejamos unos mínimos para evitar errores.
        if ($nombre === '' || $planeta === '' || $estabilidad < 1) {
            return null;
        }

        switch ($tipo) {
            case 'FormaDeVida':
                return new FormaDeVida($id, $nombre, $planeta, $estabilidad, $especial);
            case 'MineralRaro':
                return new MineralRaro($id, $nombre, $planeta, $estabilidad, $especial);
            case 'ArtefactoAntiguo':
                return new ArtefactoAntiguo($id, $nombre, $planeta, $estabilidad, $especial);
            default:
                return null;
        }
    }
}

