<?php
// ---------------- ERROR REPORTING ----------------
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ---------------- CORS HEADERS ----------------
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// ---------------- HANDLE OPTIONS (FLUTTER WEB) ----------------
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// ---------------- DB CONNECTION ----------------
$conn = new mysqli("localhost", "root", "", "apidb");

if ($conn->connect_error) {
    echo json_encode(["status" => false, "error" => "DB connection failed"]);
    exit;
}

// ---------------- READ JSON BODY ----------------
$data = json_decode(file_get_contents("php://input"), true);
$action = $data['action'] ?? '';

// =================================================
// ==================== REGISTER ===================
// =================================================
if ($action === "register") {

    if (
        empty($data['name']) ||
        empty($data['email']) ||
        empty($data['age']) ||
        empty($data['password'])
    ) {
        echo json_encode(["status" => false, "error" => "Missing fields"]);
        exit;
    }

    $name = $conn->real_escape_string($data['name']);
    $email = $conn->real_escape_string($data['email']);
    $age = intval($data['age']);
    $password = $conn->real_escape_string($data['password']);

    $sql = "INSERT INTO users (name, email, age, password)
            VALUES ('$name', '$email', $age, '$password')";

    if ($conn->query($sql)) {
        echo json_encode(["status" => true]);
    } else {
        echo json_encode(["status" => false, "error" => $conn->error]);
    }
    exit;
}

// =================================================
// ===================== LOGIN =====================
// =================================================
if ($action === "login") {

    if (empty($data['email']) || empty($data['password'])) {
        echo json_encode(["status" => false]);
        exit;
    }

    $email = $conn->real_escape_string($data['email']);
    $password = $conn->real_escape_string($data['password']);

    $sql = "SELECT id FROM users
            WHERE email = '$email' AND password = '$password'";

    $res = $conn->query($sql);

    if ($res && $res->num_rows > 0) {
        $row = $res->fetch_assoc();
        echo json_encode([
            "status" => true,
            "user_id" => $row['id']
        ]);
    } else {
        echo json_encode(["status" => false]);
    }
    exit;
}

// =================================================
// ================== ADD PRODUCT =================
// =================================================
if ($action === "add_product") {

    if (
        empty($data['user_id']) ||
        empty($data['name']) ||
        empty($data['description'])
    ) {
        echo json_encode(["status" => false, "error" => "Missing fields"]);
        exit;
    }

    $user_id = intval($data['user_id']);
    $name = $conn->real_escape_string($data['name']);
    $description = $conn->real_escape_string($data['description']);

    // check user exists
    $check = $conn->query("SELECT id FROM users WHERE id = $user_id");
    if ($check->num_rows === 0) {
        echo json_encode(["status" => false, "error" => "User not found"]);
        exit;
    }

    $sql = "INSERT INTO products (user_id, product_name, product_description)
            VALUES ($user_id, '$name', '$description')";

    if ($conn->query($sql)) {
        echo json_encode(["status" => true]);
    } else {
        echo json_encode(["status" => false, "error" => $conn->error]);
    }
    exit;
}

// =================================================
// ================= FETCH PRODUCTS ===============
// =================================================
if ($action === "fetch_products") {

    if (empty($data['user_id'])) {
        echo json_encode([]);
        exit;
    }

    $user_id = intval($data['user_id']);

    $sql = "SELECT 
                id,
                product_name AS name,
                product_description AS description
            FROM products
            WHERE user_id = $user_id";

    $res = $conn->query($sql);

    $products = [];
    while ($row = $res->fetch_assoc()) {
        $products[] = $row;
    }

    echo json_encode($products);
    exit;
}

// =================================================
// ================= UPDATE PRODUCT ===============
// =================================================
if ($action === "update_product") {

    if (
        empty($data['id']) ||
        empty($data['name']) ||
        empty($data['description'])
    ) {
        echo json_encode(["status" => false]);
        exit;
    }

    $id = intval($data['id']);
    $name = $conn->real_escape_string($data['name']);
    $description = $conn->real_escape_string($data['description']);

    $sql = "UPDATE products
            SET product_name = '$name',
                product_description = '$description'
            WHERE id = $id";

    if ($conn->query($sql)) {
        echo json_encode(["status" => true]);
    } else {
        echo json_encode(["status" => false, "error" => $conn->error]);
    }
    exit;
}

// =================================================
// ================= DELETE PRODUCT ===============
// =================================================
if ($action === "delete_product") {

    if (empty($data['id'])) {
        echo json_encode(["status" => false]);
        exit;
    }

    $id = intval($data['id']);

    $sql = "DELETE FROM products WHERE id = $id";

    if ($conn->query($sql)) {
        echo json_encode(["status" => true]);
    } else {
        echo json_encode(["status" => false, "error" => $conn->error]);
    }
    exit;
}

// =================================================
// ================= INVALID ACTION ===============
// =================================================
echo json_encode(["status" => false, "error" => "Invalid action"]);
