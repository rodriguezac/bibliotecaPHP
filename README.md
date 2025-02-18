# Sistema de Biblioteca en PHP (POO)

Bienvenido a **Sistema de Biblioteca en PHP**, un proyecto diseñado para gestionar préstamos de libros desde la terminal, utilizando **Programación Orientada a Objetos (POO)** en PHP.

## Características Principales
- 📖 **Gestión de libros físicos**
- 🔑 **Separación de roles**: Administrador y Cliente
- 📦 **Préstamo y devolución de libros**
- 🖥️ **Interfaz basada en la línea de comandos (CLI)**
- 🏛 **Implementación siguiendo los principios de POO**

## 🛠️ Tecnologías Utilizadas
- **PHP 8+** 🐘
- **CLI (Interfaz de Línea de Comandos)**

## Estructura del Proyecto
```
bibliotecaPHP/
│── main.php          # Archivo principal (punto de entrada)
│── Libro.php         # Clase que representa un libro
│── Biblioteca.php    # Clase que gestiona los libros y préstamos
│── Usuario.php       # Clase que representa a un usuario
```

## Modo de Uso
Al ejecutar el script, puedes elegir entre **Modo Administrador** o **Modo Cliente**.

### Modo Administrador
📌 Opciones disponibles:
1. Mostrar todos los libros
2. Mostrar solo los libros disponibles
3. Volver al menú principal

### Modo Cliente
📌 Opciones disponibles:
1. Ver todos los libros
2. Ver solo los disponibles
3. Solicitar un préstamo
4. Devolver un libro
5. Volver al menú principal

## Ejemplo de Interacción
```
Seleccione su rol:
1. Administrador
2. Cliente
3. Salir
Ingrese el número de su rol: 2

Ingrese su nombre: Juan

Menú Cliente:
1. Mostrar libros
2. Mostrar solo disponibles
3. Solicitar préstamo
4. Devolver libro
5. Volver
Seleccione una opción: 3
Ingrese el título del libro a solicitar: El Principito

✅ Préstamo exitoso.
-----------------------------------
| Título: El Principito           |
| Autor: Antoine de Saint-Exupéry |
| Categoría: Ficción              |
| Disponible: No                  |
-----------------------------------
```
📢 ¡Gracias por tu interés!

Esperamos que este sistema de biblioteca en PHP te sea útil para el aprendizaje en este lenguaje como lo fue para mi. Si tienes sugerencias o mejoras, no dudes en compartirlas.

