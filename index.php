<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <script>
        function handleFormSubmit(event) {
            event.preventDefault(); // Prevent the default form submission
            document.getElementById('registrationForm').submit(); // Submit the form manually
        }
    </script>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'db/db_connection.php';

        // Get form data
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

        // Insert data into the database
        $sql = "INSERT INTO Registration (fullname, dob, marital_status, gender, address, contact_number, present_qualification, father_name, mother_name, profession, parents_phone_number, computer_course, language_course, course_level) VALUES ('$fullname', '$dob', '$marital_status', '$gender', '$address', '$contact_number', '$present_qualification', '$father_name', '$mother_name', '$profession', '$parents_phone_number', '$computer_course', '$language_course', '$course_level')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            echo "<script>window.location.href = 'payment.html';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>

    <form id="registrationForm" method="post" action="" onsubmit="handleFormSubmit(event)">
        <div>
            <label for="id_fullname">Full Name:</label>
            <input type="text" name="fullname" id="id_fullname" required>
        </div>
        
        <div>
            <label for="id_dob">Date of Birth:</label>
            <input type="date" name="dob" id="id_dob" required>
        </div>
        
        <div>
            <label for="id_marital_status">Marital Status:</label>
            <select name="marital_status" id="id_marital_status" required>
                <option value="" disabled selected>Select your option</option>
                <option value="single">Single</option>
                <option value="married">Married</option>
                <option value="divorced">Divorced</option>
                <option value="widowed">Widowed</option>
            </select>
        </div>
        
        <div>
            <label for="id_gender">Gender:</label>
            <select name="gender" id="id_gender" required>
                <option value="" disabled selected>Select your option</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
                <option value="prefer_not_to_say">Prefer not to say</option>
            </select>
        </div>
        
        <div>
            <label for="id_address">Address:</label>
            <textarea name="address" id="id_address" rows="3" required></textarea>
        </div>
        
        <div>
            <label for="id_contact_number">Contact Number:</label>
            <input type="text" name="contact_number" id="id_contact_number" required>
        </div>
        
        <div>
            <label for="id_present_qualification">Present Qualification:</label>
            <input type="text" name="present_qualification" id="id_present_qualification" required>
        </div>
        
        <div>
            <label for="id_father_name">Father's Name:</label>
            <input type="text" name="father_name" id="id_father_name" required>
        </div>
        
        <div>
            <label for="id_mother_name">Mother's Name:</label>
            <input type="text" name="mother_name" id="id_mother_name" required>
        </div>
        
        <div>
            <label for="id_profession">Profession:</label>
            <input type="text" name="profession" id="id_profession" required>
        </div>
        
        <div>
            <label for="id_parents_phone_number">Parents' Phone Number:</label>
            <input type="text" name="parents_phone_number" id="id_parents_phone_number" required>
        </div>
        
        <div>
            <label for="id_computer_course">Computer Course:</label>
            <input type="text" name="computer_course" id="id_computer_course" required>
        </div>
        
        <div>
            <label for="id_language_course">Language Course:</label>
            <input type="text" name="language_course" id="id_language_course" required>
        </div>
        
        <div>
            <label for="id_course_level">Course Level:</label>
            <input type="text" name="course_level" id="id_course_level" required>
        </div>
        
        <div>
            <button type="submit">Register</button>
        </div>
    </form>
</body>
</html>
