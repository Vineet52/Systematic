<?php
	include_once("connection.php");
	include_once("functions.php");
	$date=Date("Y-m-d");
	if(addWriteOff($con,$_POST["WAREHOUSE_ID"],$_POST["PRODUCT_ID"],$_POST["QUANTITY"],$_POST["REASON"],$date))
	{
		if(reduceWarehouseProductQty($con,$_POST["WAREHOUSE_ID"],$_POST["PRODUCT_ID"],$_POST["QUANTITY"]))
		{
			if(updateProductQtyWriteoff($con,$_POST["PRODUCT_ID"],$_POST["QUANTITY"]))
			{
				echo "T,Writeoff Recorded Successfully!";
			}
			else
			{
				echo "F,Product Not Updated";
			}
		}
		else
		{
			echo "F,Warehouse Product Not Updated";
		}
	}
	else
	{
		echo "F,Writeoff Not Recorded";
	}
	mysqli_close($con);
?>