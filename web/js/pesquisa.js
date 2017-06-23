$(document).ready(function() {
    $("#pesquisar").click(function() {
        var pesquisa = $("#pesquisa").val();
        // Checking for blank fields.
        $.post("php/pesquisa.php", { pesquisa1: pesquisa },
            function(data) {
                if (data == 'Prato não encontrado') {
                    alert(data);
                } else {
                    document.getElementById("resultados").innerHTML = data;
                    var a = document.createElement('a');
                    var linkText = document.createTextNode(data);
                    a.appendChild(linkText);
                    a.title = data;
                    a.href = "restaurante.html";
                    document.getElementById("dp").appendChild(a);
                }
            });
    });
});