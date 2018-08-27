<?php 
  require_once (__DIR__ . '/../helpers/fpdf/fpdf.php');  
       
 class PDF extends FPDF
 {

    // Cargar los datos
    function LoadData($file)
    {
        // Leer las líneas del fichero
        $lines = file($file);
        $data = array();
        foreach($lines as $line)
            $data[] = explode(';',trim($line));
        return $data;
    }

    // Cabecera de página
    function Header()
    {
        global $title;
        // Logo
        $this->Image('../imagenes/logo_web3.jpg',10,8,33);
        $this->Ln(15);
        // Lucida bold 15
        $this->SetFont('arial','B',15);
        // Calculamos ancho y posición del título.
        $w = $this->GetStringWidth($title)+6;
       
        //texto
        $this->SetFillColor(255,255,255);
        // Título
        $this->Cell($w,9,$title,0,1,'C',true);
        // Salto de línea
        $this->Ln(10);
    }

    // Pie de página
    function Footer()
    {
        // Posición a 1,5 cm del final
        $this->SetY(-15);
        // Arial itálica 8
        $this->SetFont('Arial','I',8);
        // Color del texto en gris
        $this->SetTextColor(128);
        // Número de página
        $this->Cell(0,10,'Página '.$this->PageNo(),0,0,'C');
    }

    // Tabla coloreada
    function Tablita($header, $params)
    {
        // Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(164,164,164);
        $this->SetTextColor(255);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        // Cabecera
        $w = array(60, 60);
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $this->Ln();
        // Restauración de colores y fuentes
        $this->SetFillColor(230,230,230);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Datos
        $fill = false;

        foreach($params as $row)
        {
            $this->Cell($w[0],6,$row[$header['0']],'LR',0,'L',$fill);
            $this->Cell($w[1],6,$row[$header['1']],'LR',0,'R',$fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Línea de cierre
        $this->Cell(array_sum($w),0,'','T');
    }
}

    require_once (__DIR__ . '/../models/donacion.php');
    $modeldonaciones = new Donacion();
    require_once (__DIR__ . '/../models/pedido.php');  
    $modelPedidos = new Pedido(); 
    

    $ctl = $_GET['ctl'];    

    if  ($ctl == 'alimentosEntregados'){
        $desde = $_GET['desde'];
        $hasta = $_GET['hasta'];

        $params = $modelPedidos->getAlimentosEntregadosEntreFechasPdf($desde, $hasta);
        $title = "Kilos de alimentos entregados por cada Entidad Receptora";
    }
    if ($ctl == 'pedidosEntregados'){
        $desde = $_GET['desde'];
        $hasta = $_GET['hasta'];

        $params = $modelPedidos->getPedidosEntregadosEntreFechasPdf($desde, $hasta);
        $title = "Kilos de pedidos que fueron entregados";
    }
    if ($ctl == 'alimentosVencidos'){
        $params = $modeldonaciones->getAlimentosVencidosPdf(date('Y-m-d'));
        $title = "Alimentos Vencidos sin entregar";
    }

    /*Array ( [0] => Array ( [fecha] => 2014-11-06 [Kilos] => 6.00 ) ) */
    $id_values = array_keys($params['0']); // los indices son los detalle_alimento_id
    $pdf = new PDF();
    // Títulos de las columnas
    $header = array($id_values['0'], $id_values['1']);
    // Carga de datos
    $pdf->SetFont('Arial','',14);
    $pdf->AddPage();
    $pdf->Tablita($header,$params);
    $pdf->Output('informe.pdf', 'I');


    
