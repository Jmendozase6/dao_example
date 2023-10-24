<?php
include '../data_access_objects/friend_dao.php';

$friendDAO = new FriendDAO();
$xid = (int)$_GET['id'];
$friendDAO->deleteFriend($xid);

header('Location: friends_list.php');