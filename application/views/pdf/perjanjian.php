<?php  
  $style = '<style type="text/css">
  @page { 
		margin: 10px 5px;
	}

  body{ 
    color: #222; 
    font-size: 14px;
    font-family: arial, sans-serif;
  }
  #table{
    border-collapse: collapse;
  }
  #table td, #table th{
    border: 1px solid #777;
    padding-top: 5px;
    padding-bottom: 5px;
    padding-left: 15px;
    padding-right: 15px; 
    font-size: 18px;
  }
  h3{
    font-size: 16px;
  } 
  h4{
    font-size: 14px;
    margin-bottom: 0px;
  }
  .container{ 
    padding: 35px 100px;
    margin-bottom: 30px;
    page-break-inside: avoid;
  }
  p{
    font-size: 16px;
    line-height: 23px;
  }
}
</style>';
	
	// $html .= "<p>$data_user->fund</p>";
	// $html .= "<p>$data_user->time_submited</p>";
	// $html .= "<p>$data_user->title</p>";
	// $html .= "<p>$data_user->desc</p>";
	// $html .= "<p>$data_user->name</p>";
	// $html .= "<p>$data_user->email</p>";
	// $html .= "<p>$data_user->phone_number</p>";
	$digital_signature = hash('sha256', $data_user->email);
	$logo = base_url("assets/images/logo-bui.png");
	$funding = format_rupiah($data_user->fund);
	$time_submited = format_tanggal($data_user->time_submited);
	$html = "
		<div style='text-align: center'>
			<table style='margin-bottom:10px; width: 100%'>
				<tr>
					<td style='text-align: left;padding-left:20px; padding-top: 5px'>
						<h4>PT. BAKTI UDANG INDONEISA</h4>
						<div>Buah Batu Square Jl.Lemon 1 No 27 Bandung</div>
						<div>https://vaname.id</div>
					</td>
					<td style='text-align: right; padding-right:10px'>
						<img src='$logo' width='90' />
					</td>
				</tr>
			</table>
			<hr style='color: #222; height: 3px; margin: 0px;margin-bottom: 1px'>
			<hr style='color: #222; height: 1px; margin: 0px'>
		</div>
		<div class='container'>
	";
	$html .= "<h3 style='text-align:center'>SURAT KOMITMEN KERJASAMA</h3><br>";

	$html .= "<p>Dengan ini saya <br>$data_user->name<br>$data_user->email<br><br>Menyatakan bahwa, 
		Saya telah berkomitmen dengan PT BAKTI Udang Indonesia untuk 
		Mempersiapkan Dana Investasi sebesar <b>$funding</b> pada tanggal $time_submited, melalui program
		<i>\"$data_user->title\"</i> pada aplikasi <b>Vanameid</b>.
	</p>
	<p style='font-size: 12px; line-height: 16px; padding-top: 40px'>
	<b>Digital signature</b> : <br> 
$digital_signature
	</p>
	"; 

	$html .= "</div>";

  // echo $style . $html;die;
	  $mpdf = new \Mpdf\Mpdf();
	  $mpdf->use_kwt = true;
	  $mpdf->shrink_tables_to_fit = 1;
	  
	  $mpdf->CSSselectMedia='mpdf';  
	  $mpdf->WriteHTML($style . $html); 
	  $mpdf->Output("DOKUMEN-PERJANJIAN-" . $data_user->cf_id . date('ymdHis') . "", "I");

?> 