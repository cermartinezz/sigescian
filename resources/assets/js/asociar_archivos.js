
/**
 * Created by otro on 4/11/16.
 */
$(document).ready(function ()
{
    initData()
});
function changedata(elemen_id, second_element, url)
{
    $("#" + second_element).removeAttr('disabled', false)
    $("#" + second_element).empty()
    var id_procedure = $("#" + elemen_id).val();
    url = url + id_procedure;
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: url,
        success: function (json)
        {
            var obj = json;
            var arr = [];
            for (elem in obj) {
                arr.push(obj[elem]);
            }
            $("#" + second_element).select2({placeholder: "Seleccione uno o varios formatos", data: arr});
        },
    })
}
/**
 * Asociar procedimiento con archivo
 *
 * @param url
 * @param file_tipe
 * @param id_procedure
 */
function asociar(url, second_el)
{
    var second_element = $("#" + second_el);
    var files = second_element.val();
    var csrf = $("meta[name='csrf_token']").attr('content');
    if(files == null){
        swal("Error", "Tienes que seleccionar uno o mas archivos", "error");
    }else{
        $.ajax({
            type: "POST",
            url: url,
            headers: {
                'X-CSRF-Token': csrf,
            },
            data: {
                files: files,
            },
            success: function (data)
            {

            },
            error: function (data)
            {

            }
        })
        refreshlist(second_el)
    }
}

function refreshlist(elemento){
    var link = "";
    if(elemento.includes("formato-administrativo")){
        link = "/archivos/procedimientos/formatos/"+id_administrative+"/1";
    }else if(elemento.includes("anexo-administrativo"))
    {
        link = "/archivos/procedimientos/anexos/"+id_administrative+"/1";
    }else if(elemento.includes("formato-tecnico"))
    {
        link = "/archivos/procedimientos/formatos/"+id_tecnico+"/2";
    }else if(elemento.includes("anexo-tecnico")){
        link = "/archivos/procedimientos/anexos/"+id_tecnico+"/2";
    }
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: link,
        success: function (json)
        {
            if(elemento.includes("formato-administrativo")){
                $("#" + elemento).empty()
                agregarFormato(listaArchivos,json)
            }else if(elemento.includes("anexo-administrativo"))
            {
                $("#" + elemento).empty()
                agregarAnexos(listaAnexos,json)
            }else if(elemento.includes("formato-tecnico"))
            {
                $("#" + elemento).empty()
                agregarFormato(listaArchivos,json)
            }else if(elemento.includes("anexo-tecnico")){
                $("#" + elemento).empty()
                agregarFormato(listaArchivos,json)
            }
        },
    })
}

function initData()
{
    var url_formato = "/informacion/formato/administrativo/"
    var url_anexo = "/informacion/anexo/administrativo/"
    $("#archivo-formato-administrativo").removeAttr('disabled', false)
    $("#archivo-formato-administrativo").empty()
    $("#archivo-anexo-administrativo").removeAttr('disabled', false)
    $("#archivo-anexo-administrativo").empty()
    var id_procedure_formato = $("#procedimiento-administrativo-formato").val()
    var id_procedure_anexo = $("#procedimiento-administrativo-anexo").val()
    url_formato = url_formato + id_procedure_formato;
    url_anexo = url_anexo + id_procedure_anexo;
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: url_formato,
        success: function (json)
        {
            var obj = json;
            var arr = [];
            for (elem in obj) {
                arr.push(obj[elem]);
            }
            $("#archivo-formato-administrativo").select2({placeholder: "Seleccione uno o varios formatos", data: arr});
        },
    })
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: url_anexo,
        success: function (json)
        {
            var obj = json;
            var arr = [];
            for (elem in obj) {
                arr.push(obj[elem]);
            }
            $("#archivo-anexo-administrativo").select2({placeholder: "Seleccione uno o varios formatos", data: arr});
        },
    })
}
