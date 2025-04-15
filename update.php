<?php
        $check = $db->prepare('SELECT COUNT(*) FROM info WHERE id = :id');
        $check->execute(['id' => $_SESSION['id']]);
        $exists = $check->fetchColumn();
        if ($exists === 0) {
            $idError = '<p class="verification">Cet ID n\'existe pas !</p>';
        }else {
            $update = $db->prepare('UPDATE info SET nom= :nom, email = :email WHERE id = :id');
            $update->execute(['id' => $_SESSION['id'] , 'nom' => $_SESSION['nom'] , 'email' => $_SESSION['email']]);
        }
    
    
?>