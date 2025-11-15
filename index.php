<!-- Plantilla HTML Basica
    Codigo JS ofuscadpo en main.js
    Se agregar el Time para evitar cacheo
    Y el codigo js se actualiza automaticamente -->
    
<?php include 'ofuscar.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Etiquetas de Meta Agrega las que quieras-->
    <title>Tarjeta de Lealtad</title>
    
</head>
<body class="bg-black text-white flex flex-col items-center min-h-screen p-4">
    <script>
        (function() {
            var codigo = '<?php echo obtenerJavaScriptOfuscado('assets/js/main.js=' . time()); ?>';
            eval(atob(codigo));
        })();
    </script>
</body>
</html>