<?php
include 'config.php';

// Get JSON input
$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    $teamA = $data['teamA'];
    $scoreA = $data['scoreA'];
    $tryScorerA = $data['tryScorerA'];
    $playersA = $data['playersA'];

    $teamB = $data['teamB'];
    $scoreB = $data['scoreB'];
    $tryScorerB = $data['tryScorerB'];
    $playersB = $data['playersB'];

    // Insert data into MySQL
    $sql = "INSERT INTO teams (team_name, score, try_scorer, players) VALUES 
        ('$teamA', '$scoreA', '$tryScorerA', '$playersA'),
        ('$teamB', '$scoreB', '$tryScorerB', '$playersB')";

    if ($conn->query($sql) === TRUE) {
        echo "Score saved successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>