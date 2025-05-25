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
    foreach ($conditions as &$cond) {
        $params[] = $cond;
    }
    unset($cond);
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

// Demonstrim: Vendos referencë te fundi i params dhe modifiko
$lastRef = &$params[count($params) - 1];
$lastRef = strtoupper($lastRef);

$stmt = $con->prepare($sql);
if ($stmt === false) {
    echo '<div class="col-12"><div class="alert alert-danger">Query error!</div></div>';
    exit;
}

$stmt->bind_param($bindTypes, ...$params);
$stmt->execute();
$result = $stmt->get_result();

$html = '';

// Web API per real time value t'bitcoinit
if (!isset($_SESSION['btc_rate']) || time() - $_SESSION['btc_time'] > 60) {
    $btcResponse = @file_get_contents("https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=eur");
    if ($btcResponse !== false) {
        $btcData = json_decode($btcResponse, true);
        if (isset($btcData["bitcoin"]["eur"])) {
            $_SESSION['btc_rate'] = $btcData["bitcoin"]["eur"];
            $_SESSION['btc_time'] = time();
        }
    }
}

$btcRate = $_SESSION['btc_rate'] ?? null;

if ($result->num_rows > 0) {
    function &getCarReferenceByIndex(array &$cars, int $index) {
        if (isset($cars[$index])) {
            return $cars[$index];
        }
        static $null = null;
        return $null;
    }

    $carsArr = [];
    while ($row = $result->fetch_assoc()) {
        $carsArr[] = $row;
    }

    $carRef = &getCarReferenceByIndex($carsArr, 0);
    if ($carRef !== null) {
        $carRef['highlighted'] = true;
    }

    foreach ($carsArr as $row) {
        $badge = $row['status'] === 'New' ? 'bg-primary' : 'bg-secondary';
        $highlightClass = isset($row['highlighted']) && $row['highlighted'] ? 'border border-warning' : '';

        $html .= '
        <div class="col-md-6">
            <div class="card h-100 shadow-sm hover-shadow ' . $highlightClass . '">
                <div class="position-relative">
                    <img src="' . htmlspecialchars($row['cover_img']) . '" class="card-img-top" style="height: 180px; object-fit: cover;" alt="' . htmlspecialchars($row['car_name']) . '">
                    <div class="position-absolute top-0 start-0 m-2 badge ' . $badge . '">' . htmlspecialchars($row['status']) . '</div>
                </div>
                <div class="card-body">
                    <p class="card-text small text-muted mb-1">' . htmlspecialchars($row['fuel']) . ' • ' . htmlspecialchars($row['transmission']) . '</p>
                    <h5 class="card-title fw-bold mb-1">' . htmlspecialchars($row['car_name'] . ' ' . $row['model']) . '</h5>
                    <div class="mb-2">
                        <div class="fs-4 fw-bold">€' . number_format($row['price']) . '</div>';

        
                    if ($btcRate !== null) {
                        $discounted = $row['price'] * 0.95;
                        $btcPrice = $discounted / $btcRate;
                        $html .= '<div class="small">Pay with Bitcoin (-5%): <strong class="text-warning">' . number_format($btcPrice, 3) . ' BTC</strong></div>';
                    }
        $html .= '
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
?>
