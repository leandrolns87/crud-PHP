<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>CRUD em PHP</h1>
        
        <!-- Formulário de Criação/Atualização -->
        <form action="process.php" method="POST" id="userForm">
            <input type="hidden" name="id" id="user_id">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" placeholder="Digite seu nome" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" name="email" placeholder="Digite seu e-mail" required>
            </div>
            <button type="submit" name="save" id="btn_salvar">Salvar</button>
        </form>
    </div>

    <div class="container2">
        <!-- Tabela de Leitura -->
        <?php include('bd.php'); ?>
        <?php
        $result = $conn->query("SELECT * FROM users");
        ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a>
                        <a href="deletar.php?id=<?php echo $row['id']; ?>">Deletar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>