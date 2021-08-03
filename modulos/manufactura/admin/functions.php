<?php
function cadena_replace(&$replace1,&$replace2){
	$replace1=array(' ','.',',','(',')','/','"','á','é','í','ó','ú','&aacute;','&eacute;','&iacute;','&oacute;','&uacute;','Á','É','Í','Ó','Ú','&Aacute;','&Eacute;','&Iacute;','&Oacute;','&Uacute;','ñ','Ñ','&ntilde;','&Ntilde;');
	$replace2=array('-','-','-','-','-','-','-','a','e','i','o','u','a','e','i','o','u','A','E','I','O','U','A','E','I','O','U','n','N','n','N');
}

function html_iso_porta(&$nombre,&$des,&$resena,&$cate){
global $chartset;
 if($chartset=='iso-8859-1'){
	$nombre=htmlentities($nombre, ENT_COMPAT,'ISO-8859-1', true);
	$des = htmlentities($des, ENT_COMPAT,'ISO-8859-1', true);
	$resena = htmlentities($resena, ENT_COMPAT,'ISO-8859-1', true);	
	$cate=htmlentities($cate, ENT_COMPAT,'ISO-8859-1', true);
 }
}

function cate_porta($cate){
global $mysqli,$DBprefix;	
$sql=mysqli_query($mysqli,"SELECT DISTINCT cate FROM ".$DBprefix."galeria;") or print mysqli_error($mysqli);
echo '<select class="form-control" id="cate" name="cate">';
	while($row=mysqli_fetch_array($sql)){
		$seleccion=($row['cate']==$cate) ? 'selected' : '';
		echo '<option value="'.$row['cate'].'" '.$seleccion.'>'.$row['cate'].'</option>';
	}
echo '</select>';	
}

function mostrar_imagenes($carpeta){$i=-2;
global $page_url;
    if(is_dir($carpeta)){
        if($dir = opendir($carpeta)){
            while(($archivo = readdir($dir)) !== false){$i++;
				$file=substr($archivo,-4);
				if($archivo!='.' && $archivo!='..'){
					if($i==1){$ima='';}
					if($i>=1){$ima.='<li><img src="'.$page_url.$carpeta.$archivo.'" alt="Nuevo '.$i.'" /></li>
					';}
				}
				/*else{
					$ima='<li style="text-align:center"><i><b>Nuevos Productos</b> proximamente...</i></li>';
				}*/
            }
            closedir($dir);
			echo $ima;
        }
    }
}

function portafolio(){
global $mysqli,$DBprefix,$page_url,$mod,$ext,$opc;
$fjson='portafolio.json';
$path_JSON='modulos/portafolio/'.$fjson;
 if(!file_exists($path_JSON)){$path_JSON=$page_url.'bloques/ws/t/'.$fjson.'/';}
 echo $rut_origen=($_SESSION['level']!=-1)?'<!-- '.$fjson.' -->'."\n\r":'<!-- '.$fjson.' URL:('.$path_JSON.')-->'."\n\r";
 if($path_JSON){
	$objData=file_get_contents($path_JSON);
	$Data=json_decode($objData,true);
	$i=0;
	if($Data!='' && $Data!=NULL){
		echo '<!-- '.$fjson.' -->';
		foreach ($Data as $reg){$i++;
			cadena_replace($replace1,$replace2);
			$ID=$reg['ID'];
			$cover=$reg['cover'];
			$nombre=$reg['nombre'];
			$des=$reg['descripcion'];
			$cate=str_replace($replace1,$replace2,$reg['cate']);
			$nom=str_replace($replace1,$replace2,$nombre);
			$resena=$reg['resena'];
			$visible=$reg['visible'];

			if($visible==1){
				if($_GET['tema_previo']!=''){$tema_p='&tema_previo='.$_GET['tema_previo'];}
				$link_zp=($tema_p!='' || $valor==1)?$page_url.'index.php?mod=portafolio&ext=item&id='.$ID.$tema_p:$page_url.'portafolio/item/'.$ID.'-'.$nom;
				echo '<!--['.$i.'] -'.$reg['ID'].'-->
				<div class="col-md-4 proj_gallery_grid" data-aos="zoom-in">
					<div class="section_1_gallery_grid">
						<a title="'.$resena.'" href="'.$page_url.'modulos/portafolio/fotos/'.$cover.'">
							<div class="section_1_gallery_grid1">
								<img src="'.$page_url.'modulos/portafolio/fotos/'.$cover.'" alt=" " class="img-responsive" />
								<div class="proj_gallery_grid1_pos">
									<h3>'.$nombre.'</h3>
									<p>'.$des.'</p>
								</div>
							</div>
						</a>
					</div>
				</div>';
			}
		}		
		echo '<!-- /'.$fjson.' -->';
	}	
 }else{
	echo '<div class="col-lg-12 col-xs-12">
			<div>Por el momento No hay productos disponibles.</div>
		</div>
	';
 }
}

function portafolio1($tipo){
global $mysqli,$DBprefix,$page_url,$mod,$ext,$opc;
$fjson='portafolio.json';
$path_JSON='modulos/portafolio/'.$fjson;
 if(!file_exists($path_JSON)){$path_JSON=$page_url.'bloques/ws/t/'.$fjson.'/';}
 echo $rut_origen=($_SESSION['level']!=-1)?'<!-- '.$fjson.' -->'."\n\r":'<!-- '.$fjson.' URL:('.$path_JSON.')-->'."\n\r";
 if($path_JSON){
	$objData=file_get_contents($path_JSON);
	$Data=json_decode($objData,true);
	$i=0;
	if($Data!='' && $Data!=NULL){
		echo '<!-- '.$fjson.' -->';
		foreach ($Data as $reg){$i++;
			cadena_replace($replace1,$replace2);
			$ID=$reg['ID'];
			$cover=$reg['cover'];
			$nombre=$reg['nombre'];
			$des=$reg['descripcion'];
			$cate=str_replace($replace1,$replace2,$reg['cate']);
			$nom=str_replace($replace1,$replace2,$nombre);
			$resena=$reg['resena'];
			$visible=$reg['visible'];
			$curso=strpos($cate, $tipo);
			if($curso==false){$cu=0;}else{$cu=1;}		
			if($visible==1 && $cu==1){			
				if($_GET['tema_previo']!=''){$tema_p='&tema_previo='.$_GET['tema_previo'];}
				$link_zp=($tema_p!='' || $valor==1)?$page_url.'index.php?mod=portafolio&ext=item&id='.$ID.$tema_p:$page_url.'portafolio/item/'.$ID.'-'.$nom;
				echo '<!--['.$i.'] -'.$reg['ID'].'-->
				<div class="col-md-4 proj_gallery_grid" data-aos="zoom-in">
					<div class="section_1_gallery_grid">
						<a title="'.$resena.'" href="'.$page_url.'modulos/portafolio/fotos/'.$cover.'">
							<div class="section_1_gallery_grid1">
								<img src="'.$page_url.'modulos/portafolio/fotos/'.$cover.'" alt=" " class="img-responsive" />
								<div class="proj_gallery_grid1_pos">
									<h3>'.$nombre.'</h3>
									<p>'.$des.'</p>
								</div>
							</div>
						</a>
					</div>
				</div>';
			}
		}		
		echo '<!-- /'.$fjson.' -->';
	}	
 }else{
	echo '<div class="col-lg-12 col-xs-12">
			<div>Por el momento No hay productos disponibles.</div>
		</div>
	';
 }
}
?>