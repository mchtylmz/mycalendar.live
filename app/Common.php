<?php

if (!function_exists('is_method')) {
    function is_method(string $method = 'GET'): bool
    {
        return service('request')->getMethod(true) == strtoupper($method);
    }
}

if (!function_exists('post_method')) {
    function post_method(bool $exit = false)
    {
        if (!is_method('POST'))
            return $exit ? exit() : redirect()->back();
    }
}

if (!function_exists('assets_url')) {
    function assets_url(string $assets): string
    {
        $assets .= '?v=1.0';
        return site_url('assets/' . $assets);
    }
}

if (!function_exists('uploads_url')) {
    function uploads_url(string $uploads): string
    {
        return assets_url('uploads/' . $uploads);
    }
}

if (!function_exists('get_gravatar')) {
    function get_gravatar(string $email): string
    {
        return 'https://www.gravatar.com/avatar/' . md5($email) . '?s=256';
    }
}

if (!function_exists('auth_check')) {
    function auth_check(): bool
    {
        return session()->get('logged_in') && session()->get('user_id');
    }
}

if (!function_exists('auth_user')) {
    function auth_user($user_id = null)
    {
        if (auth_check()) {
            return user($user_id ?? session('user_id'));
        }
        return null;
    }
}

if (!function_exists('user')) {
    function user(int $user_id)
    {
        $user_id = clean_number($user_id);
        return myCache("users_{$user_id}", function () use($user_id) {
            $user = new \App\Models\UserModel();
            return $user->where('id', $user_id)->first();
        });
    }
}

if (!function_exists('site_setting')) {
    function site_setting(string $name): string
    {
        return myCache("settings_{$name}", function () use($name) {
            return (new \App\Models\SettingsModel())->get($name);
        });
    }
}

if (!function_exists('notification')) {
    function notification(): \App\Models\NotificationsModel
    {
        return (new \App\Models\NotificationsModel());
    }
}


if (!function_exists('clean_number')) {
    function clean_number($number): int
    {
        return intval(clean_string($number));
    }
}

if (!function_exists('dark_mode')) {
    function dark_mode(): bool
    {
        helper('cookie');
        return get_cookie('dark') == 'true';
    }
}

if (!function_exists('clean_string')) {
    function clean_string($string): string
    {
        $string = htmlspecialchars(str_replace("\xc2\xa0", '', trim($string)), ENT_QUOTES, 'UTF-8');
        return remove_invisible_characters($string);
    }
}

if (!function_exists('tel')) {
    /**
     * tel
     *
     * @param mixed $phone URI string or array of URI segments
     * @param string $title The link title
     * @param mixed $attributes Any attributes
     *
     * @return string
     */
    function tel($phone, string $title = '', $attributes = ''): string
    {
        if ($title === '') {
            $title = $phone;
        }

        if ($attributes !== '') {
            $attributes = stringify_attributes($attributes);
        }

        return '<a href="tel:' . $phone . '"' . $attributes . '>' . $title . '</a>';
    }
}

if (!function_exists('categories')) {
    function categories(): array
    {
        return myCache("categories", function () {
            return (new \App\Models\CategoryModel())->findAll();
        });
    }
}

if (!function_exists('category')) {
    function category(string $column, string $value)
    {
        return myCache("category_{$column}_{$value}", function () use($column, $value) {
            $category = new \App\Models\CategoryModel();
            return $category
                ->where(clean_string($column), clean_string($value))
                ->first();
        });
    }
}

if (!function_exists('myCache')) {
    function myCache(string $key, $callback, bool $guest = false)
    {
        if ($guest && !auth_check()) {
            $key = $key . '_guest';
        }

        $cache_data = cache($key);
        if (!$cache_data) {
            $cache_data = call_user_func($callback);
            if ($cache_data)
                cache()->save($key, $cache_data, 3600);
        }

        return $cache_data;
    }
}

if (!function_exists('show404')) {
    function show404()
    {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
}

if (!function_exists('case_converter')) {
    function case_converter(string $keyword, string $transform = 'lowercase'): string
    {
        $low = [
            'a', 'b', 'c', 'ç', 'd', 'e', 'f', 'g', 'ğ', 'h', 'ı', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'ö', 'p', 'r', 's', 'ş', 't', 'u', 'ü', 'v', 'y', 'z', 'q', 'w', 'x'
        ];
        $upp = [
            'A', 'B', 'C', 'Ç', 'D', 'E', 'F', 'G', 'Ğ', 'H', 'I', 'İ', 'J', 'K', 'L', 'M', 'N', 'O', 'Ö', 'P', 'R', 'S', 'Ş', 'T', 'U', 'Ü', 'V', 'Y', 'Z', 'Q', 'W', 'X'
        ];
        if ($transform == 'uppercase' || $transform == 'u') {
            $keyword = str_replace($low, $upp, $keyword);
            $keyword = function_exists('mb_strtoupper') ? mb_strtoupper($keyword) : $keyword;
        } elseif ($transform == 'lowercase' || $transform == 'l') {
            $keyword = str_replace($upp, $low, $keyword);
            $keyword = function_exists('mb_strtolower') ? mb_strtolower($keyword) : $keyword;
        }
        return $keyword;
    }
    // case_converter
}

if (!function_exists('turkish_long_date')) {
    /**
     * @param $format
     * @param $datetime
     */
    function turkish_long_date(string $format, string $datetime = 'now'): string
    {
        $date = date("$format", strtotime($datetime));
        $dateArray = array(
            'Monday' => 'Pazartesi',
            'Tuesday' => 'Salı',
            'Wednesday' => 'Çarşamba',
            'Thursday' => 'Perşembe',
            'Friday' => 'Cuma',
            'Saturday' => 'Cumartesi',
            'Sunday' => 'Pazar',
            'January' => 'Ocak',
            'February' => 'Şubat',
            'March' => 'Mart',
            'April' => 'Nisan',
            'May' => 'Mayıs',
            'June' => 'Haziran',
            'July' => 'Temmuz',
            'August' => 'Ağustos',
            'September' => 'Eylül',
            'October' => 'Ekim',
            'November' => 'Kasım',
            'December' => 'Aralık',
            'Mon' => 'Pts',
            'Tue' => 'Sal',
            'Wed' => 'Çar',
            'Thu' => 'Per',
            'Fri' => 'Cum',
            'Sat' => 'Cts',
            'Sun' => 'Paz',
            'Jan' => 'Oca',
            'Feb' => 'Şub',
            'Mar' => 'Mar',
            'Apr' => 'Nis',
            'Jun' => 'Haz',
            'Jul' => 'Tem',
            'Aug' => 'Ağu',
            'Sep' => 'Eyl',
            'Oct' => 'Eki',
            'Nov' => 'Kas',
            'Dec' => 'Ara',
        );
        foreach ($dateArray as $en => $tr) {
            $date = str_replace($en, $tr, $date);
        }
        if (strpos($date, 'Mayıs') !== false && strpos($format, 'F') === false)
            $date = str_replace('Mayıs', 'May', $date);
        return $date;
    }
}

if (!function_exists('generate_permalink')) {
    function generate_permalink(string $string, array $options = []): string
    {
        $string = mb_convert_encoding($string, 'UTF-8', mb_list_encodings());
        $defaults = array(
            'delimiter' => '-',
            'limit' => null,
            'lowercase' => true,
            'replacements' => array(),
            'transliterate' => true
        );
        $options = array_merge($defaults, $options);
        $char_map = array(
            // Latin
            'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
            'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
            'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
            'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
            'ß' => 'ss',
            'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
            'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
            'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
            'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
            'ÿ' => 'y',
            // Latin symbols
            '©' => '(c)',
            // Greek
            'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
            'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
            'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
            'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
            'Ϋ' => 'Y',
            'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
            'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
            'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
            'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
            'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
            // Turkish
            'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
            'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
            // Russian
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
            'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
            'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
            'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
            'Я' => 'Ya',
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
            'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
            'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
            'я' => 'ya',
            // Ukrainian
            'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
            'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
            // Czech
            'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
            'Ž' => 'Z',
            'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
            'ž' => 'z',
            // Polish
            'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
            'Ż' => 'Z',
            'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
            'ż' => 'z',
            // Latvian
            'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
            'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
            'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
            'š' => 's', 'ū' => 'u', 'ž' => 'z'
        );
        $string = preg_replace(array_keys($options['replacements']), $options['replacements'], $string);
        if ($options['transliterate']) {
            $string = str_replace(array_keys($char_map), $char_map, $string);
        }
        $string = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $string);
        $string = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $string);
        $string = mb_substr($string, 0, ($options['limit'] ? $options['limit'] : mb_strlen($string, 'UTF-8')), 'UTF-8');
        $string = trim($string, $options['delimiter']);
        return $options['lowercase'] ? mb_strtolower($string, 'UTF-8') : $string;
    }
}// generate_permalink
