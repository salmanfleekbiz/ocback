<?php
$con = mysqli_connect('localhost','ocbuy_admin','db_P@$$w0rd','ocbuy_db')or die(mysqli_connect_error());

$sql="SELECT c.title AS category, m.title AS model, m.image, s.title AS storage, pr.title AS provider, co.slug AS conditions, CONCAT(p.category_id,'-',p.model_id,'-',p.storage_id,'-',p.provider_id) AS sort, CONCAT(c.slug,'/',m.slug,'/',pr.slug,'/',s.slug) AS slug, p.price, p.id
FROM pricing p
JOIN categories c ON p.category_id=c.id
JOIN models m ON p.model_id=m.id
JOIN storage s ON p.storage_id=s.id
JOIN providers pr ON p.provider_id=pr.id
JOIN conditions co ON p.condition_id=co.id
WHERE p.status=1
ORDER BY sort ASC";

$res= mysqli_query($con,$sql);
$xml_array=array();
$apple_arr=array('iPhone', 'iPad', 'iPod', 'Apple iWatch', 'iWatch', 'Apple Tv');

while($row=mysqli_fetch_assoc($res)){
	if($row['category']=='iPad'){
		$Device='Tablet';
	}
	else if($row['category']=='iPod'){
		$Device='iPod';
	}
	else if($row['category']=='Apple iWatch' || $row['category']=='iWatch'){
		$Device='Watch';
	}
	else if($row['category']=='Apple Tv'){
		$Device='TV';
	}
	else{
		$Device='Phone';
	}
	if (in_array($row['category'], $apple_arr)){
		$Manufacturer="Apple";
	}
	else{
		$Manufacturer=$row['category'];
	}
	$Condition='price_'.str_replace("-","_",$row['conditions']);
	if (array_key_exists($row['sort'],$xml_array)){
		$xml_array[$row['sort']][$Condition]=$row['price'];
	}
	else{
		$xml_array[$row['sort']]['unique_id']='oc'.$row['id'];
		$xml_array[$row['sort']]['device']=$Device;
		$xml_array[$row['sort']]['manufacturer']=$Manufacturer;
		$xml_array[$row['sort']]['model']=$row['model'];
		$xml_array[$row['sort']]['storage']=$row['storage'];
		$xml_array[$row['sort']]['carrier']=$row['provider'];
		$xml_array[$row['sort']]['make_and_model']=$Manufacturer.' '.$row['model'].' '.$row['storage'].' '.$row['provider'];
		$xml_array[$row['sort']]['image']='https://www.ocbuyback.tk/assets/uploads/models/'.$row['image'];
		$xml_array[$row['sort']]['link']='https://www.ocbuyback.tk/sell/'.$row['slug'];
		$xml_array[$row['sort']][$Condition]=$row['price'];
	}
}

//function defination to convert array to xml
function array_to_xml($array, &$xml) {
    foreach($array as $key => $value) {
        if(is_array($value)) {
            $subnode = $xml->addChild("gadget");
            array_to_xml($value, $subnode);
        }else {
            $xml->addChild("$key",htmlspecialchars("$value"));
        }
    }
}


//creating object of SimpleXMLElement
$xml = new SimpleXMLElement("<?xml version=\"1.0\"?><gadgets></gadgets>");

//function call to convert array to xml
array_to_xml($xml_array,$xml);

//saving generated xml file
$xml_file = $xml->asXML('feed.xml');

//success and error message based on xml creation
if($xml_file){
    echo TRUE;
}else{
    echo FALSE;
}

?>