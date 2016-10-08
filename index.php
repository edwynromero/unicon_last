<?php
include("funciones/librerias.php");
/*echo cabecera();
echo usuario();
*/
?>


    <head>

        <meta charset="utf-8">
        <title>Unicon</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/supersized.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="page-container">
            <h1>Acceso a Unicon</h1>
            <form action="" method="post">
                <input type="text" name="usuario" class="username" required="required" maxlength="12" placeholder="Usuario">
                <input type="password" name="clave" class="password" required="required" maxlength="12" placeholder="Clave">
                <button type="submit"  name="boton">Ingresar</button>
                <div class="error"><span>+</span></div>
            </form>

        </div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/js/supersized.3.2.7.min.js"></script>
        <script src="assets/js/supersized-init.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>

</html>


<?php
if (isset($_POST['boton'])){
	echo entrar();
    echo bitacora();
}
echo pie();
?>