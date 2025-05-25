<?php
require_once("../../database/db_conn.php");

if (isset($_GET['getCar'])) {

    //Mbrojtja nga SQL Injection "?"
    $id = intval($_GET['getCar']);
    $stmt = $con->prepare("SELECT * FROM cars WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    echo json_encode($result->fetch_assoc());
    $stmt->close();
    $con->close();
    exit(); 
}

$query = "SELECT cars.*, models.model FROM cars 
        LEFT JOIN models ON cars.model_id = models.id 
        ORDER BY cars.id DESC";

$result = $con->query($query);

$output = '';
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $output .= "<tr>
            <td>" . htmlspecialchars($row['car_name']) . "</td>
            <td>" . htmlspecialchars($row['model']) . "</td>
            <td class='text-blue'>€" . number_format($row['price'], 2) . "</td>
            <td>" . $row['relased_year'] . "</td>
            <td>" . htmlspecialchars($row['location']) . "</td>
            <td>" . $row['fuel'] . "</td>
            <td>" . $row['transmission'] . "</td>
            <td>" . number_format($row['km']) . " km</td>
            <td><span class='" . ($row['status'] === 'New' ? 'badge-new' : 'badge-used') . "'>" . $row['status'] . "</span></td>
            <td class='text-end'>
                <button class='btn btn-outline-primary btn-sm edit-btn' data-id='" . $row['id'] . "'>
                    <i class='bi bi-pencil-square'></i>
                </button>
                <button class='btn btn-outline-danger btn-sm delete-btn' data-id='" . $row['id'] . "'>
                    <i class='bi bi-trash'></i>
                </button>
            </td>
        </tr>";
    }
} else {
    $output .= "<tr><td colspan='10' class='text-center text-muted'>No cars found.</td></tr>";
}

echo $output;
?>
