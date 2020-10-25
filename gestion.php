<?php
    require_once("db.php");
    $pregunta1 = $_POST['pregunta'];
    $pregunta2 = $_POST['pregunta2'];
    $pregunta3 = $_POST['pregunta3'];
    $pregunta4 = $_POST['pregunta4'];
    $pregunta5 = $_POST['pregunta5'];
    $id_user = $_POST['iduser'];
    $db = Conectar::conexion();
    if(empty($pregunta1) || empty($pregunta2) || empty($pregunta3) || empty($pregunta4) || empty($pregunta5)){
        header("Location: index.php?valid=1");
    }
    else{
        $arr = array(
            'Ejemplo Seleccion Multiple' => $pregunta1,
            'Ejemplo Seleccion Unica RadioButton' => $pregunta2,
            'Ejemplo Seleccion Unica Select' => $pregunta3,
            'Ejemplo Pregunta de texto Input' => $pregunta4,
            'Ejemplo Pregunta de texto TextArea' => $pregunta5,
        );
        $json = json_encode($arr);
        $sql_insert = "insert into encuesta (usuario,respuestas) values('$id_user','$json')";
        if($db->query($sql_insert) === false){ // para ver errores de query, remover contenido dentro de if para produccion.
            ?>
            <div>error!: <?php echo $db->error ?></div>
            <?php
        }
        else{
            header("Location: exito.php");
        }
    }
?>