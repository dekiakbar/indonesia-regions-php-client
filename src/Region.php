<?php

namespace Dekiakbar\IndonesiaRegionsPhpClient;

class Region
{
    const VERSION = '1.2.1';
    const API_BASE_PATH = 'https://sig.bps.go.id/';
    const DEFAULT_MODE = 'bps';

    const URL_PREFIX = [
        'rest-drop-down',
        'rest-bridging-dagri',
        'rest-bridging-pos',
        'rest-drop-down-dagri',
    ];

    const MODE_PREFIX = [
        'bps',
        'dagri',
        'pos',
    ];

    const LEVEL_PREFIX = [
        'provinsi',
        'kabupaten',
        'kecamatan',
        'desa',
    ];

    const ISO_3166_2_CODE = [
        '11' => 'ID-AC',
        '51' => 'ID-BA',
        '36' => 'ID-BT',
        '17' => 'ID-BE',
        '75' => 'ID-GO',
        '31' => 'ID-JK',
        '15' => 'ID-JA',
        '32' => 'ID-JB',
        '33' => 'ID-JT',
        '35' => 'ID-JI',
        '61' => 'ID-KB',
        '63' => 'ID-KS',
        '62' => 'ID-KT',
        '64' => 'ID-KI',
        '65' => 'ID-KU',
        '19' => 'ID-BB',
        '21' => 'ID-KR',
        '18' => 'ID-LA',
        '81' => 'ID-MA',
        '82' => 'ID-MU',
        '52' => 'ID-NB',
        '53' => 'ID-NT',
        '94' => 'ID-PA',
        '91' => 'ID-PB',
        '14' => 'ID-RI',
        '76' => 'ID-SR',
        '73' => 'ID-SN',
        '72' => 'ID-ST',
        '74' => 'ID-SG',
        '71' => 'ID-SA',
        '13' => 'ID-SB',
        '16' => 'ID-SS',
        '12' => 'ID-SU',
        '34' => 'ID-YO',
    ];

    private static $ua = [
        'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/534.14 (KHTML, like Gecko) Chrome/10.0.602.0 Safari/534.14',
        'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.14 (KHTML, like Gecko) Chrome/10.0.601.0 Safari/534.14',
        'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/534.14 (KHTML, like Gecko) Chrome/10.0.601.0 Safari/534.14',
        'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; de) Opera 11.51',
        'Opera/9.80 (X11; Linux x86_64; U; fr) Presto/2.9.168 Version/11.50',
        'Opera/9.80 (X11; Linux i686; U; hu) Presto/2.9.168 Version/11.50',
        'Opera/9.80 (X11; Linux i686; U; ru) Presto/2.8.131 Version/11.11',
        'Opera/9.80 (X11; Linux i686; U; es-ES) Presto/2.8.131 Version/11.11',
        'Mozilla/5.0 (Windows NT 5.1; U; en; rv:1.8.1) Gecko/20061208 Firefox/5.0 Opera 11.11',
        'Opera/9.80 (X11; Linux x86_64; U; bg) Presto/2.8.131 Version/11.10',
        'Opera/9.80 (Windows NT 6.0; U; en) Presto/2.8.99 Version/11.10',
        'Opera/9.80 (Windows NT 5.1; U; zh-tw) Presto/2.8.131 Version/11.10',
        'Opera/9.80 (Windows NT 6.1; Opera Tablet/15165; U; en) Presto/2.8.149 Version/11.1',
        'Opera/9.80 (X11; Linux x86_64; U; Ubuntu/10.10 (maverick); pl) Presto/2.7.62 Version/11.01',
        'Opera/9.80 (X11; Linux i686; U; ja) Presto/2.7.62 Version/11.01',
        'Opera/9.80 (X11; Linux i686; U; fr) Presto/2.7.62 Version/11.01',
        'Opera/9.80 (Windows NT 6.1; U; zh-tw) Presto/2.7.62 Version/11.01',
        'Opera/9.80 (Windows NT 6.1; U; zh-cn) Presto/2.7.62 Version/11.01',
        'Opera/9.80 (Windows NT 6.1; U; sv) Presto/2.7.62 Version/11.01',
        'Opera/9.80 (Windows NT 6.1; U; en-US) Presto/2.7.62 Version/11.01',
        'Opera/9.80 (Windows NT 6.1; U; cs) Presto/2.7.62 Version/11.01',
        'Opera/9.80 (Windows NT 6.0; U; pl) Presto/2.7.62 Version/11.01',
        'Mozilla/5.0 (X11; OpenBSD amd64; rv:28.0) Gecko/20100101 Firefox/28.0',
        'Mozilla/5.0 (X11; Linux x86_64; rv:28.0) Gecko/20100101  Firefox/28.0',
        'Mozilla/5.0 (Windows NT 6.1; rv:27.3) Gecko/20130101 Firefox/27.3',
        'Mozilla/5.0 (Windows NT 6.2; Win64; x64; rv:27.0) Gecko/20121011 Firefox/27.0',
        'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:25.0) Gecko/20100101 Firefox/25.0',
        'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.6; rv:25.0) Gecko/20100101 Firefox/25.0',
        'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:24.0) Gecko/20100101 Firefox/24.0',
        'Mozilla/5.0 (Windows NT 6.0; WOW64; rv:24.0) Gecko/20100101 Firefox/24.0',
        'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:24.0) Gecko/20100101 Firefox/24.0',
        'Mozilla/5.0 (X11; U; Linux i686; en-US) AppleWebKit/534.2 (KHTML, like Gecko) Chrome/6.0.453.1 Safari/534.2',
        'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_3; en-US) AppleWebKit/534.2 (KHTML, like Gecko) Chrome/6.0.453.1 Safari/534.2',
        'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_8; en-US) AppleWebKit/534.2 (KHTML, like Gecko) Chrome/6.0.453.1 Safari/534.2',
        'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_4; en-US) AppleWebKit/534.2 (KHTML, like Gecko) Chrome/6.0.451.0 Safari/534.2',
        'Mozilla/5.0 (X11; U; Linux i686; en-US) AppleWebKit/534.1 SUSE/6.0.428.0 (KHTML, like Gecko) Chrome/6.0.428.0 Safari/534.1',
    ];

    public function getAllProvince($mode = null)
    {
        $result = [];
        $urls = $this->urlBuilder($mode, 'provinsi');
        foreach ($urls as $i => $url) {
            $i == 1 ? $result['list'] = $this->request($url) : $result['detail'] = $this->request($url);
        }

        return (object) $result;
    }

    public function getCityListByProvinceId($mode, $parentId = null)
    {
        $result = [];
        $urls = $this->urlBuilder($mode, 'kabupaten', $parentId);
        foreach ($urls as $i => $url) {
            $i == 1 ? $result['list'] = $this->request($url) : $result['detail'] = $this->request($url);
        }

        return (object) $result;
    }

    public function getSubdistrictListByCityId($mode, $parentId = null)
    {
        $result = [];
        $urls = $this->urlBuilder($mode, 'kecamatan', $parentId);
        foreach ($urls as $i => $url) {
            $i == 1 ? $result['list'] = $this->request($url) : $result['detail'] = $this->request($url);
        }

        return (object) $result;
    }

    public function getVillageListBySubdistrictId($mode, $parentId = null)
    {
        if ($mode == 'dagri') {
            $result = [];
            $urls = $this->urlBuilder($mode, 'desa', $parentId);
            foreach ($urls as $i => $url) {
                if ($i == 0) {
                    $result['detail'] = $this->request($url);
                }
            }

            return (object) $result;
        } else {
            $result = [];
            $urls = $this->urlBuilder($mode, 'desa', $parentId);
            foreach ($urls as $i => $url) {
                $i == 1 ? $result['list'] = $this->request($url) : $result['detail'] = $this->request($url);
            }

            return (object) $result;
        }
    }

    public function getIsoCode($provinceId = null)
    {
        if (is_null($provinceId)) {
            throw new \Exception('Province Id Cannot be NULL');
        }
        if (!array_key_exists($provinceId, self::ISO_3166_2_CODE)) {
            throw new \Exception('Wrong Province Id');
        }
        if (array_key_exists($provinceId, self::ISO_3166_2_CODE)) {
            return self::ISO_3166_2_CODE[$provinceId];
        }
    }

    public function request($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($curl, CURLOPT_USERAGENT, $this->getRandomUa());
        curl_setopt($curl, CURLOPT_REFERER, 'https://www.google.com/');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response);
    }

    private function urlBuilder($mode, $level, $parentId = null)
    {
        if ($mode == null) {
            $mode = self::DEFAULT_MODE;
        }
        if ($this->validate($mode, $level, $parentId)) {
            $urlPrefix = self::URL_PREFIX[array_search($mode, self::MODE_PREFIX)];
            $parent = '';
            if ($parentId != null && $level != 'provinsi') {
                $parent = '&parent='.$parentId;
            }
            $result[] = self::API_BASE_PATH.$urlPrefix.'/getwilayah?level='.$level.$parent;
            if ($mode == 'dagri') {
                $result[] = self::API_BASE_PATH.self::URL_PREFIX[3].'/getwilayah?level='.$level.$parent;
            } else {
                $result[] = self::API_BASE_PATH.self::URL_PREFIX[0].'/getwilayah?level='.$level.$parent;
            }

            return $result;
        }
    }

    private function validate($mode, $level, $parentId = null)
    {
        if (!in_array($mode, self::MODE_PREFIX)) {
            throw new \Exception('Unknown Mode');
        }
        if (!in_array($level, self::LEVEL_PREFIX)) {
            throw new \Exception('Unknown Level');
        }
        if ($mode == 'dagri' && !in_array($level, ['provinsi', 'kabupaten']) && $parentId != null) {
            if (!strpos($parentId, '.') !== false) {
                throw new \Exception('Wrong Parent ID');
            }
        }

        if ($level != 'provinsi' && $parentId == null) {
            throw new \Exception('Parent ID can not be null');
        }

        return true;
    }

    private function getRandomUa()
    {
        return self::$ua[array_rand(self::$ua)];
    }

    public function getVersion()
    {
        return self::VERSION;
    }

    public function trimWord($word)
    {
        return  str_replace('"', '', ucwords(strtolower(trim($word))));
    }

    public function getDetailData(array $detailData, $id)
    {
        if (empty($detailData) || empty($id)) {
            throw new \Exception('Passed empty parameter to formattedName');
        }
        if (!is_array($detailData)) {
            throw new \Exception('First paramete of formattedName must be an array');
        }
        $data = json_decode(json_encode($detailData), true);

        return (object) $data[array_search($id, array_column($data, 'kode_bps'))];
    }
}
