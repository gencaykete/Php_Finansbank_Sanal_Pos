# Finansbank Sanal POS API Kullanım Kılavuzu

Bu dokümantasyon, Finansbank'ın Sanal POS API'sini kullanarak ödeme işlemleri entegrasyonunu sağlar. Bu API, çevrimiçi ödemeleri işlemek için kullanılır.

## Kurulum

1. **Finansbank Hesabı Açın**: Finansbank ile bir iş hesabı açmanız gerekecektir. Gerekli belgeleri tamamlayarak banka ile iletişime geçin.

2. **API Anahtarları**: Finansbank'tan API anahtarlarınızı ve güvenlik sertifikalarınızı alın. Bu anahtarları projenizde kullanacaksınız.

3. **Gerekli Kütüphaneler**: Projenizde gerekli olan kütüphaneleri yükleyin ve projenize dahil edin. Örnek olarak, PHP projenizde [cURL](https://www.php.net/manual/en/book.curl.php) veya Finansbank'ın resmi PHP kütüphanesini kullanabilirsiniz.

## Kullanım

1. **API Anahtarlarını Ayarlayın**: Finansbank tarafından verilen API anahtarlarını ve güvenlik sertifikalarını projenize dahil edin.

2. **Ödeme İsteği Oluşturun**: Müşterinin ödeme bilgilerini alın ve Finansbank API'sine göndermek için bir ödeme isteği oluşturun. Örnek bir istek aşağıda verilmiştir:

```php
<?php
<?php
          $MbrId="5";                                                                         //Kurum Kodu
          $MerchantID="085300000009704";                                                               //Language_MerchantID
          $MerchantPass="12345678";                                                           //Language_MerchantPass
          $UserCode="QNB_API_KULLANICI_3DPAY";                                                                   //Kullanici Kodu
          $SecureType="3DPay";                                                                      //Language_SecureType
          $TxnType="Auth";                                                                          //Islem Tipi
          $InstallmentCount="0";                                                                    //Taksit Sayisi
          $Currency="949";                                                                   //Para Birimi
          $OkUrl="https://vpostest.qnbfinansbank.com//PayforScriptGenerator//PayforScripts//5//085300000009704//php//Payfor3DPayPayment.php";                                                                         //Language_OkUrl
          $FailUrl="https://vpostest.qnbfinansbank.com//PayforScriptGenerator//PayforScripts//5//085300000009704//php//Payfor3DPayPayment.php";                                                                     //Language_FailUrl
          $OrderId="";                                                                     //Siparis Numarasi
          $OrgOrderId="";                                                               //Orijinal Islem Siparis Numarasi
          $PurchAmount="1";                                                                         //Tutar
          $Lang="TR";                                                                           //Language_Lang
		$rnd = microtime(); 
		$hashstr = $MbrId . $OrderId . $PurchAmount . $OkUrl . $FailUrl . $TxnType . $InstallmentCount . $rnd . $MerchantPass;
		$hash = base64_encode(pack('H*',sha1($hashstr)));
		?>

// API isteğini göndermek için cURL veya ilgili kütüphane kullanın
// İsteği gönderin ve cevabı işleyin
?>
