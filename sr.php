<?php
$response = file_get_contents( "https://www.showroom-live.com/api/live/onlives" );
if ( $response !== false ) {
    $data = json_decode( $response, true );
    if ( $data !== null ) {
    echo '<form action="sr.php" method="POST">
    Farming : <select name="jenis_gift">
            <option value="1">Kecambah</option>
            <option value="2">Bintang</option>
        </select>
    Jumlah : <input type="number" name="jumlah"> <button>Submit</button>
</form>';
            $jenis_gift = $_POST['jenis_gift'];
            $jumlah = $_POST['jumlah'];
    if ($jenis_gift == 1)
    {
        $gambaru = "https://image.showroom-cdn.com/showroom-prod/assets/img/gift/1501_s.png?1615175775";
        $kategori = "1";
        $genre = "Free";
    }else if($jenis_gift == 2){
        $gambaru = "https://image.showroom-cdn.com/showroom-prod/assets/img/gift/1_s.png?1615175775";
        $acakin = rand(1,2);
        if ($acakin == 1){
            $kategori = "2";
            $genre = "Idol";
        }else if($acakin == 2){
            $kategori = "3";
            $genre = "Talent Model";
        }else{
            $kategori = "2";
            $genre = "Idol";
        }
    }else{
        $gambaru = "https://image.showroom-cdn.com/showroom-prod/assets/img/gift/1501_s.png?1615175775";
        $kategori = "1";
        $genre = "Free";
    }
    if ($jumlah >= 1){
	$iku = "3";
	$count = count($data['onlives'][$kategori]['lives']);
	$counts = $count-$iku;
	echo "-----------------------------------------------<br/>
	Live : $counts<br/>
	Kategori : $genre<img src ='".$gambaru."' width='17.5'><br/>";
	if ($jumlah >= $count){
		$total = $count;
	}else{
		$total = $iku+$jumlah;
	}
	$bct = $total-$iku;
	echo "Ditampilkan : $bct<br/>";
	for($i = $iku; $i < $total; $i++){
    $dataku  = $data['onlives'][$kategori]['lives'][$i]['room_url_key'];
    $url = "https://www.showroom-live.com/$dataku";
	$name  = $data['onlives'][$kategori]['lives'][$i]['main_name'];
	$image  = $data['onlives'][$kategori]['lives'][$i]['image'];
	echo "-----------------------------------------------<br/>
	$name<br/>
	<img src ='".$image."' width='100'><br/>
	<a href='".$url."?gt=1&time=999&ty=1' target='_blank'><font size='4'>Live</font></a><br/>
	-----------------------------------------------<br/>";
    }
    }else{
        echo "";
    }
	}

} else {
    echo 'Data tidak ada.';

}
?><title>Farming SR</title>
