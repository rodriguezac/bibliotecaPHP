<?php

require_once 'Libro.php';

class Biblioteca {
    private array $libros = [];

    public function __construct() {
        // Agregar libros de ejemplo
        $this->libros[] = new Libro("El Principito", "Antoine de Saint-Exupéry", "Ficción");
        $this->libros[] = new Libro("Don Quijote de la Mancha", "Miguel de Cervantes", "Clásico");
        $this->libros[] = new Libro("Harry Potter", "J.K. Rowling", "Fantasía");
    }

    public function mostrarLibros(): void {
        if (empty($this->libros)) {
            echo "No hay libros disponibles en la biblioteca.\n";
            return;
        }
        foreach ($this->libros as $libro) {
            echo $libro->mostrarInfo();
        }
    }

    public function agregarLibro(Libro $libro): void {
        $this->libros[] = $libro;
        echo "\nLibro agregado exitosamente.\n--Información:--\n" . $libro->mostrarInfo();
    }

    public function eliminarLibro(string $titulo): void {
        foreach ($this->libros as $index => $libro) {
            if (strcasecmp($libro->getTitulo(), $titulo) === 0) {
                echo "\nLibro eliminado exitosamente.\n--Información:--\n" . $libro->mostrarInfo();
                unset($this->libros[$index]);
                return;
            }
        }
        echo "Libro no encontrado.\n";
    }

    public function editarLibro(string $titulo): void {
        foreach ($this->libros as &$libro) {
            if (strcasecmp($libro->getTitulo(), $titulo) === 0) {
                echo "¿Qué desea editar?\n1. Título\n2. Autor\n3. Categoría\n4. Volver\n";
                $opcion = readline("Seleccione una opción: ");
                switch ($opcion) {
                    case '1':
                        $nuevoTitulo = readline("Nuevo título: ");
                        $libro = new Libro($nuevoTitulo, $libro->getAutor(), $libro->getCategoria());
                        break;
                    case '2':
                        $nuevoAutor = readline("Nuevo autor: ");
                        $libro = new Libro($libro->getTitulo(), $nuevoAutor, $libro->getCategoria());
                        break;
                    case '3':
                        $nuevaCategoria = readline("Nueva categoría: ");
                        $libro = new Libro($libro->getTitulo(), $libro->getAutor(), $nuevaCategoria);
                        break;
                    case '4':
                        return;
                    default:
                        echo "Opción no válida.\n";
                        return;
                }
                echo "\nLibro actualizado exitosamente.\n--Información:--\n" . $libro->mostrarInfo();
                return;
            }
        }
        echo "Libro no encontrado.\n";
    }

    public function buscarLibro(string $busqueda): void {
        $encontrados = [];
        foreach ($this->libros as $libro) {
            if (stripos($libro->getTitulo(), $busqueda) !== false || 
                stripos($libro->getAutor(), $busqueda) !== false || 
                stripos($libro->getCategoria(), $busqueda) !== false) {
                $encontrados[] = $libro;
            }
        }

        if (empty($encontrados)) {
            echo "No se encontraron libros.\n";
            return;
        }

        foreach ($encontrados as $libro) {
            echo $libro->mostrarInfo();
        }
    }

    public function solicitarPrestamo(string $titulo): void {
        foreach ($this->libros as $libro) {
            if (strcasecmp($libro->getTitulo(), $titulo) === 0 && $libro->estaDisponible()) {
                $libro->setDisponibilidad(false);
                echo "\nPréstamo exitoso.\n--Información:--\n" . $libro->mostrarInfo();
                return;
            }
        }
        echo "Libro no disponible o no encontrado.\n";
    }

    public function devolverLibro(string $titulo): void {
        foreach ($this->libros as $libro) {
            if (strcasecmp($libro->getTitulo(), $titulo) === 0 && !$libro->estaDisponible()) {
                $libro->setDisponibilidad(true);
                echo "\nLibro devuelto exitosamente.\n--Información:--\n" . $libro->mostrarInfo();
                return;
            }
        }
        echo "No se encontró el libro prestado.\n";
    }
}

?>
