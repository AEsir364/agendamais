<?php include 'includes/auth.php'; ?>

<div class="container">
    <div class="content" style="display: flex; align-items: flex-start;">
        <div class="text-content" style="flex: 1;">
            <br><br><br>
            <h1>Redefina sua senha</h1>
            <p>Digite seu nome de usuário e o e-mail associado<br>à sua conta. Enviaremos um link para redefinição<br>de senha.</p>
            <br><br><br>
            <form action="<?= URL ?>/Usuarios/enviarRecuperacao" method="post" class="form">
                <!-- Adicionando token CSRF para segurança -->
                <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">

                <input type="text" id="usuario" name="usuario" placeholder="Nome de Usuário" required>
                <input type="email" id="email" name="email" placeholder="Email" required>

                <button type="submit" class="button">Enviar e-mail</button>
                <p>Lembrou sua senha? <a href="<?= URL ?>/Usuarios/login">Acesse sua conta</a></p>
            </form><br><br><br><br>
        </div>
        <img src="<?= URL ?>/Public/images/Home.png" alt="Pessoa usando um computador para recuperar a senha">
    </div>
</div>

<?php include 'includes/footer.php'; ?>
