$(document).ready(function() {
    $("#registar").click(function() {
        //limpar mensagens de erro
        document.getElementById("errou").innerHTML = '';
        document.getElementById("errol").innerHTML = '';
        var nome = $("#nome").val();
        var email = $("#email").val();
        var password = $("#password").val();
        // Checking for blank fields.
        if (email == '' || password == '' || nome == '') {
            $('input[type="text"],input[type="password"],input[type="nome"]').css("border", "2px solid red");
            $('input[type="text"],input[type="password"],input[type="nome"]').css("box-shadow", "0 0 3px red");
            document.getElementById("errol").innerHTML = "Preencha todos os campos";
        } else {
            $.post("php/register.php", { nome1: nome, email1: email, password1: password },

                function(data) {
                    if (data == 'Email em uso') {
                        $('input[type="text"]').css({ "border": "2px solid red", "box-shadow": "0 0 3px red" });
                        $('input[type="email"]').css({ "border": "2px solid #00F5FF", "box-shadow": "0 0 5px #00F5FF" });
                        document.getElementById("errou").innerHTML = "Email em uso";
                    } else if (data == 'Email inválido') {
                        $('input[type="text"]').css({ "border": "2px solid red", "box-shadow": "0 0 3px red" });
                        $('input[type="nome"]').css({ "border": "2px solid #00F5FF", "box-shadow": "0 0 5px #00F5FF" });
                        document.getElementById("errou").innerHTML = "Formato válido nome@dominio. Exemplos : ana@gmail.com, 1234@outlook.com";
                    } else if (data == 'Registo efectuado com sucesso') {
                        window.location.href = "../php/menu.php";
                        $("form")[0].reset();
                        $('input[type="text"],input[type="password"],input[type="nome"]').css({ "border": "2px solid #00F5FF", "box-shadow": "0 0 5px #00F5FF" });
                    } else {
                        alert(data);
                    }
                });
        }
    });
});