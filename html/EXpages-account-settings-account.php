<?php 
    // Create connection
    $connect = new mysqli('localhost', 'root', '', 'grad_status');

    // Check Connection

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
      }

    $sql = "SELECT * FROM status_student";
    $result = $connect->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Menu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>ข้อมูลราคาเมนูของร้าน</h1>
        <table>
            <thead>
                <tr>
                    <td width="5%">id</td>
                    <td width="25%">name</td>
                    <td width="25%">surname</td>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['s_id']; ?></td>
                        <td class="name">
                         <?php echo $row['s_name'];?>
                        </td>
                        <td><?php echo $row['s_surname']; ?></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>

    </div>
</body>
</html>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: 0;
}

body {
    font-size: 16px;
    font-family: Arial, Helvetica, sans-serif;
    background-color: #F2F3F4;
    color: #273746;
}

.container {
    margin: 20px auto;
    padding: 0;
    width: 980px;
}

h1 {
    margin-top: 20px;
    margin-bottom: 20px;
}

table {
    width: 100%;
    /* ผสาน border ระหว่าง table กับ td  */
    border-collapse: collapse;
}

table,
td {
    border: 1px solid #5D6D7E;
    text-align: center;
}

thead {
    background-color: #273746;
    color: #BDC3C7;
}

/* Striped Tables: ทำไฮไล์ในการแบ่ง row  */
tr:nth-child(even) {
    background-color: #BDC3C7;
}

td {
    height: 30px;
    vertical-align: center;
}

.name {
    text-align: left;
    padding-left: 16px;
}
</style>



