<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .actions {
            text-align: center;
        }

        .actions a {
            margin-right: 10px;
            color: #007bff;
            text-decoration: none;
        }

        .actions a:hover {
            text-decoration: underline;
        }

        .delete {
            color: #dc3545;
        }

        .edit {
            color: #28a745;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Admin Panel</h1>
        <?php
        include 'db/db_connection.php';

        // Handle delete action
        if (isset($_GET['delete'])) {
            $id = $_GET['delete'];
            $sql = "DELETE FROM Registration WHERE id = $id";
            if ($conn->query($sql) === TRUE) {
                echo "Record deleted successfully";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        }

        // Fetch records from the database
        $query = "SELECT * FROM `Registration`";
        $result = mysqli_query($conn, $query);
        ?>
        
        <table border="1" cellpadding="10">
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Date of Birth</th>
                <th>Admission Fee Paid</th>
                <th>Course Fee Paid</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['dob']; ?></td>
                    <td><?php echo $row['ispaid_admission_fee'] ? 'Yes' : 'No'; ?></td>
                    <td><?php echo $row['ispaid_course_fee'] ? 'Yes' : 'No'; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                        <a href="mark_payment.php?id=<?php echo $row['id']; ?>&type=admission">Mark Admission Fee Paid</a>
                        <a href="mark_payment.php?id=<?php echo $row['id']; ?>&type=course">Mark Course Fee Paid</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>

</html>