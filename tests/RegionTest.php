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
        if (is_array($response->detail)) {
            foreach ($response->detail as $data) {
                $this->assertObjectHasAttribute('kode', $data);
                $this->assertObjectHasAttribute('nama', $data);
                break;
            }
        }
        if (is_array($response->list)) {
            foreach ($response->list as $data) {
                $this->assertObjectHasAttribute('kode', $data);
                $this->assertObjectHasAttribute('nama', $data);
                break;
            }
        }
    }

    public function testgetAllProvinceDagri()
    {
        $response = $this->region->getAllProvince('dagri');
        if (is_array($response->detail)) {
            foreach ($response->detail as $data) {
                $this->assertObjectHasAttribute('kode_bps', $data);
                $this->assertObjectHasAttribute('nama_bps', $data);
                $this->assertObjectHasAttribute('kode_dagri', $data);
                $this->assertObjectHasAttribute('nama_dagri', $data);
                break;
            }
        }
        if (is_array($response->list)) {
            foreach ($response->list as $data) {
                $this->assertObjectHasAttribute('kode', $data);
                $this->assertObjectHasAttribute('nama', $data);
                break;
            }
        }
    }

    public function testgetAllProvincePos()
    {
        $response = $this->region->getAllProvince('pos');
        if (is_array($response->detail)) {
            foreach ($response->detail as $data) {
                $this->assertObjectHasAttribute('kode_bps', $data);
                $this->assertObjectHasAttribute('nama_bps', $data);
                $this->assertObjectHasAttribute('kode_pos', $data);
                $this->assertObjectHasAttribute('nama_pos', $data);
                break;
            }
        }
        if (is_array($response->list)) {
            foreach ($response->list as $data) {
                $this->assertObjectHasAttribute('kode', $data);
                $this->assertObjectHasAttribute('nama', $data);
                break;
            }
        }
    }

    public function testgetCityListByProvinceIdBps()
    {
        $provinceIds = [11];
        foreach ($provinceIds as $provinceId) {
            $cities = $this->region->getCityListByProvinceId('bps', $provinceId);
            if (is_array($cities->list)) {
                foreach ($cities->list as $data) {
                    $this->assertObjectHasAttribute('kode', $data);
                    $this->assertObjectHasAttribute('nama', $data);
                    break;
                }
            }
            if (is_array($cities->detail)) {
                foreach ($cities->detail as $data) {
                    $this->assertObjectHasAttribute('kode', $data);
                    $this->assertObjectHasAttribute('nama', $data);
                    break;
                }
            }
        }
    }

    public function testgetCityListByProvinceIdDagri()
    {
        $provinceIds = [63];
        foreach ($provinceIds as $provinceId) {
            $cities = $this->region->getCityListByProvinceId('dagri', $provinceId);
            if (is_array($cities->detail)) {
                foreach ($cities->detail as $data) {
                    $this->assertObjectHasAttribute('kode_bps', $data);
                    $this->assertObjectHasAttribute('nama_bps', $data);
                    $this->assertObjectHasAttribute('kode_dagri', $data);
                    $this->assertObjectHasAttribute('nama_dagri', $data);
                    break;
                }
            }
            if (is_array($cities->list)) {
                foreach ($cities->list as $data) {
                    $this->assertObjectHasAttribute('kode', $data);
                    $this->assertObjectHasAttribute('nama', $data);
                    break;
                }
            }
        }
    }

    public function testgetCityListByProvinceIdPos()
    {
        $provinceIds = [61];
        foreach ($provinceIds as $provinceId) {
            $cities = $this->region->getCityListByProvinceId('pos', $provinceId);
            if (is_array($cities->detail)) {
                foreach ($cities->detail as $data) {
                    $this->assertObjectHasAttribute('kode_bps', $data);
                    $this->assertObjectHasAttribute('nama_bps', $data);
                    $this->assertObjectHasAttribute('kode_pos', $data);
                    $this->assertObjectHasAttribute('nama_pos', $data);
                    break;
                }
            }
            if (is_array($cities->list)) {
                foreach ($cities->list as $data) {
                    $this->assertObjectHasAttribute('kode', $data);
                    $this->assertObjectHasAttribute('nama', $data);
                    break;
                }
            }
        }
    }

    public function testgetSubdistrictListByCityIdBps()
    {
        $cityIds = [3278];
        foreach ($cityIds as $cityId) {
            $subdistricts = $this->region->getSubdistrictListByCityId('bps', $cityId);
            if (is_array($subdistricts->list)) {
                foreach ($subdistricts->list as $data) {
                    $this->assertObjectHasAttribute('kode', $data);
                    $this->assertObjectHasAttribute('nama', $data);
                    break;
                }
            }
            if (is_array($subdistricts->detail)) {
                foreach ($subdistricts->detail as $data) {
                    $this->assertObjectHasAttribute('kode', $data);
                    $this->assertObjectHasAttribute('nama', $data);
                    break;
                }
            }
        }
    }

    public function testgetSubdistrictListByCityIdDagri()
    {
        $cityIds = ['32.78'];
        foreach ($cityIds as $cityId) {
            $subdistricts = $this->region->getSubdistrictListByCityId('dagri', $cityId);
            if (is_array($subdistricts->detail)) {
                foreach ($subdistricts->detail as $data) {
                    $this->assertObjectHasAttribute('kode_bps', $data);
                    $this->assertObjectHasAttribute('nama_bps', $data);
                    $this->assertObjectHasAttribute('kode_dagri', $data);
                    $this->assertObjectHasAttribute('nama_dagri', $data);
                    break;
                }
            }
            if (is_array($subdistricts->list)) {
                foreach ($subdistricts->list as $data) {
                    $this->assertObjectHasAttribute('kode', $data);
                    $this->assertObjectHasAttribute('nama', $data);
                    break;
                }
            }
        }
    }

    public function testgetSubdistrictListByCityIdPos()
    {
        $cityIds = [3272];
        foreach ($cityIds as $cityId) {
            $subdistricts = $this->region->getSubdistrictListByCityId('pos', $cityId);
            if (is_array($subdistricts->detail)) {
                foreach ($subdistricts->detail as $data) {
                    $this->assertObjectHasAttribute('kode_bps', $data);
                    $this->assertObjectHasAttribute('nama_bps', $data);
                    $this->assertObjectHasAttribute('kode_pos', $data);
                    $this->assertObjectHasAttribute('nama_pos', $data);
                    break;
                }
            }
            if (is_array($subdistricts->list)) {
                foreach ($subdistricts->list as $data) {
                    $this->assertObjectHasAttribute('kode', $data);
                    $this->assertObjectHasAttribute('nama', $data);
                    break;
                }
            }
        }
    }

    public function testgetVillageListBySubdistrictIdBps()
    {
        $subdistricIds = [340302];
        foreach ($subdistricIds as $subdistricId) {
            $villages = $this->region->getVillageListBySubdistrictId('bps', $subdistricId);
            if (is_array($villages->detail)) {
                foreach ($villages->detail as $data) {
                    $this->assertObjectHasAttribute('kode', $data);
                    $this->assertObjectHasAttribute('nama', $data);
                    break;
                }
            }
            if (is_array($villages->list)) {
                foreach ($villages->list as $data) {
                    $this->assertObjectHasAttribute('kode', $data);
                    $this->assertObjectHasAttribute('nama', $data);
                    break;
                }
            }
        }
    }

    public function testgetVillageListBySubdistrictIdDagri()
    {
        $subdistricIds = ['34.03.02'];
        foreach ($subdistricIds as $subdistricId) {
            $villages = $this->region->getVillageListBySubdistrictId('dagri', $subdistricId);
            if (is_array($villages->detail)) {
                foreach ($villages->detail as $data) {
                    $this->assertObjectHasAttribute('kode_bps', $data);
                    $this->assertObjectHasAttribute('nama_bps', $data);
                    $this->assertObjectHasAttribute('kode_dagri', $data);
                    $this->assertObjectHasAttribute('nama_dagri', $data);
                    break;
                }
            }
        }
    }

    public function testgetVillageListBySubdistrictIdPos()
    {
        $subdistricIds = [327203];
        foreach ($subdistricIds as $subdistricId) {
            $villages = $this->region->getVillageListBySubdistrictId('pos', $subdistricId);
            if (is_array($villages->detail)) {
                foreach ($villages->detail as $data) {
                    $this->assertObjectHasAttribute('kode_bps', $data);
                    $this->assertObjectHasAttribute('nama_bps', $data);
                    $this->assertObjectHasAttribute('kode_pos', $data);
                    $this->assertObjectHasAttribute('nama_pos', $data);
                    break;
                }
            }
            if (is_array($villages->list)) {
                foreach ($villages->list as $data) {
                    $this->assertObjectHasAttribute('kode', $data);
                    $this->assertObjectHasAttribute('nama', $data);
                    break;
                }
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
