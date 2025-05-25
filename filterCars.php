<?php
require_once("database/db_conn.php");

$conditions = $_POST['conditions'] ?? [];
$models = $_POST['models'] ?? [];
$minPrice = $_POST['minPrice'] ?? 500;
$maxPrice = $_POST['maxPrice'] ?? 8000000;

$sql = "SELECT c.*, m.model FROM cars c 
        LEFT JOIN models m ON c.model_id = m.id 
        WHERE c.price BETWEEN ? AND ?";

$params = [$minPrice, $maxPrice];
$bindTypes = "ii";

// Filtro statusin (New/Used)
if (!empty($conditions)) {
    $placeholders = implode(',', array_fill(0, count($conditions), '?'));
    $sql .= " AND c.status IN ($placeholders)";
    $params = array_merge($params, $conditions);
    $bindTypes .= str_repeat("s", count($conditions));
}

// Filtro sipas tipit SUV, saloon etj
if (!empty($models)) {
    $sql .= " AND m.model IN (" . implode(',', array_fill(0, count($models), '?')) . ")";
    foreach ($models as $model) {
        $params[] = $model;
        $bindTypes .= "s";
    }
}

$stmt = $con->prepare($sql);
if ($stmt === false) {
    echo '<div class="col-12"><div class="alert alert-danger">Query error!</div></div>';
    exit;
}

$stmt->bind_param($bindTypes, ...$params);
$stmt->execute();
$result = $stmt->get_result();

$html = '';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $badge = $row['status'] === 'New' ? 'bg-primary' : 'bg-secondary';
        $html .= '
        <div class="col-md-6">
            <div class="card h-100 shadow-sm hover-shadow">
                <div class="position-relative">
                    <img src="' . htmlspecialchars($row['cover_img']) . '" class="card-img-top" style="height: 180px; object-fit: cover;" alt="' . htmlspecialchars($row['car_name']) . '">
                    <div class="position-absolute top-0 start-0 m-2 badge ' . $badge . '">' . htmlspecialchars($row['status']) . '</div>
                </div>
                <div class="card-body">
                    <p class="card-text small text-muted mb-1">' . htmlspecialchars($row['fuel']) . ' • ' . htmlspecialchars($row['transmission']) . '</p>
                    <h5 class="card-title fw-bold mb-1">' . htmlspecialchars($row['car_name'] . ' ' . $row['model']) . '</h5>
                    <div class="mb-2">
                        <div class="fs-4 fw-bold">€' . number_format($row['price']) . '</div>
                        <div class="text-success small">Saving €1000 off RRP</div>
                    </div>
                    <div class="d-flex align-items-center small text-secondary mt-3">
                        <span>' . htmlspecialchars($row['relased_year']) . '</span>
                        <span class="mx-2">•</span>
                        <span>' . number_format($row['km']) . ' km</span>
                    </div>
                </div>
            </div>
        </div>';
    }
} else {
    $html = '<div class="col-12 text-center text-muted">No cars found for the selected filters.</div>';
}

echo $html;
