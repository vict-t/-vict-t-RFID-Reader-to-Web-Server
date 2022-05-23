# RFID Reader to Web-Server

## Objective 
- Set the data in the RFID card, read the RFID card with RFID reader, insert the Card ID into Database.
- Display User Infomation in the website that is designed with PHP, SQL, HTML, and CSS language. The website interface allows the administrator to search, revise and delete user information. 

## Hardware description
For the hardware module, the Arduino Mega microcontroller communicated with multiple external hardware modules, RFID module, WIFI module to connect local server in SQL format.

![image](https://user-images.githubusercontent.com/44689459/169726733-4b0207fd-c32e-4794-a6aa-55734f98767d.png)

The Database is a RDBMS (relational database management systems) storing data in tables. The patient personal information, their medicine intake record and the medicine name are storing in the RDBMS. To manage the relational database, the operator could use SQL command to perform various operation and run certain query. For example, update, delete, insert, display the data in certain condition.

The data in the RDBMS could display on the webpage using PHP, a server script language, request and query the selected information on the client-side webpage. The database interface allows the administrator to search and revise user information, and monitoring user medicine intake log.

The ESP8266 Wi-Fi Module is used to upload and download the data from the database by sending the HTTP TCP request packet to the local HTTP server. The packet contains the URL, which is the directory of the PHP file, containing the SQL command to the server to compile certain operation, like insert, update new entry of the database.


The RFID RC522 Module is used in this project. The reader reads the RFID tags and cards. Since no data is stored inside the UID card, no blocks have been used. The most important part is obtaining the UID. The UID first obtained is in byte form. Byte to string conversion is done in order to pass the UID to the database.


It allows the microcontroller to upload the RFID card number to the local server and display it on the website. The theory is that once the RFID card is tapped to the reader, the microcontroller will get the card number and send it to the server by HTTP GET Request, which contains the PHP file directory and the information used to insert to the database.

![image](https://user-images.githubusercontent.com/44689459/169726585-498eaff8-8a89-4f94-a678-246f754459be.png)
![image](https://user-images.githubusercontent.com/44689459/169726642-bfb8f5d0-c238-405b-8d38-b661e84d3c19.png)

## Demo

It will start after the ESP8266 connected to the wifi and the local server. The OLED Display and the Serial monitor will ask the user to tap their card first. 

After tapping the card, the Arduino board will send a TCP packet to the server, which is GET method HTTP require containing the php file directory (TX.php) and the information that used to insert to the database. The admin could edit that person information by clicking the edit key. 

![image](https://user-images.githubusercontent.com/44689459/169728348-cb815601-877b-44b2-8845-27bd987a5e8f.png)

![image](https://user-images.githubusercontent.com/44689459/169728765-c32670ba-aecd-4684-84ed-4a9fde8f493e.png)
For the Patient information page, the admin can search the specific user information by typing the corresponding ID. 

![image](https://user-images.githubusercontent.com/44689459/169728892-26c82a09-70d8-426b-b41d-f43c9866bb01.png)

When the administrator clicking the edit button next to the patient information, it will direct to the corresponding edit page.
![image](https://user-images.githubusercontent.com/44689459/169725909-92d508b8-468d-483e-8e09-bce198961647.png)

 
The Edit interface (update.php)  
Notice that the ID is not changeable in the form.

![image](https://user-images.githubusercontent.com/44689459/169725980-337dedc3-b815-4eae-b5dc-1ca1e9abbea2.png)

