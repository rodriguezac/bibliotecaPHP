<?php

// Clase Libro (Superclase)
class Libro {
    protected string $titulo;
    protected string $autor;
    protected string $categoria;
    protected bool $disponible;

    public function __construct(string $titulo, string $autor, string $categoria) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->categoria = $categoria;
        $this->disponible = true;
    }

    public function getTitulo(): string {
        return $this->titulo;
    }

    public function getAutor(): string {
        return $this->autor;
    }

    public function getCategoria(): string {
        return $this->categoria;
    }

    public function estaDisponible(): bool {
        return $this->disponible;
    }

    public function setDisponibilidad(bool $estado): void {
        $this->disponible = $estado;
    }

    public function mostrarInfo(): string {
        return "-----------------------------------\n" .
               "| Título: {$this->titulo}\n" .
               "| Autor: {$this->autor}\n" .
               "| Categoría: {$this->categoria}\n" .
               "| Disponible: " . ($this->disponible ? "Sí" : "No") . "\n" .
               "-----------------------------------\n";
    }
}

