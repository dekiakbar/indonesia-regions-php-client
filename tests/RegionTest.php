<?php
namespace Dekiakbar\IndonesiaRegionsPhpClient\Tests;

use PHPUnit\Framework\TestCase;
use Dekiakbar\IndonesiaRegionsPhpClient\Region;

class RegionTest extends TestCase
{
    private $region;

    protected function setUp(): void
    {
        $this->region = new Region();
    }

    protected function tearDown(): void
    {
        $this->region = NULL;
    }

    public function testgetAllProvinceBps()
    {   
        $response = $this->region->getAllProvince('bps');
        $datas = json_decode($response);
        foreach($datas as $data){
            $this->assertObjectHasAttribute('kode',$data);
            $this->assertObjectHasAttribute('nama',$data);
        }
    }

    public function testgetAllProvinceDagri()
    {   
        $response = $this->region->getAllProvince('dagri');
        $datas = json_decode($response);
        foreach($datas as $data){
            $this->assertObjectHasAttribute('kode_bps',$data);
            $this->assertObjectHasAttribute('nama_bps',$data);
            $this->assertObjectHasAttribute('kode_dagri',$data);
            $this->assertObjectHasAttribute('nama_dagri',$data);
        }
    }

    public function testgetAllProvincePos()
    {   
        $response = $this->region->getAllProvince('pos');
        $datas = json_decode($response);
        foreach($datas as $data){
            $this->assertObjectHasAttribute('kode_bps',$data);
            $this->assertObjectHasAttribute('nama_bps',$data);
            $this->assertObjectHasAttribute('kode_pos',$data);
            $this->assertObjectHasAttribute('nama_pos',$data);
        }
    }

    public function testgetCityListByProvinceIdBps()
    {
        $provinceIds = [11,32,35,34];
        foreach($provinceIds as $provinceId){
            $cities = $this->region->getCityListByProvinceId('bps', $provinceId);
            $cities = json_decode($cities);
            foreach($cities as $data){
                $this->assertObjectHasAttribute('kode',$data);
                $this->assertObjectHasAttribute('nama',$data);
            }
        }
    }

    public function testgetCityListByProvinceIdDagri()
    {
        $provinceIds = [61,63,62,64];
        foreach($provinceIds as $provinceId){
            $cities = $this->region->getCityListByProvinceId('dagri', $provinceId);
            $cities = json_decode($cities);
            foreach($cities as $data){
                $this->assertObjectHasAttribute('kode_bps',$data);
                $this->assertObjectHasAttribute('nama_bps',$data);
                $this->assertObjectHasAttribute('kode_dagri',$data);
                $this->assertObjectHasAttribute('nama_dagri',$data);
            }
        }
    }

    public function testgetCityListByProvinceIdPos()
    {
        $provinceIds = [61,63,62,64];
        foreach($provinceIds as $provinceId){
            $cities = $this->region->getCityListByProvinceId('pos', $provinceId);
            $cities = json_decode($cities);
            foreach($cities as $data){
                $this->assertObjectHasAttribute('kode_bps',$data);
                $this->assertObjectHasAttribute('nama_bps',$data);
                $this->assertObjectHasAttribute('kode_pos',$data);
                $this->assertObjectHasAttribute('nama_pos',$data);
            }
        }
    }

    public function testgetSubdistrictListByCityIdBps()
    {
        $cityIds = [3272,3278,3276,3218,3471,3402,3403];
        foreach($cityIds as $cityId){
            $subdistricts = $this->region->getSubdistrictListByCityId('bps', $cityId);
            $subdistricts = json_decode($subdistricts);
            foreach($subdistricts as $data){
                $this->assertObjectHasAttribute('kode',$data);
                $this->assertObjectHasAttribute('nama',$data);
            }
        }
    }

    public function testgetSubdistrictListByCityIdDagri()
    {
        $cityIds = ['32.72','32.78','32.76','32.18','34.71','34.02','34.03'];
        foreach($cityIds as $cityId){
            $subdistricts = $this->region->getSubdistrictListByCityId('dagri', $cityId);
            $subdistricts = json_decode($subdistricts);
            foreach($subdistricts as $data){
                $this->assertObjectHasAttribute('kode_bps',$data);
                $this->assertObjectHasAttribute('nama_bps',$data);
                $this->assertObjectHasAttribute('kode_dagri',$data);
                $this->assertObjectHasAttribute('nama_dagri',$data);
            }
        }
    }

    public function testgetSubdistrictListByCityIdPos()
    {
        $cityIds = [3272,3278,3276,3218,3471,3402,3403];
        foreach($cityIds as $cityId){
            $subdistricts = $this->region->getSubdistrictListByCityId('pos', $cityId);
            $subdistricts = json_decode($subdistricts);
            foreach($subdistricts as $data){
                $this->assertObjectHasAttribute('kode_bps',$data);
                $this->assertObjectHasAttribute('nama_bps',$data);
                $this->assertObjectHasAttribute('kode_pos',$data);
                $this->assertObjectHasAttribute('nama_pos',$data);
            }
        }
    }

    public function testgetVillageListBySubdistrictIdBps()
    {
        $subdistricIds = [327203,340302,330202,110102,210304,640305,610107];
        foreach($subdistricIds as $subdistricId){
            $villages = $this->region->getVillageListBySubdistrictId('bps', $subdistricId);
            $villages = json_decode($villages);
            foreach($villages as $data){
                $this->assertObjectHasAttribute('kode',$data);
                $this->assertObjectHasAttribute('nama',$data);
            }
        }
    }

    public function testgetVillageListBySubdistrictIdDagri()
    {
        $subdistricIds = ['32.72.03','34.03.02','33.02.02','11.01.02','21.03.04','64.03.05','61.01.07'];
        foreach($subdistricIds as $subdistricId){
            $villages = $this->region->getVillageListBySubdistrictId('dagri', $subdistricId);
            $villages = json_decode($villages);
            foreach($villages as $data){
                $this->assertObjectHasAttribute('kode_bps',$data);
                $this->assertObjectHasAttribute('nama_bps',$data);
                $this->assertObjectHasAttribute('kode_dagri',$data);
                $this->assertObjectHasAttribute('nama_dagri',$data);
            }
        }
    }

    public function testgetVillageListBySubdistrictIdPos()
    {
        $subdistricIds = [327203,340302,330202,110102,210304,640305,610107];
        foreach($subdistricIds as $subdistricId){
            $villages = $this->region->getVillageListBySubdistrictId('pos', $subdistricId);
            $villages = json_decode($villages);
            foreach($villages as $data){
                $this->assertObjectHasAttribute('kode_bps',$data);
                $this->assertObjectHasAttribute('nama_bps',$data);
                $this->assertObjectHasAttribute('kode_pos',$data);
                $this->assertObjectHasAttribute('nama_pos',$data);
            }
        }
    }

    public function testgetIsoCode()
    {
        $response = $this->region->getAllProvince('bps');
        $datas = json_decode($response);
        foreach($datas as $data){
            $this->assertStringContainsString(
                'ID',
                $this->region->getIsoCode($data->kode)
            );
        }
    }
}