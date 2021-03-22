# Indonesia Regions PHP Client

<p align="center">
    <a href="https://travis-ci.com/github/dekiakbar/indonesia-regions-php-client"><img src="https://travis-ci.com/dekiakbar/indonesia-regions-php-client.svg?branch=master" alt="Build Status"></a>
    <a href="https://packagist.org/packages/dekiakbar/indonesia-regions-php-client"><img src="https://poser.pugx.org/dekiakbar/indonesia-regions-php-client/version" alt="Stable Version"></a>
    <a href="https://packagist.org/packages/dekiakbar/indonesia-regions-php-client"><img src="https://poser.pugx.org/dekiakbar/indonesia-regions-php-client/v/unstable" alt="Unstable Version"></a>
    <a href="https://packagist.org/packages/dekiakbar/indonesia-regions-php-client"><img src="https://github.styleci.io/repos/281455260/shield?branch=master" alt="StyleCI"></a>
    <a href="https://github.com/dekiakbar/indonesia-regions-php-client/blob/master/LICENSE"><img src="https://poser.pugx.org/dekiakbar/indonesia-regions-php-client/license" alt="License"></a>
</p>

---

## About Indonesia Regions PHP Client

> This package can be used to retrieve provinces, cities, districts and villages data from [BPS]( https://bps.go.id).
**Note:** Wherever you use this package please specify [BPS]( https://bps.go.id) as the data source.

## Table of Contents

- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Usage](#usage)
- [License](#license)

---

## Prerequisites

Before you install this package, make sure that the requirements below are met

```
PHP >= 7.2
ext-json
ext-curl
docker (optional)
docker-compose (optional)
```

---

## Development (Docker)
For development you can use docker container for this project, here are step to reproduce docker env on your local env :
- Clone this repository: `git clone https://github.com/dekiakbar/indonesia-regions-php-client.git`
- Navigate to project directory : `cd indonesia-regions-php-client`
- Snd run : `docker-compose up -d`
- Wait a few minutes, the image for docker will build automatic, after the build has been done you will get an image with the name **indonesia-regions-php-client_app** and a container with the name **indonesia-regions-php-client_app_1** and **indonesia-regions-php-client_mysql_1**.
- Check if the container are exit, you can run : `docker ps -a`
- If the container is not running, you can run : `docker start indonesia-regions-php-client_app_1` and `docker start indonesia-regions-php-client_mysql_1`
- You can run interactive shell (SSH) : `docker exec -it indonesia-regions-php-client_app_1 /bin/bash`
- **NOTE:**
  - The **indonesia-regions-php-client_app_1** container is used to mount the directory project.
  - The **indonesia-regions-php-client_mysql_1** container is used to save the database from project.
  - The default docker workdir is **app** for **indonesia-regions-php-client_app_1** container.
  - The **app** directory is mounted from **indonesia-regions-php-client** host directory, so if you edit the file inside **indonesia-regions-php-client** in the host Operating system, the file inside docker will be changed or vice versa, the reason I made docker container mount the project root a.k.a **indonesia-regions-php-client** to the app because I am too lazy to mount file from docker, so if docker mount file from **indonesia-regions-php-client** root directory I can simple edit the file directly from my favorite IDE :stuck_out_tongue_closed_eyes:

---

## Installation

- `$ composer require dekiakbar/indonesia-regions-php-client`
- And You're done.

---

## Usage

- You can pass the parameter to the method, All of this package has 3 mode :
- For **BPS** and **POS** mode you can use **BPS Id/Code** to retrieve province / city / subdistrict / village data. But you **Can Not** use **BPS Id/Code** to retrieve province / city / subdistrict / village data if you use **dagri** mode, please use **dagri Id/code** to retrieve province / city / subdistrict / village data. 
- If mode is **NULL**, then the method will use default mode, default mode is **bps**.
- **bps** : only return : **kode** and **nama** of province / city / subdistrict / village.
- **dagri** : return : **kode_bps**, **nama_bps**, **kode_dagri**, **nama_dagri** of province / city / subdistrict / village.
- **pos** : return : **kode_bps**, **nama_bps**, **kode_pos**, **nama_pos** of province / city / subdistrict / village.

## Note
- **Not all method always return `list` and `detail` object, on some method only return `list` or `detail` you must check it again before you use the response**.
- If you just need the data (not planing to use this API), just import the Database Dump on `export` folder, extract `indonesia_regions_pos.tar.gz` and import to your database. 
- If you want to retrieve data with mode **Dagri** please fill **Parent Id** (Provinde Id / City Id / Subdistrict Id) with valid data. **Parent Id for POS and Dagri are different**. You can get the city Id `(kode)` from `$region->getCityListByProvinceId('pos',$provinceId)->list`.
- please remeber if you want fetch any data you must use parent Id (province Id / City Id / Subdistrict Id) from  **list** collection, **NOT** from detail collection **(If you use ID from detail it will work but you will get duplicate data)**.

- #### Retrieve All province data

    ```php
    require_once __DIR__ . '/vendor/autoload.php';
    use Dekiakbar\IndonesiaRegionsPhpClient\Region;
    $region = new Region();
    print_r( $region->getAllProvince('pos') );

    // will return something like :
    stdClass Object
    (
        [detail] => Array
            (
                [0] => stdClass Object
                    (
                        [kode_bps] => 11
                        [nama_bps] => ACEH
                        [kode_pos] => 20000
                        [nama_pos] => ACEH
                    )

                [1] => stdClass Object
                    (
                        [kode_bps] => 51
                        [nama_bps] => BALI
                        [kode_pos] => 80000
                        [nama_pos] => BALI
                    )
            )
        [list] => Array
            (
                [0] => stdClass Object
                    (
                        [kode] => 11
                        [nama] => ACEH
                    )

                [1] => stdClass Object
                    (
                        [kode] => 12
                        [nama] => SUMATERA UTARA
                    )
            )
    )

    ```

- #### Retrieve City List By Province Id

    ```php
    require_once __DIR__ . '/vendor/autoload.php';
    use Dekiakbar\IndonesiaRegionsPhpClient\Region;
    $region = new Region();

    // province Id from $region->getAllProvince('bps')
    $provinceId = 32;
    print_r( 
        $region->getCityListByProvinceId('pos',$provinceId) 
    );

    // will return something like :
    stdClass Object
    (
        [detail] => Array
            (
                [0] => stdClass Object
                    (
                        [kode_bps] => 3204
                        [nama_bps] => BANDUNG
                        [kode_pos] => 40300
                        [nama_pos] => BANDUNG
                    )

                [1] => stdClass Object
                    (
                        [kode_bps] => 3273
                        [nama_bps] => BANDUNG
                        [kode_pos] => 40100
                        [nama_pos] => KOTA BANDUNG
                    )
            )
        [list] => Array
            (
                [0] => stdClass Object
                    (
                        [kode] => 3201
                        [nama] => BOGOR
                    )

                [1] => stdClass Object
                    (
                        [kode] => 3202
                        [nama] => SUKABUMI
                    )
            )
    )
    ```

- #### Retrieve Subdistrict List By City Id

    ```php
    require_once __DIR__ . '/vendor/autoload.php';
    use Dekiakbar\IndonesiaRegionsPhpClient\Region;
    $region = new Region();

    // POS
    // city Id from $region->getCityListByProvinceId('pos',$provinceId)->list
    $cityId = 3273;
    print_r( 
        $region->getSubdistrictListByCityId('pos',$cityId)
    );

    // will return something like :
    stdClass Object
    (
        [detail] => Array
            (
                [0] => stdClass Object
                    (
                        [kode_bps] => 3273180
                        [nama_bps] => ANDIR
                        [kode_pos] => 40181
                        [nama_pos] => Andir
                    )

                [1] => stdClass Object
                    (
                        [kode_bps] => 3273180
                        [nama_bps] => ANDIR
                        [kode_pos] => 40182
                        [nama_pos] => Andir
                    )
            )
        [list] => Array
            (
                [0] => stdClass Object
                    (
                        [kode] => 3273010
                        [nama] => BANDUNG KULON
                    )

                [1] => stdClass Object
                    (
                        [kode] => 3273020
                        [nama] => BABAKAN CIPARAY
                    )
            )
    )



    // Dagri
    // city Id from $region->getCityListByProvinceId('dagri',$provinceId)->list
    $cityId = '32.73';
    print_r(
        $region->getSubdistrictListByCityId('dagri',$cityId)
    );

    // will return something like :
    stdClass Object
    (
        [detail] => Array
            (
                [0] => stdClass Object
                    (
                        [kode_bps] => 3273050
                        [nama_bps] => ASTANAANYAR
                        [kode_dagri] => 32.73.10
                        [nama_dagri] => ASTANA ANYAR
                    )

                [1] => stdClass Object
                    (
                        [kode_bps] => 3273120
                        [nama_bps] => UJUNG BERUNG
                        [kode_dagri] => 32.73.26
                        [nama_dagri] => UJUNGBERUNG
                    )
            )
        [list] => Array
            (
                [0] => stdClass Object
                    (
                        [kode] => 32.73.01
                        [nama] => Sukasari
                    )

                [1] => stdClass Object
                    (
                        [kode] => 32.73.02
                        [nama] => Coblong
                    )
            )
    )
    ```

- #### Retrieve Village List By Subdistrict Id

    ```php
    require_once __DIR__ . '/vendor/autoload.php';
    use Dekiakbar\IndonesiaRegionsPhpClient\Region;
    $region = new Region();
    // POS
    // subdistrict Id from $region->getSubdistrictListByCityId('pos',$cityId)->list
    $subdistrictId = 3273010;
    print_r( 
        $region->getVillageListBySubdistrictId('pos',$subdistrictId)
    );

    // will return something like :
    stdClass Object
    (
        [detail] => Array
            (
                [0] => stdClass Object
                    (
                        [kode_bps] => 3273010005
                        [nama_bps] => CARINGIN
                        [kode_pos] => 40212
                        [nama_pos] => Caringin
                    )

                [1] => stdClass Object
                    (
                        [kode_bps] => 3273010007
                        [nama_bps] => CIBUNTU
                        [kode_pos] => 40212
                        [nama_pos] => Cibuntu
                    )
            )
        [list] => Array
            (
                [0] => stdClass Object
                    (
                        [kode] => 3273010001
                        [nama] => GEMPOL SARI
                    )

                [1] => stdClass Object
                    (
                        [kode] => 3273010002
                        [nama] => CIGONDEWAH KALER
                    )
            )
    )

    // Dagri
    // subdistrict Id from $region->getSubdistrictListByCityId('dagri',$cityId)->list
    $subdistrictId = '32.73.10';
    print_r( 
        $region->getVillageListBySubdistrictId('dagri',$subdistrictId) 
    );

    // will return something like :
    stdClass Object
    (
        [detail] => Array
            (
                [0] => stdClass Object
                    (
                        [kode_bps] => 3273050001
                        [nama_bps] => KARASAK
                        [kode_dagri] => 32.73.10.1001
                        [nama_dagri] => KARASAK
                    )

                [1] => stdClass Object
                    (
                        [kode_bps] => 3273050002
                        [nama_bps] => PELINDUNG HEWAN
                        [kode_dagri] => 32.73.10.1006
                        [nama_dagri] => PELINDUNG HEWAN
                    )
            )
    )

    ```

- #### Retrieve ISO 3166-2 code for province
    > **Note : This method only for province**
    ```php
    require_once __DIR__ . '/vendor/autoload.php';
    use Dekiakbar\IndonesiaRegionsPhpClient\Region;
    $region = new Region();

    // Province code get from $region->getAllProvince('bps')->list
    $provinceId = 32;
    print_r( 
            $region->getIsoCode($provinceId) 
    );

    // will return String, something like :
    ID-JB

    ```
---

## License

[![License](https://poser.pugx.org/dekiakbar/indonesia-regions-php-client/license)](//packagist.org/packages/dekiakbar/indonesia-regions-php-client)

- **[MIT license](https://github.com/dekiakbar/indonesia-regions-php-client/blob/master/LICENSE)**
- Copyright 2020 © <a href="https://github.com/dekiakbar" target="_blank">Deki Akbar</a>.