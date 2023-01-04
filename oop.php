<?php

class barang {

    //property
     public $nama,
              $merk,
            $harga;

     //contruct
    public function __construct($namaBarang,$merkBarang,$hargaBarang)
{ 
                $this->nama =$namaBarang;
                $this->merk =$merkBarang;
                $this->harga =$hargaBarang;
             }
     //method
     public function data (){
            return "$this->nama $this->merk dengan harga $this->harga";
     }
}

class benda {

 public $nama,
       $wujud;

 public function set_nama($input){
      return $this->nama=$input;
 }
 

};


//object
$barang1=new barang("kulkas","samsung",2000000);
$barang2=new barang("Kipas","miyako",240000);
$barang3=new barang("Sepatu","Nike",2400000);
$barang4=new barang("Mobil","Alphard",24000000);
$barang5=new benda();

 



echo 'Produk yang pertama adalah '.$barang1->data().'<br>';
echo 'Produk yang Kedua adalah '.$barang2->data().'<br>';
echo 'Produk yang ketiga adalah '.$barang3->data().'<br>';
echo 'Produk yang keempat adalah '.$barang4->data().'<br>';
echo $barang5->set_nama('kipas');


?>