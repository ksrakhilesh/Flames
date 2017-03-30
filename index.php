<?php

function doWeShowOutput(){
  if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['name1']) && isset($_POST['name2']) && $_POST['name1'] != '' && $_POST['name2'] != '' ){
      return true;
    }}
}
if(doWeShowOutput()){
    $flames = [
      "Friend",
      "Lover",
      "Affection",
      "Marriage",
      "Enemy",
      "Sister"
    ];
    function FinalInput($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      $data = strtoupper($data);
      return $data;
    }
    $name1 = str_split(FinalInput($_POST["name1"]));
    $name2 = str_split(FinalInput($_POST["name2"]));
    if($name1 === $name2){
      $finalResult = "Both The Names Are Same!";
    }else{
      for ($i = 0; $i < count($name1); $i++) {
        for ($j = 0; $j < count($name2); $j++){
          if ($name1[$i] == $name2[$j]) {
            array_splice($name1, $i, 1);
            array_splice($name2, $j, 1);
            break;
          }
        }
      }
      $result = array_merge($name1, $name2);
      $finalCount = count( $result);
      $finalCount = (($finalCount-1)%6);
      $finalResult = $flames[$finalCount];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Flames</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <br><br><br>
    <form class="form-inline" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="form-group">
        <label for="name1">FirstName:</label>
        <input type="text" class="form-control" id="name1" name="name1" value="<?php if(doWeShowOutput()){echo $_POST['name1'];}?>">
      </div>
      <div class="form-group">
        <label for="name2">SecondName:</label>
        <input type="text" class="form-control" id="name2" name="name2" value="<?php if(doWeShowOutput()){echo $_POST['name2'];}?>">
      </div>
      <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
      <?php if(doWeShowOutput()){
        echo "<button class='btn btn-success'>".$finalResult."</button>";
      } ?>


      
    </form>
  </div>
</body>
</html>
