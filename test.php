
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Form and Table Layout</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      display: flex;
      height: 100vh;
    }

    .container {
      display: flex;
      width: 100%;
    }

    .form-section {
      width: 40%;
      padding: 30px;
      background-color: #f5f5f5;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .form-section h2 {
      margin-bottom: 20px;
    }

    .form-section form {
      display: flex;
      flex-direction: column;
    }

    .form-section label {
      margin-top: 10px;
      margin-bottom: 5px;
    }

    .form-section input {
      padding: 8px;
      font-size: 16px;
    }

    .form-section button {
      margin-top: 20px;
      padding: 10px;
      background-color: #007bff;
      color: white;
      border: none;
      font-size: 16px;
      cursor: pointer;
    }

    .table-section {
      flex: 1;
      padding: 30px;
    }

    .table-section h2 {
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: #007bff;
      color: white;
    }


    img {
        width: 200px;
    }


    .Erreur, .verification {
    color: red;
    font-size: 12px;
    margin-top: 5px;
  }
  </style>
</head>
<body>

<div class="container">
    
  <!-- Left side: form -->
  <div class="form-section">
  <img src="https://cdn-icons-png.flaticon.com/512/6915/6915669.png">
    <h2> Admin Dashboard</h2>
    <form action="test.php" method="POST" >
      <label for="id">ID:</label>
      <input type="text" name="id" id="id" required>

      <label for="name">Name:</label>
      <input type="text" name="name" id="name" required>

      <label for="address">Address:</label>
      <input type="text" name="address" id="address" required>

      <button type="submit">ADD</button>
      <button type="submit">DELETE</button>
    </form>
  </div>

  <!-- Right side: table -->
  <div class="table-section">
    <h2>Information Table</h2>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Address</th>
        </tr>
      </thead>
      <tbody>
        <!-- You will generate rows here with PHP -->
        <!-- Example static row -->
        <tr>
          <td>1</td>
          <td>John Doe</td>
          <td>123 Main St</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>
<?php
session_start();

$nomError = "";
$emailError = "";
$idError = "";
$validate = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $nom = $_POST['nom'] ?? '';
    $email = $_POST['address'] ?? '';

    if (empty($id)) {
        $idError = '<p class="Erreur">Remplir le champ</p>';
    }

    if (empty($nom)) {
        $nomError = '<p class="Erreur">Remplir le champ</p>';
    } elseif (!preg_match('/^[a-zA-Z]{3,15}$/', $nom)) {
        $nomError = '<p class="verification">Syntax Erreur</p>';
    }

    if (empty($email)) {
        $emailError = '<p class="Erreur">Entrez votre email</p>';
    } elseif (!preg_match('/^[a-zA-Z0-9._-]+@gmail\.com$/', $email)) {
        $emailError = '<p class="verification">Syntax Erreur</p>';
    }

    if (empty($idError) && empty($nomError) && empty($emailError)) {
        $_SESSION['id'] = $id;
        $_SESSION['nom'] = $nom;
        $_SESSION['email'] = $email;
        $validate = true;

        // Optional: Redirect to avoid form resubmission
        // header("Location: index.php");
        // exit;
    }
}
?>
