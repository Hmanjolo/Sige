<?php 
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$Pagina = '
	<h1>Gerador de pdf</h1>
	<ul>
		<li>Estudante</li>
		<li>Professor</li>
	</ul>
	<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>

';

$Doc="Doc.pdf";
$dompdf=new Dompdf();
$dompdf->loadHTML($Pagina);
//$dompdf->setPaper('A4','landscape');
$dompdf->render();
$dompdf->stream($Doc,array('attachment'=>0));

?>