<?php
require_once 'Database.php';

// Create database connection
$database = new Database();
$db = $database->getConnection();

// Example query
try {
    $query = "SELECT * FROM your_table";
    $stmt = $db->prepare($query);
    $stmt->execute();
    
    // Fetch results
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Process your data here
        print_r($row);
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?> 