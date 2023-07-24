<br/>

# <div align="center"> :truck: Package Management System </div> <br/> <br/>

## Group Members: <br/>

:sparkles: Mufida Zuhrah Binti Zulhendri (1723396) <br/>
:sparkles: Hafiz Pangteh (1528007) <br/>
:sparkles: Nada Halabee (1622086) 

---

## Introduction

This web application is built to track shipped packages and shipping trucks in a delivery service center. The system will be used by the admin of the service. 

---

## Objectives

With simple and easy to understand UI, Parcel Management System will help system admin to do CRUD operation (Create, Read, Update, Delete) on every element inside the system which are Trucks data, Packages data and Postmen Data.

---

## Features and Functionalities

:pushpin: Admin first logged into the system. There will be authentication involved. If Admin is not registered yet, Admin can click on the 'register' button to register first, and then proceed to log in. <br />

:pushpin: Once logged in, Admin is greeted by the home page where there are three options to choose: Truck, Package, Postman. All are displayed along with their total quantities. If there are 4 data inside truck table, then 4 trucks will be displayed on the home page, same thing applies for packages and postmen. Admin then can click on one of the option (truck/package/postman) to see further details about each category <br />

:pushpin: Truck Page :truck: <br />
Truck Page contains details about the truck data and is the main page of this system.

- :man: Admin CAN: <br/>
  * Perform CRUD operation on truck table
  * Add new Truck/ Edit the truck/ Update it/ Delete data from the truck table
  * Assign new postman into a truck by selecting postman_name from a drop down list.

- Features:
  * Pagination feature on truck index page, displaying 5 data per page.
  * Truck index page will display the following columns: 
    - truck number 
    - Quantity (how many items are loaded into the truck) 
    - Postman in charge (which postman is going to drive the truck and deliver packages on that particular date), 
    - Date of operation
    - Status (whether the space inside the truck is still available or not).   
    - Action:
      * Item-list (once clicked, this will display a page containing detail list of packages that are assigned to a specific truck_number)
      * Edit
      * Delete
  * Also from the truck index page, Admin can click on desired truck number to view a readonly details of the truck which will display the folliwng information:
    - Truck number
    - Quantity 
    - Available for: (this will show how many more packages can be load into the truck)
    - Postman in Charge
    - Date of Operation
    - Status
  * Also from the truck index page, under `Action` section, Admin can click on a button called `Item-list` to view a readonly list of every packages that are assigned to that specific truck. Once this button is clicked, admin will be directed to `detail.blade.php` file and the page will display the following details:
    - Package number 
    - Receiver name
    - Destination address.

- Functionalities:
  * One truck can load a maximum of 50 items.
  * Under status, A message prompting "FULL" will be displayed when a truck has reached maximum limit (when truck's quantity had reached 50 items).
  * Under status, A message prompting "AVAILABLE" will be displayed when a truck can load more items (when truck's quantity is less than 50 items).
  * In the show page, on the 'quantity' label, there will be a message displayed indicating how many more packages can be load into the truck. if the truck currently have 25 packages, the message will be "25 more items can be loaded".
  
- :man: Admin CAN'T: <br/>
  * Assign new package into the truck. Assigning new package into a truck can only happen from the Package page. 
  
<br />

:pushpin: Package Page :package:

- :man: Admin can:
  * Perform CRUD operation on package table
  * Add new Package/ Edit some item on the Package/ Update it/ Delete shipped item from the Package table
  * Assign new package into a specific truck_number
  
- Features and Functionalities:
  * Pagination feature, displaying 5 data per page.
  * When a new package is added and is assigned to a specific truck, `Quantity` data and `Item-List` data inside the truck page associated with its respective truck_number will get automatically updated as well
  * truck_number with total quantity equal to 50 won't be displayed on the dropdown list for admin to assign package to, because that truck is now full.
  * package number is a unique value.
  
<br />
  
:pushpin: Postman Page :post:

- :man: Admin can:
  * Perform CRUD operation on Postman table
  * Add new Postman/ Edit some item on the Postman/ Update it/ Delete item from the Postman table
  
- Features and Functionalities;
  * truck_number inside postman page will get automatically updated when a postman_name is assigned to a truck_number from the truck page
  * Status 'ASSIGNED' will be automatically displayed under 'status' when a postman_name is assigned to a truck_number from the truck page
  * Status 'NOT ASSIGNED' will be automatically displayed under 'status' when a postman_name is not assigned to any truck_number yet
  * postman number is a unique value
  
- Admin CAN'T:
  * Assign new truck_number into postman. Assigning postman to a specific truck_number can only happen from truck page. Admin however, can view which truck_number is assigned to that specific postman_name after adding it from the truck table.

---

## Views, Controllers, Routes, Models

#### :scroll: Views
- :file_folder: auth -> Mufida
    * :file_folder: passwords
        * confirm.blade.php
        * email.blade.php
        * reset.blade.php
  * login.blade.php
  * register.blade.php
  * verify.blade.php
- :file_folder: layouts -> Mufida
  * app.blade.php
- :file_folder: posts 
- :file_folder: truck -> Mufida
  * create.blade.php
  * edit.blade.php
  * index.blade.php
  * show.blade.php
  * details.blade.php -> Hafiz
- :file_folder: package -> Hafiz
  * create.blade.php
  * edit.blade.php
  * index.blade.php
  * show.blade.php
- :file_folder: postman -> Nada
  * create.blade.php
  * edit.blade.php
  * index.blade.php
  * show.blade.php
- :file_folder: errors
  * 404.blade.php -> Mufida
  * 401.blade.php -> Hafiz
  * 419.blade.php -> Nada
- home.blade.php -> Mufida
- index.blade.php -> Hafiz

#### :hammer: Controllers
- :file_folder: Auth
- HomeController
- Detailcontroller -> Hafiz
- TruckController -> Mufida
  * index()
  * store ()
  * show ()
  * update ()
  * destroy ()
- PackageController -> Hafiz
  * index()
  * store ()
  * show ()
  * update ()
  * destroy ()
- PostmanController -> Nada
  * index()
  * store ()
  * show ()
  * update ()
  * destroy ()

#### :mailbox_closed: Routes

- Auth::routes()
- '/welcome' (Verb: get)
- '/logout' (Verb: get)
- '/home' (Verb: get)
- Route names by Resource Controller:
  * Route::resource('truck', 'App\Http\Controllers\TruckController');
    - 'truck.index' 
    - 'truck.create'
    - 'truck.store'
    - 'truck.show'
    - 'truck.edit'
    - 'truck.update'
    - 'truck.destroy'
  * Route::resource('package', 'App\Http\Controllers\PackageController');
    - 'package.index' 
    - 'package.create'
    - 'package.store'
    - 'package.show'
    - 'package.edit'
    - 'package.update'
    - 'package.destroy'
  * Route::resource('postman','App\Http\Controllers\postmanController');
    - 'postman.index' 
    - 'postman.create'
    - 'postman.store'
    - 'postman.show'
    - 'postman.edit'
    - 'postman.update'
    - 'postman.destroy'
  * 'detail'

#### :books: Models
- User
- Truck -> Mufida
- Package -> Hafiz
- Postman -> Nada

---
## Work Division Overview:

- Mufida:
  * github readme.md
  * Unique value Validation
  * Pagination
  * User Authentication and registration
  * CRUD operation on Truck table & error handling inside each files
  * `home.blade.php` page
  * Define relationship and constraints between Truck and Postman
  * Automatically update postman name on `truck/create.blade.php`'s dropdown list
  * Automatically update truck number on `package/create.blade.php`'s dropdown list everytime a new truck data is created
  * Display 'ASSIGNED' / 'NOT ASSIGNED' message on `postman/index.blade.php` and `postman/show.blade.php`
  * Function inside `package/create.blade.php` file to show truck_number which quantity is less than 50 and not showing truck_number which quantity is already 50.
  * Update total Quantity on `Truck/index.blade.php` everytime a new package is assigned to a specific truck.
  * Truck Controller, Views, Routes, Model, Migration
  * 404 Error page
- Hafiz:
  * Sequence Diagram
  * Display item details on truck table when admin click on 'item-list' option (item details contain all package data that are associated with that specific truck. Data includes package number and package's destination/address). To fulfill this, two extra files were created:
    - Detailcontroller.php
    - truck/detail.blade.php
  * CRUD operation on Package table & error handling inside each files
  * `Welcome.blade.php` page
  * Define relationship between truck table and package table
    - Define constraints on migration and models of Truck and Package
    - Define one to many relationship between Truck and Package
  * Package Controller
  * Package views
  * Package Routes
  * Package model
  * Package migration
  * 401 Error page
- Nada:
  * ERD Diagram
  * Display FULL when truck quantity is 50. 
  * Display AVAILABLE when truck quantity is less than 50
  * CRUD operation on Postman table  & error handling inside each files
  * Define relationships and foreign key constraints on Postman migration and model
  * Postman Controller
  * Postman views
  * Postman Routes
  * Postman model
  * Postman migration
  * 419 Error page
---
## ERD

![ERD](https://github.com/MZ071999/WEBDEV_PROJECT/blob/master/imgs/erd.jpeg)

---

## Sequence Diagram

![Sequence Diagram](https://github.com/MZ071999/WEBDEV_PROJECT/blob/master/imgs/sequence.png)
---

## References

- https://stackoverflow.com/
- https://laravel.com/docs/8.x
