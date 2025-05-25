<?php
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

require_once("../database/db_conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['car_name']) && !isset($_POST['update_car'])) {

    $car_name = $_POST['car_name'];
    $model_id = $_POST['model_id'];
    $relased_year = $_POST['relased_year'];
    $price = $_POST['price'];
    $location = $_POST['location'];
    $km = $_POST['km'];
    $fuel = $_POST['fuel'];
    $transmission = $_POST['transmission'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    $cover_img_path = '';
    if (!empty($_FILES['cover_img']['name'])) {
        $cover_img_name = time() . '_' . basename($_FILES['cover_img']['name']);
        $cover_img_path = 'uploads/' . $cover_img_name;
        move_uploaded_file($_FILES['cover_img']['tmp_name'], '../' . $cover_img_path);
    }

    $gallery_images = [];
    if (!empty($_FILES['images']['name'][0])) {
        foreach ($_FILES['images']['name'] as $key => $name) {
            $filename = time() . '_' . basename($name);
            $path = 'uploads/' . $filename;
            if (move_uploaded_file($_FILES['images']['tmp_name'][$key], '../' . $path)) {
                $gallery_images[] = $path;
            }
        }
    }

    $images_json = json_encode($gallery_images);

    $stmt = $con->prepare("INSERT INTO cars (car_name, model_id, relased_year, price, location, km, fuel, transmission, description, cover_img, images, status)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("siidsdssssss", $car_name, $model_id, $relased_year, $price, $location, $km, $fuel, $transmission, $description, $cover_img_path, $images_json, $status);

    if ($stmt->execute()) {
        echo 'success';
        exit();
    } else {
        echo "<div style='color:red; padding:20px;'>Error inserting: " . $stmt->error . "</div>";
        exit();
    }

    // $stmt->close();
    // $con->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['getCar'])) {
    $id = intval($_GET['getCar']);
    $stmt = $con->prepare("SELECT * FROM cars WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    echo json_encode($result->fetch_assoc());
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_car'])) {
    $stmt = $con->prepare("UPDATE cars 
        SET car_name=?, model_id=?, relased_year=?, price=?, location=?, km=?, fuel=?, transmission=?, description=?, status=?
        WHERE id=?");

    $stmt->bind_param(
        "siidsdssssi",
        $_POST['car_name'],
        $_POST['model_id'],
        $_POST['relased_year'],
        $_POST['price'],
        $_POST['location'],
        $_POST['km'],
        $_POST['fuel'],
        $_POST['transmission'],
        $_POST['description'],
        $_POST['status'],
        $_POST['id']
    );

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }

    $stmt->close();
    $con->close();
    exit();
}


if (isset($_GET['deleteCar'])) {
    $carId = intval($_GET['deleteCar']);

    $check = $con->prepare("SELECT id FROM cars WHERE id = ?");
    $check->bind_param("i", $carId);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $stmt = $con->prepare("DELETE FROM cars WHERE id = ?");
        $stmt->bind_param("i", $carId);
        if ($stmt->execute()) {
            echo 'success';
        } else {
            echo 'error';
        }
        $stmt->close();
    } else {
        echo 'not_found';
    }

    $check->close();
    $con->close();
    exit();
}

if (isset($_GET['refreshTable'])) {
    $query = "SELECT cars.*, models.model FROM cars 
                LEFT JOIN models ON cars.model_id = models.id 
                ORDER BY cars.id DESC";
    $result = $con->query($query);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
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
                    <a href='#' class='btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#editModal' onclick='loadCarData(" . $row['id'] . ")'>
                        <i class='bi bi-pencil-square'></i>
                    </a>
                    <button type='button' class='btn btn-outline-danger btn-sm' onclick='deleteCar(" . $row['id'] . ")'>
                        <i class='bi bi-trash'></i>
                    </button>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='10' class='text-center text-muted'>No cars found.</td></tr>";
    }
    exit();
}

if (isset($_GET['refreshTable'])) {
    $query = "SELECT cars.*, models.model FROM cars 
                LEFT JOIN models ON cars.model_id = models.id 
                ORDER BY cars.id DESC";
    $result = $con->query($query);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . htmlspecialchars($row['car_name']) . "</td>
                <td>" . htmlspecialchars($row['model']) . "</td>
                <td class='text-blue'>€" . number_format($row['price'], 1) . "</td>
                <td>" . $row['relased_year'] . "</td>
                <td>" . htmlspecialchars($row['location']) . "</td>
                <td>" . $row['fuel'] . "</td>
                <td>" . $row['transmission'] . "</td>
                <td>" . number_format($row['km']) . " km</td>
                <td><span class='" . ($row['status'] === 'New' ? 'badge-new' : 'badge-used') . "'>" . $row['status'] . "</span></td>
                <td class='text-end'>
                    <a href='#' class='btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#editModal' onclick='loadCarData(" . $row['id'] . ")'>
                        <i class='bi bi-pencil-square'></i>
                    </a>
                    <button type='button' class='btn btn-outline-danger btn-sm' onclick='deleteCar(" . $row['id'] . ")'>
                        <i class='bi bi-trash'></i>
                    </button>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='10' class='text-center text-muted'>No cars found.</td></tr>";
    }
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Carme | Cars Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="adminassets/admin.css">
    <link rel="stylesheet" href="../assets/style/style.css">
</head>

<body class="bg-light">

    <!-- Navbar and Sidebar -->
    <nav class="navbar navbar-expand-lg shadow-sm border-bottom">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a href="dashboard.php">
                <img src="../assets/img/company_logo.png" alt="logo" width="140" />
            </a>
            <button type="button" class="btn btn-default border-0" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"><i class="bi bi-grid h3"></i></button>
        </div>
    </nav>

    <div class="offcanvas offcanvas-start" id="offcanvasExample" tabindex="-1">
        <div class="offcanvas-header shadow">
            <h5 class="offcanvas-title"><i class="bi bi-person-circle me-2"></i> <?= $_SESSION['user_name']; ?></h5>
            <button class="btn-close costum shadow-none" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <div class="custom-button-group">
                <a href="dashboard.php" class="btn-custom"><i class="bi bi-grid-fill"></i><span>Dashboard</span></a>
                <a href="productsManagement.php" class="btn-custom"><i class="bi bi-caret-right me-2"></i><i class="bi bi-car-front-fill"></i><span>Cars</span></a>
                <a href="clientsManagement.php" class="btn-custom"><i class="bi bi-people-fill"></i><span>Clients</span></a>
                <a href="modelsManagement.php" class="btn-custom"><i class="bi bi-list-nested"></i><span>Models</span></a>
                <a href="../logout.php" class="btn-custom"><i class="bi bi-box-arrow-left"></i><span>Log Out</span></a>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="editCarForm" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Car</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body row g-3">
                        <input type="hidden" name="id" id="edit_id">

                        <div class="col-md-6">
                            <label class="form-label">Car Name</label>
                            <input type="text" name="car_name" id="edit_car_name" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Released Year</label>
                            <input type="number" name="relased_year" id="edit_year" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Price (€)</label>
                            <input type="number" name="price" id="edit_price" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Location</label>
                            <input type="text" name="location" id="edit_location" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">KM</label>
                            <input type="number" name="km" id="edit_km" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Fuel</label>
                            <select name="fuel" id="edit_fuel" class="form-select">
                                <option>Gasoline</option>
                                <option>Diesel</option>
                                <option>Electric</option>
                                <option>Hybrid</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Transmission</label>
                            <select name="transmission" id="edit_transmission" class="form-select">
                                <option>Manual</option>
                                <option>Automatic</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" id="edit_status" class="form-select">
                                <option>New</option>
                                <option>Used</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Model</label>
                            <select name="model_id" id="edit_model_id" class="form-select" required>
                                <option value="">Choose Model</option>
                                <?php
                                $models = $con->query("SELECT id, model FROM models");
                                while ($model = $models->fetch_assoc()) {
                                    echo "<option value='{$model['id']}'>{$model['model']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <textarea name="description" id="edit_description" class="form-control" rows="3"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container-fluid p-4">
        <div class="container-fluid">
            <div class="mb-4">
                <h2 class="fw-bold"><i class="bi bi-caret-right"></i>Cars Menagments</h2>
                <p class="text-muted">Adding a new car with all the requirements</p>
            </div>
            <div class="card shadow-sm p-4 mb-4">
                <h5 class="fw-semibold mb-3">Add a new car</h5>


                <form method="POST" action="productsManagement.php" enctype="multipart/form-data" id="addCarForm">
                    <div class="row g-3">

                        <!-- Car Name në fillim -->
                        <div class="col-md-4">
                            <label class="form-label">Car Name</label>
                            <input type="text" name="car_name" class="form-control" placeholder="Enter car name" required>
                        </div>

                        <!-- Model -->
                        <div class="col-md-4">
                            <label class="form-label">Model</label>
                            <select name="model_id" class="form-select" required>
                                <option value="">Choose Model</option>
                                <?php
                                $models = $con->query("SELECT id, model FROM models");
                                while ($model = $models->fetch_assoc()) {
                                    echo "<option value='{$model['id']}'>{$model['model']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Released Year -->
                        <div class="col-md-4">
                            <label class="form-label">Released Year</label>
                            <input type="number" name="relased_year" class="form-control" placeholder="2024" required>
                        </div>

                        <!-- Price -->
                        <div class="col-md-4">
                            <label class="form-label">Price (€)</label>
                            <input type="number" name="price" class="form-control" placeholder="€25000.00" required>
                        </div>

                        <!-- Location -->
                        <div class="col-md-4">
                            <label class="form-label">Location</label>
                            <input type="text" name="location" class="form-control" placeholder="e.g. Germany, Kosovo" required>
                        </div>

                        <!-- Kilometers -->
                        <div class="col-md-4">
                            <label class="form-label">Kilometers</label>
                            <input type="number" step="1" name="km" class="form-control" placeholder="e.g. 120000" required>
                        </div>

                        <!-- Fuel -->
                        <div class="col-md-4">
                            <label class="form-label">Type of Fuel</label>
                            <select name="fuel" class="form-select" required>
                                <option value="">Choose fuel type</option>
                                <option value="Gasoline">Gasoline</option>
                                <option value="Diesel">Diesel</option>
                                <option value="Electric">Electric</option>
                                <option value="Hybrid">Hybrid</option>
                            </select>
                        </div>

                        <!-- Transmission -->
                        <div class="col-md-4">
                            <label class="form-label">Transmission</label>
                            <select name="transmission" class="form-select" required>
                                <option value="">Choose transmission</option>
                                <option value="Manual">Manual</option>
                                <option value="Automatic">Automatic</option>
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="col-md-4">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select" required>
                                <option value="">Choose status</option>
                                <option value="New">New</option>
                                <option value="Used">Used</option>
                            </select>
                        </div>
                        <!-- COVER IMAGE -->
                        <div class="col-md-6">
                            <label class="form-label">Cover Image</label>
                            <label class="custom-file-upload">
                                <input type="file" name="cover_img" id="cover_img" accept="image/*" required />
                                <i class="bi bi-cloud-arrow-up-fill"></i> Upload Cover Image
                            </label>
                        </div>

                        <!-- GALLERY IMAGE -->
                        <div class="col-md-6">
                            <label class="form-label">Gallery Images</label>
                            <label class="custom-file-upload">
                                <input type="file" name="images[]" id="gallery_img" accept="image/*" multiple />
                                <i class="bi bi-images"></i> Upload Gallery Images
                            </label>
                        </div>

                        <div class="mt-4 add-button">
                            <button type="submit" class="px-4 py-2">
                                <i class="bi bi-plus-circle-fill"></i> Add Car
                            </button>
                        </div>
                </form>
            </div>
            <!-- Tabela e veturave -->
            <div class="table-responsive mt-5">
                <div class="table modern-table">
                    <table class="modern-table">
                        <thead>
                            <tr>
                                <th>Car Name</th>
                                <th>Model</th>
                                <th>Price</th>
                                <th>Year</th>
                                <th>Location</th>
                                <th>Fuel</th>
                                <th>Transmission</th>
                                <th>KM</th>
                                <th>Status</th>
                                <!-- <th>Description</th> -->
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT cars.*, models.model FROM cars 
                        LEFT JOIN models ON cars.model_id = models.id 
                        ORDER BY cars.id DESC";
                            $result = $con->query($query);

                            if ($result && $result->num_rows > 0):
                                while ($row = $result->fetch_assoc()):
                            ?>
                                    <tr>
                                        <td><?= htmlspecialchars($row['car_name']) ?></td>
                                        <td><?= htmlspecialchars($row['model']) ?></td>
                                        <td class="text-blue">€<?= number_format($row['price'], 2) ?></td>
                                        <td><?= $row['relased_year'] ?></td>
                                        <td><?= htmlspecialchars($row['location']) ?></td>
                                        <td><?= $row['fuel'] ?></td>
                                        <td><?= $row['transmission'] ?></td>
                                        <td><?= number_format($row['km']) ?> km</td>
                                        <td>
                                            <span class="<?= $row['status'] === 'New' ? 'badge-new' : 'badge-used' ?>">
                                                <?= $row['status'] ?>
                                            </span>
                                        </td>
                                        <!-- <td class="desc"><?= htmlspecialchars($shortDesc) ?>...</td> -->
                                        <td class="text-end">
                                            <a href="#" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" onclick="loadCarData(<?= $row['id'] ?>)">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button" class="btn btn-outline-danger btn-sm" onclick="deleteCar(<?= $row['id'] ?>)">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </td>
                                    </tr>
                                <?php endwhile;
                            else: ?>
                                <tr>
                                    <td colspan="9" class="text-center text-muted">No cars found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Container -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1055">
        <div id="actionToast" class="toast align-items-center text-white border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body" id="toastMessage">Action successful</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function loadCarData(id) {
            fetch('productsManagement.php?getCar=' + id)
                .then(res => res.json())
                .then(data => {
                    document.getElementById('edit_model_id').value = data.model_id;
                    document.getElementById('edit_description').value = data.description;
                    document.getElementById('edit_id').value = data.id;
                    document.getElementById('edit_car_name').value = data.car_name;
                    document.getElementById('edit_year').value = data.relased_year;
                    document.getElementById('edit_price').value = data.price;
                    document.getElementById('edit_location').value = data.location;
                    document.getElementById('edit_km').value = data.km;
                    document.getElementById('edit_fuel').value = data.fuel;
                    document.getElementById('edit_transmission').value = data.transmission;
                    document.getElementById('edit_status').value = data.status;

                    const modal = new bootstrap.Modal(document.getElementById('editModal'));
                    modal.show();
                })
                .catch(error => {
                    console.error("Error loading car data:", error);
                    alert("Failed to load car data.");
                });
        }

        function refreshTable() {
            fetch('productsManagement.php?refreshTable=1')
                .then(res => res.text())
                .then(html => {
                    document.querySelector("table.modern-table tbody").innerHTML = html;
                });
        }


        document.addEventListener("DOMContentLoaded", function() {
            const editForm = document.getElementById("editCarForm");

            editForm.addEventListener("submit", function(e) {
                e.preventDefault();

                const formData = new FormData(editForm);
                formData.append('update_car', '1');

                fetch('productsManagement.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(res => res.text())
                    .then(response => {
                        if (response.trim() === 'success') {
                            const modal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
                            modal.hide();
                            refreshTable();
                            showToast("Car edited successfully!", "bg-primary");
                        } else {
                            alert("Update failed: " + response);
                        }
                    })
                    .catch(error => {
                        console.error("Error updating car:", error);
                        alert("Something went wrong while updating.");
                    });
            });
        });

        function deleteCar(id) {
            if (confirm("Are you sure you want to delete this car?")) {
                fetch('productsManagement.php?deleteCar=' + id)
                    .then(res => res.text())
                    .then(response => {
                        if (response.trim() === 'success') {
                            const row = document.querySelector(`button[onclick="deleteCar(${id})"]`).closest('tr');
                            if (row) row.remove();
                            showToast("Car deleted successfully!", "bg-primary");
                        } else {
                            alert("Delete failed: " + response);
                        }
                    })
                    .catch(error => {
                        console.error("Error deleting:", error);
                        alert("Something went wrong while deleting.");
                    });
            }
        }

        //Per add new car
        document.addEventListener("DOMContentLoaded", function() {
            const addForm = document.getElementById("addCarForm");

            addForm.addEventListener("submit", function(e) {
                e.preventDefault();

                const formData = new FormData(addForm);

                fetch('productsManagement.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(res => res.text())
                    .then(response => {
                        if (response.includes("success")) {
                            addForm.reset();
                            refreshTable();
                            showToast("Car added successfully!", "bg-primary");
                        } else {
                            alert("Insert failed: " + response);
                        }
                    })
                    .catch(error => {
                        console.error("Error inserting car:", error);
                        alert("Something went wrong while inserting.");
                    });
            });
        });


        //Largon hijezimin e boostrap modalit
        document.addEventListener("DOMContentLoaded", function() {
            const editModal = document.getElementById('editModal');
            editModal.addEventListener('hidden.bs.modal', function() {
                document.body.classList.remove('modal-open');
                document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
                document.body.style = '';
            });
        });

        function showToast(message, color) {
            const toast = document.getElementById('actionToast');
            const toastMessage = document.getElementById('toastMessage');

            toast.classList.remove('bg-success', 'bg-danger', 'bg-primary');
            toast.classList.add(color);
            toastMessage.textContent = message;

            const bsToast = new bootstrap.Toast(toast);
            bsToast.show();
        }
    </script>

</body>

</html>