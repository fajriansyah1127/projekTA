<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Pegawai</title>
    <style>
    
        /* Menghilangkan page number & url ketika proses cetak*/
       @media print {
           @page {
               margin-top:20px;
               margin-bottom:30px;
               size: 210mm 297mm;   /* ukuran kertas A4 */ 
           }
           body {
               margin: 0px; 
                   padding-top: 0px;
               padding-bottom: 0px ;
           }
       }
       /**/
       table.transkrip {
           background-color: transparent;
           border-collapse: collapse;
           page-break-after:always;
           max-width: 640px; 
           width:100%;
       }
       table.transkrip td {
           border: 1px #000 solid;
           font-family: Times New Roman, Times, serif;
           font-size: 12px;
       }
       thead.Header {
           border: 1px #000 solid;
           background-color: none;
           font-family: Times New Roman, Times, serif;
           font-size: 14px;
       }
       .Header tr {
           font-family: Times New Roman, Times, serif;
           font-size: 12px;
       }
       .Header th {
           font-weight: bold;
       }
       table.transkripData {
           background-color: transparent;
           border-collapse: collapse;
           max-width: 640px; 
           width:100%;
       }
       table.transkripData td {
           font-family: Times New Roman, Times, serif;
           font-size: 12px;
       }
       .link {
           color : blue;
       }
   </style>
    <title>Cetak Stok</title>
</head>

<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0">
	<div align="center">
		
		    
    	{{-- <header>
        	<table style="max-width: 640px; width:100%;"border="0" >
            	
            	<tr>
                	<td colspan="5" style="border-top: 2px solid #000000;">&nbsp;</td>
                </tr>
            </table>
       </header> --}}
    	
		<table style="max-width: 840px; width:200%;"border="0" >
        	<tr>
            	<td>
                	<strong><p style="text-align: center;font-size:14px;font-family:Times New Roman, Times, serif;">STOCK BARANG KANTOR AREA BALIKPAPAN</p></strong>
            	</td>
        	</tr>
       </table>
		<br>
    	
    	<br>
		<table class="transkrip" style="" cellspacing=0 cellpadding=4 class="" border="1">
			<thead class="Header" style="display: table-header-group;">
            	<tr class="Header">
                	<th width="35px" align="center">No</th>
					<th width="150px" align="center">Nama Barang</th>
					<th width="40px" align="center">Jumlah</th>
					<th width="50px" align="center">Satuan</th>
            	</tr>
        	</thead>
						<tr>@foreach($stok as $data)
            	<td nowrap="center" align="center">{{ $loop->iteration}}</td>
				<td align="center">{{ $data->nama_barang}}</td>
				<td align="center">{{ $data->jumlah}}</td>
				<td nowrap="center" align="center">{{ $data->satuan->nama}}</td>
<!--             	<td align="center">2018 / 1</td> -->
<!--             	<td align="center">2018 / 1</td> -->
            	
            </tr> @endforeach  
        				
        		        
    		
           
    	</table>
		
		
  	
				<br>
	
	</div>
</body>
<script type="text/javascript">
window.print();
</script>
</html>