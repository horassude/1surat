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

    $text = 'Hello world';

    $qr_code = QrCode::create($text)
                        ->setSize(600)
                        ->setMargin(40);
                        // ->setErrorCorrectionLevel(new ErrorCorrectionLevelHigh);
                        // ->setForegroundColor(new Color(255, 128, 0));
                        // ->setBackgroundColor(new Color(153, 204, 255));
    
    $writer = new PngWriter(ROOT_DIR.'/images/bidhumas/kabid_sign.jpeg');

    $label = Label::create('Horas tondi madingin')
                                ->setTextColor(new Color(255, 0, 0));

    $logo = Logo::create(ROOT_DIR.'/images/logo/humas_polri_small.png')
                ->setResizeToWidth(300)
                ->setPunchoutBackground(true);

    $result = $writer->write($qr_code, logo: $logo, label: $label);

    header('Content-Type: '.$result->getMimeType());
    
     // save qr code
     $result->saveToFile(ROOT_DIR.'/images/bidhumas/qrcode2.png');

    // display
    // echo $result->getString();

    // Validate the result
    // $writer->validateResult($result, 'Life is too short to be generating QR codes');

   