
<?php
require('fpdf.php');

class tFPDF extends FPDF {
    function AddFont($family, $style='', $file='', $uni=true) {
        return parent::AddFont($family, $style, $file, $uni);
    }
}
?>
