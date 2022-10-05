
# RADON - Real Estate Business

- A platform where customers are able to Buy/Rent apartments or properties and also able to track their monthly invoices and utility bills. Various real estate businesses will be able to host their apartments or properties here as well as track their customers' monthly utility bills.
- System Analysis and Design Project - B.Sc. in Computer Science and Engineering (CSE).
- PHP Application.

## Contributors

- **Team Members:** [Mohammed Jawwadul Islam](https://www.linkedin.com/in/jawwadfida/), [Mohammad Fahad Al Rafi](https://www.linkedin.com/in/md-fahad-al-al-rafi-14b968111/), [Moumy Kabir](https://www.linkedin.com/in/pranto-podder-b78b97162/), [Pranto Podder](https://www.linkedin.com/in/aysha-siddika-577ba5224/), [Aysha Siddika](https://www.linkedin.com/in/moumy-kabir-156a0a232/), Nafisa Akhter
- **Course Superviser:** [Rafi ur Rashid](https://github.com/Rafi-ur-Rashid)
- **Project Duration:** Fall 2021 Trimester (Nov 2021 - Jan 2022)

## Tools used:
      1) Front-end: HTML, CSS, Boostrap, Javascript
      2) Back-end: PHP PDO
      3) Database: MySQL
      4) Various APIs and Composer packages
      
## Features

- **Users:** Customer, Client, Marketing Admin, Finance and Accounts Admin

### Customer
      1)  Search Apartment Based on location, no. of bedrooms and bathrooms.
      2)  Advanced Search based on a range of price and sq ft area.
      3)  Buy & Rent Apartments 
      4)  Book appointment with Marketing Admin to see apartment physically (Mail).
      
### Marketing Admin 
      1)  CRUD Appartment information
      2)  CRUD Building or Property information
      3)  Assist customers during their appointment
      
### Client
      1)  View Invoice
      2)  Pay Innvoice and Utility Bills (Payment Gateway + Mail Confirmation)
      3)  Contact Finance and Accounts Admin (Mail)

### Finance and Accounts Admin
      1)  Authorization (Customer to Client)
      2)  CRUD Utility Bills for apartments
      3)  CRUD Invoice for clients


## Installation Details
      After downloading project: - 
      1)Install PHPMAILER by running : - composer require phpmailer/phpmailer (in project folder) (Refer to github link below in Credits).
      2)Install PHP dotenv by running: - composer require vlucas/phpdotenv (in project folder) (Refer to github link below in Credits).
      3)Install PHP mPDF library by running: - composer composer require mpdf/mpdf (in project folder) (Refer to github link below in Credits).
      3)Create account in [Mailtrap](https://mailtrap.io/) and take your account credentials.
      4)Set up the database - radon.sql
      5)Register a user and then change user_role to Admin in order to view Admin Privileges.
      6)For Payment Gateway --> SSLCOMMERZ was used (Largest payment gateway in Bangladesh) (Refer to github link below in Credits). Payment Gateway has credentials.   
      7)Look for .env.example files in the directories to see what credentials to set up, and then create .env files in those directories. 
      
      The credentials that you need to set up are: Mailtrap credentials, SSLCommerz Credentials. 
       
### API's and Composer packages used: -
      phpmailer package and mailtrap API - smtp fake testing server
      PHP dotenv package - protecting credentials online (creating .env file)
      SSLCommerz API - a payment gateway that provides various payment options in Bangladesh (debit card, credit card, mobile banking, etc.)
      PHP mPDF library - to generate and download pdf documents. 
      
## Project video link - [Youtube](https://youtu.be/QWQO_P_CYhA)

## SRS and Project Report

[SRS Report](https://github.com/Jawwad-Fida/Radon-Real-Estate-Business/files/9604572/SAD.SRS-Report.pdf)

[Project Report](https://github.com/Jawwad-Fida/Radon-Real-Estate-Business/files/9604577/SAD.Lab.Project.Report.pdf)

## Credits

### 1) [PHPMailer and MailTrap](https://github.com/PHPMailer/PHPMailer)

PHPMailer resources are provided by [SmartMessages](https://info.smartmessages.net/)

### 2) [PHP dotenv](https://github.com/vlucas/phpdotenv) 

PHP dotenv was created by [Vance Lucas](https://github.com/vlucas) and [Graham Campbell](https://twitter.com/GrahamJCampbell)

### 3) [SSLCOMMERZ](https://www.sslcommerz.com/) payment gateway.

 * https://github.com/sslcommerz

### 4) [PHP mPDF library](https://github.com/sslcommerz)

## Screenshots

<img src="https://user-images.githubusercontent.com/64092765/153046725-2156581f-e8ee-4ddd-8640-187293135f68.jpeg" width="75%">

<img src="https://user-images.githubusercontent.com/64092765/153046742-9e2a8c35-0147-48ff-a595-ce2f136c063b.PNG" width="75%">

<img src="https://user-images.githubusercontent.com/64092765/153046755-f2090e13-9285-4d59-b936-611b69e41022.jpeg" width="75%">

<img src="https://user-images.githubusercontent.com/64092765/153046766-c1699178-3100-4254-bfb5-02518949ffdf.PNG" width="75%">

<img src="https://user-images.githubusercontent.com/64092765/153046808-1605d23d-7284-4e31-8398-67cba9eed48c.PNG" width="75%">

<img src="https://user-images.githubusercontent.com/64092765/153046816-de8f3d3f-5edf-4f3f-b4b8-61dad7549491.PNG" width="75%">

<img src="https://user-images.githubusercontent.com/64092765/153046819-9e358fb9-8829-4c99-8985-87bf7d553998.jpeg" width="75%">

<img src="https://user-images.githubusercontent.com/64092765/153046826-2ecef465-a0c7-40f9-933a-1aff99c307d4.jpeg" width="75%">

<img src="https://user-images.githubusercontent.com/64092765/153047049-20ee151e-e54a-4fb2-b3b6-cdcefa061682.PNG" width="75%">

<img src="https://user-images.githubusercontent.com/64092765/153047057-62366ea2-7a70-4e7a-ae3b-3b8eb47a50dc.PNG" width="75%">

<img src="https://user-images.githubusercontent.com/64092765/153047063-1ec3656b-e684-44fe-b3d0-9fd49459f41c.jpeg" width="75%">

# [Champion in UIU CSE Project Show Fall 2021 - System Analysis and Design Laboratory](https://www.facebook.com/1553781141561120/posts/3066187696987116/)

<img src="https://user-images.githubusercontent.com/64092765/183291734-607410d2-f823-4244-be33-7d199be8a515.png" width="75%">

<img src="https://user-images.githubusercontent.com/64092765/191178164-967eb9b3-c04a-4676-a735-e4a45adf97b8.jpg" width="50%">





