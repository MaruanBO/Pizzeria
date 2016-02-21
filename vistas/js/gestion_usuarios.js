/*
 VARIABLES
 */

// CONSTANTES
// IP donde se encuentra el archivo al que le realizara llamadas.
var IP_SERVER = "localhost";
var ARCHIVO = "controladores/gestionUsuariosAJAX";

// Cabecera de la Tabla y los numeros de columnas que contendra esta.
var TABLA_HEADER = ["Login", "Email", "Nombre", "Firma", "Avatar", "tipo", ""];
var TABLA_CELL_LENGTH = TABLA_HEADER.length;

// Variables de Estado para los botones, para cambiar el contenido de ellos dependiendo
// del estado en el que se encuentren.
var BTN_EST_EDIT = 0;
var BTN_EST_SAVE = 1;
var BTN_EST_DELE = 2;
var BTN_EST_NEW_USER = 3;

// Contiene el numero de la columna de cada cabecera. Estas variables son para hacerlas mas legibles a la hora
// de tener que tratar las columnas.
var COL_NUM_EMP = 0;
var COL_APE = 1;
var COL_OFI = 2;
var COL_DIR = 3;
var COL_DATE = 4;
var COL_SAL = 5;
var COL_COM = 6;
var COL_DEP = 7;

// Para saber si en el momentos que 'Guardo' algo tengo que hacer un UPDATE o un INSERT a la BD.
var UPDATE_USER = 0;
var INSERT_USER = 1;

// CONTADORES
var numRow = 0;

/*
 FUNCIONES
 */

// FUNCIÓN QUE SE LLAMA AL CARGARSE LA PÁGINA.
$(document).ready(function () {
    // Crea el título.
    var $newHeader = $('<h1/>', {html: "Gestión de Usuarios"});
    $("div#table-position").append($newHeader);

    usersTable();
});

// REALIZA LA CONSULTA A LA BD E INTRODUCE LOS VALORES DEVUELTOS POR ESTA EN LA TABLA.
function usersTable() {
    var xmlhttp;

    createTableHeaders();

    $("#userTable").attr("class", "table");

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            xmlDoc = xmlhttp.responseXML;

            // Variable que contiene el XML devuelto por el PHP.
            var x = xmlDoc.getElementsByTagName('usuario');

            // Variablesdonde introduciremos los valores devueltos por la BD.
            var xValue = "";

            // Variables que nos situan en la tabla.
            var tabla = document.getElementById("userTable"); // Aquí estaremos en la tabla.
            var row; // Aquí estaremos en la fila.
            var cell; // Aquí en la celda.

            // Bucle que crea los campos con los datos del usuario.
            for (var i = 0; i < x.length; i++) {
                row = tabla.insertRow();
                numRow++;
                row.id = numRow;
                for (var k = 0; k < TABLA_CELL_LENGTH; k++) {
                    cell = row.insertCell(-1);

                    if (k != TABLA_CELL_LENGTH - 1) {
                        // Comprueba si el dato devuelto por la BD es undefined o null, y de ser así cambia el valor
                        // de estos por un valor que el usuario pueda interpretar.
                        if (x[i].childNodes[k].childNodes.length != 0)
                            xValue = x[i].childNodes[k].childNodes[0].nodeValue;

                        // Crea los elementos dentro de las celdas de la tabla, dependiendo de la
                        // columna un SELECT o un INPUT
                        createInput(cell, xValue, true);

                    } else {
                        // Crea el boton de 'Editar' que aparece al final de la fila.
                        createButton(cell, "Editar", "a", BTN_EST_EDIT, editUser);

                        // Crea el boton de 'Borrar' que aparece al final de la fila.
                        createButton(cell, "Eliminar", "b", BTN_EST_DELE, deleteUser);
                    }
                }

            }
        }
    };

    xmlhttp.open("POST", "http://" + IP_SERVER + "/" + ARCHIVO, true);
    xmlhttp.send();
}

// GUARDA LA FILA DEL BOTON EN EL CUAL SE HA SELECCIONADO 'GUARDAR'
function saveUser(element, estate) {
    var xmlhttp;

    var elementId = element.id;
    elementId = elementId.slice(1, elementId.length);
    var row = document.getElementById(elementId);
    var option = "";

    if (estate == INSERT_USER) option = "ins";
    else option = "upd";

    // Guarda los campos de los INPUT's para despues introducirlos en la BD
    var empNum = row.cells[0].childNodes[0].value;
    var empNom = row.cells[1].childNodes[0].value;
    var empOfi = row.cells[2].childNodes[0].value;
    var empDirX = row.cells[3].childNodes[0].selectedIndex; // SELECT
    var empDir = row.cells[3].childNodes[0].childNodes[empDirX].value;
    var empFecha = row.cells[4].childNodes[0].value;
    var empSalario = row.cells[5].childNodes[0].value;
    var empCom = row.cells[6].childNodes[0].value;
    var empDepX = row.cells[7].childNodes[0].selectedIndex; // SELECT
    var empDep = row.cells[7].childNodes[0].childNodes[empDepX].value;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            xmlDoc = xmlhttp.responseXML;

            // En caso de que se haga correcto muestra un mensaje por pantalla. En caso de insertar un nuevo
            // usuario lo añade al array de Directores y si es una modificacion modifica en el obj
            // dentro del array.
            alert("Usuario introducido o modificado correctamente.");
            if (option == "ins") {
                directores[directores.length] = new Director(empNum, empNom);
            } else {
                for (var x = 0; x < directores.length; x++)
                    if (directores[x].num == row.cells[0].childNodes[0].value)
                        directores[x].nom = row.cells[1].childNodes[0].value;

                var selects = document.getElementsByTagName("SELECT");
                for (var i = 0; i < selects.length; i++) {
                    var num = selects[i].selectedIndex;
                    num = selects[i].childNodes[num].value;

                    var parent = selects[i].parentNode;

                    selects[i].parentNode.removeChild(selects[i]);

                    if (i % 2 == 0) createSelect(parent, num, parent.parentNode.cells[0].childNodes[0].value, directores, true);
                    else createSelect(parent, num, empNum, departamentos, true);
                }

            }

            restartButtons(element);
        }
    };
    xmlhttp.open("POST", "http://" + IP_SERVER + "/" + ARCHIVO, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("opt=" + option + "&EMP_NO=" + empNum + "&APELLIDO=" + empNom + "&OFICIO=" + empOfi + "&DIRECTOR=" + empDir + "&FECHA_ALTA=" + empFecha + "&SALARIO=" + empSalario + "&COMISION=" + empCom + "&DEP_NO=" + empDep);
}

// EDITA EL USUARIO EN LA FILA QUE HEMOS SELECCIONADO AL BOTÓN EDITAR
function editUser(element) {
    var elementoId = element.id;
    elementoId = elementoId.slice(1, elementoId.length);

    var row = document.getElementById(elementoId);

    // Cuando insertas un nuevo usuario, pone todos los botones desactivados para que no puedas realizar otras
    // cosas y puedas romper el funcionamiento normal del ejercicio.
    var buttons = document.getElementsByTagName("BUTTON");
    for (var z = 0; z < buttons.length; z++)
        buttons[z].setAttribute("disabled", "");

    for (var i = 0; i < TABLA_CELL_LENGTH; i++) {
        var cell = row.childNodes[i].childNodes[0];
        if (i != COL_NUM_EMP && i != COL_DATE && cell.tagName == "INPUT") {
            cell.removeAttribute("readonly");
            cell.className = "";

        } else if (cell.tagName == "SELECT") {
            // Elimina el 'SELECT' anterior y lo vuelve a crear, por si de el caso de que anteriormente se ha
            // modificado el nombre de algún usuario lo vuelve a introducir con el nuevo nombre.
            cell.removeAttribute("disabled");
            cell.className = "";
        }
    }

    var btnSuccess = document.getElementById("a" + elementoId);
    var btnCancel = document.getElementById("b" + elementoId);

    // Cambia el botón izquierdo cambiandolo de 'Guardar' y todos los atributos a 'Editar' y todos sus atributos
    btnSuccess.removeChild(btnSuccess.childNodes[0]);
    btnSuccess.appendChild(document.createTextNode("Guardar"));
    btnSuccess.removeAttribute("disabled");
    btnSuccess.name = BTN_EST_SAVE;
    btnSuccess.onclick = function () {
        saveUser(this, UPDATE_USER);
    };

    // Cambia el botón derecho cambiandolo de 'Cancelar' y todos los atributos a 'Eliminar' y todos sus atributos.
    btnCancel.removeChild(btnCancel.childNodes[0]);
    btnCancel.appendChild(document.createTextNode("Cancelar"));
    btnCancel.removeAttribute("disabled");
    btnCancel.name = BTN_EST_DELE;
    btnCancel.onclick = function () {
        restartButtons(this)
    };
}

// ELIMINA LA FILA EN LA QUE HEMOS SELECCIONADO EL BOTON DE BORRAR.
function deleteUser(element) {
    var elementId = element.id;

    var numRow = elementId.slice(1, elementId.length);
    var row = document.getElementById(numRow);

    var msj = confirm("¿Está seguro de eliminar el usuario?");
    if (!msj) return;

    var xmlhttp;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            xmlDoc = xmlhttp.responseXML;

            row.parentNode.removeChild(row);
            alert("El usuario ha sido eliminado con éxito");
        }
    };

    var empNo = row.children[0].childNodes[0].value;
    for (var i = 0; i < directores.length; i++) {
        if (directores[i].num == empNo) {
            directores.splice(i, 1);
            break;
        }
    }

    xmlhttp.open("POST", "http://" + IP_SERVER + "/" + ARCHIVO, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("opt=del&EMP_NO=" + empNo);
}

// CREA LA FILA DEL NUEVO USUARIO, PARA PODER AÑADIRLO A LA BD.
function insertNewUser() {
    // Variables que nos situan en la tabla.
    var tabla = document.getElementById("userTable"); // Aquí estaremos en la tabla.
    var row; // Aquí estaremos en la fila.
    var cell; // Aquí en la celda.

    // Obtiene la fecha actual para introducirla en el 'INPUT' de la columna 'Fecha'.
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth();
    var year = date.getFullYear();

    // Cuando insertas un nuevo usuario, pone todos los botones desactivados para que no puedas realizar otras
    // cosas y puedas romper el funcionamiento normal del ejercicio.
    var buttons = document.getElementsByTagName("BUTTON");
    for (var z = 0; z < buttons.length; z++)
        buttons[z].setAttribute("disabled", "");

    // Variables para añadir elementos.
    var addButton;
    var addText;

    row = tabla.insertRow();
    numRow++;
    row.id = numRow;
    for (var k = 0; k < TABLA_CELL_LENGTH; k++) {
        cell = row.insertCell(-1);
        if (k != TABLA_CELL_LENGTH - 1) {
            // En la columna 'Nº Empleado' introduce un input con el id de empleado más alta hasta ahora y le
            // suma 1. Lo añade a este 'INPUT' y no lo deja modificar a nadie.
            if (k == COL_NUM_EMP) createInput(cell, parseInt(max_id_emp) + 1, true);
            // A la columna que se utiliza para la 'Fecha' le introduce un 'INPUT' con la fecha actual que se
            // quiere registrar al usuario y no puede ser modificada.
            else if (k == COL_DATE) createInput(cell, year + "-" + comprobarDigitos(month) + "-" + comprobarDigitos(day), true);
            // En la columna que se utiliza para el 'Directores' se le añade el 'SELECT' a partir del array que
            // contiene los objetos 'Director'.
            else if (k == COL_DIR) createSelect(cell, "nada", "nada", directores, false);
            // En la columna que se utiliza para el 'Departamentos' se le añade el 'SELECT' a partir del array que
            // contiene los objetos 'Departamento'.
            else if (k == COL_DEP) createSelect(cell, "nada", "nada", departamentos, false);
            else createInput(cell, "", false);

        } else {
            // Crea el boton de 'Editar' que aparece al final de la fila.
            addButton = document.createElement("BUTTON");
            addText = document.createTextNode("Guardar");
            cell.appendChild(addButton);
            addButton.id = "a" + numRow;
            addButton.appendChild(addText);
            addButton.name = BTN_EST_SAVE;
            addButton.onclick = function () {
                saveUser(this, INSERT_USER)
            };

            // Crea el boton de 'Borrar' que aparece al final de la fila.
            createButton(cell, "Cancelar", "b", BTN_EST_NEW_USER, restartButtons);
        }
    }
}

// ELIMINA EL DESACTIVADO DE TODOS LOS BOTONES. Y LOS DOS DE LA FILA IMPLICADA LE CAMBIA LOS VALORES.
function restartButtons(element) {
    var elementId = element.id;
    elementId = elementId.slice(1, elementId.length);
    var row = document.getElementById(elementId);

    // A todos los botones les quita el atributo que los deshabilita.
    var buttons = document.getElementsByTagName("BUTTON");
    for (var i = 0; i < buttons.length; i++)
        buttons[i].removeAttribute("disabled");

    // En caso de que el botón de 'Cancelar' sea cuando añadimos una nueva fila, por lo tanto deseamos no
    // crear esa nueva fila. Elimina la fia creada para introducir el nuevo usuario.
    if (element.name == BTN_EST_NEW_USER) row.parentNode.removeChild(row);

    // En caso de que el botón que llame a la función sea de guardar, o cancelar pero a la hora de editar no de
    // añadir un nuevo usuario, volverá los botones por defecto y pasará los inputs y los selects solo
    // en modo lectura.
    else {
        var btnSuccess = document.getElementById("a" + elementId);
        var btnCancel = document.getElementById("b" + elementId);

        var inputs = row.getElementsByTagName("INPUT");
        for (var j = 0; j < inputs.length; j++) {
            inputs[j].className = "toRead";
            inputs[j].setAttribute("readonly", "");
        }

        var select = row.getElementsByTagName("SELECT");
        for (var y = 0; y < select.length; y++) {
            select[y].className = "toRead";
            select[y].setAttribute("disabled", "");
        }

        // Cambia el botón izquierdo cambiandolo de 'Guardar' y todos los atributos a 'Editar' y todos sus atributos
        btnSuccess.removeChild(btnSuccess.childNodes[0]);
        btnSuccess.appendChild(document.createTextNode("Editar"));
        btnSuccess.name = BTN_EST_EDIT;
        btnSuccess.onclick = function () {
            editUser(this)
        };

        // Cambia el botón derecho cambiandolo de 'Cancelar' y todos los atributos a 'Eliminar' y todos sus atributos.
        btnCancel.removeChild(btnCancel.childNodes[0]);
        btnCancel.appendChild(document.createTextNode("Eliminar"));
        btnCancel.name = BTN_EST_DELE;
        btnCancel.onclick = function () {
            deleteUser(this)
        };
    }
}

/*
 FUNCIONES PARA CREAR ELEMENTOS
 */

// LLENA LOS DOS ARRAYS DE OBJETOS TANTO EL DE DEPARTAMENTOS COMO EL DE DIRECTORES.
function setArraysObjects(xml, xId, xName, array, objeto) {
    for (var i = 0; i < xml.length; i++) {
        xId = xml[i].childNodes[0].childNodes[0].nodeValue;
        xName = xml[i].childNodes[1].childNodes[0].nodeValue;
        array[i] = new objeto(xId, xName);
    }
}

// CREA LOS DIFERENTES INPUTS CON VALORES Y SUS CLASES SI LAS ESPECIFICAMOS.
function createInput(cell, valor, read) {
    // Introduce el 'INPUT' dentro de cada una de las celdas.
    var addInput = document.createElement("INPUT"); // Crea un input por celda.
    cell.appendChild(addInput); // Añade el input a la celda.
    addInput.setAttribute("type", "text");
    addInput.value = valor;
    if (read) {
        addInput.setAttribute("readonly", "");
        addInput.className = "toRead";
    }
    return addInput;
}

// CREA LOS DIFERENTES BUTTONS Y SUS ATRIBUTOS.
function createButton(cell, texto, id, estado, funcion) {
    var addButton = document.createElement("BUTTON");
    var addText = document.createTextNode(texto);
    cell.appendChild(addButton);
    addButton.id = id + numRow;
    addButton.appendChild(addText);
    addButton.name = estado;
    addButton.className = "btn btn-default";
    addButton.onclick = function () {
        funcion(this)
    };
}

// CREA LOS SELECTS TANTO DE DEPARTAMENTOS COMO DE DIRECTORES.
function createSelect(cell, numDir, numEmp, array, isDisabled) {
    var addSelect = document.createElement("SELECT");
    cell.appendChild(addSelect);
    addSelect.localName = "selectDir";
    addSelect.className = "toRead";
    if (isDisabled) addSelect.setAttribute("disabled", "");

    var addOption = document.createElement("OPTION");
    addSelect.appendChild(addOption);
    addOption.appendChild(document.createTextNode("NO TIENE"));

    for (var j = 0; j < array.length; j++) {
        if(numEmp == array[j].num) continue;
        addOption = document.createElement("OPTION");
        addSelect.appendChild(addOption);
        addOption.value = array[j].num;
        addOption.appendChild(document.createTextNode(array[j].nom));
        if (numDir == array[j].num) addOption.setAttribute("selected", "selected");
    }
}

// CREA LA FILA DE LA TABLA EN LA QUE SE MOSTRARÁN LOS HEADERS DE LAS FILAS.
function createTableHeaders() {
    var addTable = document.createElement("TABLE");
    addTable.id = "userTable";
    var div = document.getElementById("table-position");
    var tabla = div.appendChild(addTable);
    var row = tabla.insertRow();
    for (var i = 0; i < TABLA_CELL_LENGTH; i++) {
        var cell = row.insertCell(-1);
        var addText = document.createTextNode(TABLA_HEADER[i]);
        cell.appendChild(addText);
    }
}

// COMBIERTE LOS DIGITOS DE UN SOLO NÚMERO AÑADIENDOLE UN '0' DELANTE.
function comprobarDigitos(num) {
    return num.toString().length == 1 ? "0" + num : num;
}