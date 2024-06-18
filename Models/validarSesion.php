<?php

require_once ('conexionBd.php');

class ValidarSesion
{
    public function validarSesion($nombreUser, $passUser)
    {
        $sql = "SELECT * FROM users WHERE nombre = :nombre AND clave = :clave";

        $objConexionBd = new ConexionBd();

        $conexion = $objConexionBd->getConexion();

        $result = $conexion->prepare($sql);

        $result->bindParam(":nombre", $nombreUser);
        $result->bindParam(":clave", $passUser);

        $result->execute();

        $f = $result->fetch();

        if ($f) {
            session_start();

            $_SESSION["idUser"] = $f["id"];

            switch ($f["rol"]) {
                case 'Cliente':
                    echo '
                    <script>
                        location.href="../../Views/Client/home.php"
                    </script>
                    ';
                    break;

                case 'Admin':
                    echo '
                    <script>
                        location.href="../../Views/Admin/home.php"
                    </script>
                    ';
                    break;
            }
        }
    }
}