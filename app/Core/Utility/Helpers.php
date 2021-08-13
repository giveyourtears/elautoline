<?php

if (!function_exists('languages')) {
  function languages()
  {
    return \App\Dal\Entities\Language::all();
  }
}

if (!function_exists('routeWithQuery')) {
  
  function routeWithQuery($name, $params = [], $exceptParamsFromQuery = [])
  {
    $newUrl = route($name, $params);
    $newQuery = parse_url($newUrl, PHP_URL_QUERY);
    
    $curentQuery = Request::getQueryString();
    
    if (empty($curentQuery)) {
      $resultUrl = $newUrl;
    } else {
      if (empty($newQuery)) {
        $resultUrl = $newUrl."?$curentQuery";
      } else {
        $resultUrl = $newUrl."&$curentQuery";
      }
    }
    
    return removeParamFromQuery($resultUrl, $exceptParamsFromQuery);
  }
}

if (!function_exists('urlWithQuery')) {
  
  function urlWithQuery()
  {
    $queryString = Request::getQueryString();
    
    return Request::url().(empty($queryString) ? '' : '?'.Request::getQueryString());
  }
}

if (!function_exists('removeParamFromQuery')) {
  
  function removeParamFromQuery($url, $names)
  {
    list($urlPart, $queryPart) = array_pad(explode('?', $url), 2, '');
    parse_str($queryPart, $queryVars);
    
    foreach ($names as $name) {
      unset($queryVars[$name]);
    }
    
    $newQuery = http_build_query($queryVars);
    
    return $urlPart.'?'.$newQuery;
  }
}

if (!function_exists('assetImage')) {
  function assetImage($path, $width = null, $height = null, $secure = null)
  {
    if (empty($path)) {
      return asset('images/no-img.png');
    }
    
    if (!$width or !$height) {
      return asset('images/'.$path, $secure);
    }
    
    $imageService = resolve(\App\Core\Services\Infrastructure\IImageService::class);
    
    return $imageService->resize($path, $width, $height);
  }
}

if (!function_exists('dateOf')) {
  function dateOf($datetime, $nowIfEmpty = true)
  {
    if (empty($datetime)) {
      if ($nowIfEmpty) {
        return;
      }
      
      return date('d-m-Y', strtotime(now()));
    }
    
    return date('d-m-Y', strtotime($datetime));
  }
}

if (!function_exists('dateUtcToLocal')) {
  function dateUtcToLocal($datetime)
  {
    if (empty($datetime)) {
      return;
    }
  
    $localTimezone = \Config::get('app.local_timezone');
    return \Carbon\Carbon::createFromTimestamp(strtotime($datetime),
      new DateTimeZone($localTimezone));
  }
}

if (!function_exists('convertRus')) {
    function convertRus($str)
    {

        $cyr = [' ', 'Љ', 'Њ', 'Џ', 'џ', 'ш', 'ђ', 'ч', 'ћ', 'ж', 'љ', 'њ', 'Ш', 'Ђ', 'Ч', 'Ћ', 'Ж','Ц','ц', 'а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п', 'р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я', 'А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П', 'Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я'
        ];
        $lat = ['-', 'Lj', 'Nj', 'Dž', 'dž', 'sh', 'đ', 'č', 'ć', 'zh', 'lj', 'nj', 'Š', 'Đ', 'Č', 'Ć', 'Ž','C','c', 'a','b','v','g','d','e','io','zh','z','i','y','k','l','m','n','o','p', 'r','s','t','u','f','h','ts','ch','sh','sht','a','i','y','e','yu','ya', 'A','B','V','G','D','E','Io','Zh','Z','I','Y','K','L','M','N','O','P', 'R','S','T','U','F','H','Ts','Ch','Sh','Sht','A','I','Y','e','Yu','Ya'
        ];
        $textcyr = str_replace($cyr, $lat, $str);

        return $textcyr;
    }
}

if (!function_exists('convertEng')) {
    function convertEng($str)
    {

        $cyr = [' ', 'Љ', 'Њ', 'Џ', 'џ', 'ш', 'ђ', 'ч', 'ћ', 'ж', 'љ', 'њ', 'Ш', 'Ђ', 'Ч', 'Ћ', 'Ж','Ц','ц', 'а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п', 'р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я', 'А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П', 'Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я'
        ];
        $lat = ['-', 'Lj', 'Nj', 'Dž', 'dž', 'sh', 'đ', 'ch', 'ć', 'zh', 'lj', 'nj', 'Š', 'Đ', 'Č', 'Ć', 'Ž','C','c', 'a','b','v','g','d','e','io','zh','z','i','y','k','l','m','n','o','p', 'r','s','t','u','f','h','ts','ch','sh','sht','a','i','y','e','yu','ya', 'A','B','V','G','D','E','Io','Zh','Z','I','Y','K','L','M','N','O','P', 'R','S','T','U','F','H','Ts','Ch','Sh','Sht','A','I','Y','e','Yu','Ya'
        ];
        $texteng = str_replace($lat, $cyr, $str);

        return $texteng;
    }
}
