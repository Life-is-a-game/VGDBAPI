<?php
include("../connection.php");
$db = new dbObj();
$connection = $db->getConnString();

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method){
    case 'GET':
        if(isset($_GET["game_id"])){
            if (!empty($_GET["game_id"])) {
                $id = intval($_GET["game_id"]);
                get_game_by_id($id);
            }
            else{
                get_games();
            }
        }
        elseif(isset($_GET["game_name"])){
            if (!empty($_GET["game_name"])) {
                $name = $_GET["game_name"];
                get_games_by_name($name);
            }
            else{
                get_games();
            }
        }
        elseif(isset($_GET["publisher"])){
            if (!empty($_GET["publisher"])) {
                $name = $_GET["publisher"];
                get_games_by_publisher($name);
            }
            else{
                get_games();
            }
        }
        else{
            get_games();
        }
        break;
    case 'POST':
        insert_game();
        break;
    case 'PUT':
        update_game();
        break;
    case 'DELETE':
        $id = intval($_GET["game_id"]);
        delete_game($id);
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function get_games(){
    global $connection;
    $query = "SELECT * FROM vg_table";
    $response = array();
    $result = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($result)){
        $response[] = $row;
    }

    header("Content-Type: application/json");
    echo json_encode($response);
}

function get_game_by_id($id=0){
    global $connection;

    $query = "SELECT * FROM vg_table WHERE `game_id` =".$id." LIMIT 1";

    $response = array();
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result)){
        $response[] = $row;
    }
    header("Content-Type: application/json");
    echo json_encode($response);
}

function get_games_by_name($name){
    global $connection;

    $query = "SELECT * FROM vg_table WHERE `game_name` LIKE '%".$name."%'";

    $response = array();
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result)){
        $response[] = $row;
    }
    header("Content-Type: application/json");
    echo json_encode($response);
}

function get_games_by_publisher($name){
    global $connection;

    $query = "SELECT * FROM vg_table WHERE `publisher` LIKE '%".$name."%'";

    $response = array();
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result)){
        $response[] = $row;
    }
    header("Content-Type: application/json");
    echo json_encode($response);
}

function insert_game(){
    global $connection;

    $data = json_decode(file_get_contents('php://input'), true);

    $name = $data["game_name"];
    $genre = $data["genre"];
    $publisher = $data["publisher"];
    $platforms = $data["platforms"];
    $pegi_age = $data["pegi_age"];
    $release = $data["release_date"];
    $description = $data["description"];

    $query = "INSERT INTO vg_table SET game_name='".$name."', genre='".$genre."', publisher='".$publisher."', platforms='".$platforms."', pegi_age='".$pegi_age."', release_date='".$release."', description='".$description."'";

    if(mysqli_query($connection, $query)){
        $response = array(
            'status' => 1,
            'status_message' => 'Game Added Successfully'
        );
    }
    else{
        $response = array(
            'status' => 1,
            'status_message' => 'Game Addition Failed.'
        );
    }
    header("Content-Type: application/json");
    echo json_encode($response);
}

function update_game(){
    global $connection;

    $post_vars = json_decode(file_get_contents("php://input"), true);

    $name = $data["game_name"];
    $genre = $data["genre"];
    $publisher = $data["publisher"];
    $platforms = $data["platforms"];
    $pegi_age = $data["pegi_age"];
    $release = $data["release_date"];
    $description = $data["description"];
    $id = $data["game_id"];

    $query = "UPDATE vg_table SET game_name='".$name."', genre='".$genre."', publisher='".$publisher."', platforms='".$platforms."', pegi_age='".$pegi_age."', release_date='".$release."', description='".$description."' WHERE game_id=".$id;

    if(mysqli_query($connection, $query)){
        $response = array(
            'status' => 1,
            'status_message' => 'Game Updated Successfully'
        );
    }
    else{
        $response = array(
            'status' => 1,
            'status_message' => 'Game Updation Failed.'
        );
    }
    
    header("Content-Type: application/json");
    echo json_encode($response);
}

function delete_game($id){
    global $connection;

    $query = "DELETE FROM vg_table WHERE game_id=".$id;

    if(mysqli_query($connection, $query)){
        $response = array(
            'status' => 1,
            'status_message' => 'Game Successfully Deleted.'
        );
    }
    else{
        $response = array(
            'status' => 1,
            'status_message' => 'Game Deletion Failed.'
        );
    }

    header("Content-Type: application/json");
    echo json_encode($response);
}
?>