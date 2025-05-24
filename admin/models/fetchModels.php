<?php
require_once("../../database/db_conn.php");

if (isset($_POST['fetch']) && $_POST['fetch'] == "fetchModels") {
    $query = "SELECT * FROM models ORDER BY id DESC";
    $result = mysqli_query($con, $query);

    $output = '';

    $output .= '
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Model Name</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
    ';

    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
                <tr>
                    <td>' . htmlspecialchars($row['model']) . '</td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#editModal' . $row['id'] . '">
                            <i class="bi bi-pencil"></i> Edit
                        </button>
                        <a href="models/deleteModel.php?id=' . $row['id'] . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure?\');">
                            <i class="bi bi-trash"></i> Delete
                        </a>
                    </td>
                </tr>
            ';
        }
    } else {
        $output .= '
            <tr>
                <td colspan="2" class="text-center">No Models Found</td>
            </tr>
        ';
    }

    $output .= '</tbody></table>';

    echo $output;  // Return the HTML content as response
}
?>
