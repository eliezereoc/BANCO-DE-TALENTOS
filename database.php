<?php
require_once('config.php');
mysqli_report(MYSQLI_REPORT_STRICT);

function open_database() {
	try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($conn,"utf8");
		return $conn;
	} catch (Exception $e) {
		echo $e->getMessage();
		return null;
  }
}

function close_database($conn) {
	try {
		mysqli_close($conn);
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}

//Pesquisa Todos os Registros de uma Tabela
function busca_all( $table ) {
  return busca($table);
}

function buscaPorEmail($email){
  $conn = open_database();
  $found = null;
    try{
      $sql = "SELECT * FROM candidatos WHERE email = '$email' LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $found = mysqli_fetch_assoc($result);
      if(!isset($found)){
        $_SESSION['message'] = '<link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/bootstrap.css">    
        <link rel="stylesheet" href="../css/estilo.css">   
        <div class="container">
            <div class="container-fluid">                               
                <div class="alert alert-danger text-center h4" role="alert">
                    <strong>Você ainda não cadastrou seu curriculo!</strong>
                </div>
            </div>
        </div>';
      }
    }catch (Exception $e) {
      $_SESSION['message'] = $e->GetMessage();
      $_SESSION['type'] = 'danger';
    } 
  close_database($conn);
  return $found;
}


//Pesquisa um Registro pelo ID em uma Tabela
function busca( $table = null, $id = null ) {
  $database = open_database();
  $found = null;
  try {
    if ($id) {
      $sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
      $result = $database->query($sql);
      if ($result->num_rows > 0) {
        $found = $result->fetch_assoc();
      }
    } else {
      $sql = "SELECT * FROM " . $table;
      $result = $database->query($sql);
      if ($result->num_rows > 0) {
        $found = array();
        while ($row = $result->fetch_assoc()) {
          array_push($found, $row);
        } 
      }
    }
  } catch (Exception $e) {
    $_SESSION['message'] = $e->GetMessage();
    $_SESSION['type'] = 'danger';
  }
  close_database($database);
  return $found;
}




//Insere um registro no BD
function save($table = null, $data = null) {
  $database = open_database();
  $columns = null;
  $values = null;
  //print_r($data);
  foreach ($data as $key => $value) {
    $columns .= trim($key, "'") . ",";
    $values .= "'$value',";
  }
  // remove a ultima virgula
  $columns = rtrim($columns, ',');
  $values = rtrim($values, ',');  
  $sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values);";
  try {
    $database->query($sql);
    $_SESSION['message'] = '<div class="alert alert-success" role="alert">Registro realizado com sucesso</div>';
    $_SESSION['type'] = 'success';
  } catch (Exception $e) { 
    $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Atenção, os dados não foram salvos!</div>';
    $_SESSION['type'] = 'danger';
  } 
  close_database($database);
}

 //Remove uma linha de uma tabela pelo ID do registro
function remove( $table = null, $id = null ) {
  $database = open_database();	
  try {
    if ($id) {
      $sql = "DELETE FROM " . $table . " WHERE id = " . $id;
      $result = $database->query($sql);
      if ($result = $database->query($sql)) {   	
        $_SESSION['message'] = '<div class="alert alert-success" role="alert">Registro removido com sucesso</div>';
        $_SESSION['type'] = 'success';
      }
    }
  } catch (Exception $e) { 
    $_SESSION['message'] = $e->GetMessage();
    $_SESSION['type'] = 'danger';
  }
  close_database($database);
}

 //Atualiza um registro em uma tabela, por ID
function update($table = null, $id = 0, $data = null) {
  $database = open_database();
  $items = null;
  foreach ($data as $key => $value) {
    $items .= trim($key, "'") . "='$value',";
  }
  // remove a ultima virgula
  $items = rtrim($items, ',');
  $sql  = "UPDATE " . $table;
  $sql .= " SET $items";
  $sql .= " WHERE id=" . $id . ";";
  try {
    $database->query($sql);
    $_SESSION['message'] = '<div class="alert alert-success" role="alert">Registro atualizado com sucesso!</div>';
    $_SESSION['type'] = 'success';
  } catch (Exception $e) { 
    $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Registro não foi atualizado!</div>';
    $_SESSION['type'] = 'danger';
  } 
  close_database($database);
}





