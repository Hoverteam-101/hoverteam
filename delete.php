<?php   
    $check = $db->prepare('SELECT COUNT(*) FROM info WHERE id = :id');
    $check->execute(['id' => $_SESSION['id']]);
    $exists = $check->fetchColumn();
    if ($exists === 0) {
        $deleteError = '<p class="verification">Cet ID n\'existe pas !</p>';
    }else {
        $delete = $db->prepare('DELETE FROM info WHERE id = :id');
        $delete->execute(['id' => $_SESSION['id']]);
    }
    
?>
