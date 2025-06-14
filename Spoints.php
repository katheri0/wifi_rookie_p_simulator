<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>points</title>
</head>
<body>
<?php include 'header.php'?>
<div calss ="s">
<form action="index.php" name="login" class="F" style="margin-bottom: 145px;" >
                <table>
                <tbody>
                <?php
                include 'conn.php';
                $conn = getconnaction();
               
                $sql = "SELECT * FROM spoints";
                $data = $conn->query($sql);

                while($row = $data->fetch())
                {
                    echo "
                    <tr><td>$row[nameofspoint]</td></tr>
                </tr>
                    
                    ";
                }
                ?>
                </tbody>
            </table>
            </form>
            </div>
            <?php include 'footer.php'?>

</body>
</html>