```sql
CREATE TABLE Payment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    qr_code_image VARCHAR(255),  -- Assuming you store the path to the QR code image
    payment_statement VARCHAR(255) NOT NULL,  -- Assuming you store the path to the payment statement file
    billing_email VARCHAR(255) NOT NULL
);
```