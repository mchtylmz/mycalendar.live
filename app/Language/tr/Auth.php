<?php

// override core en language system validation or define your own en language validation message
return [
	// General
	'invalidRequest' => 'Geçersiz URL!.',
    'error' => 'İşlem başarısız oldu!.',
    'success' => 'İşlem başarıyla tamamlandı!.',
	// Auth - Login
	'login' => [
		'error'   => 'E-posta/Kullanıcı Adı veya Şifre Hatalı!',
		'success' => 'Başarıyla giriş yapıldı',
        'title'   => 'Giriş Yap'
	],
	// Auth - Register
	'register' => [
		'success' => 'Başarıyla kayıt olundu, giriş yapabilirsiniz',
        'title'   => 'Kayıt Ol'
	],
	// Auth - forgotPassword
	'forgotPassword' => [
		'email'   => 'Eposta Adresi / Kullanıcı Adı Hatalı!.',
		'success' => 'Şifre sıfırlama linkiniz mail adresine gönderildi',
        'title'   => 'Şifre Unuttum?'
	],
	// Auth - resetPassword
	'resetPassword' => [
		'passwordMismatch' => 'Şifre aynı değil!',
		'success' => 'Yeni şifreniz başarıyla değiştirildi',
        'title'   => 'Yeni Şifre Oluştur'
	],
    // Form
    'form' => [
        'email' => 'E-posta Adresi',
        'email_or_username' => 'E-posta / Kullanıcı Adı',
        'password' => 'Parolanız',
        'repassword' => 'Tekrar Parolanız',
        'first_name' => 'İsim',
        'last_name' => 'Soyisim',
    ],
	// Email
	'email' => [
		'errorPasswordSendLink' => 'Şifre sıfırlama linki gönderilemiyor!.',
		'resetPasswordSubject'  => 'Şifre Sıfırlama'
	]
];
