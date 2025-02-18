<?php

require_once 'Biblioteca.php';
require_once 'Usuario.php';

$biblioteca = new Biblioteca();

while (true) {
    echo "\nBienvenido a la Biblioteca. Seleccione su rol:\n1. Administrador\n2. Cliente\n3. Salir\n";
    $rol = readline("Ingrese el número de su rol: ");

    if ($rol == '1') {
        while (true) {
            echo "\nMenú Administrador:\n1. Agregar libro\n2. Editar libro\n3. Eliminar libro\n4. Buscar libro\n5. Mostrar libros\n6. Volver\n";
            $opcion = readline("Seleccione una opción: ");
            switch ($opcion) {
                case '1':
                    $titulo = readline("Título: ");
                    $autor = readline("Autor: ");
                    $categoria = readline("Categoría: ");
                    echo "\n";
                    $biblioteca->agregarLibro(new Libro($titulo, $autor, $categoria));
                    break;
                case '2':
                    $titulo = readline("Ingrese el título del libro a editar: ");
                    $biblioteca->editarLibro($titulo);
                    break;
                case '3':
                    $titulo = readline("Ingrese el título del libro a eliminar: ");
                    $biblioteca->eliminarLibro($titulo);
                    break;
                case '4':
                    $busqueda = readline("Ingrese el título, autor o categoría del libro: ");
                    $biblioteca->buscarLibro($busqueda);
                    break;
                case '5':
                    $biblioteca->mostrarLibros();
                    break;
                case '6':
                    break 2;
                default:
                    echo "Opción no válida.\n";
            }
        }
    } elseif ($rol == '2') {
        while (true) {
            echo "\nMenú Cliente:\n1. Buscar libro\n2. Mostrar libros\n3. Solicitar préstamo\n4. Devolver libro\n5. Volver\n";
            $opcion = readline("Seleccione una opción: ");
            switch ($opcion) {
                case '1':
                    $busqueda = readline("Ingrese el título, autor o categoría del libro: ");
                    $biblioteca->buscarLibro($busqueda);
                    break;
                case '2':
                    $biblioteca->mostrarLibros();
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
        exit("Saliendo del sistema. Gracias por la visita...\n");
    }
}

?>
