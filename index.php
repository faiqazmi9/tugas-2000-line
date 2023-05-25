<!DOCTYPE html>
<html lang="en">

<head>
    <title>Aplikasi Sederhana dengan Validasi</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h1>Pendaftaran Pengguna Baru</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="form_type">Jenis Form:</label>
        <select name="form_type" id="form_type" required>
            <option value="">Pilih Jenis Form</option>
            <?php
            for ($i = 1; $i <= 50; $i++) {
                echo "<option value='" . $i . "'>Form " . $i . "</option>";
            }
            ?>
        </select>
        <br><br>
        <label for="name">Nama:</label>
        <input type="text" name="name" id="name" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br><br>
        <label for="confirm_password">Konfirmasi Password:</label>
        <input type="password" name="confirm_password" id="confirm_password" required>
        <br><br>
        <label for="phone">Nomor HP:</label>
        <input type="text" name="phone" id="phone" required>
        <br><br>
        <label for="address">Profinsi</label>
        <textarea name="province" id="province" required></textarea>
        <br><br>
        <label for="address">Kota</label>
        <textarea name="city" id="city" required></textarea>
        <br><br>
        <label for="address">Kecamatan</label>
        <textarea name="district" id="district" required></textarea>
        <br><br>
        <label for="address">Jalan</label>
        <textarea name="street" id="street" required></textarea>
        <br><br>
        <label for="address">Nomor Rumah</label>
        <textarea name="house_number" id="house_number" required></textarea>
        <br><br>
        <label for="gender">Jenis Kelamin:</label>
        <select name="gender" id="gender" required>
            <option value="">Pilih Jenis Kelamin</option>
            <option value="laki-laki">Laki-laki</option>
            <option value="perempuan">Perempuan</option>
        </select>
        <br><br>
        <input type="submit" value="Daftar">
    </form>

    <?php
    class FormValidator
    {
        public static function validateForm($form_type)
        {
            if (empty($form_type)) {
                return "Jenis Form harus diisi.";
            }
            return "";
        }

        public static function validateName($name)
        {
            if (empty($name)) {
                return "Nama harus diisi.";
            }
            return "";
        }

        public static function validateEmail($email)
        {
            if (empty($email)) {
                return "Email harus diisi.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return "Email tidak valid.";
            }
            return "";
        }

        public static function validatePassword($password)
        {
            if (empty($password)) {
                return "Password harus diisi.";
            } elseif (strlen($password) < 6) {
                return "Password harus memiliki setidaknya 6 karakter.";
            }
            return "";
        }

        public static function validateConfirmPassword($password, $confirm_password)
        {
            if (empty($confirm_password)) {
                return "Konfirmasi password harus diisi.";
            } elseif ($password !== $confirm_password) {
                return "Konfirmasi password tidak sesuai.";
            }
            return "";
        }

        public static function validatePhone($phone)
        {
            if (empty($phone)) {
                return "Nomor HP harus diisi.";
            } elseif (!preg_match('/^\d{10,12}$/', $phone)) {
                return "Nomor HP tidak valid. Harap masukkan nomor HP dengan format yang benar.";
            }
            return "";
        }

        public static function validateProvince($province)
        {
            if (empty($province)) {
                return "Provinsi harus diisi.";
            }
            return "";
        }

        public static function validateCity($city)
        {
            if (empty($city)) {
                return "Kota harus diisi.";
            }
            return "";
        }

        public static function validateDistrict($district)
        {
            if (empty($district)) {
                return "Kecamatan harus diisi.";
            }
            return "";
        }

        public static function validateStreet($street)
        {
            if (empty($street)) {
                return "Jalan harus diisi.";
            }
            return "";
        }

        public static function validateHouseNumber($house_number)
        {
            if (empty($house_number)) {
                return "Nomor Rumah harus diisi.";
            }
            return "";
        }

        public static function validateGender($gender)
        {
            if (empty($gender)) {
                return "Jenis kelamin harus dipilih.";
            }
            return "";
        }
    }

    define('SUCCESS', '<h2>Pendaftaran Berhasil!</h2>');
    define('FORMTYPE', '<p>Jenis Form: "');
    define('NAME', '<p>Nama: ');
    define('EMAIL', '<p>Email: ');
    define('PHONE', '<p>Nomor HP: ');
    define('PROVINCE', '<p>Provinsi: ');
    define('CITY', '<p>Kota: ');
    define('DISTRICT', '<p>Kecamatan: ');
    define('STREET', '<p>Jalan: ');
    define('HOUSENUMBER', '<p>Nomor Rumah: ');
    define('GENDER', '<p>Jenis Kelamin: ');
    

    // Cek apakah form telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["form_type"] == 1) {
            echo "<h4>menggunakan mode 1</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 2) {
            echo "<h4>menggunakan mode 2</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 3) {
            echo "<h4>menggunakan mode 3</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 4) {
            echo "<h4>menggunakan mode 4</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 5) {
            echo "<h4>menggunakan mode 5</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 6) {
            echo "<h4>menggunakan mode 6</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 7) {
            echo "<h4>menggunakan mode 7</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 8) {
            echo "<h4>menggunakan mode 8</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 9) {
            echo "<h4>menggunakan mode 9</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 10) {
            echo "<h4>menggunakan mode 10</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 11) {
            echo "<h4>menggunakan mode 11</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 12) {
            echo "<h4>menggunakan mode 12</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 13) {
            echo "<h4>menggunakan mode 13</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 14) {
            echo "<h4>menggunakan mode 14</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 15) {
            echo "<h4>menggunakan mode 15</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 16) {
            echo "<h4>menggunakan mode 16</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 17) {
            echo "<h4>menggunakan mode 17</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 18) {
            echo "<h4>menggunakan mode 18</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 19) {
            echo "<h4>menggunakan mode 19</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 20) {
            echo "<h4>menggunakan mode 20</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 21) {
            echo "<h4>menggunakan mode 21</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 22) {
            echo "<h4>menggunakan mode 22</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 23) {
            echo "<h4>menggunakan mode 23</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 24) {
            echo "<h4>menggunakan mode 24</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 25) {
            echo "<h4>menggunakan mode 25</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 26) {
            echo "<h4>menggunakan mode 26</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 27) {
            echo "<h4>menggunakan mode 27</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 28) {
            echo "<h4>menggunakan mode 28</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 29) {
            echo "<h4>menggunakan mode 29</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 30) {
            echo "<h4>menggunakan mode 30</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 31) {
            echo "<h4>menggunakan mode 31</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 32) {
            echo "<h4>menggunakan mode 32</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 33) {
            echo "<h4>menggunakan mode 33</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 34) {
            echo "<h4>menggunakan mode 34</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 35) {
            echo "<h4>menggunakan mode 35</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 36) {
            echo "<h4>menggunakan mode 36</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 37) {
            echo "<h4>menggunakan mode 37</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 38) {
            echo "<h4>menggunakan mode 38</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 39) {
            echo "<h4>menggunakan mode 39</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 40) {
            echo "<h4>menggunakan mode 40</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 41) {
            echo "<h4>menggunakan mode 41</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 42) {
            echo "<h4>menggunakan mode 42</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 43) {
            echo "<h4>menggunakan mode 43</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 44) {
            echo "<h4>menggunakan mode 44</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 45) {
            echo "<h4>menggunakan mode 45</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 46) {
            echo "<h4>menggunakan mode 46</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 47) {
            echo "<h4>menggunakan mode 47</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 48) {
            echo "<h4>menggunakan mode 48</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 49) {
            echo "<h4>menggunakan mode 49</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        } elseif ($_POST["form_type"] == 50) {
            echo "<h4>menggunakan mode 50</h4>";
            $formType = $_POST['form_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $gender = $_POST['gender'];

            $formError = FormValidator::validateForm($form_type);
            $nameError = FormValidator::validateName($name);
            $emailError = FormValidator::validateEmail($email);
            $passwordError = FormValidator::validatePassword($password);
            $confirmPasswordError = FormValidator::validateConfirmPassword($password, $confirm_password);
            $phoneError = FormValidator::validatePhone($phone);
            $provinceError = FormValidator::validateProvince($province);
            $cityError = FormValidator::validateCity($city);
            $districtError = FormValidator::validateDistrict($district);
            $streetError = FormValidator::validateStreet($street);
            $houseNumberError = FormValidator::validateHouseNumber($house_number);
            $genderError = FormValidator::validateGender($gender);

            // Jika tidak ada error, proses pendaftaran
            if (
                empty($formError) && empty($nameError) && empty($emailError) && empty($passwordError)
                && empty($confirmPasswordError) && empty($phoneError) && empty($provinceError)
                && empty($cityError) && empty($districtError) && empty($streetError)
                && empty($houseNumberError) && empty($genderError)
            ) {
                // Lakukan proses pendaftaran atau penyimpanan data ke database
                echo SUCCESS;
                echo FORMTYPE . $form . "</p>";
                echo NAME . $name . "</p>";
                echo EMAIL . $email . "</p>";
                echo PHONE . $phone . "</p>";
                echo PROVINCE . $province . "</p>";
                echo CITY . $city . "</p>";
                echo DISTRICT . $district . "</p>";
                echo STREET . $street . "</p>";
                echo HOUSENUMBER . $house_number . "</p>";
                echo GENDER . $gender . "</p>";
                // ...
            }
        }
    }
    ?>
    <div class="error">
        <?php echo $formError; ?><br>
        <?php echo $nameError; ?><br>
        <?php echo $emailError; ?><br>
        <?php echo $passwordError; ?><br>
        <?php echo $confirmPasswordError; ?><br>
        <?php echo $phoneError; ?><br>
        <?php echo $provinceError; ?><br>
        <?php echo $cityError; ?><br>
        <?php echo $districtError; ?><br>
        <?php echo $street; ?><br>
        <?php echo $house_number; ?><br>
        <?php echo $genderError; ?><br>
    </div>
</body>

</html>