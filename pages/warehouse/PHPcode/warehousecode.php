<?php
	include_once("connection.php");
	////////////////////////////////////////////
	function checkWarehouse($con,$name)
	{
		$check_query="SELECT * FROM WAREHOUSE WHERE NAME='$name'";
		$check_result=mysqli_query($con,$check_query);
		if(mysqli_num_rows($check_result)>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	/////////////////////////////////////////
	function getWarehouseID($con,$name)
	{
		$get_query="SELECT * FROM WAREHOUSE WHERE NAME='$name'";
		$get_result=mysqli_query($con,$get_query);
		if(mysqli_num_rows($get_result)>0)
		{
			$row=$get_result->fetch_assoc();
			$ID=$row["WAREHOUSE_ID"];
		}
		else
		{
			$ID="Warehouse ID does not exist";
		}
		return $ID;
	}
	/////////////////////////////////////////////
	function addWarehouse($con,$name,$des,$max)
	{
		$add_query="INSERT INTO WAREHOUSE (NAME,DESCRIPTION,MAX_PALLETS) VALUES('$name','$des','$max')";
		$add_result=mysqli_query($con,$add_query);
		if($add_result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	//////////////////////////////////////////
	function maintainWarehouse($con,$id,$name,$des,$max)
	{
		$update_query="UPDATE WAREHOUSE SET NAME='$name',DESCRIPTION='$des',MAX_PALLETS='$max' WHERE WAREHOUSE_ID='$id'";
		$update_result=mysqli_query($con,$update_query);
		if($update_result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	////////////////////////////////////////////////////
	///////////////////////////////////////////////////
	if($_POST["choice"]==1)
	{
		if(checkWarehouse($con,$_POST["name"]))
		{
			echo "F,Warehouse Exists.";
		}
		else
		{
			if(addWarehouse($con,$_POST["name"],$_POST["description"],$_POST["max"]))
			{
				echo "T,Warehouse Added Successfully";
			}
			else
			{
				echo "F,Warehouse Not Added Successfully";
			}
		}
	}
	elseif($_POST["choice"]==2)
	{
		if(maintainWarehouse($con,$_POST["ID"],$_POST["name"],$_POST["description"],$_POST["max"]))
		{
			echo "T,Warehouse Updated Successfully";
		}
		else
		{
			echo "F,Warehouse Not Updated";
		}
	}
	elseif($_POST["choice"]==3)
	{
		$sql_query ="SELECT * FROM WAREHOUSE";
	    $result = mysqli_query($con,$sql_query);
	    //$row = mysqli_fetch_array($result);

	    if (mysqli_num_rows($result)>0) {
	        $count=0;
	        while ($row=$result->fetch_assoc())
	        {
	        	$vals[]=$row;
	        	//$vals[$count]["ID"]=$row["SUPPLIER_ID"];
	        	$count=$count+1;
	        }
	        echo json_encode($vals);
	        // echo mysqli_num_rows($result);
	        
	    }
	    else{
	         echo "Error: " . $sql_query. "<br>" . mysqli_error($con);
	    }
	}
	mysqli_close($con);

?>