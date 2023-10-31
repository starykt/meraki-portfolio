
<body>
    <h1>Enviar Denuncia</h1>

    <form action="http://<?php echo APP_HOST; ?>/project/saveReport/<?= $viewVar['project']->getIdProject()?>" method="post">
  
        <label for="report">Denuncia:</label><br>
        <textarea id="report" name="report" rows="4" cols="50" required></textarea><br><br>

        <button type="submit">Enviar Descrição</button>
    </form>
</body>

</html>
