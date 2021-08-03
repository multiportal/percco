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

function js_select_text($sel,$nom_ctrl,$id_ele,$col,$table){
/*
$sel=$cate;
$nom_ctrl='cate';
$id_ele='cate_porta';
$col='cate';
$table='galeria';
*/	
global $mysqli,$DBprefix;	
$sql=mysqli_query($mysqli,"SELECT DISTINCT ".$col." FROM ".$DBprefix.$table.";") or print mysqli_error($mysqli);
$selector='<select class="form-control" id="'.$nom_ctrl.'" name="'.$nom_ctrl.'">';
	while($row=mysqli_fetch_array($sql)){
		$seleccion=($row[$col]==$sel) ? 'selected' : '';
		$selector.='<option value="'.$row[$col].'" '.$seleccion.'>'.$row[$col].'</option>';
	}
$selector='</select>';	

echo '
<script>
function add_select_text(val){
	if(val==1){	
		document.getElementById(\''.$id_ele.'\').innerHTML=\'<input type="text" class="form-control" id="'.$nom_ctrl.'" name="'.$nom_ctrl.'" value=""><div><a href="javascript:add_select_text(0);">Cancelar</a></div>\';
	}
	else{
		document.getElementById(\''.$id_ele.'\').innerHTML=\''.$selector.'<div><a href="javascript:add_select_text(1);"><i class="fa fa-plus"></i> Agregar Categoria</a></div>\';
	}
}
</script>
';
}

function cate_porta2(){
global $mysqli,$DBprefix;	
$sql=mysqli_query($mysqli,"SELECT DISTINCT cate FROM ".$DBprefix."galeria;") or print mysqli_error($mysqli);
	while($row=mysqli_fetch_array($sql)){
		$cate=str_replace('_',' ',$row['cate']);
		echo '<li data-filter="'.$row['cate'].'"><a href="#">'.$cate.'</a></li>';
	}
}

function galeria1(){
global $mysqli,$DBprefix,$page_url,$mod,$ext,$opc;
$fjson='galeria.json';
$path_JSON='modulos/galeria/'.$fjson;
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
				$link_zp=($tema_p!='' || $valor==1)?$page_url.'index.php?mod=galeria&ext=item&id='.$ID.$tema_p:$page_url.'galeria/item/'.$ID.'-'.$nom;
				echo '<!--['.$i.'] -'.$reg['ID'].'-->
				<div class="col-md-4 proj_gallery_grid" data-aos="zoom-in">
					<div class="section_1_gallery_grid">
						<a alt="'.$cover.'" href="'.$page_url.'modulos/galeria/fotos/'.$cover.'">
							<div class="section_1_gallery_grid1">
								<img src="'.$page_url.'modulos/galeria/fotos/'.$cover.'" alt="" class="img-responsive" />
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