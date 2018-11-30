Unidad de Trabajo 2.- Características del lenguaje PHP.

Enunciado.
Se trata de programar una aplicación para mantener una agenda en una única página web programada en PHP.

La agenda guardará únicamente dos datos de cada persona: su nombre y una dirección de correo electrónico. Además, no se podrán repetir nombres en la agenda.

Por simplicidad y para evitar añadir más validaciones, las mayúsculas, minúsculas y tildes son tenidas en cuenta. Por ejemplo, JUAN y juan serán nombres distintos y podrán tener dos registros diferentes en la agenda.

En la parte superior de la página web se mostrará el contenido de la agenda. En la parte inferior debe figurar un sencillo formulario con dos cuadros de texto, uno para el nombre y otro para la dirección de correo electrónico.

Cada vez que se envíe el formulario:

CASO 1: Si el nombre está vacío, se mostrará una advertencia.
CASO 2: Si el nombre que se introdujo NO existe en la agenda y la dirección de correo electrónico está informada se añadirá el nuevo registro a la agenda.
CASO 3: Si el nombre que se introdujo YA existe en la agenda y la dirección de correo electrónico está informada se actualizará el valor de la agenda.
CASO 4: Si el nombre que se introdujo YA existe en la agenda y no se indica dirección de correo electrónico, se eliminará de la agenda la entrada correspondiente a ese nombre.
NOTA ACLARATORIA: la información simplemente se muestra por pantalla, no se almacena en ninguna base de datos.

Criterios de puntuación. Total 10 puntos.
Se valorará la consecución de cada uno de los siguientes items con la siguiente puntuación:

Generar la estructura de la página PHP.  (0,5 pto)
Mostrar los contactos existentes en la agenda. (1 pto)
Generar el formulario de introducción de nuevo contacto. (1 pto)
Introducir los datos de la agenda como campos ocultos en el formulario. (1 pto)
Comprobar los datos enviados por el formulario, mostrando una advertencia cuando sea necesario (caso 1). (1 pto)
Introducir en la agenda los datos de un nuevo contacto (caso 2). (1 pto)
Modificar el correo electrónico de un contacto ya existente (caso 3). (1 pto)
Eliminar de la agenda un contacto (caso 4). (1 pto)
Utilizar un array asociativo. (1 pto)
Introducir comentarios en el código. Este apartado es fundamental y demuestra que el alumno ha entendido cada uno de los recursos utilizados en la práctica. (1,5 pto)
