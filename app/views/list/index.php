<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Agendamentos</title>
    <style>
        <?php include 'style.css';?>
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Agendamentos</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Equipamento</th>
                        <th>Ambiente</th>
                        <th>Data</th>
                        <th>Horário</th>
                        <th>Usuário</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td><?php echo htmlspecialchars($agendamentos['id']); ?></td>
                            <td><?php echo htmlspecialchars($agendamentos['equipamento']); ?></td>
                            <td><?php echo htmlspecialchars($agendamentos['ambiente']); ?></td>
                            <td><?php echo htmlspecialchars($agendamentos['data']); ?></td>
                            <td><?php echo htmlspecialchars($agendamentos['horario']); ?></td>
                            <td><?php echo htmlspecialchars($agendamentos['usuario']); ?></td>
                        </tr>
                </tbody>
            </table>

        <a href="/" class="button">Voltar para Agendamento</a>
    </div>
</body>
</html>