```sql
CREATE TABLE Registration (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    dob DATE NOT NULL,
    marital_status ENUM('single', 'married', 'divorced', 'widowed') NOT NULL,
    gender ENUM('male', 'female', 'other', 'prefer_not_to_say') NOT NULL,
    address TEXT NOT NULL,
    contact_number VARCHAR(20) NOT NULL,
    present_qualification VARCHAR(255) NOT NULL,
    father_name VARCHAR(255) NOT NULL,
    mother_name VARCHAR(255) NOT NULL,
    profession VARCHAR(255) NOT NULL,
    parents_phone_number VARCHAR(20) NOT NULL,
    computer_course VARCHAR(255) NOT NULL,
    language_course VARCHAR(255) NOT NULL,
    course_level VARCHAR(255) NOT NULL
);
```