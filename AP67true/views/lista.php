<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Expedición Nova - Censo</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 24px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; vertical-align: top; }
        th { background: #f5f5f5; }
        .acciones a { margin-right: 8px; }
        .paginacion a { margin-right: 6px; }
        .topbar { display:flex; align-items:center; justify-content:space-between; gap:12px; flex-wrap:wrap; }
    </style>
</head>
<body>

<div class="topbar">
    <h1>Logbook de la Expedición</h1>
    <a href="index.php?accion=crear"><strong>+ Registrar entidad</strong></a>
</div>

<p><strong>Tabla de resultados:</strong></p>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Tipo</th>
        <th>Nombre</th>
        <th>Planeta de origen</th>
        <th>Estabilidad (1-10)</th>
        <th>Atributo especial</th>
        <th>Reacción</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php if (empty($entidadesPagina)): ?>
        <tr><td colspan="8">No hay registros todavía. Pulse en "Registrar entidad" para crear uno nuevo.</td></tr>
    <?php endif; ?>

    <?php foreach ($entidadesPagina as $e): ?>
        <tr>
            <td><?= htmlspecialchars((string)$e->getId()) ?></td>
            <td><?= htmlspecialchars($e->getTipo()) ?></td>
            <td><?= htmlspecialchars($e->getNombre()) ?></td>
            <td><?= htmlspecialchars($e->getPlanetaOrigen()) ?></td>
            <td><?= htmlspecialchars((string)$e->getNivelEstabilidad()) ?></td>
            <td>
                <strong><?= htmlspecialchars($e->getAtributoEspecialNombre()) ?>:</strong>
                <?= htmlspecialchars($e->getAtributoEspecialValor()) ?>
            </td>
            <td><?= htmlspecialchars($e->reaccionar()) ?></td>
            <td class="acciones">
                <a href="index.php?accion=editar&id=<?= urlencode((string)$e->getId()) ?>">Editar</a>
                <a href="index.php?accion=eliminar&id=<?= urlencode((string)$e->getId()) ?>" onclick="return confirm('¿Expulsar este registro?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<div class="paginacion" style="margin-top: 12px;">
    <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
        <?php if ($i === $pagina): ?>
            <strong><?= $i ?></strong>
        <?php else: ?>
            <a href="index.php?page=<?= $i ?>"><?= $i ?></a>
        <?php endif; ?>
    <?php endfor; ?>
</div>

</body>
</html>
