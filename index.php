<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <title>Acesso ao Sistema - Personal Odontologia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="indexcss/geral.css">
    <link rel="stylesheet" href="indexcss/index.css">
    <link rel="stylesheet" href="indexcss/variaveis.css">
</head>

<body>
    <section class="primeira-section">
        <div class="conteudo-especifico">
            <h3>Acesso ao sistema</h3>
            <form method="post" action="processa_login.php">
                <p>Login:</p>
                    <input type="text" name="login" required>
                <p>Senha:</p>
                    <input type="password" name="senha" required>
                <div class="btn">
				    <a href=""><button>Entrar</button></a>
			    </div>
            </form>
        </div>
    </section>
</body>

</html>