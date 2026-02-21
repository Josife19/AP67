<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $modo === 'editar' ? 'Editar entidad' : 'Registrar entidad' ?> - Expedición Nova</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 24px; }
        form { max-width: 720px; }
        label { display:block; margin-top: 10px; }
        input, select { width: 100%; padding: 8px; box-sizing: border-box; }
        .row { display:grid; grid-template-columns: 1fr 1fr; gap: 12px; }
        .acciones { margin-top: 16px; display:flex; gap: 10px; }
        @media (max-width: 700px) { .row { grid-template-columns: 1fr; } }
    </style>
</head>
<body>

<h1><?= $modo === 'editar' ? 'Modificación (Update)' : 'Registro (Create)' ?></h1>

<form method="post" action="index.php?accion=<?= $modo === 'editar' ? 'editar' : 'crear' ?>">

    <?php if ($modo === 'editar' && $entidad): ?>
        <input type="hidden" name="id" value="<?= htmlspecialchars((string)$entidad->getId()) ?>">
        <input type="hidden" name="tipo" value="<?= htmlspecialchars($entidad->getTipo()) ?>">
    <?php endif; ?>

    <div class="row">
        <div>
            <label>Tipo de entidad</label>
            <?php if ($modo === 'editar' && $entidad): ?>
                <input type="text" value="<?= htmlspecialchars($entidad->getTipo()) ?>" disabled>
            <?php else: ?>
                <select name="tipo" required>
                    <option value="">-- Selecciona --</option>
                    <option value="FormaDeVida">Forma de Vida</option>
                    <option value="MineralRaro">Mineral Raro</option>
                    <option value="ArtefactoAntiguo">Artefacto Antiguo</option>
                </select>
            <?php endif; ?>
        </div>

        <div>
            <label>Nivel de estabilidad (1-10)</label>
            <input type="number" name="estabilidad" min="1" max="10" required
                   value="<?= $entidad ? htmlspecialchars((string)$entidad->getNivelEstabilidad()) : '' ?>">
        </div>
    </div>

    <div class="row">
        <div>
            <label>Nombre</label>
            <input type="text" name="nombre" required value="<?= $entidad ? htmlspecialchars($entidad->getNombre()) : '' ?>">
        </div>
        <div>
            <label>Planeta de origen</label>
            <input type="text" name="planeta" required value="<?= $entidad ? htmlspecialchars($entidad->getPlanetaOrigen()) : '' ?>">
        </div>
    </div>

    <label>
        <?php
        if ($modo === 'editar' && $entidad) {
            echo htmlspecialchars($entidad->getAtributoEspecialNombre());
        } else {
            echo 'Atributo especial (según tipo)';
        }
        ?>
    </label>
    <input type="text" name="especial" required
           value="<?= $entidad ? htmlspecialchars($entidad->getAtributoEspecialValor()) : '' ?>">

    <div class="acciones">
        <button type="submit"><?= $modo === 'editar' ? 'Guardar cambios' : 'Registrar' ?></button>
        <a href="index.php">Volver al censo</a>
    </div>

    <p style="margin-top:12px; color:#555;">
        Nota: la validación robusta y el CSS sci-fi son desafíos opcionales en el PDF y aquí no se incluyen.
    </p>
</form>

</body>
</html>
