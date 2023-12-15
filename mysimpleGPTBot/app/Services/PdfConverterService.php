<?php

// app/Services/PdfConverterService.php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Log;
use Spatie\PdfToImage\Pdf as PdfToImage;

class PdfConverterService
{
    protected $pdfPath;

    public function __construct($pdfPath)
    {
        $this->pdfPath = $pdfPath;
    }

    public function convertToImage($outputImagePath)
    {
        try {
            $pdf = new PdfToImage($this->pdfPath);
            $pdf->setOutputFormat('png');
            $pdf->saveImage($outputImagePath);
        } catch (Exception $e) {
            Log::debug($e->getMessage());
        }
    }
}

