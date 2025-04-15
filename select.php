<?php
    // $select = $db->prepare('SELECT * FROM info ORDER BY id DESC LIMIT 1');
    $select = $db->prepare('SELECT * FROM info ');
    $select->execute();
    $_SESSION['info'] = $select->fetchAll(PDO::FETCH_ASSOC);
?>