<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>PHP CRUD Application</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573">
        PHP Complete CRUD Application
    </nav>

    <div class="container">
        <?php
        if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
             ' . $msg . '
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
        }
        ?>
        <a href="add_new.php" class="btn btn-dark mb-3">Add New</a>
        <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <td scope="col">ID</td>
                    <td scope="col">First Name</td>
                    <td scope="col">Last Name</td>
                    <td scope="col">Email</td>
                    <td scope="col">Gender</td>
                    <td scope="col">Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                include "db_conn.php";
                $sql = "SELECT * FROM `crud`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <th><?php echo $row['id'] ?></th>
                        <th><?php echo $row['first_name'] ?></th>
                        <th><?php echo $row['last_name'] ?></th>
                        <th><?php echo $row['email'] ?></th>
                        <th><?php echo $row['gender'] ?></th>

                        <td>
                            <a href="edit.php?id=<?php echo $row['id'] ?>"
                                class="link-dark"><i class="fa-solid fa-pen-to-square
                                fs-5 me-3"></i></a>
                            <a href="delete.php?id=<?php echo $row['id'] ?>"
                                class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>