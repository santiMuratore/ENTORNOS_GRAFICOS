# Conceptos Fundamentales de CSS

## 1. ¿Qué es CSS y para qué se usa?

**CSS** (*Cascading Style Sheets* o Hojas de Estilo en Cascada) es un lenguaje de diseño utilizado para definir y controlar la presentación visual de un documento estructurado en HTML o XML. 

Su función principal es separar la **estructura y contenido** de una página web (HTML) de su **aspecto visual** (CSS), como colores, fuentes, márgenes, alineaciones, distribuciones de diseño (*layouts*) y adaptabilidad a pantallas de distintas dimensiones (diseño responsivo).

---

## 2. Estructura y funcionamiento de las reglas CSS

CSS opera mediante **reglas de estilo**. Una regla consta de un **selector** que indica a qué elemento(s) HTML se aplicará el diseño, seguido de un **bloque de declaraciones** delimitado por llaves `{}`.

Dentro del bloque de declaraciones se definen una o más parejas de **propiedad: valor;**, donde la propiedad especifica qué aspecto cambiar y el valor indica cómo se modificará.

```css
/* Sintaxis general */
selector {
  propiedad: valor;
  propiedad2: valor2;
}

/* Ejemplo concreto */
p {
  color: blue;
  font-size: 16px;
}
```

* **Selector (`p`):** Apunta a todos los párrafos de la página.
* **Propiedad (`color`):** Indica qué atributo visual se modifica.
* **Valor (`blue`):** Define el estado final del atributo.

---

## 3. Las tres formas de dar estilo a un documento HTML

1. **Estilos en línea (*Inline Styles*):** Se aplican directamente sobre un elemento HTML específico mediante el atributo `style`.
   ```html
   <p style="color: red; font-weight: bold;">Texto con estilo en línea.</p>
   ```

2. **Estilos internos (*Internal / Embedded Styles*):** Se ubican dentro de una etiqueta `<style>` situada en la sección `<head>` del documento HTML.
   ```html
   <head>
     <style>
       h1 {
         color: green;
       }
     </style>
   </head>
   ```

3. **Estilos externos (*External Stylesheet*):** Los estilos se escriben en un archivo separado con extensión `.css` y se vinculan al documento HTML mediante la etiqueta `<link>` en el `<head>`. **Es la forma recomendada para mantener el código organizado y reutilizable.**
   ```html
   <head>
     <link rel="stylesheet" href="estilos.css">
   </head>
   ```

---

## 4. Selectores más utilizados y ejemplos

| Tipo de selector | Descripción | Ejemplo CSS | Elemento HTML coincidente |
| :--- | :--- | :--- | :--- |
| **Universal** | Selecciona todos los elementos de la página. | `* { margin: 0; }` | Todos los elementos HTML. |
| **Etiqueta (o Tipo)** | Selecciona todos los elementos por su nombre de etiqueta HTML. | `h2 { color: navy; }` | `<h2>Título</h2>` |
| **Clase** | Selecciona los elementos que tengan una clase específica (indicado con un punto `.`). Se puede reutilizar. | `.boton { background: gold; }` | `<button class="boton">Click</button>` |
| **ID** | Selecciona un único elemento único mediante su identificador (indicado con `#`). | `#encabezado { background: black; }` | `<header id="encabezado"></header>` |
| **Atributo** | Selecciona elementos basándose en sus atributos HTML o sus valores. | `input[type="text"] { border: 1px solid gray; }` | `<input type="text">` |
| **Agrupado** | Aplica los mismos estilos a múltiples selectores separados por comas. | `h1, h2, p { font-family: sans-serif; }` | Todos los `<h1>`, `<h2>` y `<p>`. |

---

## 5. Pseudo-clases y sus usos en vínculos

Una **pseudo-clase** es una palabra clave añadida a un selector que especifica un **estado especial** del elemento seleccionado (por ejemplo, cuando el usuario pasa el cursor por encima, un elemento enfocado o un enlace visitado). Se identifican por llevar dos puntos `:` antes del nombre del estado.

### Pseudo-clases habituales en enlaces (`<a>`):

* `:link` — Aplica estilos a enlaces que aún no han sido visitados.
* `:visited` — Aplica estilos a enlaces que el usuario ya ha visitado.
* `:hover` — Se activa cuando el usuario posiciona el puntero sobre el enlace sin hacer clic.
* `:active` — Se activa en el instante en que el usuario presiona clic sobre el enlace.

```css
/* Estado inicial por defecto */
a:link {
  color: blue;
  text-decoration: none;
}

/* Enlace interactivo al pasar el mouse */
a:hover {
  color: red;
  text-decoration: underline;
}

/* Enlace mientras es presionado */
a:active {
  color: green;
}

/* Enlace ya visitado */
a:visited {
  color: purple;
}
```

---

## 6. ¿Qué es la herencia?

La **herencia** es el mecanismo mediante el cual ciertas propiedades CSS aplicadas a un elemento padre son transmitidas automáticamente a sus elementos hijos dentro del árbol del DOM.

Por ejemplo, si se aplica la propiedad `font-family` o `color` al elemento `<body>`, todos los elementos contenidos dentro del cuerpo de la página (como `<p>`, `<h1>`, `<div>`) heredarán esos estilos salvo que tengan una regla propia que especifique lo contrario.

* **Propiedades que se heredan comúnmente:** Texto y tipografía (`color`, `font-family`, `font-size`, `line-height`, `text-align`).
* **Propiedades que NO se heredan:** Modelo de caja y posicionamiento (`margin`, `padding`, `border`, `width`, `height`, `background`).

---

## 7. El proceso denominado Cascada

La **cascada** es el algoritmo que utiliza CSS para resolver conflictos cuando dos o más reglas se aplican al mismo elemento HTML y modifican la misma propiedad. Determina cuál regla tiene prioridad a través de los siguientes criterios (evaluados en orden):

1. **Importancia e Origen:** Las declaraciones marcadas con `!important` tienen la máxima prioridad sobre cualquier otra regla estándar.
2. **Especificidad del selector:** Un selector más específico anula a uno más general. El orden de peso de menor a mayor es:
   * Selectores universales (`*`).
   * Selectores de etiqueta (`p`, `div`).
   * Selectores de clase (`.clase`), atributo y pseudo-clase.
   * Selectores de ID (`#mi-id`).
   * Estilos en línea (`style=""`) asignados directamente en el HTML.
3. **Orden de aparición:** Si dos reglas tienen exactamente la misma especificidad, se aplica la última regla escrita en el archivo CSS (la que aparece más abajo en el código).