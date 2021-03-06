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
            'a', 'b', 'c', '??', 'd', 'e', 'f', 'g', '??', 'h', '??', 'i', 'j', 'k', 'l', 'm', 'n', 'o', '??', 'p', 'r', 's', '??', 't', 'u', '??', 'v', 'y', 'z', 'q', 'w', 'x'
        ];
        $upp = [
            'A', 'B', 'C', '??', 'D', 'E', 'F', 'G', '??', 'H', 'I', '??', 'J', 'K', 'L', 'M', 'N', 'O', '??', 'P', 'R', 'S', '??', 'T', 'U', '??', 'V', 'Y', 'Z', 'Q', 'W', 'X'
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
            'Tuesday' => 'Sal??',
            'Wednesday' => '??ar??amba',
            'Thursday' => 'Per??embe',
            'Friday' => 'Cuma',
            'Saturday' => 'Cumartesi',
            'Sunday' => 'Pazar',
            'January' => 'Ocak',
            'February' => '??ubat',
            'March' => 'Mart',
            'April' => 'Nisan',
            'May' => 'May??s',
            'June' => 'Haziran',
            'July' => 'Temmuz',
            'August' => 'A??ustos',
            'September' => 'Eyl??l',
            'October' => 'Ekim',
            'November' => 'Kas??m',
            'December' => 'Aral??k',
            'Mon' => 'Pts',
            'Tue' => 'Sal',
            'Wed' => '??ar',
            'Thu' => 'Per',
            'Fri' => 'Cum',
            'Sat' => 'Cts',
            'Sun' => 'Paz',
            'Jan' => 'Oca',
            'Feb' => '??ub',
            'Mar' => 'Mar',
            'Apr' => 'Nis',
            'Jun' => 'Haz',
            'Jul' => 'Tem',
            'Aug' => 'A??u',
            'Sep' => 'Eyl',
            'Oct' => 'Eki',
            'Nov' => 'Kas',
            'Dec' => 'Ara',
        );
        foreach ($dateArray as $en => $tr) {
            $date = str_replace($en, $tr, $date);
        }
        if (strpos($date, 'May??s') !== false && strpos($format, 'F') === false)
            $date = str_replace('May??s', 'May', $date);
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
            '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'AE', '??' => 'C',
            '??' => 'E', '??' => 'E', '??' => 'E', '??' => 'E', '??' => 'I', '??' => 'I', '??' => 'I', '??' => 'I',
            '??' => 'D', '??' => 'N', '??' => 'O', '??' => 'O', '??' => 'O', '??' => 'O', '??' => 'O', '??' => 'O',
            '??' => 'O', '??' => 'U', '??' => 'U', '??' => 'U', '??' => 'U', '??' => 'U', '??' => 'Y', '??' => 'TH',
            '??' => 'ss',
            '??' => 'a', '??' => 'a', '??' => 'a', '??' => 'a', '??' => 'a', '??' => 'a', '??' => 'ae', '??' => 'c',
            '??' => 'e', '??' => 'e', '??' => 'e', '??' => 'e', '??' => 'i', '??' => 'i', '??' => 'i', '??' => 'i',
            '??' => 'd', '??' => 'n', '??' => 'o', '??' => 'o', '??' => 'o', '??' => 'o', '??' => 'o', '??' => 'o',
            '??' => 'o', '??' => 'u', '??' => 'u', '??' => 'u', '??' => 'u', '??' => 'u', '??' => 'y', '??' => 'th',
            '??' => 'y',
            // Latin symbols
            '??' => '(c)',
            // Greek
            '??' => 'A', '??' => 'B', '??' => 'G', '??' => 'D', '??' => 'E', '??' => 'Z', '??' => 'H', '??' => '8',
            '??' => 'I', '??' => 'K', '??' => 'L', '??' => 'M', '??' => 'N', '??' => '3', '??' => 'O', '??' => 'P',
            '??' => 'R', '??' => 'S', '??' => 'T', '??' => 'Y', '??' => 'F', '??' => 'X', '??' => 'PS', '??' => 'W',
            '??' => 'A', '??' => 'E', '??' => 'I', '??' => 'O', '??' => 'Y', '??' => 'H', '??' => 'W', '??' => 'I',
            '??' => 'Y',
            '??' => 'a', '??' => 'b', '??' => 'g', '??' => 'd', '??' => 'e', '??' => 'z', '??' => 'h', '??' => '8',
            '??' => 'i', '??' => 'k', '??' => 'l', '??' => 'm', '??' => 'n', '??' => '3', '??' => 'o', '??' => 'p',
            '??' => 'r', '??' => 's', '??' => 't', '??' => 'y', '??' => 'f', '??' => 'x', '??' => 'ps', '??' => 'w',
            '??' => 'a', '??' => 'e', '??' => 'i', '??' => 'o', '??' => 'y', '??' => 'h', '??' => 'w', '??' => 's',
            '??' => 'i', '??' => 'y', '??' => 'y', '??' => 'i',
            // Turkish
            '??' => 'S', '??' => 'I', '??' => 'C', '??' => 'U', '??' => 'O', '??' => 'G',
            '??' => 's', '??' => 'i', '??' => 'c', '??' => 'u', '??' => 'o', '??' => 'g',
            // Russian
            '??' => 'A', '??' => 'B', '??' => 'V', '??' => 'G', '??' => 'D', '??' => 'E', '??' => 'Yo', '??' => 'Zh',
            '??' => 'Z', '??' => 'I', '??' => 'J', '??' => 'K', '??' => 'L', '??' => 'M', '??' => 'N', '??' => 'O',
            '??' => 'P', '??' => 'R', '??' => 'S', '??' => 'T', '??' => 'U', '??' => 'F', '??' => 'H', '??' => 'C',
            '??' => 'Ch', '??' => 'Sh', '??' => 'Sh', '??' => '', '??' => 'Y', '??' => '', '??' => 'E', '??' => 'Yu',
            '??' => 'Ya',
            '??' => 'a', '??' => 'b', '??' => 'v', '??' => 'g', '??' => 'd', '??' => 'e', '??' => 'yo', '??' => 'zh',
            '??' => 'z', '??' => 'i', '??' => 'j', '??' => 'k', '??' => 'l', '??' => 'm', '??' => 'n', '??' => 'o',
            '??' => 'p', '??' => 'r', '??' => 's', '??' => 't', '??' => 'u', '??' => 'f', '??' => 'h', '??' => 'c',
            '??' => 'ch', '??' => 'sh', '??' => 'sh', '??' => '', '??' => 'y', '??' => '', '??' => 'e', '??' => 'yu',
            '??' => 'ya',
            // Ukrainian
            '??' => 'Ye', '??' => 'I', '??' => 'Yi', '??' => 'G',
            '??' => 'ye', '??' => 'i', '??' => 'yi', '??' => 'g',
            // Czech
            '??' => 'C', '??' => 'D', '??' => 'E', '??' => 'N', '??' => 'R', '??' => 'S', '??' => 'T', '??' => 'U',
            '??' => 'Z',
            '??' => 'c', '??' => 'd', '??' => 'e', '??' => 'n', '??' => 'r', '??' => 's', '??' => 't', '??' => 'u',
            '??' => 'z',
            // Polish
            '??' => 'A', '??' => 'C', '??' => 'e', '??' => 'L', '??' => 'N', '??' => 'o', '??' => 'S', '??' => 'Z',
            '??' => 'Z',
            '??' => 'a', '??' => 'c', '??' => 'e', '??' => 'l', '??' => 'n', '??' => 'o', '??' => 's', '??' => 'z',
            '??' => 'z',
            // Latvian
            '??' => 'A', '??' => 'C', '??' => 'E', '??' => 'G', '??' => 'i', '??' => 'k', '??' => 'L', '??' => 'N',
            '??' => 'S', '??' => 'u', '??' => 'Z',
            '??' => 'a', '??' => 'c', '??' => 'e', '??' => 'g', '??' => 'i', '??' => 'k', '??' => 'l', '??' => 'n',
            '??' => 's', '??' => 'u', '??' => 'z'
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
