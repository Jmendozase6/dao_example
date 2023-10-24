<?php
require_once '../data_access_objects/friend_dao.php';
if ($_GET) {
    $id = $_GET['id'];
    $friendDAO = new FriendDAO();
    $friend = $friendDAO->getFriendById($id);
    $xid = $friend['id'];
    $name = $friend['name'];
    $paternal = $friend['paternalLastName'];
    $maternal = $friend['maternalLastName'];
} else {
    $xid = 0;
    $paternal = '';
    $maternal = '';
    $name = '';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/styles.css">
  <title>Friends Table</title>
</head>
<body data-bs-theme="dark">
<div class="container mt-5">
  <div class="col-md">
    <h3>Update Information</h3>
    <form action="friends_save.php<?php if ($xid > 0) {
        echo "?xid=$xid";
    } ?>" method="POST">

<!--      <label for="id">ID</label>-->
<!--      <input type="text" class="form-control mb-3" name="id" value="--><?php //echo $xid ?><!--" id="id" readonly>-->

      <label for="paternal" class="mb-2">Paternal</label>
      <input type="text" class="form-control mb-3" name="paternal" value="<?php echo $paternal ?>" id="paternal"
             required>

      <label for="maternal" class="mb-2">Maternal</label>
      <input type="text" class="form-control mb-3" name="maternal" value="<?php echo $maternal ?>"
             id="maternal" required>

      <label for="name" class="mb-2">Name</label>
      <input type="text" class="form-control mb-3" name="name" value="<?php echo $name ?>" id="name" required>

      <input type="submit" value="<?php if ($xid == 0) {
          echo 'Save';
      } else {
          echo 'Update';
      } ?>" class="btn btn-primary">
    </form>
  </div>
</div>
</body>
</html>
