$(function() {
    titulo_detalle();
});
/******************************************** VISTA******************************************************/
function titulo_detalle() {
    var arreglo = new Array();
        arreglo[0] = 'Nro';
        arreglo[1] = 'Código';
        arreglo[2] = 'Descripción';
        arreglo[3] = 'Cantidad';
        arreglo[4] = 'Precio';
        arreglo[5] = 'Impuesto';
        arreglo[6] = 'Total';
        arreglo[7] = 'Serv';
        arreglo[8] = 'Opt';

    var tabla = document.getElementById('listado_detalle');
        tabla.innerHTML = "";

    tabla.appendChild(add_filas(arreglo, 'th','','',8));
}

function titulo_producto() {
    var arreglo = new Array();
        arreglo[0] = 'Código';
        arreglo[1] = 'Descripción';
        arreglo[2] = 'Exento';
        arreglo[3] = 'Servicio';
        arreglo[4] = 'Cantidad';
        arreglo[5] = 'Costo';
        arreglo[6] = 'Add';

    var tabla = document.getElementById('resultado_producto');
        tabla.innerHTML = "";

    tabla.appendChild(add_filas(arreglo, 'th','','',6));
}
/******************************************************** JSON *************************************************/
function buscar_cliente() {
    var cliente = trae('venta-codclie').value.split(" - ");

    cliente = cliente[0];
    if (cliente!="") {
        $.get('../venta/buscar-cliente',{cliente : cliente},function(data){
            var data = $.parseJSON(data);
            if (data!="") {
                var nombre = trae('venta-descrip');
                var rif = trae('venta-id3');
                var direc1 = trae('venta-direc1');
                var direc2 = trae('venta-direc2');
                var telef = trae('venta-telef');
                
                direc1.value = data.Direc1;
                direc2.value = data.Direc2;
                rif.value = data.ID3;
                telef.value = data.Telef;
                nombre.value = data.Descrip;
                rif.value = data.ID3;
            } else {
                cliente.value = "";
            }
        });
    }
}

function buscar_items() {
    var m_producto = document.getElementById('m_producto').value;
    var servicio = document.getElementById('m_esprod').value;
    var tabla = trae('resultado_producto');
    var img = trae('img_producto');
    var i;
    var y;
    var texto = "";

    if (m_producto!="") {
        img.style.visibility = "visible";
        titulo_producto();
        $.getJSON('../venta/buscar-producto',{codigo : m_producto, servicio : servicio},function(data){
            var campos = Array();
            var td = new Array();
            var node = new Array();
            var otro = "";
            if (data!="") {
                for (i = 0; i < data.length; i++) {
                    otro = "";
                    var tr = document.createElement('tr');
                    var valor = i + 1;
                    campos.length = 0;
                    campos.push(data[i].Codigo);
                    otro+=data[i].Codigo+"#";
                    campos.push(data[i].Descrip);
                    otro+=data[i].Descrip+"#";
                    campos.push(data[i].EsExento);
                    otro+=data[i].EsExento+"#";
                    campos.push(data[i].EsServ);
                    otro+=data[i].EsServ+"#";
                    otro+=valor+"#";

                    for (y = 0; y < campos.length; y++) {
                        td[y] = document.createElement('td');
                        texto = campos[y];
                        td[y].align="center"; 
                        td[y].style.maxWidth="200px"; 
                        node[y] = document.createTextNode(texto);
                        td[y].appendChild(node[y]);
                        tr.appendChild(td[y]);
                    }

                    y++;
                    td[y] = document.createElement('td');
                    var input = document.createElement('input');
                    input.className = 'texto texto-xc';
                    input.id = 'c_'+valor;
                    input.addEventListener("keydown", soloEnteros, true);
                    td[y].appendChild(input);
                    tr.appendChild(td[y]);

                    y++;
                    td[y] = document.createElement('td');
                    var input = document.createElement('input');
                    input.className = 'texto texto-xc';
                    input.id = 'i_'+valor;
                    input.addEventListener("keydown", soloNumeros, true);
                    eval("input.onkeyup = function(){Solo_Cantidad('i_"+valor+"');}");
                    td[y].appendChild(input);
                    tr.appendChild(td[y]);

                    y++;
                    td[y] = document.createElement('td');
                    var imagen = document.createElement('img');
                    imagen.width = "24";
                    imagen.style.padding = "3px";
                    imagen.style.cursor = "pointer";
                    imagen.src = "../../../img/mas.png";
                    eval("imagen.onclick = function(){agregar_fila("+valor+",'"+otro+"');}");
                    td[y].appendChild(imagen);
                    tr.appendChild(td[y]);

                    tabla.appendChild(tr);
                }
            }
            img.style.visibility = "hidden";
        });
    }
}

function agregar_fila(valor,otro) {
    var tabla = trae('listado_detalle');
    var cantidad = trae('i_'+valor);
    var costo = trae('c_'+valor);
    var iva = trae('venta-notas10');
    iva = parseFloat(iva.options[iva.selectedIndex].text);

    var campos = new Array();
    var total = 0;
    var imp = 0;
    
    if ((cantidad.value>0) && (costo.value>0)) {
        var cadena = otro.split("#");

        tabla.rows.length;
        campos.push(tabla.rows.length);
        campos.push(cadena[0]);
        campos.push(cadena[1]);
        campos.push(cantidad.value);
        campos.push(costo.value);
        if (cadena[2]=="0") {
            imp = 0;
        } else {
            imp = parseFloat(total)*iva;
        }
        campos.push(imp);
        total = parseFloat(cantidad.value)*parseFloat(costo.value);
        
        campos.push(imp+total);
        campos.push(cadena[3]);
        tabla.appendChild(add_filas(campos, 'td','####cancela_detalle','',8));
        cantidad.value = ""; 
        costo.value = ""; 
    }
}

function cancela_detalle(response) {
    var arreglo = response.split("#");

    rebaja_linea(arreglo[0]);
}

function rebaja_linea(valor) {
    trae("listado_detalle").rows[valor].cells[3].innerHTML = "0";  
    trae("listado_detalle").rows[valor].cells[4].innerHTML = "0";  
    trae("listado_detalle").rows[valor].cells[5].innerHTML = "0";  
    trae("listado_detalle").rows[valor].cells[6].innerHTML = "0";  
}
