<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Pro</title>
</head>
<body>
        <h2><?php echo $name ?></h2>

        <div class='container'>
            <?php require VIEWS  . $view; ?>
        </div>
</body>
</html>