<?php
require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->setCellValue("A1", "Ikhwanu Robik Saputra!");

$writer = new Xlsx($spreadsheet);
$writer->save("tugas_week_4.xls");