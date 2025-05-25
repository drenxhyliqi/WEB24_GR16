<?php
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}
require_once("../database/db_conn.php");
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
            <a href="../index.php">
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
            <form method="POST" enctype="multipart/form-data" id="editCarForm">
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


                <form method="POST" enctype="multipart/form-data" id="addCarForm">
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
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <textarea name="description" id="edit_description" class="form-control" rows="3"></textarea>
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
                        <tbody id="carTableBody">
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
                                            <button type="button" class="btn btn-outline-primary btn-sm edit-btn" data-id="<?= $row['id'] ?>">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger btn-sm delete-btn" data-id="<?= $row['id'] ?>">
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
$(document).ready(function () {
    function clearFields() {
        $('#addCarForm')[0].reset();
    }

    function fetchCars() {
        $.ajax({
            url: "products/fetchCars.php",
            method: "POST",
            success: function (response) {
                $('#carTableBody').html(response);
            }
        });
    }

    // Add Car (Create)
    $('#addCarForm').submit(function (e) {
        e.preventDefault();
        const formData = new FormData(this);

        $.ajax({
            url: "products/addCar.php",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                let response = JSON.parse(data);
                if (response.status === 'success') {
                    showToast(response.message, 'bg-primary');
                    fetchCars();
                    clearFields();
                } else {
                    showToast(response.message, 'bg-primary');
                }
            }
        });
    });

    // Open Edit Modal
    $(document).on('click', '.edit-btn', function () {
        let id = $(this).data('id');

        $.ajax({
            url: "products/fetchCars.php?getCar=" + id,
            method: "GET",
            success: function (data) {
                const car = JSON.parse(data);
                $('#edit_id').val(car.id);
                $('#edit_car_name').val(car.car_name);
                $('#edit_model_id').val(car.model_id);
                $('#edit_year').val(car.relased_year);
                $('#edit_price').val(car.price);
                $('#edit_location').val(car.location);
                $('#edit_km').val(car.km);
                $('#edit_fuel').val(car.fuel);
                $('#edit_transmission').val(car.transmission);
                $('#edit_description').val(car.description);
                $('#edit_status').val(car.status);

                $('#editModal').modal('show');
            }
        });
    });

    // Update Car (Save changes)
    $('#editCarForm').submit(function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        formData.append("update_car", 1);

        $.ajax({
            url: "products/updateCar.php",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                let response = JSON.parse(data);
                if (response.status === 'success') {
                    showToast(response.message, 'bg-primary');
                    $('#editModal').modal('hide');
                    fetchCars();
                } else {
                    showToast(response.message, 'bg-primary');
                }
            }
        });
    });

    // Delete Car
    $(document).on('click', '.delete-btn', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        if (confirm('Are you sure you want to delete this car?')) {
            $.ajax({
                url: "products/deleteCar.php",
                method: "POST",
                data: { id },
                success: function (data) {
                    let response = JSON.parse(data);
                    if (response.status === 'success') {
                        showToast(response.message, 'bg-primary');
                        fetchCars();
                    } else {
                        showToast(response.message, 'bg-primary');
                    }
                }
            });
        }
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

    fetchCars();
});
</script>



</body>

</html>