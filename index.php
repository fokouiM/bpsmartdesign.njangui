<?php
    session_start();
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "njangui_db";
    
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$db",
                        $username,
                        $password,
                        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $reunions = $pdo->query('SELECT * FROM reunion WHERE statut = 1')
                    ->fetchAll();

    $pdo = null;
?>

<!DOCTYPE HTML>
<html lang="en-us">
    <head>
        <title>NJANGUI :: Application de Gestion des Réunion - Lite (Bpsmartdesign)</title>

        <meta charset="utf-8" /> <!-- Encodage des carractères de la page -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Bpd_237" />

        <link rel="icon" href="Data/imgs/favicon.ico" /> <!-- Icone de la page -->

        <link href="Dist/css/main_.css" type="text/css" rel="stylesheet" >
    </head>
    <body>
        <div class="content-block" id="header">
        </div>  <!-- content-block -->
        <footer id="site-footer">
            <p class="copyright">Copyright &copy; 2020 Bpsmartdesign.njangui</p>
        </footer>   <!-- site-footer -->
        <div class="login-box animated fadeInDown">
            <div class="login-body">
                <div class="login-title"><strong>Welcome</strong>, <em>Please login</em></div>
                <form action="admin/controlLog" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <select class="form-control select-control" name="reunion">
                                <option value="">Sélectionner la réunion ...</option>
                                
                                <?php foreach($reunions as $reunion) : ?>
                                    <option value="<?= $reunion['id'] ?>"><?= $reunion['nom'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Username" name="username" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control password" placeholder="Password" name="password" />
                        </div>
                    </div> 
                    <div class="form-group mt-2">
                        <div class="col-md-12">
                            <input type="submit" name="login" class="btn btn-success btn-block" value="Log In">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php if(isset($_SESSION['mess'])) : ?>
            <div class="show animated fadeInDown">
                <span class="mess">
                    <?= $_SESSION['mess']; ?>
                </span>
                <span class="close-show">X</span>
            </div>
        <?php endif; ?>

        <script src="Dist/js/aw.js"></script>
    </body>
</html>

