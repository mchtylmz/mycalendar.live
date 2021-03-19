<?php

// override core en language system validation or define your own en language validation message
return [
	// General
	'invalidRequest' => 'Geçersiz URL',
    'error' => 'Başarısız',
    'success' => 'Başarılı',
	// Auth - Login
	'login' => [
		'error'   => 'E-posta veya Şifre Hatalı!',
		'success' => 'Giriş Başarılı',
        'title'   => 'Giriş Yap'
	],
	// Auth - Register
	'register' => [
		'success' => 'Kayıt Başarılı',
        'title'   => 'Kayıt Ol'
	],
	// Auth - forgotPassword
	'forgotPassword' => [
		'email'   => 'Eposta Adresiniz Hatalı!.',
		'success' => 'Şifre Unuttum Maili Başarılı',
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
        'password' => 'Parolanız',
        'repassword' => 'Tekrar Parolanız',
        'first_name' => 'İsim',
        'last_name' => 'Soyisim',
    ],
	// Email
	'email' => [
		'errorPasswordSendLink' => 'Şifre sıfırlama linki gönderilemedi!',
		'resetPasswordSubject'  => 'Şifre Sıfırlama'
	]
];
