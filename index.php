<?php

class MyClass {
    public function fungsi1() {
        echo "Ini adalah fungsi Membuat Segitiga arah atas <br>" . PHP_EOL;
        $star=10;
        for( $a=$star;$a>0;$a--){
        for($i=1; $i<=$a; $i++){
            echo "&nbsp";
        }
        for($a1=$star;$a1>=$a;$a1--){
            echo"*";
        }
        echo"<br>";
        }
        
    }

    public function fungsi2() {
        echo "Ini adalah fungsi Membuat Segitiga arah atas sisi kiri <br>" . PHP_EOL;
        $star=10;
        for($a=$star;$a>0;$a--){
        for($i=1; $i<=$a; $i++){
            echo " &nbsp";
        }
        for($a1=$star;$a1>=$a;$a1--){
            echo"*";
        }
        echo"<br>";
        }
    }

    // ...

    public function fungsi3() {
        echo "Ini adalah fungsi Membuat Segitiga sama kaki <br>" . PHP_EOL;
        $tinggi=10;
        for ($baris = 1; $baris <= $tinggi; $baris++) {
            for ($kolom = 1; $kolom <= $tinggi - $baris; $kolom++) {
                echo "&nbsp;&nbsp;";
            }
            for ($kolom = 1; $kolom <= 2 * $baris - 1; $kolom++) {
                echo "*";
            }
            echo "<br>";
        }
    }

    public function fungsi4() {
        echo "Ini adalah fungsi Membuat kotak <br>" . PHP_EOL;
        $tinggi=10;
        $lebar=10;
        for ($baris = 1; $baris <= $tinggi; $baris++) {
            for ($kolom = 1; $kolom <= $lebar; $kolom++) {
                echo "*";
            }
            echo "<br>";
        }
    }

    public function fungsi5() {
        echo "Ini adalah fungsi Membuat persegi panjang <br>" . PHP_EOL;
        $tinggi=20;
        $lebar=10;
        for ($baris = 1; $baris <= $tinggi; $baris++) {
            for ($kolom = 1; $kolom <= $lebar; $kolom++) {
                echo "*";
            }
            echo "<br>";
        }
    }

    public function fungsi6() {
        echo "Ini adalah fungsi Membuat Segitiga arah atas sisi kanan <br>" . PHP_EOL;
        $tinggi=10;
        for ($baris = 1; $baris <= $tinggi; $baris++) {
            for ($spasi = 1; $spasi <= $tinggi - $baris; $spasi++) {
                echo "&nbsp;&nbsp;";
            }
            for ($bintang = 1; $bintang <= $baris; $bintang++) {
                echo "*";
            }
            echo "<br>";
        }
    }

    public function fungsi7() {
        echo "Ini adalah fungsi Membuat Segitiga arah bawah sisi kanan <br>" . PHP_EOL;
        $tinggi=10;
        for ($baris = $tinggi; $baris >= 1; $baris--) {
            for ($spasi = 1; $spasi <= $tinggi - $baris; $spasi++) {
                echo "&nbsp;&nbsp;";
            }
            for ($bintang = 1; $bintang <= $baris; $bintang++) {
                echo "*";
            }
            echo "<br>";
        }
    }

    public function fungsi8() {
        echo "Ini adalah fungsi Membuat Segitiga arah bawah sisi kiri <br>" . PHP_EOL;
        $tinggi=10;
        for ($baris = $tinggi; $baris >= 1; $baris--) {
            for ($spasi = 1; $spasi <= $tinggi - $baris; $spasi++) {
                echo "&nbsp;&nbsp;";
            }
            for ($bintang = 1; $bintang <= $baris; $bintang++) {
                echo "*";
            }
            echo "<br>";
        }
    }

    public function fungsi9() {
        echo "Ini adalah fungsi penjumlahan <br>" . PHP_EOL;
        $a=10;
        $b=10;
        return $a + $b;
    }

    public function fungsi10() {
        echo "Ini adalah fungsi pengurangan <br>" . PHP_EOL;
        $a=10;
        $b=10;
        return $a - $b;
    }

    public function fungsi11() {
        echo "Ini adalah fungsi Luas Persegi <br>" . PHP_EOL;
        $sisi=10;
        return $sisi * $sisi;
                
    }

    public function fungsi12() {
        echo "Ini adalah fungsi keliling persegi <br>" . PHP_EOL;
        $a=10;
        return 4 * $a;
    }

    public function fungsi3() {
        echo "Ini adalah fungsi lias lingkaran <br>" . PHP_EOL;
        $a=10;
        return pi() * $a * $a;
    }

    public function fungsi14() {
        echo "Ini adalah fungsi keliling lingkaran <br>" . PHP_EOL;
        $a=10;
        return 2 * pi() * $a;
    }

    public function fungsi15() {
        echo "Ini adalah fungsi uppercase <br>" . PHP_EOL;
        $a="aku";
        return strtoupper($a);
    }

    public function fungsi16() {
        echo "Ini adalah fungsi lowercase <br>" . PHP_EOL;
        $a="AKU";
        return strtolower($a);
    }

    public function fungsi17() {
        echo "Ini adalah fungsi hitung karakter <br>" . PHP_EOL;
        $a="AKU";
        return strlen($a);
    }

    public function fungsi18() {
        echo "Ini adalah fungsi gabung string <br>" . PHP_EOL;
        $a="aku";
        $b="adalah";
        return concat($a, $b);
    }
    
    public function fungsi19() {
        echo "Ini adalah fungsi membalikan karakter <br>" . PHP_EOL;
        $a="AKU";
        return strrev($a);
    }

    public function fungsi20() {
        echo "Ini adalah fungsi memotong bagian dari string berdasarkan posisi dan panjangnya <br>" . PHP_EOL;
        $a="AadalahKU";
        $start=3;
        $length=7;
        return substr($a, $start, $length;
    }

    public function fungsi21() {
        echo "Ini adalah fungsi menghapus karakter kosong diawal dan akhir <br>" . PHP_EOL;
        $a=" AKU ";
        return trim($a);
    }

    public function fungsi22() {
        echo "Ini adalah fungsi panjang <br>" . PHP_EOL;
        $a = true;
        $b = true;
        $c = false;
        $d = true;
        $e = true;
        if ($a && $b) {
            $result = $c || $d;
            if ($result) {
                $x = $e && $d;
                $y = $a || $c;
                
                if ($x || $y) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            $result = $b && $c;
              
            if ($result) {
                $x = $d || $e;
                
                if ($x) {
                  return true;
                } else {
                  return false;
                }
            } else {
                $y = $a || $d;
                
                if ($y && $e) {
                  return true;
                } else {
                  return false;
                }
            }
        }
        
        $hasil = panjangFungsiLogika($a, $b, $c, $d, $e);
        echo $hasil ? "True" : "False";
    }

    public function fungsi23() {
        echo "Ini adalah fungsi isPalindrome <br>" . PHP_EOL;

        $a = "A man, a plan, a canal, Panama";

        $str = str_replace(' ', '', strtolower($a));
  
        $length = strlen($str);
        for ($i = 0; $i < $length / 2; $i++) {
        if ($str[$i] !== $str[$length - $i - 1]) {
            return false;
        }

        if (isPalindrome($string)) {
            echo "$string adalah palindrom.";
        } else {
            echo "$string bukan palindrom.";
        }
        }
  
        return true;
    }

    public function fungsi24() {
        echo "Ini adalah fungsi count words <br>" . PHP_EOL;

        $a = "Hari ini adalah hari yang cerah";
        $sentence = trim($a);
  
        // Menghitung jumlah kata menggunakan fungsi explode
        $words = explode(' ', $sentence);
        $wordCount = count($words);

        $b = echo "Jumlah kata dalam kalimat '$a' adalah $wordCount.";
    
        return $b;
    }

    public function fungsi25() {
        echo "Ini adalah fungsi fibonanci <br>" . PHP_EOL;
        $a=10;
        $sequence = array(0, 1);
  
        for ($i = 2; $i < $a; $i++) {
            $nextNumber = $sequence[$i - 1] + $sequence[$i - 2];
            $sequence[] = $nextNumber;
        }
  
    return $sequence;
    }

    public function fungsi26() {
        echo "Ini adalah fungsi logika <br>" . PHP_EOL;

        $a = true;
        $b = false;
        $c = true;
        $d = false;
        $e = true;
        
        $logika1 = ($a && $b) || ($c && $d);
        
        $logika2 = ($a || $b) && ($c || $d);
        
        $logika3 = ($a && $b) && !($c || $d);
        
        $logika4 = !($a || $b) || ($c && $d);
        
        $logika5 = $a || ($b && ($c || $d));
        
        $logika6 = $a && ($b || ($c && $d));
        
        $logika7 = $a && (!$b || (!$c && $d));
        
        $logika8 = ($a || !$b) && ((!$c && $d) || ($e || $a));
        
        echo "Hasil Logika 1: " . ($logika1 ? 'true' : 'false') . "\n" .
         "Hasil Logika 2: " . ($logika2 ? 'true' : 'false') . "\n" .
         "Hasil Logika 3: " . ($logika3 ? 'true' : 'false') . "\n" .
         "Hasil Logika 4: " . ($logika4 ? 'true' : 'false') . "\n" .
         "Hasil Logika 5: " . ($logika5 ? 'true' : 'false') . "\n" .
         "Hasil Logika 6: " . ($logika6 ? 'true' : 'false') . "\n" .
         "Hasil Logika 7: " . ($logika7 ? 'true' : 'false') . "\n" .
         "Hasil Logika 8: " . ($logika8 ? 'true' : 'false') . "\n";

    }

    public function fungsi17() {
        echo "Ini adalah fungsi hitung karakter <br>" . PHP_EOL;
        $a="AKU";
        return strlen($a);
    }

    public function fungsi17() {
        echo "Ini adalah fungsi hitung karakter <br>" . PHP_EOL;
        $a="AKU";
        return strlen($a);
    }

    public function fungsi17() {
        echo "Ini adalah fungsi hitung karakter <br>" . PHP_EOL;
        $a="AKU";
        return strlen($a);
    }

    public function fungsi17() {
        echo "Ini adalah fungsi hitung karakter <br>" . PHP_EOL;
        $a="AKU";
        return strlen($a);
    }

    public function fungsi17() {
        echo "Ini adalah fungsi hitung karakter <br>" . PHP_EOL;
        $a="AKU";
        return strlen($a);
    }

    public function fungsi17() {
        echo "Ini adalah fungsi hitung karakter <br>" . PHP_EOL;
        $a="AKU";
        return strlen($a);
    }

    public function fungsi17() {
        echo "Ini adalah fungsi hitung karakter <br>" . PHP_EOL;
        $a="AKU";
        return strlen($a);
    }

    public function fungsi17() {
        echo "Ini adalah fungsi hitung karakter <br>" . PHP_EOL;
        $a="AKU";
        return strlen($a);
    }

    public function fungsi17() {
        echo "Ini adalah fungsi hitung karakter <br>" . PHP_EOL;
        $a="AKU";
        return strlen($a);
    }

    public function fungsi17() {
        echo "Ini adalah fungsi hitung karakter <br>" . PHP_EOL;
        $a="AKU";
        return strlen($a);
    }

    // ...

    public function fungsi1991() {
        echo "Ini adalah fungsi 1991" . PHP_EOL;
        // Logika unik untuk fungsi 1991
        // ...
    }

    public function fungsi1992() {
        echo "Ini adalah fungsi 1992" . PHP_EOL;
        // Logika unik untuk fungsi 1992
        // ...
    }

    // ...

    public function fungsi2000() {
        echo "Ini adalah fungsi 2000" . PHP_EOL;
        // Logika unik untuk fungsi 2000
        // ...
    }
}

$obj = new MyClass();

$obj->fungsi1();
$obj->fungsi2();
$obj->fungsi3();
$obj->fungsi4();
$obj->fungsi5();
$obj->fungsi6();
$obj->fungsi7();
$obj->fungsi8();
$obj->fungsi9();
$obj->fungsi10();
$obj->fungsi11();
$obj->fungsi12();
$obj->fungsi13();
$obj->fungsi14();
$obj->fungsi15();
$obj->fungsi16();
$obj->fungsi17();
$obj->fungsi18();
$obj->fungsi19();
$obj->fungsi20();
$obj->fungsi21();
$obj->fungsi22();
$obj->fungsi23();
$obj->fungsi24();
$obj->fungsi25();
$obj->fungsi26();

// ...

$obj->fungsi1991();
$obj->fungsi1992();
$obj->fungsi2000();

?>