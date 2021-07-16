<h2>Create</h2>

<?php echo getFlash('message'); ?><br>

<form action="/user/store" method='post'>
    <input type="text" name="firstName" placeholder="Nome">
    <?php echo getFlash('firstName'); ?><br>
    <input type="text" name="lastName" placeholder="Sobrenome">
    <?php echo getFlash('lastName'); ?><br>
    <input type="text" name="email" placeholder="E-mail">
    <?php echo getFlash('email'); ?><br>
    <input type="password" name="password" placeholder="Senha">
    <?php echo getFlash('password'); ?><br>

    <button type="submit">Criar</button>
    
</form>