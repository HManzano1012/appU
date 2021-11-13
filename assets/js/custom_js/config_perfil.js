$(document).ready(function () {
    $("#datos-personales-wizard").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        autoFocus: true,
        cssClass: 'circle wizard'
    });

    $('#numTelInput').inputmask("9999-9999");
    $('#duiInput').inputmask("99999999-9");

    $("#selectDepartamento").change(function () {
        addMunicipios();
    });
})

function addMunicipios() {
    let departamento = parseInt($("#selectDepartamento option:selected").val());
    let arrMunicipios = [];

    switch (departamento) {
        case 1:
            arrMunicipios = [
                {
                    id: 1,
                    nombre: "Ahuachapan"
                }, {
                    id: 2,
                    nombre: "Apaneca"
                }, {
                    id: 3,
                    nombre: "Atiquizaya"
                }, {
                    id: 4,
                    nombre: "Ataco"
                }, {
                    id: 5,
                    nombre: "El Refugio"
                }, {
                    id: 6,
                    nombre: "Guaymango"
                }, {
                    id: 7,
                    nombre: "Jujutla"
                }, {
                    id: 8,
                    nombre: "San Francisco Menendez"
                }, {
                    id: 9,
                    nombre: "San Pedro Puxtla"
                }, {
                    id: 10,
                    nombre: "Tacuba"
                }, {
                    id: 11,
                    nombre: "Turin"
                }, {
                    id: 12,
                    nombre: "San Lorenzo"
                }

            ];

            break;
        case 2:
            arrMunicipios = [
                {
                    id: 13,
                    nombre: "Cinquera"
                }, {
                    id: 14,
                    nombre: "Dolores"
                }, {
                    id: 15,
                    nombre: "Guacotecti"
                }, {
                    id: 16,
                    nombre: "Ilobasco"
                }, {
                    id: 17,
                    nombre: "Jutiapa"
                }, {
                    id: 18,
                    nombre: "San Isidro"
                }, {
                    id: 19,
                    nombre: "Sensuntepeque"
                }, {
                    id: 20,
                    nombre: "Tejutepeque"
                }, {
                    id: 21,
                    nombre: "Victoria"
                }
            ];

            break;
        case 3:
            arrMunicipios = [
                {
                    id:22,
                    nombre:"Agua Caliente"
                },{
                    id:23,
                    nombre:"Arcatao"
                },{
                    id:24,
                    nombre:  "Azacualpa"
                },{
                    id:25,
                    nombre:  "Chalatenango"
                },{
                    id:26,
                    nombre:  "Comalapa"
                },{
                    id:27,
                    nombre:  "Citala"
                },{
                    id:28,
                    nombre:  "Concepcion Quezaltepeque"
                },{
                    id:29,
                    nombre:  "Dulce Nombre de Maria"
                },{
                    id:30,
                    nombre:  "El Carrizal"
                },{
                    id:31,
                    nombre:  "El Paraiso"
                },{
                    id:32,
                    nombre:  "La Laguna"
                },{
                    id:33,
                    nombre:  "La Palma"
                },{
                    id:34,
                    nombre:  "La Reina"
                },{
                    id:35,
                    nombre:  "Las Vueltas"
                },{
                    id:36,
                    nombre:  "Nueva Concepcion"
                },{
                    id:37,
                    nombre:"Nueva Trinidad"
                },{
                    id:38,
                    nombre:  "Nombre de Jesus"
                },{
                    id:39,
                    nombre:  "Ojos de Agua"
                },{
                    id:40,
                    nombre:  "Potonico"
                },{
                    id:41,
                    nombre:  "San Antonio de la Cruz"
                },{
                    id:42,
                    nombre:  "San Antonio Los Ranchos"
                },{
                    id:43,
                    nombre:  "San Fernando"
                },{
                    id:44,
                    nombre:  "San Francisco Lempa"
                },{
                    id:45,
                    nombre:  "San Francisco Morazan"
                },{
                    id:46,
                    nombre:  "San Ignacio"
                },{
                    id:47,
                    nombre:  "San Isidro Labrador"
                },{
                    id:48,
                    nombre:  "San Jose Cancasque"
                },{
                    id:49,
                    nombre:  "San Jose Las Flores"
                },{
                    id:50,
                    nombre:  "San Luis del Carmen"
                },{
                    id:51,
                    nombre:  "San Miguel de Mercedes"
                },{
                    id:52,
                    nombre:  "San Rafael"
                },{
                    id:53,
                    nombre:  "Santa Rita"
                },{
                    id:54,
                    nombre:  "Tejutla"
                }
            ];
            
            break;
        case 4:
            break;
        case 5:
            break;
        case 6:
            break;
        case 7:
            break;
        case 8:
            break;
        case 9:
            break;
        case 10:
            break;
        case 11:
            break;
        case 12:
            break;
        case 13:
            break;
        case 14:
            break;
    }

    let options = "<option>Selecciona tu municipio</option>";

    for (i = 0, iMax = arrMunicipios.length; i < iMax; i++) {
        let arrMunicipio = arrMunicipios[i];
        options += "<option value='" + arrMunicipio.id + "'>" + arrMunicipio.nombre + "</option>"
    }

    $("#selectMunicipio").html(options)
}