<?php
if(!isset($_SESSION)){
    session_start();
}

include('./admininclude/header.php');
include('../database.php');

    if(isset($_SESSION['is_adminlogin'])){
    $adminEmail = $_SESSION['adminLogEmail'];
    }else{
        echo "<script> location.href='../index.php'; </script>";
    }

    // Fetch courses for the dropdown
$sql = "SELECT course_ID, course_name FROM course"; // Ensure your table and column names are correct
$result = $conn->query($sql);
$courses = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
}

if (isset($_REQUEST['searchBtn']) && !empty($_REQUEST['selectedCourse'])) {
    [$course_ID, $course_name] = explode(' - ', $_REQUEST['selectedCourse']);
    $_SESSION['course_ID'] = $course_ID;
    $_SESSION['course_name'] = $course_name;
    // Now you can use the course ID to fetch related lessons or perform other actions
}
?>



<div class="col-sm-9 mt-5 mx-3">
    <form action="" class="mt-3 form-inline d-print-none" method="post">
        <div class="form-group mr-3">
            <label for="selectedCourse">Select Course:</label>
            <select class="form-control ml-3" id="selectedCourse" name="selectedCourse">
                <option value="">Select Course</option>
                <?php foreach ($courses as $course) : ?>
                    <option value="<?php echo htmlspecialchars($course['course_ID'] . ' - ' . $course['course_name']); ?>">
                        <?php echo htmlspecialchars($course['course_ID'] . ' - ' . $course['course_name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-danger" name="searchBtn">Search</button>
    </form>

    <?php 

if (isset($_REQUEST['searchBtn']) && !empty($_REQUEST['selectedCourse'])) {
    // Extracting the Course ID from the selected option
    list($course_id, $course_name) = explode(' - ', $_REQUEST['selectedCourse'], 2);

    $sql = "SELECT * FROM course WHERE course_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $course_ID);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $_SESSION['course_ID'] = $row['course_ID'];
        $_SESSION['course_name'] = $row['course_name'];
        ?>
        <h3 class="mt-5 bg-dark text-white p-2">Course ID: <?php echo $row['course_ID']; ?> Course Name: <?php echo $row['course_name']; ?> </h3>
    <?php
    $sql = "SELECT * FROM lesson WHERE course_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();
                echo '<table class="table">
                    <thread>
                        <tr>
                        <th scope="col">Lesson ID</th>
                        <th scope="col">Lesson Name</th>
                        <th scope="col">Lesson Link</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thread>
                    <tbody>';
                    while($row = $result->fetch_assoc()){ 
                        echo '<tr>';
                        echo '<th scope="row">'.$row['lesson_ID'].'</th>';
                        echo '<td>'.$row['lesson_name'].'</td>';
                        echo '<td>'.$row['lesson_link'].'</td>';
                        echo '<td> <form action="editlesson.php" method="POST" class="d-inline">
                        <input type="hidden" name="id" value="'.$row["lesson_ID"].'">
    
                            <button
                                type="submit"
                                class="btn btn-info mr-3"
                                name="view"
                                value="view">
                                <i class="fas fa-pen"></i>
                            </button>
                        </form>
                    
                        <form action="" method="POST" class="d-inline">
                        <input type="hidden" name="id" value="'.$row["lesson_ID"].'">
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
                }
            echo '</tbody>
                </table>';
            } else {
                    echo '<div class="alert alert-dark mt-4" role="alert"> Course NOt Found !</div>';
                }

            if(isset($_REQUEST['delete'])){
                $sql = "DELETE FROM lesson WHERE lesson_ID = {$_REQUEST['id']}";
                if($conn->query($sql) === TRUE){
                    echo'<meta http-equiv="refresh" content = "0;URL=?deleted" />';
                } else {
                    echo "Unable to Delete Date";
                }
            }
            }   
        
    
    ?>
</div>

<?php
if(isset($_SESSION['course_ID'])){
    echo' <div>
    <a class="btn btn-danger box" href="./addlesson.php"><i 
    class="fas fa-plus fa-2x"></i></a>
    </div>';
}
?>



<?php
include('./admininclude/footer.php');
?>