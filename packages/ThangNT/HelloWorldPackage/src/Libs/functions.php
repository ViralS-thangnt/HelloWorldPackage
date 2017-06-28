<?php

function getLinkFrontEnd($name)
{
    return asset($name);
}

function getLinkBackEnd($name)
{
    return asset('asset/admin/v2/' . $name);
}

function getImageLink($name)
{
    return url(config('libs.functions.getImageLink.path')) . '/' . $name;
}

function getLinkNoImage()
{
    return getImageLink(config('libs.functions.getLinkNoImage.path'));
}

function makeModelObject($modelName)
{
    $modelName = config('libs.functions.makeModelObject.path') . $modelName;
    return new $modelName;
}

function checkExistAndCreateFolder($path)
{
    if (!\File::isDirectory($path)) {
        \File::makeDirectory($path, 0777, true, true);
    }

    return true;
}

function createUUID() {
    $uuid = \DB::select(\DB::raw('SELECT UUID() AS UUID'));
    return $uuid[0]->UUID;
}

function getImagePathByType($imageType, $imageName = null)
{
    $pathImage = '';
    switch ($imageType) {
        case IMAGE_TYPE_COUPON:
            $pathImage = "images/coupons";
            break;
        case IMAGE_TYPE_ART:
            $pathImage = "images/arts";
            break;
        case IMAGE_TYPE_PROMOTION:
            $pathImage = "images/promotions";
            break;
        case IMAGE_TYPE_PRODUCT:
            $pathImage = "images/products";
            break;
        case IMAGE_TYPE_AVATAR:
            $pathImage = "images/users";
            break;
        case IMAGE_TYPE_TEMPLATE:
            $pathImage = "images/templates";
            break;
        case IMAGE_TYPE_BANNER:
            $pathImage = "images/banners";
            break;
        case IMAGE_TYPE_NULL:
        default:
            $pathImage = "";
            break;
    }

    if (!is_null($imageName)) {
        $pathImage .= '/' . $imageName;
    }

    return url($pathImage);
}

/**
 * Upload a image
 *
 * @author ThangNT
 * @access public
 * @param  $images      Array Image data upload by form submit
 * @return array        Array Name uploaded
 */
function uploadImageArray($images, $class = 'Image', $returnDataType = RETURN_IMAGE_DATA_NAME, $imageType = null)
{
    $imageNames = [];
    $pathImage = '';
    switch ($imageType) {
        case IMAGE_TYPE_COUPON:
            $pathImage = "images/coupons";
            break;
        case IMAGE_TYPE_ART:
            $pathImage = "images/arts";
            break;
        case IMAGE_TYPE_PROMOTION:
            $pathImage = "images/promotions";
            break;
        case IMAGE_TYPE_PRODUCT:
            $pathImage = "images/products";
            break;
        case IMAGE_TYPE_AVATAR:
            $pathImage = "images/users";
            break;
        case IMAGE_TYPE_TEMPLATE:
            $pathImage = "images/templates";
            break;
        case IMAGE_TYPE_BANNER:
            $pathImage = "images/banners";
            break;
        case IMAGE_TYPE_NULL:
        default:
            $pathImage = "images";
            break;
    }

    $desUrl = public_path() . '/' . $pathImage;
    //config('libs.functions.uploadImageArray.path');

    foreach ($images as $img) {
        $fileName = str_random(IMAGE_RANDOM_CHARACTER_LENGTH) . '-' . $img->getClientOriginalName();
        $img->move($desUrl, $fileName);

        $class = config('libs.functions.makeModelObject.path') . $class;
        $image = new $class;
        $image->name = $fileName;
        $image->type = $imageType;
        $image->save();

        $imageNames[] = ($returnDataType == RETURN_IMAGE_DATA_NAME) ? $fileName : $image;
    }

    return $imageNames;
}

function buildDiffTime($time)
{
    $currentTime = strtotime(date('Y-m-d H:i:s'));
    $updateTime = strtotime($time);

    $diffSeconds = floor(abs($currentTime - $updateTime) );

    // Find diff day
    $diffDay = 0;
    if ($diffSeconds / (3600 * 24) > 1) {
        $diffDay = floor($diffSeconds / (3600 * 24));
    }
    $diffSeconds -= $diffDay * (3600 * 24);

    // Find diff hours
    $diffHours = 0;
    if ($diffSeconds / 3600 > 1) {
        $diffHours = floor($diffSeconds / 3600);
    }
    $diffSeconds -= ($diffHours *  3600);

    // Find diff minutes
    $diffMinutes = 0;
    if ($diffSeconds / 60 > 1) {
        $diffMinutes = floor($diffSeconds / 60);
    }

    $res = '';
    if ($diffDay > 0) {
        $res .= $diffDay . ' days ';
    }

    if ($diffHours > 0) {
        $res .= $diffHours . ' hrs ';
    }

    if ($diffMinutes > 0) {
        $res .= $diffMinutes . ' mins ago ';
    }

    return $res;
}

// function buildViewRelation($item, $relations)
// {
//     $relations = explode('.', $relations);
//     if (count($relations) > 0) {
//         foreach ($relations as $relation) {
//             $item = $item->$relation;
//         }
//     } else {
//         $item = $item->relations;
//     }

//     return $item;
// }

// function checkHasFieldRelationship($model, $relation, $fieldName)
// {
//     return ($model->$relation && $model->$relation->first()) ? $model->$relation->first()->$fieldName : null;
// }


function buildConfigList($srcArr)
{
    $res = [];
    foreach ($srcArr as $key => $value) {
        $res[] = [
            'id' => $key,
            'name' => $value
        ];
    }

    return $res;
}

function getParam($name)
{
    return isset($_GET[$name]) ? $_GET[$name] : '';
}

function checkEmptyGetParam($name, $default = '')
{
    return empty(getParam($name)) ? $default : $_GET[$name];
}

function checkValueSelected($value, $fieldName, $defaultSelectedValue = 'selected', $defaultValue = '')
{
    // Example:
    //  $balance == checkEmptyGetParam('balance', '') ? 'selected' : ''
    //  $supplier->id == checkEmptyGetParam('supplier', '') ? 'selected' : ''

    return $value == checkEmptyGetParam($fieldName, '') ? $defaultSelectedValue : $defaultValue;

}

function buildStringFromArray($arr, $fieldName)
{
    if (count($arr) == 0) {
        return '-';
    }
    $res = [];
    foreach ($arr as $key => $item) {
        $res[] = $item[$fieldName];
    }

    return implode(',', $res);
}

function buildArrayCombobox($source, $idField, $valueField)
{
    $res = [];
    if ($idField) {
        foreach ($source as $item) {
            $res[$item->$idField] = $item->$valueField;
        }
    } else {
        foreach ($source as $item) {
            $res[] = $item->$valueField;
        }
    }

    return $res;
}

function buildDataCheckboxSelected($source, $fieldName)
{
    $res = [];
    foreach ($source as $k => $size) {
        $res[] = $size[$fieldName];
    }

    return $res;
}

function buildSkuNumber($primaryCode, $colorCode = '#00FFFF', $size = 'XL')
{
    // Length of color is 3.
    $colorCode = getCommonColor()[strtoupper($colorCode)];
    $colorCode = implode('', explode(' ', $colorCode));

    // $color = substr($color, 0, 3);


    // Length of size is 1 or 2 character (Max is 2. Min is 1)
    // $size = getSizeList()[$size];
    // $size = substr($size, 0, (strlen($size) == 1 ? 1 : 2));

    // Length of primaryCode is 3 or 4 characters
    // defend length of size
    $skuNumber = $primaryCode . $size . $colorCode;
    // $skuNumber = substr($primaryCode, 0, strlen($skuNumber) == 4 ? 4 : 3) . $skuNumber;

    // if (strlen($skuNumber) < 8) {
    //     $skuNumber = str_random(8 - strlen($skuNumber)) . $skuNumber;
    // }

    return strtoupper($skuNumber);
}

function buildSkuNumberWithColorName($primaryCode, $colorName = 'CYAN', $size = 'XL')
{
    $skuNumber = $primaryCode . $size . $colorName;

    return strtoupper(str_replace(' ', '', $skuNumber));
}

// function getEducationLevel() {
//     return [
//         'Primary school',
//         'Secondary school',
//         'Post-secondary education',
//     ];
// }

function getStepWizard()
{
    return [
        // 'Review your order',
        // 'Accept quotation and payment',
        // 'Choose Billing and shipping address',
        // 'Done'

        'Review your order',
        'Choose Billing and shipping address',
        'Accept quotation',
        'Payment',
        'Done'
    ];
}

// Color functions
function getCommonColor()
{
    $className = '\\App\Models\Color';
    $colors = $className::pluck('color_name', 'color_code')->toArray();
    $upperColors = [];
    foreach ($colors as $key => $color) {
        $upperColors[strtoupper($key)] = $color;
    }

    return $upperColors;
}

function getSampleColors()
{
    // return [
    //     '#F5F5DC'  =>  'Beige',
    //     '#FFC0CB'  =>  'Pink',
    //     '#800080'  =>  'Purple',
    //     '#FF0000'  =>  'Red',
    //     '#FFA500'  =>  'Orange',
    //     '#FFFF00'  =>  'Yellow',
    //     '#008000'  =>  'Green',
    //     COLOR_CODE_DEFAULT  =>  COLOR_NAME_DEFAULT,
    //     // '#00FFFF'  =>  'Cyan',   //--> This is default
    //     '#0000FF'  =>  'Blue',
    //     '#A52A2A'  =>  'Brown',
    //     '#FFFFFF'  =>  'White',
    //     '#C0C0C0'  =>  'Silver',
    //     '#808080'  =>  'Grey',
    //     '#000000'  =>  'Black',
    //     '#000080'  =>  'Navy',
    //     '#FFD700'  =>  'Gold',
    //     '#F0F8FF'  =>  'aliceblue',
    //     '#FFE4C4'  =>  'bisque',
    //     '#FF1493'  =>  'deeppink',
    //     '#FAF0E6'  =>  'linen',
    // ];

    return [
        "#F0F8FF" => "alice blue",
        "#FAEBD7" => "antique white",
        "#00FFFF" => "cyan",
        "#7FFFD4" => "aqua marine",
        "#F0FFFF" => "azure",
        "#F5F5DC" => "beige",
        "#FFE4C4" => "bisque",
        "#000000" => "black",
        "#FFEBCD" => "blanched almond",
        "#0000FF" => "blue",
        "#8A2BE2" => "blue violet",
        "#A52A2A" => "brown",
        "#DEB887" => "burly wood",
        "#5F9EA0" => "cadet blue",
        "#7FFF00" => "chartreuse",
        "#D2691E" => "chocolate",
        "#FF7F50" => "coral",
        "#6495ED" => "cornflower blue",
        "#FFF8DC" => "cornsilk",
        "#DC143C" => "crimson",
        "#00008B" => "dark blue",
        "#008B8B" => "dark cyan",
        "#B8860B" => "dark goldenrod",
        "#A9A9A9" => "dark grey",
        "#006400" => "dark green",
        "#BDB76B" => "dark khaki",
        "#8B008B" => "dark magenta",
        "#556B2F" => "dark olivegreen",
        "#FF8C00" => "dark orange",
        "#9932CC" => "dark orchid",
        "#8B0000" => "dark red",
        "#E9967A" => "dark salmon",
        "#8FBC8F" => "dark seagreen",
        "#483D8B" => "dark slateblue",
        "#2F4F4F" => "dark slategrey",
        "#00CED1" => "dark turquoise",
        "#9400D3" => "dark violet",
        "#FF1493" => "deep pink",
        "#00BFFF" => "deep skyblue",
        "#696969" => "dim grey",
        "#1E90FF" => "dodger blue",
        "#B22222" => "fire brick",
        "#FFFAF0" => "floral white",
        "#228B22" => "forest green",
        "#FF00FF" => "magenta",
        "#DCDCDC" => "gainsboro",
        "#F8F8FF" => "ghost white",
        "#FFD700" => "gold",
        "#DAA520" => "goldenrod",
        "#808080" => "grey",
        "#008000" => "green",
        "#ADFF2F" => "green yellow",
        "#F0FFF0" => "honeydew",
        "#FF69B4" => "hotpink",
        "#CD5C5C" => "indianred",
        "#4B0082" => "indigo",
        "#FFFFF0" => "ivory",
        "#F0E68C" => "khaki",
        "#E6E6FA" => "lavender",
        "#FFF0F5" => "lavender blush",
        "#7CFC00" => "lawngreen",
        "#FFFACD" => "lemonchiffon",
        "#ADD8E6" => "light blue",
        "#F08080" => "light coral",
        "#E0FFFF" => "light cyan",
        "#FAFAD2" => "light goldenrod yellow",
        "#D3D3D3" => "light grey",
        "#90EE90" => "light green",
        "#FFB6C1" => "light pink",
        "#FFA07A" => "light salmon",
        "#20B2AA" => "light seagreen",
        "#87CEFA" => "light skyblue",
        "#778899" => "light slategrey",
        "#B0C4DE" => "light steelblue",
        "#FFFFE0" => "light yellow",
        "#00FF00" => "lime",
        "#32CD32" => "lime green",
        "#FAF0E6" => "linen",
        "#800000" => "maroon",
        "#66CDAA" => "medium aqua marine",
        "#0000CD" => "medium blue",
        "#BA55D3" => "medium orchid",
        "#9370D0" => "medium purple",
        "#3CB371" => "medium seagreen",
        "#7B68EE" => "medium slateblue",
        "#00FA9A" => "medium spring green",
        "#48D1CC" => "medium turquoise",
        "#C71585" => "medium violet red",
        "#191970" => "midnight blue",
        "#F5FFFA" => "mintcream",
        "#FFE4E1" => "mistyrose",
        "#FFE4B5" => "moccasin",
        "#FFDEAD" => "navajowhite",
        "#000080" => "navy",
        "#FDF5E6" => "oldlace",
        "#808000" => "olive",
        "#6B8E23" => "olivedrab",
        "#FFA500" => "orange",
        "#FF4500" => "orangered",
        "#DA70D6" => "orchid",
        "#EEE8AA" => "pale goldenrod",
        "#98FB98" => "pale green",
        "#AFEEEE" => "pale turquoise",
        "#DB7093" => "pale violetred",
        "#FFEFD5" => "papaya whip",
        "#FFDAB9" => "peachpuff",
        "#CD853F" => "peru",
        "#FFC0CB" => "pink",
        "#DDA0DD" => "plum",
        "#B0E0E6" => "powder blue",
        "#800080" => "purple",
        "#FF0000" => "red",
        "#BC8F8F" => "rosybrown",
        "#4169E1" => "royalblue",
        "#8B4513" => "saddle brown",
        "#FA8072" => "salmon",
        "#F4A460" => "sandy brown",
        "#2E8B57" => "sea green",
        "#FFF5EE" => "seashell",
        "#A0522D" => "sienna",
        "#C0C0C0" => "silver",
        "#87CEEB" => "skyblue",
        "#6A5ACD" => "slate blue",
        "#708090" => "slate grey",
        "#FFFAFA" => "snow",
        "#00FF7F" => "spring green",
        "#4682B4" => "steelblue",
        "#D2B48C" => "tan",
        "#008080" => "teal",
        "#D8BFD8" => "thistle",
        "#FF6347" => "tomato",
        "#40E0D0" => "turquoise",
        "#EE82EE" => "violet",
        "#F5DEB3" => "wheat",
        "#FFFFFF" => "white",
        "#F5F5F5" => "white smoke",
        "#FFFF00" => "yellow",
        "#9ACD32" => "yellow green",
    ];

}


/** Helper functions for API */
function apiErrorJsonFormat($msg, $status)
{
    return [
                'data' => null,
                'meta' => [
                    'status_code' => $status,
                    'message'     => $msg,
                ]
            ];
}

if ( ! function_exists('is_route')) {
    /**
     * Alias for Request::is(route(...))
     *
     * @return mixed
     */
    function is_route()
    {
        $args = func_get_args();
        foreach ($args as &$arg) {
            if (is_array($arg)) {
                $route = array_shift($arg);
                $arg = ltrim(route($route, $arg, false), '/');
                continue;
            }
            $arg = ltrim(route($arg, [], false), '/');
        }

        return call_user_func_array(array(app('request'), 'is'), $args);
    }
}

if ( ! function_exists('classActivePath')) {
    function classActivePath($path)
    {
        return is_route($path) ? ' class="active"' : '';
    }
}


function dateFormat($date) {
    return $date->format('Y-m-d');
}

function dateFormatForProfile($date) {
    return $date->format('M j, Y');
}

function dateTimeFormat($date) {
    return $date->format('H:i M j, Y');
}

function parseAPIDateTimeReturnToClient($datetime) {
    return dateTimeFormat(Carbon::parse($datetime));
}

function parseAPIDateReturnToClient($datetime) {
    return dateFormat(Carbon::parse($datetime));
}

function parseAPIDateForProfileReturnToClient($datetime) {
    return dateFormatForProfile(Carbon::parse($datetime));
}

function moneyFormat($amount) {
    return "$" . number_format(floatval($amount), 2);
}

function booleanToTitle($value) {
    if($value) {
        return 'Yes';
    } else {
        return 'No';
    }
}

// function isAdminLogin()
// {
//     if(\Session::has('admin_login')) {
//         return true;
//     }

//     return false;
// }

function getNumberPadding($number, $length = 3) {
    return sprintf("%0{$length}s", $number);
}

function dateFormatCustom($date, $format = 'M j, Y') {
    return $date->format($format);
}
function monthlyRange($month = null, $year = null)
{
    $month = (is_null($month) || $month < 1 || $month > 12) ? date('m') : str_pad($month, 2, '0', STR_PAD_LEFT);
    $year = (is_null($year)? date('Y'): $year);
    $from = $year.'-'.$month.'-01';
    $to = $year.'-'.$month.'-31';

    return [
        'from' => $from,
        'to' => $to,
    ];
}

function yearlyRange($year = null)
{
    $year = is_null($year) ? date('Y') : $year;

    return [
        'from' => $year.'-01-01',
        'to' => $year.'-12-31',
    ];
}
function formatCurrency($number)
{
    return config('app.currency').round($number, 2);
}

function formatNumberic($number, $decimalLength = 2)
{
    return number_format($number, $decimalLength);
}

function couponStatusText($input, $customer)
{
    $data = ['Active', 'Expired', 'Used'];
    $customer_applied = json_decode($input->customer_applied);

    if(in_array($customer->id, $customer_applied)){
        return $data[2];
    }

    return $data[$input->status];
}

function couponTypeText($key)
{
    $data = ['Public', 'Private'];

    return $data[$key];
}

function getTimeRange($key = null)
{
    $data = getTimeRangeDelivery();

    return $data[$key ? $key : 1];
}

function limit_text($text, $limit)
{
  if (str_word_count($text, 0) > $limit) {
      $words = str_word_count($text, 2);
      $pos = array_keys($words);
      $text = substr($text, 0, $pos[$limit]) . '...';
  }
  return $text;
}

function calculateAverageRating($ratingInfo)
{
  $averageRating = 0;
  $total = 0;
  $count = 0;
  $ratingInfo = json_decode($ratingInfo);
  if ($ratingInfo != null) {
    for ( $i =0; $i < count( $ratingInfo) ; $i++) {
      $total += $ratingInfo[$i]->rate;
      $count++;
    }
    $averageRating = $total / $count;
  }

  return $averageRating;
}

function getMonthNames()
{
    return [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December',
    ];
}

function calculateTotalQuantityCartItem($cartItem)
{
    $totalQuantity = 0;
    // \Log::info(json_encode($cartItem));
    foreach ($cartItem->options->quantitySizes as $keySize => $quantitySizeItem) {
        $size = $quantitySizeItem['size'];
        $totalQuantity += !empty($quantitySizeItem['quantity']) ? $quantitySizeItem['quantity'] : 0;
    }

    return $totalQuantity;
}

function getPsdAiExtension()
{
    return ['psd', 'ai', 'eps'];
}






