<?php
// using builder
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

$text = 'Hello world';

$result = Builder::create($text)
    ->writer(new PngWriter())   
    ->writerOptions([])
    ->data('Custom QR code contents')
    ->encoding(new Encoding('UTF-8'))
    ->errorCorrectionLevel(ErrorCorrectionLevel::High)
    ->size(300)
    ->margin(10)
    ->roundBlockSizeMode(RoundBlockSizeMode::Margin)
    ->logoPath(ROOT_DIR . '/images/bidhumas/kabid_sign.jpeg')
    ->logoResizeToWidth(50)
    ->logoPunchoutBackground(true)
    ->labelText('Bidhumas Polda Kepri')
    ->labelFont(new NotoSans(20))
    ->labelAlignment(LabelAlignment::Center)
    ->validateResult(false)
    ->build();

    header('Content-Type: '.$result->getMimeType());

    // $result->writer;
    $result->saveToFile(ROOT_DIR.'/images/bidhumas/qrcode.png');

    echo $result->getString();