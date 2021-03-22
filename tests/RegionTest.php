<?php

namespace Dekiakbar\IndonesiaRegionsPhpClient\Tests;

use Dekiakbar\IndonesiaRegionsPhpClient\Region;
use PHPUnit\Framework\TestCase;

class RegionTest extends TestCase
{
    private $region;

    protected function setUp(): void
    {
        $this->region = new Region();
    }

    protected function tearDown(): void
    {
        $this->region = null;
    }

    public function testgetAllProvinceBps()
    {
        $response = $this->region->getAllProvince('bps');
        foreach ($response->detail as $data) {
            $this->assertObjectHasAttribute('kode', $data);
            $this->assertObjectHasAttribute('nama', $data);
        }
        foreach ($response->list as $data) {
            $this->assertObjectHasAttribute('kode', $data);
            $this->assertObjectHasAttribute('nama', $data);
        }
    }

    public function testgetAllProvinceDagri()
    {
        $response = $this->region->getAllProvince('dagri');
        foreach ($response->detail as $data) {
            $this->assertObjectHasAttribute('kode_bps', $data);
            $this->assertObjectHasAttribute('nama_bps', $data);
            $this->assertObjectHasAttribute('kode_dagri', $data);
            $this->assertObjectHasAttribute('nama_dagri', $data);
        }
        foreach ($response->list as $data) {
            $this->assertObjectHasAttribute('kode', $data);
            $this->assertObjectHasAttribute('nama', $data);
        }
    }

    public function testgetAllProvincePos()
    {
        $response = $this->region->getAllProvince('pos');
        foreach ($response->detail as $data) {
            $this->assertObjectHasAttribute('kode_bps', $data);
            $this->assertObjectHasAttribute('nama_bps', $data);
            $this->assertObjectHasAttribute('kode_pos', $data);
            $this->assertObjectHasAttribute('nama_pos', $data);
        }
        foreach ($response->list as $data) {
            $this->assertObjectHasAttribute('kode', $data);
            $this->assertObjectHasAttribute('nama', $data);
        }
    }

    public function testgetCityListByProvinceIdBps()
    {
        $provinceIds = [11];
        foreach ($provinceIds as $provinceId) {
            $cities = $this->region->getCityListByProvinceId('bps', $provinceId);
            foreach ($cities->list as $data) {
                $this->assertObjectHasAttribute('kode', $data);
                $this->assertObjectHasAttribute('nama', $data);
            }
            foreach ($cities->detail as $data) {
                $this->assertObjectHasAttribute('kode', $data);
                $this->assertObjectHasAttribute('nama', $data);
            }
        }
    }

    public function testgetCityListByProvinceIdDagri()
    {
        $provinceIds = [63];
        foreach ($provinceIds as $provinceId) {
            $cities = $this->region->getCityListByProvinceId('dagri', $provinceId);
            foreach ($cities->detail as $data) {
                $this->assertObjectHasAttribute('kode_bps', $data);
                $this->assertObjectHasAttribute('nama_bps', $data);
                $this->assertObjectHasAttribute('kode_dagri', $data);
                $this->assertObjectHasAttribute('nama_dagri', $data);
            }
            foreach ($cities->list as $data) {
                $this->assertObjectHasAttribute('kode', $data);
                $this->assertObjectHasAttribute('nama', $data);
            }
        }
    }

    public function testgetCityListByProvinceIdPos()
    {
        $provinceIds = [61];
        foreach ($provinceIds as $provinceId) {
            $cities = $this->region->getCityListByProvinceId('pos', $provinceId);
            foreach ($cities->detail as $data) {
                $this->assertObjectHasAttribute('kode_bps', $data);
                $this->assertObjectHasAttribute('nama_bps', $data);
                $this->assertObjectHasAttribute('kode_pos', $data);
                $this->assertObjectHasAttribute('nama_pos', $data);
            }
            foreach ($cities->list as $data) {
                $this->assertObjectHasAttribute('kode', $data);
                $this->assertObjectHasAttribute('nama', $data);
            }
        }
    }

    public function testgetSubdistrictListByCityIdBps()
    {
        $cityIds = [3278];
        foreach ($cityIds as $cityId) {
            $subdistricts = $this->region->getSubdistrictListByCityId('bps', $cityId);
            foreach ($subdistricts->list as $data) {
                $this->assertObjectHasAttribute('kode', $data);
                $this->assertObjectHasAttribute('nama', $data);
            }
            foreach ($subdistricts->detail as $data) {
                $this->assertObjectHasAttribute('kode', $data);
                $this->assertObjectHasAttribute('nama', $data);
            }
        }
    }

    public function testgetSubdistrictListByCityIdDagri()
    {
        $cityIds = ['32.78'];
        foreach ($cityIds as $cityId) {
            $subdistricts = $this->region->getSubdistrictListByCityId('dagri', $cityId);
            foreach ($subdistricts->detail as $data) {
                $this->assertObjectHasAttribute('kode_bps', $data);
                $this->assertObjectHasAttribute('nama_bps', $data);
                $this->assertObjectHasAttribute('kode_dagri', $data);
                $this->assertObjectHasAttribute('nama_dagri', $data);
            }
            foreach ($subdistricts->list as $data) {
                $this->assertObjectHasAttribute('kode', $data);
                $this->assertObjectHasAttribute('nama', $data);
            }
        }
    }

    public function testgetSubdistrictListByCityIdPos()
    {
        $cityIds = [3272];
        foreach ($cityIds as $cityId) {
            $subdistricts = $this->region->getSubdistrictListByCityId('pos', $cityId);
            foreach ($subdistricts->detail as $data) {
                $this->assertObjectHasAttribute('kode_bps', $data);
                $this->assertObjectHasAttribute('nama_bps', $data);
                $this->assertObjectHasAttribute('kode_pos', $data);
                $this->assertObjectHasAttribute('nama_pos', $data);
            }
            foreach ($subdistricts->list as $data) {
                $this->assertObjectHasAttribute('kode', $data);
                $this->assertObjectHasAttribute('nama', $data);
            }
        }
    }

    public function testgetVillageListBySubdistrictIdBps()
    {
        $subdistricIds = [340302];
        foreach ($subdistricIds as $subdistricId) {
            $villages = $this->region->getVillageListBySubdistrictId('bps', $subdistricId);
            foreach ($villages->detail as $data) {
                $this->assertObjectHasAttribute('kode', $data);
                $this->assertObjectHasAttribute('nama', $data);
            }
            foreach ($villages->list as $data) {
                $this->assertObjectHasAttribute('kode', $data);
                $this->assertObjectHasAttribute('nama', $data);
            }
        }
    }

    public function testgetVillageListBySubdistrictIdDagri()
    {
        $subdistricIds = ['34.03.02'];
        foreach ($subdistricIds as $subdistricId) {
            $villages = $this->region->getVillageListBySubdistrictId('dagri', $subdistricId);
            foreach ($villages->detail as $data) {
                $this->assertObjectHasAttribute('kode_bps', $data);
                $this->assertObjectHasAttribute('nama_bps', $data);
                $this->assertObjectHasAttribute('kode_dagri', $data);
                $this->assertObjectHasAttribute('nama_dagri', $data);
            }
        }
    }

    public function testgetVillageListBySubdistrictIdPos()
    {
        $subdistricIds = [327203];
        foreach ($subdistricIds as $subdistricId) {
            $villages = $this->region->getVillageListBySubdistrictId('pos', $subdistricId);
            foreach ($villages->detail as $data) {
                $this->assertObjectHasAttribute('kode_bps', $data);
                $this->assertObjectHasAttribute('nama_bps', $data);
                $this->assertObjectHasAttribute('kode_pos', $data);
                $this->assertObjectHasAttribute('nama_pos', $data);
            }
            foreach ($villages->list as $data) {
                $this->assertObjectHasAttribute('kode', $data);
                $this->assertObjectHasAttribute('nama', $data);
            }
        }
    }

    public function testgetIsoCode()
    {
        $response = $this->region->getAllProvince('bps');
        foreach ($response->detail as $data) {
            $this->assertStringContainsString(
                'ID',
                $this->region->getIsoCode($data->kode)
            );
        }
    }
}
