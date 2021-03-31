-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 31 Mar 2021, 02:51:16
-- Sunucu sürümü: 10.3.28-MariaDB
-- PHP Sürümü: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `calendar_live`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `slug` varchar(90) COLLATE utf8mb4_turkish_ci NOT NULL,
  `name` varchar(90) COLLATE utf8mb4_turkish_ci NOT NULL,
  `color` varchar(10) COLLATE utf8mb4_turkish_ci DEFAULT '#465af7',
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`id`, `slug`, `name`, `color`, `updated_at`, `created_at`) VALUES
(1, 'kultur-sanat', 'Kültür Sanat', '#008080', '2021-03-30 00:36:22', '2021-03-23 22:53:37'),
(2, 'is-kariyer', 'İş ve Kariyer', '#735cd0', '2021-03-30 00:35:38', '2021-03-23 22:53:37'),
(3, 'topluluk-cevre', 'Topluluk ve Çevre', '#465af7', '2021-03-26 22:57:42', '2021-03-25 00:02:11'),
(4, 'seyahat', 'Seyahat', '#00e5ee', '2021-03-30 00:35:58', '2021-03-26 22:57:22'),
(5, 'teknoloji', 'Teknoloji', '#6da878', '2021-03-30 00:35:27', '2021-03-26 22:57:22'),
(6, 'sosyalleşme', 'Sosyalleşme', '#8b3a3a', '2021-03-30 00:36:59', '2021-03-26 22:57:22'),
(7, 'muzik', 'Müzik', '#465af7', '2021-03-26 22:57:22', '2021-03-26 22:57:22'),
(8, 'destek', 'Destek', '#b8860b', '2021-03-30 00:36:00', '2021-03-26 22:57:22'),
(9, 'hobi', 'Hobi & El İşi', '#d15fee', '2021-03-30 00:36:15', '2021-03-26 22:57:22'),
(10, 'saglikli-yasam', 'Sağlıklı Yaşam', '#db6c4a', '2021-03-30 00:35:42', '2021-03-26 22:57:22');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `slug` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner` int(11) NOT NULL,
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci DEFAULT '2',
  `message_status` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `subscribe_status` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `location` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `category` int(11) NOT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_datetime` timestamp NULL DEFAULT NULL,
  `end_datetime` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `events`
--

INSERT INTO `events` (`id`, `slug`, `title`, `content`, `owner`, `status`, `message_status`, `subscribe_status`, `location`, `category`, `tags`, `start_datetime`, `end_datetime`, `updated_at`, `created_at`, `deleted_at`) VALUES
(2, 'marka-konumlandirma', 'Marka Konumlandırma', '<p>Marka konumlandırma ve strateji üzerinde sunumlar, konuşmalar yapılacaktır.</p>', 1, '2', '1', '0', '{\"maps\":[\"\",\"\"],\"phone\":\"\",\"meet\":\"marka-konumlandirma\",\"youtube\":\"deneme\",\"twitch\":\"deneme2\",\"zoom\":\"zooom\",\"instagram\":\"markakonumlandirma\",\"web\":\"markakonumlandirma.com\"}', 1, 'myCalendar,marka,konumlandırma,pazarlama,reklam, istanbul,online,dneme', '2021-03-29 10:15:00', '2021-03-30 12:30:00', '2021-03-26 21:00:33', '2021-03-25 21:52:18', NULL),
(3, 'mavi-koltukta-teknoloji', 'Mavi Koltukta Teknoloji', '<p>Dijitalleşen dünyada her gün daha da önem kazanan dijital içerik üretmeyi konuşuyoruz.</p><p>&nbsp;</p><p>İnternette tüm mecralarda var olma, etki oluşturabilme ve fark yaratabilme üzerine kaçırılmayacak bir sohbet.</p>', 1, '2', '1', '1', '{\"maps\":[\"\",\"\"],\"phone\":\"\",\"meet\":\"\",\"youtube\":\"mavi-koltuk\",\"twitch\":\"\",\"zoom\":\"\",\"instagram\":\"mavikoltuk\",\"web\":\"\"}', 2, 'myCalendar,mavi,koltuk, teknoloji', '2021-04-15 06:30:00', '2021-04-18 09:00:00', '2021-03-25 22:53:26', '2021-03-25 22:53:26', NULL),
(4, 'dijital-donusum', 'Dijital Dönüşüm', '<p>Teknolojinin, verinin ve organizasyon yapılarının dönüşümü, süreçlerin doğal bir parçası haline gelirken, insan becerilerinin dijital yeteneklere dönüşümü ise değişimin en belirleyici faktörü olacaktır.</p><p><br></p>', 5, '2', '1', '0', '{\"maps\":[\"\",\"\"],\"phone\":\"\",\"meet\":\"\",\"youtube\":\"dijital-donusum\",\"twitch\":\"\",\"zoom\":\"\",\"instagram\":\"\",\"web\":\"\"}', 3, 'myCalendar,dijital,dönüşüm,internet', '2021-03-28 08:15:00', '2021-03-28 14:00:00', '2021-03-26 22:07:02', '2021-03-25 23:41:04', NULL),
(5, 'aksam-oturmasi-1', 'Akşam Oturması #1', '<p>Akşam Oturması #1</p>', 1, '2', '0', '0', '{\"maps\":[\"\",\"\"],\"phone\":\"\",\"meet\":\"\",\"youtube\":\"\",\"twitch\":\"aksamoturmasi\",\"zoom\":\"\",\"instagram\":\"\",\"web\":\"\"}', 2, 'myCalendar,akşam,eğlence', '2021-03-24 19:00:00', '2021-03-24 20:30:00', '2021-03-25 23:53:34', '2021-03-25 23:53:34', NULL),
(6, 'siber-guvenlik-bilgilendirmesi', 'Siber Güvenlik Bilgilendirmesi', '<p>Hasan Yaman ile Siber güvenlik hakkında detaylı bilgiye sahip olacaksınız!.</p>', 7, '2', '0', '1', '{\"maps\":[\"\",\"\"],\"phone\":\"\",\"meet\":\"\",\"youtube\":\"\",\"twitch\":\"hasanyaman\",\"zoom\":\"\",\"instagram\":\"hasanyaman\",\"web\":\"\"}', 5, 'myCalendar,hasan,yaman,siber,güvenlik,teknoloji,test', '2021-03-30 07:50:00', '2021-03-31 11:30:00', '2021-03-27 00:24:17', '2021-03-27 00:24:17', NULL),
(7, 'dogru-dis-fircalama-teknigi-nasil-olmalidir', 'Doğru Diş Fırçalama Tekniği Nasıl Olmalıdır?', '<h3 class=\"ql-align-justify\"><strong>Doğru diş fırçalama tekniği nasıl olmalıdır?</strong></h3><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">Ağız ve diş sağlığımızı korumak, hem dişlerimiz hem de tüm bedenimiz için oldukça önemlidir. Diş üzerinde oluşan bakteri plakları, gıda artıkları zamanla dişlerin deforme olmasına ve diş eti hastalıklarına neden olur. Dişlerimizi doğru fırçalama tekniği ile temizlediğimizde ise ağız ve diş sağlığımızı korumuş ve ileride çıkabilecek problemleri engellemiş oluruz. Yanlış diş fırçalama tekniği ile diş fırçalama, sert diş fırçası kullanma, çok sık diş fırçalama diş eti çekilmesinin mekanik nedenleri arasında sayılabilir.&nbsp;Dudak-diş eti bağının yapısal bozuklukları,&nbsp;çeşitli diş eti hastalıkları, hatalı dolgu ve kaplamalar diş eti çekilmesine yol açmaktadır. Diş çekilmesi ise oldukça ciddi bir problemdir. Bu nedenle dişleri doğru şekilde fırçalama, önem arz etmektedir.</p><p class=\"ql-align-justify\"><br></p><h3 class=\"ql-align-justify\"><strong>Doğru diş fırçalama tekniği nasıl olmalıdır?</strong></h3><p class=\"ql-align-justify\"><br></p><ul><li>Diş macununu bol kullanmaya gerek yoktur. Bilinenin aksine nohut tanesi büyüklüğünde diş macunu kullanmanız yeterli olacaktır.</li><li>Fırça uçları diş etlerinize bakacak biçimde 45 derece açıyla diş fırçanızı tutmalısınız. Başka bir deyişle çapraz açı ile tutmanız bunu sağlayacaktır.</li><li>Dişlerinizi fazla baskı uygulamadan nazikçe dairesel, oval hareketlerle fırçalayınız.</li><li>Dişlerinizin çiğneme kısmı dediğimiz üst bölgelerinde fırçayı, ileri geri hareket ettirerek kullanabilirsiniz.</li><li>Dil yüzeyi temizliği de diş bakımının olmazsa olmazıdır. Dil yüzeyini temizlemek, oluşabilecek ağız kokusunun da önüne geçecektir.</li><li>Gün içerisinde en az 2 kez 3’er dakika dişlerinizi fırçalamasınız. Bunu planlamak zor geliyorsa sabah ve akşam olarak kendinizi programlayabilirsiniz, güne başlangıç ve güne veda.</li><li>Fırçalama bittikten sonra diş macununu tükürmeniz yeterlidir. Ağzınızı su ile uzun süre çalkalayarak tükürmek, diş macununun etkisini azaltacaktır.</li></ul><p><br></p>', 9, '2', '0', '1', '{\"maps\":[\"\",\"\"],\"phone\":\"\",\"meet\":\"\",\"youtube\":\"disfircalama\",\"twitch\":\"\",\"zoom\":\"\",\"instagram\":\"disfircalama\",\"web\":\"\"}', 10, 'myCalendar,diş,fırçalama,doğru,test', '2021-03-31 15:15:00', '2021-04-01 17:00:00', '2021-03-27 00:36:57', '2021-03-27 00:36:57', NULL),
(8, 'davetsiz-misafir-giremez-clubhouse-nedir', 'Davetsiz Misafir Giremez: ‘Clubhouse’ Nedir', '<p>Eğer alternatif ve kaliteli bir sosyal medya mecrası arıyorsanız, son haftalarda ‘Clubhouse’ adını duymuş olabilirsiniz. Özel sohbet odalarında sesle iletişim kurabileceğiniz, davetiye usulü ile çalışan Clubhouse nedir, nasıl kullanılır, diğerlerinden ne farkı var, sizler için yanıtladık.</p><p><br></p><p>Çoğumuzun sosyal medya deneyimi&nbsp;Facebook, Twitter, Instagram&nbsp;üçgeni ile sınırlı. Ancak son zamanlarda görüyoruz ki bu üçgende yaşamak giderek zorlaşıyor, çünkü yalan yanlış bilgilerin dolaştığı kalabalık ve tekinsiz meydanlarda dolaşmak yorucu bir şey. Bu nedenle farkına varmasak da alternatif gördüğümüzde hemen geçiş yapıyoruz. Özellikle son birkaç haftadır adından söz edilen&nbsp;Clubhouse&nbsp;da bu alternatiflerden birisi oldu.</p><p><br></p><p>Kendisini&nbsp;“ses temelli yeni nesil bir ağ”&nbsp;olarak tanımlayan Clubhouse, kullanıcılarına özel sohbet odaları üzerinden sadece sesleriyle iletişim kurma imkanı sunuyor. Bu sohbet odaları, genelde bir konu başlığı üzerine kuruluyor ve diğer platformların aksine bu odalar, oldukça aklıselim tartışmalar ev sahipliği yapıyor. Öyle ki dinleyici olarak girdiğiniz bir odada konuşmak için el kaldırmanız gerekiyor.&nbsp;</p>', 10, '2', '1', '1', '{\"maps\":[\"\",\"\"],\"phone\":\"\",\"meet\":\"recepniyaz\",\"youtube\":\"\",\"twitch\":\"recepniyaz\",\"zoom\":\"\",\"instagram\":\"recepniyaz\",\"web\":\"\"}', 6, 'myCalendar,clubhouse,nedir,davetsiz,misafir,recepniyaz', '2021-04-02 18:15:00', '2021-04-03 19:30:00', '2021-03-27 00:40:07', '2021-03-27 00:40:07', NULL),
(9, 'e-ticaret-basarisi-icin-7-altin-kural', 'E-ticaret Başarısı İçin 7 Altın Kural', '<p class=\"ql-align-justify\">“&nbsp;<span style=\"color: rgb(0, 119, 221);\">E-ticaret</span>te başarılı olmak’ konusunu araştırdığınız zaman hedefine fazlasıyla ulaşmış mutlu girişimcilerin yanında bu yolda hayal kırıklığına uğramış sayısız kişi de olduğunu görürsünüz. ”</p><p class=\"ql-align-justify\">Amerika’ da bir kitap dikeyi ile ilk tohumları atılmış olan, günümüzde ticaretin yeni yüzü olarak tanımlanan<span style=\"color: rgb(0, 119, 221);\">&nbsp;e-ticaret</span>&nbsp;yani elektronik ticaret ürün veya hizmet satışı son günlerden hemen herkesin konuştuğu, üzerinde tartıştığı popüler alanlardan biridir.</p><p>&nbsp;</p><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 119, 221);\">E-ticaret</span>in popülerliği ister istemez birçok kişinin merakını cezbetmektedir ve buna bağlı olarak birçok girişimci hali hazırdaki işini&nbsp;<span style=\"color: rgb(0, 119, 221);\">e-ticaret</span>e taşımak istemektedir.</p><p class=\"ql-align-justify\">Henüz hiçbir ticari girişimi olmayan sanal ortam ile ticaret hayatına başlamak isteyen girişimcilerin sayısı da hatrı sayılır oranda çoktur.</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\"><img src=\"https://rgsyazilim.com/wp-content/uploads/2014/08/socialmedia-300x217.png\" alt=\"E-ticaret Başarısı İçin 7 Altın Kural\" height=\"217\" width=\"300\"></p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">Peki bu denli ilgi-&nbsp;alaka ve teşebbüs ne kadar başarılı sonuçlar doğrumaktadır ? İnternetten para kazanmak tahmin edildiği kadar kolay mı?&nbsp;<span style=\"color: rgb(0, 119, 221);\">E-ticaret</span>&nbsp;firmalarının temel yanlışları nelerdir ? Neyi, nasıl yapmak gerekir ki&nbsp;<span style=\"color: rgb(0, 119, 221);\">e-ticaret</span>te başarılı olunsun ?</p><p class=\"ql-align-justify\"><br></p><p>Tüm bu sorularınızın cevabını sizler için araştırdık.</p>', 11, '2', '1', '1', '{\"maps\":[\"\",\"\"],\"phone\":\"\",\"meet\":\"\",\"youtube\":\"eticaretsite\",\"twitch\":\"\",\"zoom\":\"\",\"instagram\":\"eticaretsite\",\"web\":\"eticaret.site\"}', 8, 'myCalendar,eticaretsite,site,eticaret,sırlar,internet,alışveriş,para', '2021-04-01 09:45:00', '2021-04-05 12:00:00', '2021-03-27 00:46:42', '2021-03-27 00:44:46', NULL),
(10, 'tanisma-uyelere-ozel', '#Tanışma Üyelere Özel', '<p>Tanışalım</p>', 11, '1', '1', '1', '{\"maps\":[\"\",\"\"],\"phone\":\"\",\"meet\":\"\",\"youtube\":\"\",\"twitch\":\"\",\"zoom\":\"\",\"instagram\":\"eticaretsite\",\"web\":\"eticaret.site\"}', 3, 'myCalendar,eticaretsite,tanışma,özel,çevre', '2021-04-01 15:30:00', '2021-04-01 16:30:00', '2021-03-27 00:46:17', '2021-03-27 00:46:17', NULL),
(11, 'deneme', 'Deneme', '<p>Deneme</p>', 1, '1', '0', '1', '{\"maps\":[\"\",\"\"],\"phone\":\"\",\"meet\":\"\",\"youtube\":\"\",\"twitch\":\"\",\"zoom\":\"\",\"instagram\":\"\",\"web\":\"\"}', 8, 'myCalendar', '2021-03-28 14:29:00', '2021-03-28 14:44:00', '2021-03-27 14:29:55', '2021-03-27 14:29:49', '2021-03-27 14:29:55'),
(12, 'deneme', 'Deneme', '<p><br></p>', 1, '1', '1', '1', '{\"maps\":[\"40.323605,29.423563\",\"Burcun Mah., Yeni\\u015fehir, Bursa, T\\u00fcrkiye\"],\"phone\":\"\",\"meet\":\"\",\"youtube\":\"\",\"twitch\":\"\",\"zoom\":\"\",\"instagram\":\"\",\"web\":\"\"}', 7, 'myCalendar,deneme', '2021-03-27 16:22:00', '2021-03-27 16:37:00', '2021-03-27 17:47:37', '2021-03-27 16:22:18', '2021-03-27 17:47:37'),
(13, 'kitap-okuma', 'Kitap Okuma', '<p>pandemi döneminde birbirimizden uzak kaldığımız şu dönemde topluluğumuz içindeki aktivitelere çok önem veriyoruz. Gönüllülerimizden Bircan\'ın yürütücülüğünü yaptığı kitap okuma kulübümüzde her ay bir kitap okuyoruz ve ay sonunda buluşup kitap analizini gerçekleştiriyoruz.&nbsp;</p><p>&nbsp;</p><p>Kitap kulübümüzün mart ayı kitap söyleşisini,&nbsp;saat&nbsp;16.00 - 17.00&nbsp;arasında gerçekleştireceğiz. Herkesi bekliyoruz! &lt;3&nbsp;</p>', 12, '2', '1', '1', '{\"maps\":[\"41.017002,29.009969\",\"Harem Sahil Yolu Cad., \\u00dcsk\\u00fcdar, \\u0130stanbul, T\\u00fcrkiye\"],\"phone\":\"\",\"meet\":\"\",\"youtube\":\"\",\"twitch\":\"\",\"zoom\":\"\",\"instagram\":\"kitapokuma\",\"web\":\"\"}', 3, 'myCalendar,kitap,okuma,topluluk,istanbul', '2021-03-31 13:00:00', '2021-04-02 14:00:00', '2021-03-27 17:51:22', '2021-03-27 17:51:22', NULL),
(14, 'antalya-da-universite-okumak', 'Antalya\'da Üniversite Okumak', '<p><br></p>', 13, '2', '0', '1', '{\"maps\":[\"36.854238,30.800554\",\"G\\u00fczeloba Mah., Muratpa\\u015fa, Antalya, T\\u00fcrkiye\"],\"phone\":\"\",\"meet\":\"\",\"youtube\":\"antalya\",\"twitch\":\"\",\"zoom\":\"\",\"instagram\":\"antalya\",\"web\":\"\"}', 2, 'myCalendar,antalya,üniversite,akdeniz,okumak', '2021-04-01 15:30:00', '2021-04-01 17:00:00', '2021-03-27 17:58:29', '2021-03-27 17:58:29', NULL),
(15, 'izmir-bisiklet-turu', '#İzmir Bisiklet Turu', '<p><span style=\"color: rgb(5, 5, 5);\">Butik bir bisiklet festivali olan İzmir Bisiklet Turu’na sadece 35 kişi katılabiliyor. Tarihi İzmir yolunda toplamda 75 km pedal ve 25 km yürüyüş parkuru olması planlanıyor. </span></p>', 15, '2', '0', '1', '{\"maps\":[\"38.42073,27.136497\",\"Anafartalar Cad., Konak, \\u0130zmir, T\\u00fcrkiye\"],\"phone\":\"\",\"meet\":\"\",\"youtube\":\"izmir\",\"twitch\":\"\",\"zoom\":\"\",\"instagram\":\"izmir\",\"web\":\"bisikletturu.com\"}', 6, 'izmir,bisiklet,tur,keyifli,yolculuk', '2021-04-01 07:00:00', '2021-04-01 17:00:00', '2021-03-27 18:08:57', '2021-03-27 18:08:57', NULL),
(16, 'canakkale-bisiklet-turu', '#Çanakkale Bisiklet Turu', '<p>#Çanakkale Bisiklet Turu</p>', 15, '2', '0', '1', '{\"maps\":[\"40.145159,26.400193\",\"Fevzipa\\u015fa Mah., Kuyu Sok., \\u00c7anakkale Merkez\\u200e\\u00a0, \\u00c7anakkale, T\\u00fcrkiye\"],\"phone\":\"\",\"meet\":\"\",\"youtube\":\"canakkale\",\"twitch\":\"canakkale\",\"zoom\":\"\",\"instagram\":\"canakkale\",\"web\":\"\"}', 6, 'myCalendar,canakkale,çanakkale,bisiklet,turu,gezi,keyifli', '2021-04-05 04:30:00', '2021-04-05 16:30:00', '2021-03-27 18:10:11', '2021-03-27 18:10:11', NULL),
(17, 'ozel-etkinlik-stalk', 'Özel Etkinlik #Stalk', '<p><br></p>', 16, '1', '0', '0', '{\"maps\":[\"\",\"\"],\"phone\":\"\",\"meet\":\"\",\"youtube\":\"\",\"twitch\":\"\",\"zoom\":\"ozeletkinlik\",\"instagram\":\"\",\"web\":\"\"}', 1, 'myCalendar,özel,etkinlik,zoom', '2021-04-01 18:45:00', '2021-04-02 20:30:00', '2021-03-30 23:17:53', '2021-03-30 23:17:53', NULL),
(18, 'degerlendirme', '#Değerlendirme', '<p>#Değerlendirme yapalım, herkesi bekliyorum!.</p>', 16, '2', '1', '1', '{\"maps\":[\"41.008591,28.981421\",\"Cankurtaran Mah., Bab-\\u0131 H\\u00fcmayun Cad., No:1, Fatih, \\u0130stanbul, T\\u00fcrkiye\"],\"phone\":\"\",\"meet\":\"\",\"youtube\":\"\",\"twitch\":\"\",\"zoom\":\"\",\"instagram\":\"\",\"web\":\"\"}', 5, 'myCalendar', '2021-04-02 09:30:00', '2021-04-03 10:00:00', '2021-03-30 23:25:50', '2021-03-30 23:25:25', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `event_message`
--

CREATE TABLE `event_message` (
  `message_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_danish_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

--
-- Tablo döküm verisi `event_message`
--

INSERT INTO `event_message` (`message_id`, `event_id`, `user_id`, `message`, `updated_at`, `created_at`) VALUES
(2, 2, 1, 'İlk mesaj', '2021-03-27 19:29:43', '2021-03-27 19:29:43'),
(6, 2, 1, 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500&#039;lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır.', '2021-03-27 19:57:26', '2021-03-27 19:57:26'),
(9, 2, 15, 'Marka konumlandırma etkinliğini bekliyorum', '2021-03-27 20:30:53', '2021-03-27 20:30:53'),
(10, 2, 12, 'Kitap okuma etkinliğimi de beklerim', '2021-03-27 20:32:00', '2021-03-27 20:32:00'),
(11, 2, 14, 'Bende etkinliğe geliyorum', '2021-03-27 20:34:56', '2021-03-27 20:34:56'),
(12, 13, 8, 'heyecanlı beklemedeyim', '2021-03-27 20:35:39', '2021-03-27 20:35:39'),
(13, 2, 8, 'bende katılacağım', '2021-03-27 20:36:03', '2021-03-27 20:36:03'),
(14, 8, 8, 'ilk mesaj', '2021-03-27 20:36:51', '2021-03-27 20:36:51'),
(15, 8, 7, 'clubhouse nedir biri açıklayabilir mi', '2021-03-27 20:37:45', '2021-03-27 20:37:45'),
(16, 13, 7, 'bnde geliyorum', '2021-03-27 20:38:15', '2021-03-27 20:38:15'),
(17, 6, 7, 'etkinlik oluşturucusu olarak sizleri buradan bilgilendiriyor olacağım', '2021-03-27 20:40:33', '2021-03-27 20:40:33'),
(18, 4, 7, 'ilk mesaj', '2021-03-27 20:41:07', '2021-03-27 20:41:07'),
(19, 8, 1, 'Özel sohbet odalarında sesle iletişim kurabileceğiniz, davetiye usulü ile çalışan bir sistem', '2021-03-27 20:42:33', '2021-03-27 20:42:33'),
(20, 13, 1, 'Batıkana senin için bu mesaj', '2021-03-28 14:01:37', '2021-03-28 14:01:37'),
(21, 2, 1, 'Güzel etkinlik oldu, herkese teşekkürler', '2021-03-29 13:11:16', '2021-03-29 13:11:16'),
(22, 3, 15, 'Teknolojiye ilk mesajım olsun', '2021-03-29 15:30:02', '2021-03-29 15:30:02'),
(23, 17, 16, 'Özel Etkinlik #Stalk', '2021-03-30 23:24:43', '2021-03-30 23:24:43'),
(24, 18, 1, 'Geliyorum', '2021-03-30 23:26:17', '2021-03-30 23:26:17');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `event_subscriber`
--

CREATE TABLE `event_subscriber` (
  `subscribe_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `request_subscribe` enum('0','1') COLLATE utf8mb4_turkish_ci DEFAULT '1',
  `request_message` enum('0','1') COLLATE utf8mb4_turkish_ci DEFAULT '1',
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `event_subscriber`
--

INSERT INTO `event_subscriber` (`subscribe_id`, `event_id`, `user_id`, `request_subscribe`, `request_message`, `updated_at`, `created_at`) VALUES
(14, 4, 1, '0', '1', '2021-03-27 00:05:12', '2021-03-27 00:05:12'),
(15, 4, 6, '0', '1', '2021-03-27 00:15:24', '2021-03-27 00:15:24'),
(16, 2, 6, '1', '1', '2021-03-27 00:58:48', '2021-03-27 00:15:33'),
(17, 2, 7, '1', '1', '2021-03-27 00:58:45', '2021-03-27 00:20:09'),
(18, 3, 7, '1', '1', '2021-03-27 00:20:20', '2021-03-27 00:20:20'),
(19, 6, 6, '1', '1', '2021-03-27 00:26:39', '2021-03-27 00:26:39'),
(20, 4, 8, '0', '1', '2021-03-27 00:31:37', '2021-03-27 00:31:37'),
(21, 2, 8, '1', '1', '2021-03-27 00:58:51', '2021-03-27 00:31:43'),
(22, 8, 9, '1', '1', '2021-03-27 00:40:33', '2021-03-27 00:40:33'),
(23, 8, 7, '1', '1', '2021-03-27 00:41:10', '2021-03-27 00:41:10'),
(24, 6, 11, '1', '1', '2021-03-27 00:51:04', '2021-03-27 00:51:04'),
(25, 8, 11, '1', '1', '2021-03-27 00:51:19', '2021-03-27 00:51:19'),
(26, 7, 11, '1', '1', '2021-03-27 00:51:24', '2021-03-27 00:51:24'),
(27, 2, 11, '1', '1', '2021-03-27 00:58:41', '2021-03-27 00:51:32'),
(28, 9, 1, '1', '1', '2021-03-27 00:58:02', '2021-03-27 00:58:02'),
(29, 8, 1, '1', '1', '2021-03-27 00:58:15', '2021-03-27 00:58:15'),
(30, 10, 1, '1', '1', '2021-03-27 00:59:39', '2021-03-27 00:59:39'),
(31, 8, 12, '1', '1', '2021-03-27 17:51:42', '2021-03-27 17:51:42'),
(32, 10, 12, '1', '1', '2021-03-27 17:51:52', '2021-03-27 17:51:52'),
(33, 13, 1, '1', '1', '2021-03-27 17:52:15', '2021-03-27 17:52:15'),
(34, 9, 13, '1', '1', '2021-03-27 17:53:52', '2021-03-27 17:53:52'),
(35, 13, 13, '1', '1', '2021-03-27 17:55:16', '2021-03-27 17:55:16'),
(36, 8, 13, '1', '1', '2021-03-27 17:55:26', '2021-03-27 17:55:26'),
(37, 6, 13, '1', '1', '2021-03-27 17:55:34', '2021-03-27 17:55:34'),
(38, 3, 13, '1', '1', '2021-03-27 17:59:09', '2021-03-27 17:59:09'),
(39, 7, 13, '1', '1', '2021-03-27 18:00:08', '2021-03-27 18:00:08'),
(40, 13, 14, '1', '1', '2021-03-27 18:05:45', '2021-03-27 18:05:45'),
(41, 13, 15, '1', '1', '2021-03-27 18:10:23', '2021-03-27 18:10:23'),
(42, 8, 15, '1', '1', '2021-03-27 18:10:33', '2021-03-27 18:10:33'),
(43, 16, 1, '1', '1', '2021-03-27 18:11:13', '2021-03-27 18:11:13'),
(45, 2, 14, '0', '1', '2021-03-27 20:34:47', '2021-03-27 20:34:47'),
(46, 13, 7, '1', '1', '2021-03-27 20:38:08', '2021-03-27 20:38:08'),
(48, 3, 15, '1', '1', '2021-03-29 14:42:49', '2021-03-29 14:42:49'),
(49, 15, 1, '1', '1', '2021-03-29 15:29:35', '2021-03-29 15:29:35'),
(50, 3, 9, '1', '1', '2021-03-30 01:03:56', '2021-03-30 01:03:56'),
(51, 13, 4, '1', '1', '2021-03-30 19:17:28', '2021-03-30 19:17:28'),
(52, 17, 1, '1', '1', '2021-03-30 23:24:27', '2021-03-30 23:24:07'),
(53, 18, 1, '1', '1', '2021-03-30 23:26:09', '2021-03-30 23:26:09');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `link` varchar(500) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `is_read` enum('0','1') COLLATE utf8mb4_turkish_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `message`, `link`, `is_read`, `created_at`) VALUES
(1, 1, 'Deneme ilk mesaj', 'istelinki', '1', '2021-03-28 23:44:37'),
(2, 1, 'Deneme ilk mesaj', 'istelinki', '1', '2021-03-28 23:53:58'),
(3, 1, 'Deneme ilk mesaj', 'istelinki', '1', '2021-03-28 23:55:35'),
(4, 1, 'Deneme ilk mesaj', 'istelinki', '1', '2021-03-28 23:57:27'),
(5, 1, 'Deneme ilk mesaj', 'istelinki', '1', '2021-03-28 23:59:33'),
(6, 1, 'Deneme ilk mesaj', 'istelinki', '1', '2021-03-28 23:59:36'),
(7, 1, 'Mehmet Naci üyesi Mavi Koltukta Teknoloji etkinliğinize katılacak..', '/detail/mavi-koltukta-teknoloji/3', '1', '2021-03-29 14:42:49'),
(8, 1, '#İzmir Bisiklet Turu etkinliğinden çıkarıldınız!.', '/detail/izmir-bisiklet-turu/15/users', '1', '2021-03-29 15:29:07'),
(9, 15, 'Mücahit YILMAZ üyesi #İzmir Bisiklet Turu etkinliğinize  katılacak', '/detail/izmir-bisiklet-turu/15/users', '1', '2021-03-29 15:29:35'),
(10, 1, 'Mehmet Naci üyesinden Mavi Koltukta Teknoloji etkinliği için yeni mesajınız var!.', '/detail/mavi-koltukta-teknoloji/3/messages', '1', '2021-03-29 15:30:02'),
(11, 1, 'Çağla Şahin üyesi Mavi Koltukta Teknoloji etkinliğinize  katılacak', '/detail/mavi-koltukta-teknoloji/3/users', '1', '2021-03-30 01:03:56'),
(12, 12, 'Emin Çimen üyesi Kitap Okuma etkinliğinize  katılacak', '/detail/kitap-okuma/13/users', '0', '2021-03-30 19:17:28'),
(13, 16, 'Mücahit YILMAZ üyesi Özel Etkinlik #Stalk etkinliğinize  katılma talebi gönderdi.', '/detail/ozel-etkinlik-stalk/17/users', '1', '2021-03-30 23:24:07'),
(14, 1, 'Özel Etkinlik #Stalk etkinliğinize katılma talebiniz onaylandı', '/detail/ozel-etkinlik-stalk/17/users', '0', '2021-03-30 23:24:27'),
(15, 16, 'Test MyCalendar üyesinden Özel Etkinlik #Stalk etkinliği için yeni mesajınız var!.', '/detail/ozel-etkinlik-stalk/17/messages', '1', '2021-03-30 23:24:43'),
(16, 16, 'Mücahit YILMAZ üyesi #Değerlendirme etkinliğinize  katılıyor.', '/detail/degerlendirme/18/users', '1', '2021-03-30 23:26:09'),
(17, 16, 'Mücahit YILMAZ üyesinden #Değerlendirme etkinliği için yeni mesajınız var!.', '/detail/degerlendirme/18/messages', '1', '2021-03-30 23:26:17');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `value` text COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`) VALUES
(1, 'admin_url', 'panel'),
(2, 'yandex_javascript_key', '09f6fd4a-756f-46c7-87b4-9ebbf546218b\r\n'),
(3, 'title', 'myCalendar'),
(4, 'description', 'Kişisel, takım veya grup olarak etkinlikleri organize etmeyi sağlamayı amaçlayan web projesidir.'),
(5, 'keywords', 'calendar, my, live, myCalendar, kodluyoruz'),
(6, 'favicon', 'logo-icon.png'),
(7, 'logo', 'logo.png'),
(8, 'logo_white', 'logo-white.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(60) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `first_name` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `last_name` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `email` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_turkish_ci DEFAULT 'user',
  `image` varchar(500) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `app_key` varchar(16) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `password` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `reset_token` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `facebook` varchar(500) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `twitter` varchar(500) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `instagram` varchar(500) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `youtube` varchar(500) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `linkedin` varchar(500) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `email_notification` enum('0','1') COLLATE utf8mb4_turkish_ci DEFAULT '1',
  `sms_notification` enum('0','1') COLLATE utf8mb4_turkish_ci DEFAULT '0',
  `phone_privacy` enum('0','1','2') COLLATE utf8mb4_turkish_ci DEFAULT '0',
  `wa_privacy` enum('0','1','2') COLLATE utf8mb4_turkish_ci DEFAULT '0',
  `event_upcoming` int(11) DEFAULT 7,
  `last_seen` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `whatsapp` varchar(500) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `telegram` varchar(500) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `discord` varchar(500) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `phone`, `email`, `role`, `image`, `app_key`, `password`, `reset_token`, `about`, `facebook`, `twitter`, `instagram`, `youtube`, `linkedin`, `email_notification`, `sms_notification`, `phone_privacy`, `wa_privacy`, `event_upcoming`, `last_seen`, `updated_at`, `created_at`, `deleted_at`, `whatsapp`, `telegram`, `discord`) VALUES
(1, 'mucahityilmaz', 'Mücahit', 'YILMAZ', '5556868524', 'mchtylmz149@gmail.com', 'admin', 'users/1616192377_396d9818d236399c7baf.jpg', '3E6vat0RnGVlDTL1', '$2y$10$afr91vj6WfEoHQD5qGRgPOiXpqe.vzOtSP7jsmLL/ZxGHZ4AmWomm', NULL, '<p>Deneme hakkında alanı</p>', 'mmucahityilmazz', 'mmucahityilmazz', 'mmucahityilmazz', 'mmucahityilmazz', 'mmucahityilmazz', '1', '1', '0', '1', 5, '2021-03-30 20:26:02', '2021-03-30 20:26:02', '2021-03-19 09:52:53', NULL, 'mmucahityilmazz', 'mmucahityilmazz', 'mmucahityilmazz'),
(2, 'erayaydin', 'ERAY', 'AYDIN', NULL, 'er@yayd.in', 'user', NULL, 'IWA8UDf64zvn5eo3', '$2y$10$C9RDU4IhyZJddi/lNt2aWema8POjLe8X9jEi4x7QlNRYnahYFVAm2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', '0', 7, '2021-03-22 18:51:18', '2021-03-24 14:02:58', '2021-03-22 18:51:11', NULL, NULL, NULL, NULL),
(3, 'mucahityilmaz-1616459602', 'Mücahit', 'YILMAZ', NULL, 'mucahityilmaz.mail@gmail.com', 'user', NULL, 'u1oJmcWtwGsNAHv0', '$2y$10$WGlXI5cGD3rTgGrm0i6wf.VcFYDG3GJWvujwG2Y2sEcrZYrZzo1cS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', '0', 7, '2021-03-23 00:39:48', '2021-03-24 14:03:38', '2021-03-23 00:33:22', NULL, NULL, NULL, NULL),
(4, 'emincimen', 'Emin', 'Çimen', NULL, 'emin.cimen@useinsider.com', 'user', NULL, 'oIQYy4CZLurF1Mf2', '$2y$10$PjgvKBlquJbZGecWFjtYm.3mIdYJP2u7C7XC3nSM2vq12bcrW7nuO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', '0', 7, '2021-03-30 19:12:02', '2021-03-30 19:12:02', '2021-03-24 10:03:20', NULL, NULL, NULL, NULL),
(5, 'emreemre-1', 'Emre', 'Emre', '', 'emre@test.com', 'user', 'users/1616681987_9f4f3ef6b28f6b38935f.png', '2OUX3N9JfPA0etpj', '$2y$10$pJvIscIsuCR2Aq.Cma99b.tgI8PWDqyPcEXhF.CNtTM3SGdKGHPf.', NULL, '<p><br></p>', '', '', '', '', '', '1', '0', '0', '0', 7, '2021-03-25 14:14:41', '2021-03-25 14:19:47', '2021-03-25 14:14:33', NULL, '', '', ''),
(6, 'turgutyazman-1616804098', 'Turgut', 'Yazman', '', 'turgutyazman@mail.com.tr', 'user', 'users/1616804881_524997280ebbf33f714f.png', 'AWaUziRCwEX2LIJg', '$2y$10$Kj1KL5wJEZtorolsHx.DM.vgADPHn.oAhbo/8n/c8Bd8L3FUbkRsm', NULL, '<p><br></p>', '', '', 'turgutyazman', '', '', '1', '0', '0', '0', 7, '2021-03-27 00:26:20', '2021-03-27 00:28:01', '2021-03-27 00:14:58', NULL, '', '', ''),
(7, 'hasanyaman-1616804261', 'Hasan', 'Yaman', '', 'hasanyaman@mail.com', 'user', 'users/1616804367_7b5ecdc3e5c0427620d0.png', 'iZICaKzpWHgqxj03', '$2y$10$47cVT71C8u3owOBh/gHOHO/19tL5QtlDYWYs7W/W9.KO.RZv36DlO', NULL, '<p><br></p>', '', 'hasanyaman', '', '', '', '1', '0', '1', '0', 3, '2021-03-27 20:37:14', '2021-03-27 20:37:14', '2021-03-27 00:17:41', NULL, '', '', ''),
(8, 'zeynepozde', 'Zeynep', 'Özde', '', 'zeynep@ozde.com', 'user', 'users/1616805129_e99d3bf8d0f7b7d82414.png', 'WDnA1LtYGbvdFX7V', '$2y$10$NgLx38B6dwQ3uSWZzKrv3O2xQZJFwZ9B9YVausjB5U6TT9LgMhouO', NULL, '<p><br></p>', '', '', 'Zeynep', '', '', '1', '0', '0', '0', 7, '2021-03-27 20:35:22', '2021-03-27 20:35:22', '2021-03-27 00:31:17', NULL, '', '', ''),
(9, 'caglasahin', 'Çağla', 'Şahin', '', 'cagla@mcht.com', 'user', 'users/1616805289_ac5f9ba028fc1320f78b.jpg', '8HCorxAPcB3dZM5h', '$2y$10$P3mTMKONX/yA//znTC06L.87jVnn/Kx0q.jPsV66rJSCJJVCdqiUy', NULL, '<p><br></p>', '', 'caglasahin', 'caglasahin', '', '', '1', '0', '0', '0', 7, '2021-03-30 01:03:01', '2021-03-30 01:03:01', '2021-03-27 00:33:00', NULL, '', '', ''),
(10, 'recepniyaz-1616805507', 'Recep', 'Niyaz', NULL, 'recep@recep.com', 'user', NULL, 'Co6NOAPBriSlDhqe', '$2y$10$aP05ULaASoUY87xRRmV7jutPw7nINzQf651nste8v0wQroH2kiIum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', '0', 7, '2021-03-27 00:38:38', '2021-03-27 00:38:38', '2021-03-27 00:38:27', NULL, NULL, NULL, NULL),
(11, 'e-ticaretsite-1616805759', 'E-Ticaret', 'Site', '', 'eticaret@site.com', 'user', 'users/1616806163_54e58a8b48da7b19a1f1.png', 'fLCunmcRzpqK92jv', '$2y$10$3TV32Ro5./FgjBZ2gZFfF.MfxEnPBUo5nPKiKnxnHm3UZRuIc2pxW', NULL, '<p><br></p>', 'eticaretsite', '', 'eticaretsite', 'eticaretsite', 'eticaretsite', '1', '0', '0', '0', 7, '2021-03-27 00:42:52', '2021-03-27 00:50:04', '2021-03-27 00:42:39', NULL, '', '', 'eticaretsite'),
(12, 'esmaesma-1616867394', 'Esma', 'Esma', '', 'esma@esma.com', 'user', 'users/1616867567_24145d564a7bf30b8116.png', 'TDcMrxy96UpXB04b', '$2y$10$zaHuE3a.BHy.Hs79pftxnOSjGIO9.4eqSFKnyCZowzxUDK7x8G9VG', NULL, '<p><br></p>', '', '', '', '', '', '1', '0', '0', '0', 7, '2021-03-27 20:31:40', '2021-03-27 20:31:40', '2021-03-27 17:49:54', NULL, '', '', ''),
(13, 'abdullahabay', 'Abdullah', 'Abay', '', 'abay@abdullah.com', 'user', 'users/1616867702_77f5798208a4733af877.jpg', 'Z86tJcdIuKL4ia72', '$2y$10$wHQmvuSMF8Otz7QHREAGjecKoxD.q/dyR.U11jTkxkzoMgBL0jlB2', NULL, '<p><br></p>', '', 'abayyy', 'abaayy', '', '', '1', '0', '0', '0', 4, '2021-03-27 17:53:43', '2021-03-27 17:55:02', '2021-03-27 17:53:33', NULL, '', '', ''),
(14, 'ahmetabay-1616868154', 'Ahmet', 'Abay', NULL, 'ahmet@test.com', 'user', NULL, 'EKvBwYD09dGxscu6', '$2y$10$00AOGUUB504pOAZlKRtCGeBq9TL0eXFL6r6751WUU/N8J5dgk5c02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', '0', 7, '2021-03-27 20:34:32', '2021-03-27 20:34:32', '2021-03-27 18:02:34', NULL, NULL, NULL, NULL),
(15, 'mehmetnaci-1616868381', 'Mehmet', 'Naci', '', 'mehmet@naci.com', 'user', 'users/1616868414_a69b9d697b0abf3741bb.jpg', 'xMWZfaw2cVUj8DoF', '$2y$10$lQQFPpDvBZUx5L9LnLSA7eyBeXjp8ebD0GT6ZOgDHM7MRjn8Iw.PK', NULL, '<p>Bisiklet Sevdalısı</p>', '', 'bisiklet', 'bisiklet', 'bisiklet', 'bisiklet', '1', '0', '0', '0', 7, '2021-03-30 23:07:52', '2021-03-30 23:07:52', '2021-03-27 18:06:21', NULL, '', '', ''),
(16, 'testmycalendar-1617146198', 'Test', 'MyCalendar', '', 'test@mycalendar.live', 'user', NULL, 'RUjGYVWEf26eTmFn', '$2y$10$rI6ivo78QkT1O0E3Ie9DR.tW5RRXbP4P.qw/qqtR500AmpUNwHfdO', NULL, '<p><br></p>', '', '', '', '', '', '1', '0', '0', '1', 7, '2021-03-30 23:16:49', '2021-03-30 23:27:07', '2021-03-30 23:16:38', NULL, '', '', '');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner` (`owner`);

--
-- Tablo için indeksler `event_message`
--
ALTER TABLE `event_message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `event_subscriber`
--
ALTER TABLE `event_subscriber`
  ADD PRIMARY KEY (`subscribe_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `event_message`
--
ALTER TABLE `event_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `event_subscriber`
--
ALTER TABLE `event_subscriber`
  MODIFY `subscribe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Tablo için AUTO_INCREMENT değeri `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `users` (`id`);

--
-- Tablo kısıtlamaları `event_message`
--
ALTER TABLE `event_message`
  ADD CONSTRAINT `event_message_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `event_message_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Tablo kısıtlamaları `event_subscriber`
--
ALTER TABLE `event_subscriber`
  ADD CONSTRAINT `event_subscriber_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `event_subscriber_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
