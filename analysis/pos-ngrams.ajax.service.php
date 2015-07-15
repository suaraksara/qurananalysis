<?php 
require_once("../global.settings.php");

$lang = "AR";



if ( isset($_GET['lang']) )
{
	$lang = $_GET['lang'];
}

loadModels("core,qac",$lang);




$parameter = $_GET['parameter'];


	$nGramesArr = array();
	
	$posPatternString = trim($parameter);
	
	
	
	$nGramesArr = getPoSNGrams($posPatternString);
	
	



$avgCollocationFreq = array_sum($nGramesArr);
	
$nGramsCount = count($nGramesArr);
					?>
					
					<table id='ngrams-results-table'>
					<thead>
					<tr>
						<td colspan='2'>
							
							Number of N-Grams:<b><?=addCommasToNumber($nGramsCount) ?></b>
							Total repetitions:<b><?=addCommasToNumber($avgCollocationFreq) ?></b>
							
						</td>
					</tr>
					</thead>
					<tr>
					<th>
						Words
					</th>
					<th>
						Frequency
					</th>
					</tr>
					
					<?php
				
						
				
					
					//echoN($nGramesArr[floor($nGramsCount/2)]);
					//preprint_r($nGramesArr);
					
					foreach($nGramesArr as $key=>$val)
					{
						
					?>
					<tr>	
						<td>
							<?=$key?>
						</td>
						<td>
							<?=$val?>
						</td>
					</tr>
					<?php 
					}
					?>
			</table>

