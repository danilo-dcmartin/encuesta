<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Resultados</h2>
        <div class="row justify-content-md-center">
            <div class="col-7">
            <?php
                $cont = 0;
                $cont2 = 0;
                require_once("db.php");
                $db = Conectar::conexion();
                $consulta=$db->query("SELECT respuestas FROM encuesta");
                while($row=$consulta->fetch_assoc()){
                    foreach($row as $key => $value){
                        $data = json_decode($value);
                        foreach($data as $a => $b){
                            ?>
                            <div><?php echo $a . " => " . $b ?></div>
                            <?php
                            if(strcmp($a,"Ejemplo Seleccion Multiple") == 0){
                                if(strcmp($b,"opcion1") == 0){
                                    $cont++;
                                }
                                else{
                                    $cont2++;
                                }
                            }
                        }
                    }
                }
                ?>
                <h3 class="mt-2">Ejemplo Seleccion Multiple</h3>
                <div class="mt-2"><?php echo 'Personas que seleccionaron Opcion1: ' . $cont  ?></div>
                <div class="mt-2"><?php echo 'Personas que seleccionaron Opcion2: ' . $cont2  ?></div>
                <?php
                ?>
            </div>
        </div>
    </div>
</body>
</html>