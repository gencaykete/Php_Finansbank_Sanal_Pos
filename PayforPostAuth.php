<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" >
 <html>
     <head>
         <title>PayFor - On Provizyon Kapama</title>
         <meta http-equiv="Content-Language" content="tr">
         <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-9">
         <link href="Site.css" rel="stylesheet" type="text/css" />
     </head>
     <body>
     <?php
         if ($_POST){
         $data = "".
          "MbrId=5&".                                                                         //Kurum Kodu
          "MerchantID=085300000009704&".                                                               //Language_MerchantID
          "UserCode=QNB_API_KULLANICI_3DPAY&".                                                                   //Kullanici Kodu
          "UserPass=UcBN0&".                                                                   //Kullanici Sifre
          "OrgOrderId=".$_POST["OrgOrderId"]."&".                                                   //Orijinal Islem Siparis Numarasi
          "SecureType=NonSecure&".                                                                  //Language_SecureType
          "TxnType=PostAuth&".                                                                      //Islem Tipi
          "PurchAmount=".$_POST["PurchAmount"]."&".                                                 //Tutar
          "Currency=949&".                                                                   //Para Birimi
          "Lang=TR&".                                                                           //Language_Lang
         $url = "https://vpostest.qnbfinansbank.com/Gateway/Default.aspx";
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL,$url);
         curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,2);
         curl_setopt($ch, CURLOPT_SSLVERSION, 4);	
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_TIMEOUT, 90);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
         $result = curl_exec($ch); 
         echo "<br>";
         if (curl_errno($ch)) {
         	print curl_error($ch);
         } else {
            curl_close($ch);
         }
         $resultValues = explode(";;", $result);
         echo "<center><table class='tableClass'>";
         foreach($resultValues as $resultt)
         {
         	list($key,$value)= explode("=", $resultt);
         		echo "<tr><td style='text-align: right'>".$key."</td>";
         	echo "<td style='text-align: left'>".$value."</td></tr>";
         }
         echo "</table></center><br>";
       }
    ?>
         <center>
         <form method="post">
         <table class="tableClass">
	            <tr>
                 <td colspan="2">
                     <h1>
                         PayFor - On Provizyon Kapama
                     </h1>
                 </td>
             </tr>
             <tr>
                 <td style="text-align: right">
                     Tutar :
                 </td>
                 <td style="text-align: left">
                     <input type="text" name="PurchAmount" maxlength="20"    class="inputClass" value="" />
             </tr>

             <tr>
                 <td style="text-align: right">
                     Orijinal Islem Siparis Numarasi :
                 </td>
                 <td style="text-align: left">
                     <input type="text" name="OrgOrderId" maxlength="50"    class="inputClass" value="" />
             </tr>

             <tr>
                 <td align="center" colspan="2">
                     <input type="submit" value="Gonder" class="buttonClass" />
                 </td>
             </tr>
         </table>
         </form>
         </center>
     </body>
</html>

