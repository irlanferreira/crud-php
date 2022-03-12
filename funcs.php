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
function getUsuario($id){
    $con=conexao();
    $res=mysqli_query($con,"SELECT * FROM tb_usuarios WHERE id=$id");
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
function editar($us,$email,$tel, $id){
    $con=conexao();
    $query="UPDATE tb_usuarios SET usuario = '$us', email='$email', telefone='$tel' WHERE id=$id";
    if(mysqli_query($con, $query)){
        return true;
    }else{
        return false;
    }

    mysqli_close($con);
}

?>