<?php
include '../data_transfer_objects/friend_dto.php';
include '../data_access_objects/friend_dao.php';

$friendDTO = new FriendDTO();
$friendDAO = new FriendDAO();
print_r($_POST);
print_r($_GET);

if ($_POST) {
    if (isset($_GET['xid'])) {
        $friendDTO->setId($_GET['xid']);
    }

    $friendDTO->setPaternalLastName($_POST['paternal']);
    $friendDTO->setMaternalLastName($_POST['maternal']);
    $friendDTO->setName($_POST['name']);

    if ($friendDTO->getId() > 0) {
        $friendDAO->updateFriend($friendDTO);
    } else {
        $friendDAO->addFriend($friendDTO);
    }
    header('Location: friends_list.php');
}