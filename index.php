<!DOCTYPE html>
<html>
<head>
    <title>Cuestionario</title>
</head>
<body>
    <h1>Cuestionario</h1>
    <form action="verificar.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        <label for="documento">Documento:</label>
        <input type="text" id="documento" name="documento" required><br><br>
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required><br><br>
        
        <?php for ($i = 1; $i <= 9; $i++) { ?>
            <label for="pregunta<?php echo $i; ?>">Pregunta <?php echo $i; ?>:</label>
            <input type="radio" id="si<?php echo $i; ?>" name="pregunta<?php echo $i; ?>" value="SI">SI
            <input type="radio" id="no<?php echo $i; ?>" name="pregunta<?php echo $i; ?>" value="NO">NO<br><br>
        <?php } ?>
        
        <input type="submit" value="Verificar">
    </form>
</body>
</html>