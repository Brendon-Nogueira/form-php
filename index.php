<?php

include_once './conexao.php';

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form PHP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <section>

    <form method="POST" action="">

      <h2>Form Student </h2>

      <?php
      $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

      if (!empty($data['msgCont'])) {
        // verificando o dado que está sendo passado na variavél data var_dump($data);

        if (empty($data['name'])) {
          echo "<p style='color : red'>Error it is necessary to replace the name field</p>";
        } else if(empty($data['email'])){
          echo "<p style='color : red'> Error it is necessaty to replace the email field</p>";
        } else if(empty($data['subject'])){
          echo "<p style='color : red'> Error it is necessaty to replace the subject field</p>";
        }  else if(empty($data['content'])){
          echo "<p style='color : red'> Error it is necessaty to replace the content field</p>";
        } else {

          $query_student = "INSERT INTO students (name, email, subject, content) VALUES (:name, :email, :subject, :content)";
          $add =  $conection->prepare($query_student);
          $add->bindParam(':name', $data['name'], PDO::PARAM_STR);
          $add->bindParam(':email', $data['email'], PDO::PARAM_STR);
          $add->bindParam(':subject', $data['subject'], PDO::PARAM_STR);
          $add->bindParam(':content', $data['content'], PDO::PARAM_STR);

          $add->execute();

          if ($add->rowCount()) {
            echo "<p style='color : green; '>Successfully</p> ";
          } else {
            echo "<p style='color : red; '>Error message not sent</p> ";
          }
        }
      }
      ?>

      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="name" value="<?php if(isset($data['name'])){
          echo $data['name'];
        }?>">
        <br>
      </div>

      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="<?php if(isset($data['email'])){
          echo $data['email'];
        }?>" >
        <br>
      </div>

      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Technical Matter</label>
        <input type="text" name="subject" class="form-control" id="exampleFormControlInput1" placeholder="subject" value="<?php if(isset($data['subject'])){
          echo $data['subject'];
        }?>">
        <br>
      </div>


      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Contents</label>
        <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3" cols="30" placeholder="message content" value="<?php if(isset($data['content'])){
          echo $data['content'];
        }?>"></textarea>
        <br>
      </div>

      <div>
        <input type="submit" value="Send" name="msgCont">
        <br>
      </div>



    </form>

  </section>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</body>

</html>