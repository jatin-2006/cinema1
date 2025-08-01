<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "cinema_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (!$email || !$password) {
  echo json_encode(['status' => 'error', 'message' => 'Missing fields']);
  exit;
}

$stmt = $conn->prepare("SELECT * FROM data WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
  echo json_encode(['status' => 'success', 'name' => $user['name']]);
} else {
  echo json_encode(['status' => 'error', 'message' => 'Invalid credentials']);
}

$stmt->close();
$conn->close();
?>
