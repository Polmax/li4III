$(document).ready(function () {
    $("#registar").click(function() {
        var email = $("#email").val();
        var password = $("#password").val();
        // Checking for blank fields.
        if (email == '' || password == '') {
            $('input[type="text"],input[type="password"]').css("border", "2px solid red");
            $('input[type="text"],input[type="password"]').css("box-shadow", "0 0 3px red");
            document.getElementById("errol").innerHTML="Preencha todos os campos";
        } else {
            $.post("php/register.php", { email1: email, password1: password },
                function (data) {
                    if (data == 'Registo efectuado com sucesso') {
                        window.location.href = "menu.html";
                        $("form")[0].reset();
                        $('input[type="text"],input[type="password"]').css({ "border": "2px solid #00F5FF", "box-shadow": "0 0 5px #00F5FF" });
                    } else {
                        alert(data);
                    }
                });
        }
    });
});