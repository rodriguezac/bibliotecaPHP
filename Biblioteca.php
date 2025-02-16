<?php
require_once "Libro.php";

class Biblioteca {
    private array $libros = [];

    public function __construct() {
        $this->libros[] = new Libro("El Principito", "Antoine de Saint-Exupéry", "Ficción");
        $this->libros[] = new Libro("Don Quijote de la Mancha", "Miguel de Cervantes", "Clásico");
        $this->libros[] = new Libro("Cien años de soledad", "Gabriel García Márquez", "Realismo mágico");
    }

    public function mostrarLibros(bool $soloDisponibles = false): void {
        if (empty($this->libros)) {
            echo "No hay libros en la biblioteca.\n";
            return;
        }
        foreach ($this->libros as $libro) {
            if ($soloDisponibles && !$libro->estaDisponible()) {
                continue;
            }
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
        echo "No se encontró el libro o no está disponible.\n";
    }

    public function devolverLibro(string $titulo): void {
        foreach ($this->libros as $libro) {
            if (strcasecmp($libro->getTitulo(), $titulo) === 0 && !$libro->estaDisponible()) {
                $libro->setDisponibilidad(true);
                echo "\nLibro devuelto exitosamente.\n--Información:--\n" . $libro->mostrarInfo();
                return;
            }
        }
        echo "No se encontró el libro o ya está disponible.\n";
    }
}

