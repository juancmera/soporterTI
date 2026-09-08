# Mesa de Ayuda - Sistema de Registro y Consulta de Incidentes

**Actividad Integradora 3 - Aplicación Web con PHP, MySQL y MVC**

Aplicación web para el registro y seguimiento de incidentes de soporte técnico
en una unidad académica. Permite a los usuarios reportar una incidencia mediante
un formulario validado y consultar el listado de incidentes registrados, en una tabla resumen por estado.

---

## Tabla de contenidos

- [Descripción](#descripción)
- [Tecnologías](#tecnologías)
- [Funcionalidades](#funcionalidades)
- [Arquitectura MVC](#arquitectura-mvc)
- [Estructura del proyecto](#estructura-del-proyecto)
- [Base de datos](#base-de-datos)
- [Instalación](#instalación)
- [Uso](#uso)
- [Validaciones](#validaciones)
- [Seguridad](#seguridad)
- [Control de versiones](#control-de-versiones)
- [Cumplimiento de requisitos](#cumplimiento-de-requisitos)
- [Autor](#autor)

---

## Descripción

El sistema registra incidentes de soporte técnico dentro de una
facultad. Un usuario completa el formulario con sus datos y el detalle del
problema; el incidente queda almacenado en MySQL con estado inicial `Pendiente`
y puede consultarse desde el listado general.

El flujo de la aplicación sigue el patrón Modelo–Vista–Controlador:

```
Vista → Controlador → Modelo → Base de datos
```

---

## Tecnologías

| Componente | Tecnología |
|---|---|
| Lenguaje de servidor | PHP 8 |
| Base de datos | MySQL |
| Acceso a datos | PDO con sentencias preparadas |
| Marcado | HTML5 semántico |
| Estilos | Bootstrap 5.3.3 (CDN) + hoja propia |
| Iconografía | Bootstrap Icons 1.11.3 |
| Interactividad | JavaScript (ES6, sin dependencias) |
| Servidor local | XAMPP (Apache + MySQL) |

---

## Funcionalidades

### Registro de incidentes
Formulario con ocho campos agrupados en dos bloques (`fieldset`): datos del
solicitante y detalle de la incidencia. Incluye validación en el navegador antes
del envío, contador de caracteres en la descripción y filtrado de dígitos en el
campo de extensión.

### Consulta de incidentes
Tabla HTML con el listado completo ordenado por fecha descendente. Muestra
código de incidente, asunto, solicitante, tipo, prioridad, estado y fecha.
La prioridad y el estado se representan con distintivos de color.

### Tablero de resumen
La página de inicio muestra cuatro contadores calculados con una consulta
agregada (`GROUP BY estado`): finalizados, pendientes, en espera y total.

### Búsqueda (funcionalidad opcional)
Filtro en tiempo real sobre el listado, implementado en el cliente
(`assets/js/search.js`). Busca por código, asunto, solicitante
normalizando tildes y mayúsculas. Incluye contador de coincidencias.


---

## Arquitectura MVC

### Modelo - `models/Ticket.php`

Clase `Tickets`. Única capa que ejecuta SQL. Recibe la conexión PDO por
constructor.

| Método | Responsabilidad |
|---|---|
| `saveTicket(array $data): bool` | Inserta un incidente mediante sentencia preparada. Devuelve `true` si la operación tuvo éxito. |
| `tickets(): array` | Devuelve todos los incidentes ordenados por fecha descendente. Selecciona columnas explícitas en lugar de `SELECT *`. |
| `summary(): array` | Cuenta incidentes agrupados por estado y calcula el total. Inicializa las claves en cero para que la vista funcione aunque un estado no tenga registros. |

### Controlador - `controllers/TicketController.php`

Clase `TicketController`. Recibe las acciones del usuario, solicita datos al
modelo y determina qué vista se muestra. No contiene SQL ni marcado HTML.

| Método | Responsabilidad |
|---|---|
| `home(): void` | Obtiene el resumen por estado y muestra el tablero. |
| `saveTicket()` | Muestra el formulario. Si la petición es POST, recoge los datos, solicita la inserción al modelo y redirige al listado. |
| `listTicket()` | Obtiene todos los incidentes y muestra la tabla. |
| `renderView($viewName, $data)` | Método auxiliar privado. Extrae los datos en variables y ensambla cabecera, contenido y pie. |

### Vista - `views/`

Separada en dos grupos:

- **`views/layouts/`** — piezas reutilizables: documento HTML, cabecera con
  navegación y pie de página.
- **`views/pages/`** — contenido de cada pantalla: inicio, formulario de
  registro y listado.

Las vistas solo imprimen los datos que reciben del controlador. Todo valor
proveniente de la base se escapa con `htmlspecialchars()`.

### Enrutamiento - `index.php`

Punto de entrada único. Lee el parámetro `action` de la URL y delega en el
método correspondiente del controlador.

| URL | Acción |
|---|---|
| `index.php` | Página de inicio con el tablero |
| `index.php?action=create` | Formulario de registro |
| `index.php?action=list` | Listado de incidentes |

---

## Estructura del proyecto

```
soporteTI/
├── index.php                        Punto de entrada y enrutador
│
├── config/
│   └── database.php                 Clase Database, conexión PDO
│
├── controllers/
│   └── TicketController.php         Coordina vistas y modelo
│
├── models/
│   └── Ticket.php                   Clase Tickets, operaciones con MySQL
│
├── views/
│   ├── layouts/
│   │   ├── main.php                 Documento HTML, hojas de estilo y scripts
│   │   ├── header.php               Barra de navegación
│   │   └── footer.php               Pie de página
│   └── pages/
│       ├── home.php                 Tablero de resumen y accesos
│       ├── createTicket.php         Formulario de registro
│       └── listTickets.php          Tabla de consulta y buscador
│
├── assets/
│   ├── css/
│   │   └── styles.css               Estilos propios
│   └── js/
│       ├── validation.js            Validaciones del formulario
│       └── search.js                Filtro del listado
│
└── sql/
    └── integradora.sql              Script de la base de datos
```

Cada archivo tiene una responsabilidad única. La lógica de acceso a datos, la
coordinación y la presentación están en capas separadas.

---

## Base de datos

**Nombre de la base:** `integradora`
**Tabla principal:** `tickets`

| Campo | Tipo | Descripción |
|---|---|---|
| `id` | `INT UNSIGNED AUTO_INCREMENT` | Clave primaria |
| `nombre` | `VARCHAR(100)` | Nombre del solicitante |
| `correo` | `VARCHAR(120)` | Correo electrónico |
| `extension` | `VARCHAR(4)` | Extensión telefónica |
| `area` | `VARCHAR(60)` | Área o dependencia |
| `asunto` | `VARCHAR(150)` | Título del incidente |
| `tipo_incidencia` | `VARCHAR(60)` | Categoría del problema |
| `prioridad` | `ENUM('Baja','Media','Alta')` | Prioridad asignada |
| `descripcion` | `TEXT` | Detalle del problema |
| `estado` | `ENUM('Pendiente','En espera','Finalizado')` | Estado, por defecto `Pendiente` |
| `fecha_registro` | `DATETIME` | Fecha de creación, automática |
| `fecha_actualizacion` | `DATETIME` | Fecha de última modificación, automática |

Índices sobre `estado` y `fecha_registro` para las consultas de resumen y
ordenamiento.

Codificación `utf8mb4` con cotejamiento `utf8mb4_unicode_ci`, para el correcto
manejo de tildes y caracteres especiales del español.

El script incluye registros de ejemplo para poder probar el listado y el tablero
inmediatamente después de la instalación.

---

## Instalación

### Requisitos

- XAMPP con PHP 8 o superior y MySQL
- Navegador web actualizado
- Conexión a internet para las hojas de estilo de Bootstrap desde CDN

### Pasos

1. **Copiar el proyecto**

   Coloque la carpeta `soporteTI` dentro del directorio `htdocs` de XAMPP:

   ```
   C:\xampp\htdocs\soporteTI
   ```

2. **Iniciar los servicios**

   Desde el panel de control de XAMPP, inicie **Apache** y **MySQL**.

3. **Crear la base de datos**

   Abra phpMyAdmin en `http://localhost/phpmyadmin`, cree una base llamada
   `integradora` y utilice la pestaña **Importar** para cargar el archivo
   `sql/integradora.sql`.

   Alternativa por consola:

   ```bash
   mysql -u root -p -e "CREATE DATABASE integradora CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
   mysql -u root -p integradora < sql/integradora.sql
   ```

4. **Verificar la conexión**

   El archivo `config/database.php` contiene los parámetros de conexión. Los
   valores por defecto corresponden a una instalación estándar de XAMPP:

   ```php
   private $host     = 'localhost';
   private $db_name  = 'integradora';
   private $username = 'root';
   private $password = '';
   ```

   **Nota:** es posible que el usuario `root` requiera contraseña:
   >
   > ```php
   > private $password = 'demo1713';

5. **Abrir la aplicación**

   ```
   http://localhost/soporteTI/
   ```

---

## Uso

**Registrar un incidente.** Desde el menú, seleccione *Registro de Incidente*.
Complete los campos obligatorios. Al enviar, si los datos son válidos, el
incidente se guarda y el sistema redirige al listado.

**Consultar incidentes.** Seleccione *Consulta de Incidentes* para ver la tabla
completa. Utilice el campo de búsqueda para filtrar por código, asunto,
solicitante o tipo.

**Ver el resumen.** La página de inicio muestra la cantidad de incidentes por
estado y el total registrado.

---

## Validaciones

Implementadas en `assets/js/validation.js` mediante un conjunto de reglas por
campo. Cada campo se valida al perder el foco y se revalida mientras el usuario
corrige, de modo que el mensaje de error desaparece por sí solo.

| Tipo de validación | Campo | Regla |
|---|---|---|
| Campo vacío | Todos los obligatorios | No se admiten valores en blanco |
| Longitud mínima | `nombre` | Al menos 5 caracteres |
| Longitud mínima | `asunto` | Al menos 15 caracteres |
| Longitud mínima y máxima | `descripcion` | Entre 20 y 500 caracteres |
| Campo numérico | `extension` | Solo dígitos, entre 3 y 4 |
| Valor incorrecto | `area`, `tipo_incidencia`, `prioridad` | No se admite la opción vacía del select |
| Correo electrónico | `correo` | Formato válido mediante expresión regular |
| Caracteres permitidos | `nombre` | Solo letras, tildes y espacios |

El formulario utiliza el atributo `novalidate` para desactivar la validación
nativa del navegador y que se apliquen las reglas propias del sistema. Los
atributos `required` se conservan para los lectores de pantalla.

Elementos de apoyo adicionales:

- Contador de caracteres en tiempo real sobre la descripción.
- Filtrado automático de caracteres no numéricos en la extensión.
- Desplazamiento y enfoque automático hacia el primer campo con error.

---

## Seguridad

**Sentencias preparadas.** La inserción utiliza marcadores con nombre
(`:nombre`, `:correo`) y PDO envía la consulta y los datos por separado, lo que
evita la inyección SQL.

**Escape de salida.** Todos los datos provenientes de la base se imprimen a
través de `htmlspecialchars()`, evitando la ejecución de código en el navegador
si alguien introdujera etiquetas HTML en un campo del formulario.

**Manejo de errores.** La conexión PDO está configurada con
`PDO::ERRMODE_EXCEPTION`, de modo que los errores de base de datos se detectan
en lugar de fallar en silencio.

**Redirección tras el registro.** Después de una inserción exitosa el sistema
redirige con `header('Location: ...')`, evitando que al recargar la página el
navegador reenvíe el formulario y duplique el registro.

---

## Control de versiones

Repositorio publicado en GitHub. Cada commit representa un avance funcional del
proyecto.

| # | Commit |
|---|---|
| 1 | Creación de estructura inicial del proyecto |
| 2 | Diseño de interfaz principal |
| 3 | Agregar validaciones con JavaScript |
| 4 | Configuración de conexión con MySQL |
| 5 | Implementación del modelo y controlador |
| 6 | Registro y consulta de datos desde MySQL |
| 7 | Configurar conexión con MySQL |
| 8 | Agregar documentación del proyecto |

> **Nota:** GitHub Pages no ejecuta PHP ni proporciona servidor MySQL, por lo
> que el proyecto no puede desplegarse en esa plataforma. Debe ejecutarse en un
> entorno local con XAMPP siguiendo las instrucciones de instalación.

---

## Cumplimiento de requisitos

| # | Requisito | Implementación |
|---|---|---|
| 1 | Estructura MVC | Carpetas `models/`, `views/` y `controllers/` con responsabilidades separadas |
| 2 | Estructura del proyecto | Organización por capas según el esquema propuesto |
| 3 | Base de datos MySQL | Base `integradora` con la tabla `tickets` |
| 4 | Conexión en archivo independiente | `config/database.php` con la clase `Database` |
| 5 | Formulario de registro | `views/pages/createTicket.php` |
| 6 | Validaciones con JavaScript | `assets/js/validation.js`, siete tipos de validación |
| 7 | Registro mediante MVC | Controlador recibe, modelo inserta, vista muestra el resultado |
| 8 | Consulta de registros | Tabla HTML en `views/pages/listTickets.php` |
| 9 | Interfaz organizada | Bootstrap 5 con HTML semántico y hoja de estilos propia |
| 10 | Organización del código | Un archivo por responsabilidad, sin lógica concentrada |
| 11 | Control de versiones | Repositorio en GitHub con commits progresivos |
| — | Opcional: búsqueda | Filtro en el listado mediante `assets/js/search.js` |

---

## Autor

**Juan Cristóbal Mera Vásquez**
Ingeniería en Sistemas Inteligentes — Universidad ECOTEC
Actividad Integradora 3 — Programación de Sistemas Web
