<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
	<title></title>
	<meta charset="utf-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="js/myjs.js"></script>
	<script>
	$("document").ready(function(){
		console.log("d");
		for(var x=0;x<t;x++){
			for(var y=0;y<t;y++){
				var z=(""+x+y);
				if(z%2==0){
					var e=document.getElementById(z);
					e.style.backgroundColor="red";
				}else{
					var e=document.getElementById(z);
					e.style.backgroundColor="blue";
				}
			}
		}
	});
	</script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Math</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">Math</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.html">Home</a></li>
            <li><a href="magic_square.php">Ma Phuong</a></li>
          </ul>
        </div><!--/.nav-collapse --> 
      </div>
    </nav>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4">

				<div class="form_input">
					<h2>Chọn Kích Thước</h2>
					<form method="post">
						<select name="number" class="form-control">
							<option value="3">3</option>
							<option value="5">5</option>
							<option value="7">7</option>
							<option value="9">9</option>
						</select><br>
						<button  name="submit" class="btn btn-success" type="submit">Gửi</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php
	if(isset($_POST['submit'])){
		// create a array. In this array we have 3 other array
		$magic_square= array();
		//s is size of sub array. array[0][s/2]=1;
		$size=$_POST['number'];
		echo("<script>");
		echo("var t=".$size.";");
		echo("console.log(t);");
		echo "</script>";
		for($i=0;$i<$size;$i++){
			for($j=0;$j<$size;$j++){
				$magic_square[$i][$j]=0;
			}
		}

		$number=1;
		$half_size=floor($size/2);
		$magic_square[0][$half_size]=1;
//apply the algorithm up and turn right;
//------------Start algorithm---------------------//
		$start_row=0;
		$start_column=$half_size;
		$start_column++;
		$start_row--;
		//for($i=0;$i<$size;$i++){
			//for($j=0;$j<$size;$j++){
		while($number!=$size*$size){	
//else if(the next point is in [-1][..] and not at [-1][s])
//		this point at last array and has same column= next number;
			if($start_row==-1&&$start_column!=$size){
						
				$number++;
						/**if($magic_square[$start_row+1][$start_column]!=0){
							$magic_square[$start_row+1][$start_column]=$number;
							$start_row=$start_row+1;

						}else{**/
							/*
						echo($start_row);
						echo("<br>");
						echo($start_column);
						echo("<br>");
						*/
				$magic_square[$size-1][$start_column]=$number;
				$start_row=$size-1;
				$start_column++;
				$start_row--;
					
						/*
						for($i=0;$i<$size;$i++){
							print_r($magic_square[$i]);echo("<br>");
						}
						//print_r($magic_square[3]);echo("<br>");
						echo("--------------------------------");echo("<br>");
						*/
			}else
//else if(the next point is in [..][s] and not at [-1][s])
//		this point at the first row of the row of this number;
				if($start_column==$size&&$start_row!=-1){
					$number++;
					$magic_square[$start_row][0]=$number;
					$start_row=$start_row-1;
					$start_column=0;
					$start_column++;
						/*
						echo($start_row);
						echo("<br>");
						echo($start_column);
						echo("<br>");
						for($i=0;$i<$size;$i++){
							print_r($magic_square[$i]);echo("<br>");
						}
						//print_r($magic_square[3]);echo("<br>");
						echo("--------------------------------");echo("<br>");
						*/
			}else
//else if(the next point is in [-1][s] or in array but it already has number)
// this point at the point is under of number;
				if(($start_row==-1&&$start_column==$size)||$magic_square[$start_row][$start_column]!=0){
					$number++;
					$magic_square[$start_row+2][$start_column-1]=$number;
					$start_row=$start_row+2;
					$start_column=$start_column-1;
					$start_row--;
					$start_column++;
						/*
						echo($start_row);
						echo("<br>");
						echo($start_column);
						echo("<br>");
						for($i=0;$i<$size;$i++){
							print_r($magic_square[$i]);echo("<br>");
						}
						//print_r($magic_square[3]);echo("<br>");
						echo("--------------------------------");echo("<br>");
						*/
			}else
//if(the next point is in array=> this point=next number)
				if($start_row>=0&&$start_column>=0&&$magic_square[$start_row][$start_column]==0){
					$number++;
					$magic_square[$start_row][$start_column]=$number;
					$start_row--;
					$start_column++;
						//echo($start_row);
						//echo("<br>");
						//echo($start_column);
						//echo("<br>");
						//for($i=0;$i<$size;$i++){
							//print_r($magic_square[$i]);echo("<br>");
						//}
						//print_r($magic_square[3]);echo("<br>");
						//echo("--------------------------------");echo("<br>");
				}
		}
			//}
		//}
		/*
		echo("ma phuong<br>");
		for($i=0;$i<$size;$i++){
			print_r($magic_square[$i]);echo("<br>");
		}
		print_r($magic_square[3]);echo("<br>");

		*/


?>
	
<div class="container">
	<div class="row">
		<div class="col-md-4 col-xs-0">
		</div> 
		<div class="col-md-4 col-xs-12">
			<table class="table">
	
					<?php 
						for($i=0;$i<$size;$i++){
					?>
							<tr>
					<?php		
							for($j=0;$j<$size;$j++){
								echo("<td id=$i$j>".$magic_square[$i][$j]."</td>");
							}
					?>
							</tr>
							<?php		
						}
			}
					 ?>
				
			</table>
		</div>
	
	</div>
	<div class="row">
		<div class="col-md-3">
			<p>
				alo
			</p>
		</div>
		<div class="col-md-6">
			<div class="explain">
				<b><p>
					Ma phương là một ma trận vuông (n x n) mà có tổng các số trên cùng một hàng bằng tổng các số trên cùng một cột bằng tổng các số trên đường chéo chính.
					Ví dụ: Một ma phương 3 hàng 3 cột. có tổng số các số trong hàng, cột, đường chéo đều bằng 15.Vậy cách giải quyết bài toán này như thế nào? Ta chia bài toán này thành 2 bài toán nhỏ hơn: Số hàng là số chẵn và số hàng là số lẻ.
					Trường hợp số hàng là số lẻ: 3,5,7,9, … 2n+1 hàng.
				</p></b>
			</div>	
		</div>
	</div>	
</div>


</body>
</html>