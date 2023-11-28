<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff; 
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #333; 
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
            font-size: 18px;
            line-height: 1.6;
        }

        .redirect-link {
            display: block;
            margin-top: 20px;
            color: #800080; 
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body>
  <br> <br> <br> <br> <br> <br> 
  <div class="container">
    <h1>Email de redefinição de senha não encontrado</h1>
    <p>O email fornecido não está cadastrado no sistema. Certifique-se de usar o email correto ou registre-se.</p>
    <a href="http://<?= APP_HOST ?>/login" class="redirect-link">Voltar para a página inicial</a>
  </div>
</body>

</html>