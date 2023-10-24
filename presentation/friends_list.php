<?php
require_once '../data_access_objects/friend_dao.php';
$friendDAO = new FriendDAO();
$friends = $friendDAO->getFriends();
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
  <title>Friends List</title>
</head>
<body data-bs-theme="dark">

<div class="p-3 mb-2 text-warning-emphasis">
  <div class="p-3 mb-2 text-info-emphasis">
    CRUD Friends
  </div>
  <br>
  <a href="friends_form.php" class="btn btn-warning">Nuevo</a> <br> <br>
  <div class="col-md-8">
    <table class="table">
      <thead class="table-success table-info">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Paternal</th>
        <th scope="col">Maternal</th>
        <th scope="col">Name</th>
        <th></th>
        <th></th>
      </tr>
      </thead>
      <tbody>
      <?php foreach ($friends as $friend) { ?>
        <tr>
          <td><?php echo $friend['id'] ?></td>
          <td><?php echo $friend['paternalLastName'] ?></td>
          <td><?php echo $friend['maternalLastName'] ?></td>
          <td><?php echo $friend['name'] ?></td>
          <td>
            <a href="friends_form.php?id=<?php echo $friend['id'] ?>" class="btn btn-warning">Update</a>
          </td>
          <td>
            <a href="friends_delete.php?id=<?php echo $friend['id'] ?>" class="btn btn-danger">Delete</a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
    <h1>Carta</h1>
    <div class="row">
        <?php foreach ($friends as $friend) { ?>
          <div class="card p-0 m-2" style="width: 13rem;">
            <img src="https://i.pinimg.com/originals/ed/eb/17/edeb170cfc9dfa93fb6bfd9a5db77a40.jpg" class="card-img" alt="image">
            <div class="card-body">
              <h5 class="card-title"><?php echo $friend['name'] ?></h5>
              <p class="card-text"><?php echo $friend['paternalLastName'] . ' ' . $friend['maternalLastName'] ?></p>
<!--                          <a href="#" class="btn btn-primary">Go</a>-->
            </div>
          </div>
        <?php } ?>
    </div>

  </div>
</div>

</body>
</html>