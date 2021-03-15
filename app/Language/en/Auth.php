<?php

// override core en language system validation or define your own en language validation message
return [
	// General
	'invalidRequest' => 'Geçersiz URL',
	// Auth - Login
	'login' => [
		'error'   => 'E-posta veya Şifre Hatalı!',
		'success' => 'Giriş Başarılı',
	],
	// Auth - Register
	'register' => [
		'success' => 'Kayıt Başarılı',
	],
	// Auth - forgotPassword
	'forgotPassword' => [
		'email'   => 'Eposta Adresiniz Hatalı!.',
		'success' => 'Şifre Unuttum Maili Başarılı'
	],
	// Auth - resetPassword
	'resetPassword' => [
		'passwordMismatch' => 'Şifre aynı değil!',
		'success' => 'Yeni şifreniz başarıyla değiştirildi'
	],
	// Email
	'email' => [
		'errorPasswordSendLink' => 'Şifre sıfırlama linki gönderilemedi!',
		'resetPasswordSubject'  => 'Şifre Sıfırlama'
	]
];
