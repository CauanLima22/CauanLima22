<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento de Equipamentos</title>
    <style>
      <?php include 'style.css'; ?>
    </style>
</head>
<body>
    <div class="container">
        <h1>Agendamento de Equipamentos</h1>
        <form action="/" method="POST">
            <label for="equipamento">Equipamento:</label>
            <input type="text" id="equipamento" name="equipamento" required>

            <label for="ambiente">Ambiente:</label>
            <input type="text" id="ambiente" name="ambiente" required>

            <label for="data">Data:</label>
            <input type="date" id="data" name="data" required>

            <label for="horario">Horário:</label>
            <input type="time" id="horario" name="horario" required>

            <label for="usuario">Usuário:</label>
            <input type="text" id="usuario" name="usuario" required>

            <button type="submit">Agendar</button>
        </form>
        <br><a href="/agendamentos">Veja a lista de agendamentos</a>
    </div>
</body>
</html>
