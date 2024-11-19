<?php
session_start();
include_once("database_connect.php");
// Check connection
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $id = (int)$_POST['id'];
    $nev = $_POST['nev'];
    $szak = $_POST['szak'];
    $atlag = (float)$_POST['atlag'];

    $smt = $conn->prepare("UPDATE hallgatok SET nev = ?, szak = ?, atlag = ? where id = ?;");
    $smt->bind_param("ssdi",$nev, $szak, $atlag, $id);
    $smt->execute();
    $smt->close();
    header("Location: listazas.php");
    $conn->close();

} else {
    $smt =$conn->prepare("SELECT * FROM hallgatok WHERE id = ?;");
    $smt->bind_param("i",$_GET['id']);
    $smt->execute();

    $result = $smt->get_result();
    $row = $result->fetch_assoc();
    $smt->close();
    $conn->close();
}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
Nev:<input type="Text" name="nev" value="<?php echo $row['nev']; ?>"><br>
Szak:<input type="Text" name="szak" value="<?php echo $row['szak']; ?>"><br>
Atlag:<input type="Text" name="atlag" value="<?php echo $row['atlag']; ?>"><br>
<input type="hidden" name="id" value="<?php echo $row['id']; ?>" >
<input type="Submit" name="submit" value="Elkuld">
</form>

<?