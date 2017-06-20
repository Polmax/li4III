  <?php
  session_start();
    ?>
  <!DOCTYPE html>
        <title>Menu</title>
        <img src="../assets/menuvec.png" alt="Menu" width="680" height="480" style="position: absolute; left:800px;top:250px">
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/buttonstyle.css" />


    </head>

    <body>
        <div>
            <button onclick="location.href = '../pesquisa.html';" type="button" id="button" class="button">Pesquisar</button>
            <button onclick="location.href = '../sugestao.html';" type="button" id="button" class="button">Sugestão</button>
            <button onclick="location.href = '../historico.html';" type="button" id="button" class="button">Histórico</button>
            <button onclick="location.href = 'preferencias.php';" type="button" id="button" class="button">Preferências</button>
        </div>
        <div class = "currentuser" id="currentuser"><?php echo $_SESSION['username']?></div>
        

    </body>

    </html>
