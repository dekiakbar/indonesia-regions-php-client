# Indonesia Regions PHP Client

<p align="center">
    <a href="https://travis-ci.com/github/dekiakbar/indonesia-regions-php-client"><img src="https://travis-ci.com/dekiakbar/indonesia-regions-php-client.svg?branch=master" alt="Build Status"></a>
    <a href="https://packagist.org/packages/dekiakbar/indonesia-regions-php-client"><img src="https://poser.pugx.org/dekiakbar/indonesia-regions-php-client/version" alt="Build Status"></a>
    <a href="https://packagist.org/packages/dekiakbar/indonesia-regions-php-client"><img src="https://poser.pugx.org/dekiakbar/indonesia-regions-php-client/license" alt="Build Status"></a>
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
PHP >= 7.1
ext-json
ext-curl
```

---

## Installation

- `$ composer require dekiakbar/indonesia-regions-php-client`
- And You're done.

---

## Usage

> You can pass the parameter to the method, All of this package has 3 mode :
    > - For **BPS** and **POS** mode you can use **BPS Id/Code** to retrieve province / city / subdistrict / village data. But you **Can Not** use **BPS Id/Code** to retrieve province / city / subdistrict / village data if you use **dagri** mode, please use **dagri Id/code** to retrieve province / city / subdistrict / village data. 
    > - If mode is **NULL**, then the method will use default mode, default mode is **bps**.
    > - **bps** : only return JSON : **kode** and **nama** of province / city / subdistrict / village.
    > - **dagri** : return JSON : **kode_bps**, **nama_bps**, **kode_dagri**, **nama_dagri** of province / city / subdistrict / village.
    > - **pos** : return JSON : **kode_bps**, **nama_bps**, **kode_pos**, **nama_pos** of province / city / subdistrict / village.

- #### Retrieve All province data

    ```php
    require_once __DIR__ . '/vendor/autoload.php';
    use Dekiakbar\IndonesiaRegionsPhpClient\Region;
    $region = new Region();
    print_r( json_decode( $region->getAllProvince('bps') ) );

    // will return something like :
    Array
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
    ```

- #### Retrieve City List By Province Id

    ```php
    require_once __DIR__ . '/vendor/autoload.php';
    use Dekiakbar\IndonesiaRegionsPhpClient\Region;
    $region = new Region();

    // province Id from $region->getAllProvince('bps')
    $provinceId = 32;
    print_r( 
        json_decode( 
            $region->getCityListByProvinceId('bps',$provinceId) 
        ) 
    );

    // will return something like :
    Array
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
    ```

- #### Retrieve Subdistrict List By City Id
    > **note** : If you will retrieve data with mode **Dagri** please fill **City Id** with valid data. **City Id for BPS and Dagri are different**. see below example. 

    ```php
    require_once __DIR__ . '/vendor/autoload.php';
    use Dekiakbar\IndonesiaRegionsPhpClient\Region;
    $region = new Region();

    // BPS
    // city Id from $region->getCityListByProvinceId('bps',$provinceId)
    $cityId = 3273;
    print_r( 
        json_decode( 
            $region->getSubdistrictListByCityId('bps',$cityId) 
        ) 
    );

    // will return something like :
    Array
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

    // Dagri
    // city Id from $region->getCityListByProvinceId('dagri',$provinceId)
    $cityId = '32.73';
    print_r( 
        json_decode( 
            $region->getSubdistrictListByCityId('dagri',$cityId) 
        ) 
    );

    // will return something like :
    Array
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
    ```

- #### Retrieve Village List By Subdistrict Id
    > **note** : If you will retrieve data with mode **Dagri** please fill **Subdistrict Id** with valid data. **Subdistrict Id for BPS and Dagri are different**. see below example.

    ```php
    require_once __DIR__ . '/vendor/autoload.php';
    use Dekiakbar\IndonesiaRegionsPhpClient\Region;
    $region = new Region();
    // BPS
    // subdistrict Id from $region->getSubdistrictListByCityId('bps',$cityId)
    $subdistrictId = 3273010;
    print_r( 
        json_decode( 
            $region->getVillageListBySubdistrictId('bps',$subdistrictId) 
        ) 
    );

    // will return something like :
    Array
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

    // Dagri
    // subdistrict Id from $region->getSubdistrictListByCityId('dagri',$cityId)
    $subdistrictId = '32.73.10';
    print_r( 
        json_decode( 
            $region->getVillageListBySubdistrictId('dagri',$subdistrictId) 
        ) 
    );

    // will return something like :
    Array
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
    ```

- #### Retrieve ISO 3166-2 code for province
    > **Note : This method only for province**
    ```php
    require_once __DIR__ . '/vendor/autoload.php';
    use Dekiakbar\IndonesiaRegionsPhpClient\Region;
    $region = new Region();

    // Province code get from $region->getAllProvince('bps')
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

- **[MIT license](http://opensource.org/licenses/mit-license.php)**
- Copyright 2020 © <a href="https://github.com/dekiakbar" target="_blank">Deki Akbar</a>.