<?php
if (isset($_SESSION['nom']) && isset($_SESSION['id']) && isset($_SESSION['email'])){
    $check = $db->prepare('SELECT COUNT(*) FROM info WHERE id = :id');
    $check->execute(['id' => $_SESSION['id']]);
    $exists = $check->fetchColumn();
                    
    if ($exists >= 1) {
        $idError = '<p class="verification">Cet ID existe déjà !</p>';
    } else {
        $insert = $db->prepare('INSERT INTO info (id,nom,email) VALUES (:id,:nom,:email)');
        $insert->execute(['id' => $id, 'nom' => $nom, 'email' => $email]);
    }                
}
?>