<?php
    // Función para ofuscar el código JavaScript
    // Preserva la codificación UTF-8 para manejar acentos correctamente
    // y evita problemas de codificación
    // - Wichy Alonzo
    
    function obtenerJavaScriptOfuscado($rutaArchivo) {
        // Separar la ruta real del parámetro time()
        $partes = explode('=', $rutaArchivo);
        $rutaReal = $partes[0];
        
        if (!file_exists($rutaReal)) {
            // Aseguramos que el mensaje de error use UTF-8
            return 'console.error("Archivo JS no encontrado: ' . $rutaReal . '");';
        }
        
        // Leer el archivo forzando la codificación UTF-8
        $codigo = file_get_contents($rutaReal);
        
        // Si el archivo no está en UTF-8, convertirlo
        if (!mb_check_encoding($codigo, 'UTF-8')) {
            $codigo = mb_convert_encoding($codigo, 'UTF-8', mb_detect_encoding($codigo));
        }
        
        // Limpiar y ofuscar (preservando acentos)
        $codigo = preg_replace('/\/\/.*$/m', '', $codigo);
        $codigo = preg_replace('/\/\*[\s\S]*?\*\//', '', $codigo);
        $codigo = preg_replace('/\s+/', ' ', $codigo);
        $codigo = trim($codigo);
        
        // Codificar en base64 (que maneja correctamente los bytes, incluidos los caracteres especiales)
        return base64_encode($codigo);
    }
