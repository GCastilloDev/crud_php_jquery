<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <?php
    include("./partials/bootstrarpCSS.php");
    ?>

    <title>Inicio de sesión</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <form action="ajax/login.php" method="POST">
                <div class="col-4 offset-4">
                    <div class="text-center">
                        <img class="img-fluid" src="https://scontent.fmtt1-1.fna.fbcdn.net/v/t31.0-8/10557492_10152451274433500_8281747343968477831_o.jpg?_nc_cat=111&_nc_sid=09cbfe&_nc_eui2=AeGudyKQlOhzfjSRWUPCzPWv_nf78GEqErv-d_vwYSoSuzIwsbJF6VKOPxLE3vThBzgd2-bH5NzN_FJdo-C80Yrv&_nc_ohc=dz6nnuTwqfAAX-eD2vP&_nc_ht=scontent.fmtt1-1.fna&oh=228be020883efc4049f6b48b52352c3f&oe=5F232D1E" alt="">
                    </div>

                    <!-- MUESTRA EL MENSAJE EN CASO DE QUE UN USUARIO Y/O CONTRASEÑA SEAN ERRONEOS -->
                    <?php
                    include('./partials/errorMessage.php');
                    ?>

                    <form action="">
                        <div class="form-group">
                            <label for="usuario"> Usuario
                            </label>
                            <input type="text" name="usuario" id="idUsuario" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password"> Contraseña</label>
                            <input type="password" name="password" id="idPassword" class="form-control" required>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-success btn-block" type="submit">Acceder</button>
                        </div>
                    </form>

                </div>
            </form>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php
    include('./partials/bootstrarpJS.php');
    ?>
</body>

</html>