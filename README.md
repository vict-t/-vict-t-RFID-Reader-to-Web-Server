# RFID Reader to Web-Server

The website is designed with PHP, SQL, HTML, and CSS language.

The website interface allows the administrator to search, revise and delete user information. For the hardware module, the Arduino Mega microcontroller communicated with multiple external hardware modules, RFID module, WIFI module to connect local server in SQL format.

It allows the microcontroller to upload the RFID card number to the local server and display it on the website. The theory is that once the RFID card is tapped to the reader, the microcontroller will get the card number and send it to the server by HTTP GET Request, which contains the PHP file directory and the information used to insert to the database.

![image](https://user-images.githubusercontent.com/44689459/169725846-09369d1c-b1b6-479c-ba34-239e2c8a77e3.png)
For the Patient information page, the admin can search the specific user information by typing the corresponding ID. 
![image](https://user-images.githubusercontent.com/44689459/169725855-60d9abee-4329-4856-9d69-1b2579189a1b.png)


When the administrator clicking the edit button next to the patient information, it will direct to the corresponding edit page.
![image](https://user-images.githubusercontent.com/44689459/169725909-92d508b8-468d-483e-8e09-bce198961647.png)

 
The Edit interface (update.php)  
Notice that the ID is not changeable in the form.
![image](https://user-images.githubusercontent.com/44689459/169725980-337dedc3-b815-4eae-b5dc-1ca1e9abbea2.png)

