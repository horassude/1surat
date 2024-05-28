 <?php

   //  Tutotial : https://youtu.be/XGS732DLtDc?si=_NhWyPFtNaAyUrka

   use Dompdf\Dompdf;

   $dompdf = new Dompdf;

   $dompdf->loadHtml("Hello world");
   $dompdf->render();
   $dompdf->stream();
