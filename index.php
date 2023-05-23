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
        return $a . $b;
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

// ...

$obj->fungsi1991();
$obj->fungsi1992();
$obj->fungsi2000();

?>