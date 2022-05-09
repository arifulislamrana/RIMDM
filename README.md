# RIMDIM
A School Management app for Rongmala Islamia Mohila Dakhil Madrasa
## Point of Sale

___

### Table of Contents

1. [Folder Structure](#folder-structure)
2. [Installation](#installation)
    1. [Clone](#clone)
    2. [Install Admin Panel](#install-admin-panel)
3. [Run Application](#run-application)
    1. [Admin Panel](#run-project)

___

### <a href="#folder-structure">Folder Structure</a>

   ```
   ── rimdm                 # Root directory.
      ├── rimdm_backend     # Admin Panel and User Side .
      └── README.md         # Documentation for the project.
   ```

___

### <a href="#installation">Installation</a>

#### <a href="#clone-repository">Clone Repository</a>

```bash
#Via HTTP:
https://github.com/arifulislamrana/RIMDM.git
#or, Via SSH:
git@github.com:arifulislamrana/RIMDM.git
```

___

#### <a href="#install-admin-panel">Install Admin Panel</a>

Two Templates are used for **_<u>rimdm</u>_**. One for landing page, another foe main admin panel.
For admin panel we used **AdminLTE**
And, for landing page **Ezuca** is used.

1. Navigate to `rimdm` folder
   ```bash
   cd rimdm_backend
   ```
2. Install dependencies
   ```bash
   # 1. update and/or install php packages based on your system
   composer update
   # or just try to install
   composer install

   # 2. install node packages
   npm install
   ```
3. Create & Update `.env` file
    1. ``` copy .env.example .env ```
    2. Update application name
    3. Generate app key `php artisan key:generate`
    3. Create database for this application and update database connection section
    4. Update mail sending credentials.


4. Create Tables and Seed with data
   ```bash
   php artisan migrate --seed
   ```
5. Generate & Publish JWT Secret Key
   ```bash
   php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
   php artisan jwt:secret
   ```
