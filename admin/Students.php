<?php
if(!isset($_SESSION)){
    session_start();
}

include('./admininclude/header.php');
include('../database.php');

// if (!isset($_SESSION['is_adminlogin'])) {
//     echo "<script> location.href='../index.php'; </script>";
//     exit;
// }else{
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// }

if(isset($_SESSION['is_adminlogin'])){
    $adminEmail = $_SESSION['adminLogEmail'];
}else{
    echo "<script> location.href='../index.php'; </script>";
}
?>

<div class="col-sm-9 mt-5">
    <p class="bg-dark text-white p-2">List of Students</p>
    <?php
        $sql ="SELECT * FROM student";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="Col">student ID</th>
                <th scope="Col">Name</th>
                <th scope="Col">Email</th>
                <th scope="Col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = $result->fetch_assoc()){ 
            echo '<tr>';
                echo '<th scope="row">'.$row['student_ID'].'</th>';
                echo '<td>'.$row['student_name'].'</td>';
                echo '<td>'.$row['student_email'].'</td>';
                echo '<td>';
                echo '
                    <form action="editstudent.php" method="POST" class="d-inline">
                    <input type="hidden" name="id" value="'.$row["student_ID"].'">

                        <button
                            type="submit"
                            class="btn btn-info mr-3"
                            name="view"
                            value="view">
                            <i class="fas fa-pen"></i>
                        </button>
                    </form>
                
                    <form action="" method="POST" class="d-inline">
                    <input type="hidden" name="id" value="'.$row["student_ID"].'">
                        <button
                        type="submit"
                        class="btn btn-secondary"
                        name="delete"
                        value="Delete">
                        <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>';
            } ?>
        </tbody>
    </table>
    <?php } else {
        echo "0 Result";
    }
    
    if(isset($_REQUEST['delete'])){
            $sql = "DELETE FROM student WHERE student_ID = {$_REQUEST['id']}";
        if($conn->query($sql) == TRUE){
            echo '<meta http-equiv="refresh" content="0; URL=?" />';
        } else{
            echo "Unable to Delete Data";
        }
    }
    ?>
</div>
<!--div Row close From header -->
<div>
    <a class="btn btn-danger box" href="./addNewStudent.php">
        <i class="fas fa-plus fa-2x"></i>
    </a>
</div>
</div>

<?php
include('./admininclude/footer.php');
?>