<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Profile</title>
</head>
<body>
    
</body>
</html>
<?php
include('config.php');

$id = $_POST['profileID']; //Принимает данные с livesearch.php

$query = "SELECT * FROM searchperson WHERE id = '{$id}%'";

$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);

    $id = $row['id']; // расчленяет на переменные
    $name = $row['name'];
    $age = $row['age'];
    $country = $row['country'];
    $email = $row['email'];
    $occupation = $row['occupation'];
    $avatar = $row['avatar'];
    ?>

    <p>Name: <?php echo $name;?></p> <!--Вывод на страницу-->
    <p>Age: <?php echo $age;?></p>
    <p>Country: <?php echo $country;?></p>
    <p>Email: <?php echo $email;?></p>
    <p>Occupation: <?php echo $occupation;?></p>
    <img src="img/<?php echo $avatar;?>" alt="">  

<?php
}else{
    echo "<h6 class='text-danger text-center mt-3'>No Data Found</h6>";
}
?>

