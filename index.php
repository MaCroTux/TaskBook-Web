<?php
$commands = ["delete", "check"];

$cat = $_GET['cat'];
$task = $_GET['task'];

if (!empty($cat) && in_array($cat, $commands)) {
 system("tb --$cat $task");
 header("Location: task.php");
} else {
 if (!empty($cat)) {
  system("tb --task @$cat $task");
  header("Location: task.php");
 } else if (isset($task)){
  system("tb --task $task");
  header("Location: task.php");
 }
}

$board = shell_exec("tb");

$board = preg_replace("/[@](.* )/", "<a href='?catName=$1'>@$1</a>", $board);

?><!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Task</title>
  </head>
  <body>
<div class="container">
<h1>Task</h1><hr/>
<?php
echo "<pre>";
echo $board;
echo "</pre>";
?>
<form action="task.php">
<input type="text" name="cat" placeholder="Categoria" value="<?php echo $_GET['catName'] ?? '' ?>">
<input type="text" name="task" placeholder="Tarea">
<input type="submit">
</form>

<form action="task.php">
<input type="hidden" name="cat" value="delete">
<input type="number" name="task" placeholder="Num tarea">
<input type="submit" value="Delete">
</form>

<form action="task.php">
<input type="hidden" name="cat" value="check">
<input type="number" name="task" placeholder="Num tarea">
<input type="submit" value="Finish">
</form>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
