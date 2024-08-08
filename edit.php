<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="date"],
        select,
        textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Registration</h1>
        <?php
        
        include 'db/db_connection.php';
        // Get the record to edit
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM Registration WHERE id = $id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } else {
                echo "Record not found.";
            }
        }

        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            $fullname = $_POST['fullname'];
            $dob = $_POST['dob'];
            $marital_status = $_POST['marital_status'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $contact_number = $_POST['contact_number'];
            $present_qualification = $_POST['present_qualification'];
            $father_name = $_POST['father_name'];
            $mother_name = $_POST['mother_name'];
            $profession = $_POST['profession'];
            $parents_phone_number = $_POST['parents_phone_number'];
            $computer_course = $_POST['computer_course'];
            $language_course = $_POST['language_course'];
            $course_level = $_POST['course_level'];

            $sql = "UPDATE Registration SET fullname='$fullname', dob='$dob', marital_status='$marital_status', gender='$gender', address='$address', contact_number='$contact_number', present_qualification='$present_qualification', father_name='$father_name', mother_name='$mother_name', profession='$profession', parents_phone_number='$parents_phone_number', computer_course='$computer_course', language_course='$language_course', course_level='$course_level' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
                echo "<script>window.location.href = 'admin.php';</script>";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }

        $conn->close();
        ?>

        <?php if (isset($row)): ?>
            <form method="post" action="edit.php">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div>
                    <label for="id_fullname">Full Name:</label>
                    <input type="text" name="fullname" id="id_fullname" value="<?php echo $row['fullname']; ?>" required>
                </div>

                <div>
                    <label for="id_dob">Date of Birth:</label>
                    <input type="date" name="dob" id="id_dob" value="<?php echo $row['dob']; ?>" required>
                </div>

                <div>
                    <label for="id_marital_status">Marital Status:</label>
                    <select name="marital_status" id="id_marital_status" required>
                        <option value="" disabled>Select your option</option>
                        <option value="single" <?php if ($row['marital_status'] == 'single') echo 'selected'; ?>>Single</option>
                        <option value="married" <?php if ($row['marital_status'] == 'married') echo 'selected'; ?>>Married</option>
                        <option value="divorced" <?php if ($row['marital_status'] == 'divorced') echo 'selected'; ?>>Divorced</option>
                        <option value="widowed" <?php if ($row['marital_status'] == 'widowed') echo 'selected'; ?>>Widowed</option>
                    </select>
                </div>

                <div>
                    <label for="id_gender">Gender:</label>
                    <select name="gender" id="id_gender" required>
                        <option value="" disabled>Select your option</option>
                        <option value="male" <?php if ($row['gender'] == 'male') echo 'selected'; ?>>Male</option>
                        <option value="female" <?php if ($row['gender'] == 'female') echo 'selected'; ?>>Female</option>
                        <option value="other" <?php if ($row['gender'] == 'other') echo 'selected'; ?>>Other</option>
                        <option value="prefer_not_to_say" <?php if ($row['gender'] == 'prefer_not_to_say') echo 'selected'; ?>>Prefer not to say</option>
                    </select>
                </div>

                <div>
                    <label for="id_address">Address:</label>
                    <textarea name="address" id="id_address" rows="3" required><?php echo $row['address']; ?></textarea>
                </div>

                <div>
                    <label for="id_contact_number">Contact Number:</label>
                    <input type="text" name="contact_number" id="id_contact_number" value="<?php echo $row['contact_number']; ?>" required>
                </div>

                <div>
                    <label for="id_present_qualification">Present Qualification:</label>
                    <input type="text" name="present_qualification" id="id_present_qualification" value="<?php echo $row['present_qualification']; ?>" required>
                </div>

                <div>
                    <label for="id_father_name">Father's Name:</label>
                    <input type="text" name="father_name" id="id_father_name" value="<?php echo $row['father_name']; ?>" required>
                </div>

                <div>
                    <label for="id_mother_name">Mother's Name:</label>
                    <input type="text" name="mother_name" id="id_mother_name" value="<?php echo $row['mother_name']; ?>" required>
                </div>

                <div>
                    <label for="id_profession">Profession:</label>
                    <input type="text" name="profession" id="id_profession" value="<?php echo $row['profession']; ?>" required>
                </div>

                <div>
                    <label for="id_parents_phone_number">Parents' Phone Number:</label>
                    <input type="text" name="parents_phone_number" id="id_parents_phone_number" value="<?php echo $row['parents_phone_number']; ?>" required>
                </div>

                <div>
                    <label for="id_computer_course">Computer Course:</label>
                    <input type="text" name="computer_course" id="id_computer_course" value="<?php echo $row['computer_course']; ?>" required>
                </div>

                <div>
                    <label for="id_language_course">Language Course:</label>
                    <input type="text" name="language_course" id="id_language_course" value="<?php echo $row['language_course']; ?>" required>
                </div>

                <div>
                    <label for="id_course_level">Course Level:</label>
                    <input type="text" name="course_level" id="id_course_level" value="<?php echo $row['course_level']; ?>" required>
                </div>

                <div>
                    <button type="submit">Update Record</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</body>

</html>