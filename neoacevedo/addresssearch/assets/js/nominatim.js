/*
 * Copyright (C) 2021 Néstor Acevedo <clientes at neoacevedo.co>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Este método invocará el servicio web de direcciones, generará la lista y la almacenará en 
 * "dirContainer" para que el usuario interactúe con ella.
 * @param {object} inp el input text.
 * @link https://www.w3schools.com/howto/howto_js_autocomplete.asp 
 */
function nominatimautosuggest(inp) {
    // variable que almacena el ID del elemento de la lista que estamos enfocando.
    var currentFocus;

    /* Añadir el eventListener para el input text, se ejecuta cuando alguien escriba */
    inp.addEventListener("input", function (e) {
        var parentDiv, elementDiv, i, val = this.value;
        // Cerrar cualquier lista abierta
        closeAllList();
        // No hacer nada si no hay texto escrito
        if (!val) {
            return false;
        }

        currentFocus = -1;

        // Vamos a llamar al servicio web, pero la condición es que el mínimo de caracteres sea de 5 (pueden ser más o menos).
        if (val.length >= 5) {
            // Creamos un elemento div que contendrá los ítems
            parentDiv = document.createElement("div");
            parentDiv.setAttribute("id", "autocomplete-list"); //<div id="autocomplete-list"
            parentDiv.setAttribute("class", "autocomplete-items"); //<div id="autocomplete-list" class="autocomplete-items"

            // Adjuntamos este div como hijo del contenedor de direcciones
            nomintaimContainer.appendChild(parentDiv);

            // Usamos el servicio de Open Street Maps, Nominatim
            fetch('https://nominatim.openstreetmap.org/search?format=json&street=' + val + '&limit=' + nominatimlimit,
                {
                    method: 'GET'
                }).then(response => {
                    var json = response.json();
                    return json;
                }).then(json => {
                    // Si el json no contiene nada, no hacemos nada
                    if (json[0] === 'undefined') {

                    } else {
                        // iteramos por cada elemento dentro del json devuelto
                        json.forEach(function (element) {
                            // Creamos un elemento div para cada elemento que coincida con lo que se está escribiendo
                            elementDiv = document.createElement("div");
                            // Poner en negrita las letras coincidentes
                            // display_name es el elemento en el array del json que contiene una dirección.
                            elementDiv.innerHTML = "<strong>" + element.display_name.substr(0, val.length) + "</strong>";
                            // <div><strong>Texto Coincidente</strong> texto adicional
                            elementDiv.innerHTML += element.display_name.substr(val.length);
                            // <div><strong>Texto Coincidente</strong> texto adicional <input type="hidden" value="Texto Coincidente texto adicional" />
                            elementDiv.innerHTML += '<input type="hidden" value="' + element.display_name + '" />';

                            // Si el usuario hace clic sobre el elemento, insertamos el valor del input hidden en el input text de la dirección
                            elementDiv.addEventListener('click', function (e) {
                                inp.value = this.getElementsByTagName("input")[0].value;
                                // Cerramos la lista
                                closeAllList();
                            });

                            // insertamos este elemento en el div padre
                            parentDiv.appendChild(elementDiv);
                        });
                    }
                });
        }
    });

    // Vamos a desplazarnos por la lista cuando pulsemos las flechas arriba/abajo
    inp.addEventListener("keydown", function (e) {
        var x = document.getElementById("autocomplete-list");
        if (x) x = x.getElementsByTagName("div");

        if (e.keyCode == 40) {
            // flecha abajo
            // Se incrementa el contador currentFocus
            currentFocus++;
            // Marcamos el elemento como enfocado
            addActive(x);
        } else if (e.keyCode == 38) {
            // Flecha arriba
            // Se decrementa el contador currentFocus
            currentFocus--;
            // Marcamos el elemento como enfocado
            addActive(x);
        } else if (e.keyCode == 13) {
            // Presionamos Enter
            e.preventDefault();
            if (currentFocus > -1) {
                // simular un clic en el elemento activo (enfocado)
                if (x) x[currentFocus].click();
            }
        }
    });

    /**
     * Cierra las listas de sugerencias en el documento, excepto la que se pasa por argumento.
     */
    function closeAllList(elmnt) {
        // Error tipográfico
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }

    function addActive(x) {
        if (!x) return false;
        // Otra función para remover el marcado activo de los elementos.
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        x[currentFocus].classList.add("autocomplete-active");
    }

    /**
     * Remueve el marcado activo de todos los elementos de la lista.
     */
    function removeActive(x) {
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }
}
