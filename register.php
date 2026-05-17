<?php
header('Content-Type: application/json');
require_once 'config/database.php';
require_once 'config/config.php'; // Optional: for other configs

// Get request method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
    exit;
}

// Sanitize and prepare inputs
$name = trim($_POST['fullname'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$password = $_POST['password'] ?? '';
$program = trim($_POST['program'] ?? '');
$year = trim($_POST['year'] ?? '1');
$dob = $_POST['dob'] ?? '';
$terms = isset($_POST['terms']) ? 1 : 0;

// Validation
$errors = [];

if (empty($name)) $errors[] = "Full name is required.";
if (empty($email)) $errors[] = "Email is required.";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format.";
if (empty($password)) $errors[] = "Password is required.";
if (strlen($password) < 6) $errors[] = "Password must be at least 6 characters.";
if (empty($program)) $errors[] = "Please select a program.";
if (!$terms) $errors[] = "You must agree to the terms and conditions.";

if (!empty($errors)) {
    echo json_encode(['success' => false, 'error' => implode(', ', $errors)]);
    exit;
}

// Check if email already exists
$stmt = $conn->prepare("SELECT id FROM students WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo json_encode(['success' => false, 'error' => "An account with this email already exists."]);
    $stmt->close();
    exit;
}
$stmt->close();

// Hash Password and Insert
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO students (fullname, email, phone, password, program, year_of_study, dob, terms) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssiisii", $name, $email, $phone, $passwordHash, $program, $year, $dob, $terms);

if ($stmt->execute()) {
    echo json_encode([
        'success' => true, 
        'message' => "Registration successful! Welcome to " . $program . "."
    ]);
} else {
    echo json_encode([
        'success' => false, 
        'error' => "Database error: " . $stmt->error
    ]);
}

$stmt->close();
$conn = null;
?>
