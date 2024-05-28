<?php
    // without using builder
    // source -> https://github.com/endroid/qr-code?tab=readme-ov-file

    use Endroid\QrCode\Color\Color;
    use Endroid\QrCode\Encoding\Encoding;
    use Endroid\QrCode\ErrorCorrectionLevel;
    use Endroid\QrCode\QrCode;
    use Endroid\QrCode\Label\Label;
    use Endroid\QrCode\Logo\Logo;
    use Endroid\QrCode\RoundBlockSizeMode;
    use Endroid\QrCode\Writer\PngWriter;
    use Endroid\QrCode\Writer\ValidationException;

    $writer = new PngWriter();

    $text = 'Hello world';

    // Create QR code
    $qrCode = QrCode::create($text)
        ->setEncoding(new Encoding('UTF-8'))
        ->setErrorCorrectionLevel(ErrorCorrectionLevel::Low)
        ->setSize(300)
        ->setMargin(10)
        ->setRoundBlockSizeMode(RoundBlockSizeMode::Margin)
        ->setForegroundColor(new Color(0, 0, 0))
        ->setBackgroundColor(new Color(255, 255, 255));
    
    // Create generic logo
    $logo = Logo::create(ROOT_DIR.'/images/bidhumas/kabid_sign.jpeg')
        ->setResizeToWidth(60)
        ->setPunchoutBackground(true)
    ;

    $writer = new PngWriter;

    // Create generic label
    $label = Label::create('Label')
        ->setTextColor(new Color(255, 0, 0));

    $result = $writer->write($qrCode, $logo, $label);

    header('Content-Type: '.$result->getMimeType());
    
    echo $result;

    // Validate the result
    $writer->validateResult($result, 'Life is too short to be generating QR codes');