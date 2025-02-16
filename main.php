<?php
require_once "Biblioteca.php";
require_once "Usuario.php";

$biblioteca = new Biblioteca();

while (true) {
    echo "\nSeleccione su rol:\n1. Administrador\n2. Cliente\n3. Salir\n";
    $rol = readline("Ingrese el número de su rol: ");

    if ($rol == '1') {
        while (true) {
            echo "\nMenú Administrador:\n1. Mostrar libros\n2. Mostrar solo disponibles\n3. Volver\n";
            $opcion = readline("Seleccione una opción: ");
            switch ($opcion) {
                case '1':
                    $biblioteca->mostrarLibros();
                    break;
                case '2':
                    $biblioteca->mostrarLibros(true);
                    break;
                case '3':
                    break 2;
                default:
                    echo "Opción no válida.\n";
            }
        }
    } elseif ($rol == '2') {
        echo "\nIngrese su nombre: ";
        $nombre = readline();
        $usuario = new Usuario($nombre);

        while (true) {
            echo "\nMenú Cliente:\n1. Mostrar libros\n2. Mostrar solo disponibles\n3. Solicitar préstamo\n4. Devolver libro\n5. Volver\n";
            $opcion = readline("Seleccione una opción: ");
            switch ($opcion) {
                case '1':
                    $biblioteca->mostrarLibros();
                    break;
                case '2':
                    $biblioteca->mostrarLibros(true);
                    break;
                case '3':
                    $titulo = readline("Ingrese el título del libro a solicitar: ");
                    $biblioteca->solicitarPrestamo($titulo);
                    break;
                case '4':
                    $titulo = readline("Ingrese el título del libro a devolver: ");
                    $biblioteca->devolverLibro($titulo);
                    break;
                case '5':
                    break 2;
                default:
                    echo "Opción no válida.\n";
            }
        }
    } elseif ($rol == '3') {
        exit("Saliendo del sistema...\n");
    }
}
