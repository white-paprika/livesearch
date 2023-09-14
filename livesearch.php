<?php
include('config.php');
if(isset($_POST['input'])){ //Приходит из ajax запроса в index.html как data ( data:{input:input} )
   
    $input = $_POST['input'];

    $query = "SELECT * FROM searchperson WHERE name LIKE '{$input}%'";

    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0){?>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>Id</th> <!--Выводит конзаголовки таблицы-->
                    <th>Name</th>
                    <th>Age</th>
                    <th>Country</th>
                    <th>Email</th>
                    <th>Occupation</th>
                    <th>Redirect</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = mysqli_fetch_assoc($result)){ // переводит result в нужный формат

                        $id = $row['id']; // расчленяет на переменные
                        $name = $row['name'];
                        $age = $row['age'];
                        $country = $row['country'];
                        $email = $row['email'];
                        $occupation = $row['occupation'];

                        ?>
                        <tr>
                            <td><?php echo $id;?></td> <!--Выводит контент в таблицу-->
                            <td><?php echo $name;?></td>
                            <td><?php echo $age;?></td>
                            <td><?php echo $country;?></td>
                            <td><?php echo $email;?></td>
                            <td><?php echo $occupation;?></td>
                            <td>
                                <form action="profile.php" method="POST"> <!-- переходит и передает данные на сраницу profile.php  --> 
                                    <input type="text" class="profileID" style="display:none;" name="profileID" value="<?php echo $id;?>"> 
                                    <input type="submit" value="Go To Profile">
                                </form>
                            </td>

                        </tr>

                        <?php
                    }
                ?>
            </tbody>
        </table>
        <?php


    }else{
        echo "<h6 class='text-danger text-center mt-3'>No Data Found</h6>";
    }
}
?>