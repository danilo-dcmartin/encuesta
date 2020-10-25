<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pruebas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        require_once("db.php");
        $id_user = '458799'; // reemplazar con un identificador para el usuario, para que no repita su encuesta
        $db = Conectar::conexion();
        $consulta=$db->query("SELECT EXISTS (SELECT * FROM encuesta WHERE usuario LIKE '$id_user');");
        $row=mysqli_fetch_row($consulta);
        if ($row[0]=="1") {                 
            header("Location: realizado.php");
        }
    ?>
    <div class="container">
        <div class="text-center">
            <h2>Encuesta de personalidad</h2>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-7">
                <div class="card mt-2">
                    <div class="card-body">
                            <?php
                                if(isset($_GET['valid']))
                                {
                                    if($_GET['valid'] == 1){
                                        ?>
                                        <div class="alert alert-danger mt-2" role="alert">
                                            Los campos con * son requeridos. Corriga y vuelva a intentarlo.
                                        </div>
                                        <?php
                                    }
                                }
                            ?>
                        <form action="gestion.php" method="post">
                            <div class="form-group">
                                <label for="check">1. Ejemplo Selección Multiple <span class="text-danger">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" name="pregunta[]" type="checkbox" value="opcion1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Opción 1
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" name="pregunta[]" type="checkbox" value="opcion2">
                                    <label class="form-check-label" for="defaultCheck2">
                                        Opción 2
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="check">2. Ejemplo Selección Unica RadioButton <span class="text-danger">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" name="pregunta2" type="radio" name="exampleRadios" id="exampleRadios1" value="opcion1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Opción 1
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pregunta2" type="radio" name="exampleRadios" id="exampleRadios2" value="opcion2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Opción 2
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="pregunta2" type="radio" name="exampleRadios" id="exampleRadios3" value="opcion3">
                                    <label class="form-check-label" for="exampleRadios3">
                                        Opción 3
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="disabledSelect">3. Ejemplo Selección Unica Select <span class="text-danger">*</span></label>
                                <select id="disabledSelect" name="pregunta3" class="form-control">
                                    <option value="">Seleccione una opción...</option>
                                    <option value="opcion1">Opcion 1</option>
                                    <option value="opcion2">Opcion 2</option>
                                    <option value="opcion3">Opcion 3</option>
                                    <option value="opcion4">Opcion 4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="check">4. Ejemplo Pregunta de texto Input <span class="text-danger">*</span></label>
                                <input type="text" name="pregunta4" id="test" class="form-control" require>
                            </div>
                            <div class="form-group">
                                <label for="check">5. Ejemplo Pregunta de texto TextArea <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="pregunta5" id="exampleFormControlTextarea1" rows="3" require></textarea>
                            </div>
                            <div>
                                <span class="text-danger font-italic">* Requerido</span>
                            </div>
                            <input id="iduser" name="iduser" type="hidden" value="<?php echo $id_user ?>">
                            <button class="btn btn-success mt-2" type="submit">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>