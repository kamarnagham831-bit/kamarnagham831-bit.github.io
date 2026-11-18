<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>سجلات الطلاب</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        form { background: white; padding: 15px; margin-bottom: 20px; border-radius: 5px; }
        input { padding: 8px; margin-left: 10px; border: 1px solid #ccc; border-radius: 3px; }
        button { padding: 8px 15px; background-color: #28a745; color: white; border: none; border-radius: 3px; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background-color: #333; color: white; }
    </style>
</head>
<body>

<nav><a href="index.php">الرئيسية</a></nav>

<h2>إدارة بيانات الطلاب</h2>

<form action="" method="POST">
    <input type="text" name="id" placeholder="رقم الطالب" required>
    <input type="text" name="name" placeholder="اسم الطالب" required>
    <button type="submit" name="submit">إضافة</button>
</form>

<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $stmt = $pdo->prepare("INSERT INTO students (id, Name) VALUES (?, ?)");
    $stmt->execute([$id, $name]);
    echo "<script>window.location.href='students.php';</script>";
}
?>

<table>
    <tr>
        <th>رقم الطالب</th>
        <th>الاسم</th>
    </tr>
    <?php
    $stmt = $pdo->query("SELECT id, Name FROM students");
    while ($row = $stmt->fetch()) {
        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['Name'] . "</td></tr>";
    }
    ?>
</table>

</body>
</html>