<?php
$template_dir = get_template_directory();
$learndash_plugin_path = ABSPATH . 'wp-content/plugins/pearls/';
require_once $learndash_plugin_path . 'public/dompdf/lib/html5lib/Parser.php';
require_once $learndash_plugin_path . 'public/dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once $learndash_plugin_path . 'public/dompdf/lib/php-svg-lib/src/autoload.php';
require_once $learndash_plugin_path . 'public/dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();
use Dompdf\Dompdf;
use Dompdf\Options;
// $dompdf = new Dompdf();

// $dompdf->loadHtml('hello world');

// // (Optional) Setup the paper size and orientation
// $dompdf->setPaper('A4', 'landscape');

// // Render the HTML as PDF
// $dompdf->render();

// // Output the generated PDF to Browser
// $dompdf->stream("my_pdf.pdf", array("Attachment" => 0));  

$certificateTemplate = get_template_directory_uri().'/images/certificateTemplate.jpg';
//$certificateTemplate = '/tech-pearls/images/certificateTemplate.jpg';


ob_start();?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<style type="text/css">
body{font-size: 16px;color: black;}
.bgimg {
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background:url('<?php echo $certificateTemplate;?>');
}
img.cert {
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: auto;
}
</style>
<title>Certificate of Completion</title>
</head>
<body>
<img class="cert" src="<?php echo $certificateTemplate;?>" alt="">
<h2>Hello</h2>
</body>
</html>
<?php
$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);

$dompdf->set_option('defaultMediaType', 'all');
$dompdf->set_option('isFontSubsettingEnabled', true);

$html = ob_get_clean();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("my_pdf.pdf", array("Attachment" => 0)); 
$pdf_gen = $dompdf->output();
?>