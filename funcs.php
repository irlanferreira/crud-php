<?php 

function conexao(){
    $con=mysqli_connect('localhost','root','');
    mysqli_select_db($con,'crudphp');
    return $con;
}
function getUsuarios(){
    $con=conexao();
    $res=mysqli_query($con,'SELECT * FROM tb_usuarios');
    mysqli_close($con);
    return $res;
}
function cadastrar($us, $em, $tel){
    $con=conexao();
    if($res=mysqli_query($con,"INSERT INTO tb_usuarios VALUES ('$us','$em','$tel',NULL)")){
        return true;
    }else{
        return false;
    }
    mysqli_close($con);
}
function deletar($id){
    $con=conexao();
    $res=mysqli_query($con,"DELETE FROM tb_usuarios WHERE id=$id");
    
    mysqli_close($con);
}

?>