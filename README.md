## Poultry Farm Management System (PFMS)

### Overview
The Poultry Farm Management System (PFMS) is a web-based application designed to help manage the daily operations of a poultry farm. It includes features for inventory management, order processing, and user administration.


### Installation Guide

#### Prerequisites
- XAMPP, WAMP, or LAMP stack installed
- PHPMyAdmin access

#### Run in GitHub Codespaces

GitHub Pages cannot execute PHP. To run this application using GitHub, use a Codespace:

1. Push this repository and the Codespaces configuration to GitHub.
2. On GitHub, open the repository, select **Code** > **Codespaces**, then create a Codespace on your branch.
3. Codespaces builds the PHP/Apache app and MariaDB containers. The included `poultry.sql` file is imported automatically when the database is first created.
4. Open the forwarded **Poultry Farm Management System** port when Codespaces offers it. The root page links to the sign-in page.

The SQL dump includes sample data and a default `admin` / `1234` login. This is for development only; do not use these credentials for a public production deployment. The Codespaces database is development data and is not intended as persistent production storage.

#### Run this checkout on Windows with XAMPP

1. Ensure XAMPP is installed at `C:\xampp`. If it is installed elsewhere, update `XAMPP_DIR` at the top of `run-local.bat`.
2. Double-click `run-local.bat`.
3. In XAMPP Control Panel, start **MySQL**. Apache is not needed; the launcher runs the app with XAMPP's PHP built-in web server.
4. If the `poultry` database is not set up yet, open [http://localhost/phpmyadmin](http://localhost/phpmyadmin), create a database named `poultry`, and import `Poultry farm management system/Poultry farm management system/SQL File/poultry.sql`.
5. Return to the launcher window and press a key. The app opens at [http://127.0.0.1:8000](http://127.0.0.1:8000).

#### Steps to Run the Project

1. **Download the zip file**
   - Download the project zip file from the provided source.

2. **Extract the file**
   - Extract the contents of the zip file to a local directory.

3. **Copy the farm folder**
   - Locate the extracted `farm` folder and copy it.

4. **Paste inside the root directory**
   - For XAMPP, paste the `farm` folder inside `xampp/htdocs`.
   - For WAMP, paste the `farm` folder inside `wamp/www`.
   - For LAMP, paste the `farm` folder inside `var/www/html`.

5. **Open PHPMyAdmin**
   - Open a web browser and go to [http://localhost/phpmyadmin](http://localhost/phpmyadmin).

6. **Create a database**
   - Create a new database named `poultry`.

7. **Import the SQL file**
   - In PHPMyAdmin, select the `poultry` database.
   - Go to the Import tab and import the `poultry.sql` file located in the SQL file folder within the zip package.

8. **Run the script**
   - Open a web browser and navigate to [http://localhost/farm](http://localhost/farm).

### Admin Credentials

- **Username:** admin
- **Password:** 1234

### Database Structure

#### Tables

##### permissions
- `id` (int, Primary Key)
- `permission` (varchar)
- `createuser` (varchar)
- `deleteuser` (varchar)
- `createbid` (varchar)
- `updatebid` (varchar)

##### store_out
- `id` (int, Primary Key)
- `date` (date)
- `item` (varchar)
- `quantity` (varchar)
- `itemsoutvalue` (int)

##### store_stock
- `id` (int, Primary Key)
- `date` (date)
- `item` (varchar)
- `quantity` (varchar)
- `rate` (varchar)
- `total` (varchar)
- `quantity_remaining` (varchar)
- `itemvalue` (int)
- `status` (varchar)

##### tbladmin
- `ID` (int, Primary Key)
- `Staffid` (int)
- `AdminName` (varchar)
- `UserName` (varchar)
- `FirstName` (varchar)
- `LastName` (varchar)
- `MobileNumber` (bigint)
- `Email` (varchar)
- `Status` (int)
- `Photo` (varchar)
- `Password` (varchar)
- `AdminRegdate` (timestamp)

##### tblcategory
- `id` (int, Primary Key)
- `CategoryName` (varchar)
- `CategoryCode` (varchar)
- `PostingDate` (timestamp)

##### tblcompany
- `id` (int, Primary Key)
- `regno` (varchar)
- `companyname` (varchar)
- `companyemail` (varchar)
- `country` (varchar)
- `companyphone` (int)
- `companyaddress` (varchar)
- `companylogo` (varchar)
- `status` (varchar)
- `developer` (varchar)
- `creationdate` (timestamp)

##### tblitems
- `id` (int, Primary Key)
- `item` (varchar)
- `description` (varchar)
- `Creationdate` (timestamp)

##### tblorders
- `id` (int, Primary Key)
- `ProductId` (int)
- `Quantity` (int)
- `InvoiceNumber` (int)
- `CustomerName` (varchar)
- `CustomerContactNo` (bigint)
- `PaymentMode` (varchar)
- `InvoiceGenDate` (date)

##### tblproducts
- `id` (int, Primary Key)
- `CategoryName` (varchar)
- `ProductName` (varchar)
- `ProductImage` (varchar)
- `ProductPrice` (decimal)
- `PostingDate` (timestamp)
- `UpdationDate` (timestamp)
