<?php
require 'vendor/autoload.php';
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Logo\Logo;

// Create QR code
$qrCode = QrCode::create('{"NIN":"60883075594","Names":"MUHAMMAD IBRAHIM","Date of Birth":"24 Jul 1991","Status":"Verified"}')
    ->setSize(300)
    ->setMargin(10);

// Create generic logo
$logo = Logo::create('qrlogo.png')
    ->setResizeToWidth(80)
    ->setPunchoutBackground(true);

// $result = (new PngWriter())->write($qrCode);
$result = (new PngWriter())->write($qrCode, $logo);
$qrCode_img = $result->getDataUri();

$data = [
  'nin' => '60883075594',
  'surname' => 'IBRAHIM',
  'given_name' => 'MUHAMMAD',
  'dob' => '1991-07-21',
  'passport' => 'data:image/jpeg;base64,'.base64_encode(file_get_contents('passprt.JPG'))
];
$nin = $data['nin'];
$formattedNIN = substr($nin, 0, 4) . ' ' . substr($nin, 4, 3) . ' ' . substr($nin, 7, 4);

?>
<!DOCTYPE html>
<html>
<head>
<title>NIN Card</title>
<link rel="stylesheet" href="style.css">
<style>
  /* Center the card container */
  .card-container {
    font-family: Helvetica;
    font-style: normal;
    font-weight: normal;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh; /* Set to full viewport height */
    background-color: #fff; /* Set card container background color to white */
    position: relative; /* Set position to relative for absolute positioning */
  }

  h6 {
    text-align: center;
    font-family: Helvetica;
    line-height: 1.336426;
    font-size: 14px;
    font-style: normal;
    font-weight: normal;
    visibility: visible;
  }

  /* Style for the rectangular boxes */
  .rectangle-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 20px; /* Adjust margin as needed */
  }

  @font-face {
    font-family: 'OCR-B 10 BT';
    src: url('ocr-b-10-bt/OCR-B-10-BT.ttf') format('ttf');
    font-weight: normal;
    font-style: normal;
}
  .rectangle {
    width: 110mm; /* Standard ID card width */
    height: 60mm; /* Standard ID card height */
    border: 1px solid #ccc; /* Slight gray border */
    margin: 10px 0; 
    padding: 0;
    box-sizing: border-box; 
    display: flex;
    flex-direction: column;
  }

  .page1 {
    background: rgba(255, 255, 255, 0.4) url("bg.png") no-repeat ;
    background-size: 100% 95%;
    display: flex;
    flex-direction: column; /* Arrange the top and bottom boxes vertically */
    padding: 0px 5px;
}

  .page1 .top {
    width: 100%;
    height: 43.98mm;
  }

  .page1 .bottom {
    width: 100%;
    height: 20.00mm;
    text-align: center;
    font-family: system-ui, sans-serif;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .page1 .bottom .mandate{
    font-weight:bold;font-size:7px;
    color: #899;
  }
  .page1 .bottom .display-value {
    font-size: 32px;
  }

  .page2 {
    background: url("back.JPG") no-repeat; 
    background-size: 100% 95%;
  }

.box-container {
    display: flex;
    width: 100%;
    margin-top: -30px; /* Adjust margin as needed */
  }

.box {
    box-sizing: border-box;
    flex-direction: column;
    display: flex;
    align-items: left;
    justify-content: center;
  }

.box1 {
    flex: 20%;
  }

.box2 {
    flex: 55%;
    padding-left: 10px;
  }

.box3 {
    flex: 25%;
    text-align: center;
    align-items: center;
    font-weight:bold;
    font-family: system-ui, sans-serif;
  }

.text-title{
    /* font-family: 'OCR-B 10 BT', Comic; */
    color: rgb(130,130,130);
    font-size:11px;
    display:block;
    font-weight:bold;
    margin-top:5px;
  }

.text-value{
    /* font-family: 'OCR-B 10 BT', Comic; */
    color: rgb(0,0,0);
    font-size:11px;
    font-weight:bold;
    display:block;
  }

.marks{
    /* font-family: 'OCR-B 10 BT', Comic; */
    color:#ccc;
    font-size:11px;
    font-weight:bold;
    opacity:0.5;
  }

.rotated-text {
    transform: rotate(180deg);
  }

.rotated-text2 {
    position: relative !important;
    top: 28px;
    right: 5px;
    transform: rotate(45deg);
    z-index: 1000;
  }

.rotated-text3 {
    position: relative !important;
    top: 35px;
    left: 1px;
    transform: rotate(320deg);
    z-index: 1000;
  }

.rotated-text4 {
    position: relative !important;
    bottom: 25px;
    left: 15px;
    transform: rotate(320deg);
    z-index: 1000;
  }

  .text-title,
.text-value,
.marks,
.rotated-text,
.rotated-text2,
.display-value,
.rotated-text3,
.rotated-text4 {
    font-family: 'OCR-B 10 BT', Comic, sans-serif;
}

</style>
</head>
<body>
<div>
  <h6>
    Please find below your Improved NIN Slip <br>
    You may cut it out of the paper, fold and laminate as desired.<br>
    For your security & privacy, please DO NOT permit others to make photocopies of this slip.
  </h6>

  <div class="rectangle-container">
    <div class="rectangle page1">
      <div class="top">
        <p style="text-align:center;margin-top:0px"><img src="coat.png" alt="" width="61px"></p>
        <div class="box-container" >
          <div class="box box1">  
             <img src="<?= $data['passport'];?>" alt="" width="90px" height="105px">
             <span style="" class="marks rotated-text3"><?= $nin;?></span>
             <span style="" class="marks rotated-text4"><?= $nin;?></span>
          </div>
          <div class="box box2">
            <div>
              <!-- <br> -->
              <div>
                <span class="text-title">Surname/Nom</span>
                <span class="text-value"><?= $data['surname'];?></span>
              </div>
              <div>
                <span class="text-title">Given Names/Prenoms</span>
                <span class="text-value"><?= $data['given_name'];?></span>
              </div>
              <div>
                <span class="text-title">Date of Birth</span>
                <span class="text-value"><?= date('d M Y', strtotime(''.$data['dob']));?></span>
              </div>
              
            </div>
          </div>
          <div class="box box3">
            NGA
            <span style="" class="marks rotated-text"><?= $nin;?></span>
            <img src="<?= $qrCode_img;?>" alt="" width="80px">
            <span style="" class="marks rotated-text2"><?= $nin;?></span>
        </div>
        </div>
   
      </div>
      
      <div class="bottom">
      
       <span style="font-weight:bold;font-size:10px;"> National Identification Number (NIN)</span>
     
        <div class="display-value"><?= $formattedNIN;?></div>
        <spann class="mandate"><i>Kindly ensure you scan the barcode to verify the credentials</i></spann>
        
      </div>
    </div>
    <div class="rectangle page2"></div>
  </div>
</div>
</body>
</html>
