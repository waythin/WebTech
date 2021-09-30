/* Create User */
INSERT INTO Users (role, name, email, contact_no, location, password, image) VALUES ('admin', 'abtahitajwar', 'abtahitajwar@gmail.com', '01796391053', 'chawkbazar, chittagong', 'H6251$', 'images/profile-picture/abtahitajwar.jpg');

/*Edit User */
UPDATE Users SET role='$role', name='$name', email='$email', contact_no='$contact_no', location='$location', password='$pwd', image='$image' WHERE email='$email'