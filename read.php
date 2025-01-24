<?php
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    require_once "config.php";
    $id = trim($_GET["id"]);
    $sql = "SELECT * FROM employees WHERE id = '$id'";
    $result = mysqli_query($link, $sql);
    
    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $name = $row["name"];
        $address = $row["address"];
        $salary = $row["salary"];
    } else {
        header("location: error.php");
        exit();
    }

    mysqli_close($link);
} else {
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="mb-4">View Record</h1>
        <div class="mb-3">
            <label class="form-label">Name</label>
            <p><strong><?= $name; ?></strong></p>
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <p><strong><?= $address; ?></strong></p>
        </div>
        <div class="mb-3">
            <label class="form-label">Salary</label>
            <p><strong><?= $salary; ?></strong></p>
        </div>
        <a href="index.php" class="btn btn-primary">Back</a>
    </div>
</body>
</html>
