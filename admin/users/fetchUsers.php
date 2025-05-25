<?php
require_once("../../database/db_conn.php"); 

if (isset($_POST['fetch']) && $_POST['fetch'] == "fetchUsers") {
    $result = $con->query("SELECT * FROM users");

    $output = '';
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output .= '
            <tr>
                <td>' . htmlspecialchars($row['user']) . '</td>
                <td>' . htmlspecialchars($row['email']) . '</td>
                <td>' . ucfirst($row['role']) . '</td>
                <td class="text-end">
                    <button class="btn btn-sm btn-danger delete-btn" data-id="' . $row['id'] . '">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                </td>
            </tr>';
        }
    } else {
        $output .= '<tr><td colspan="4" class="text-center">No users found.</td></tr>';
    }

    echo $output;
}
?>
