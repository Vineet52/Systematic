var assignments;
var assignmentProducts;
var truckID;
var finalised=[];
var trucks=[];
let buildTruck=function()
{
	for(let k=0;k<assignments.length;k++)
	{
		let found=trucks.includes(assignments[k]["TRUCK_ID"]);
		let dW=$("#truckSelect");
		let wOption=$("<option></option>").addClass("classDestination");
		if(!found)
		{
			trucks.push(assignments[k]["TRUCK_ID"]);
			wOption.attr("name",assignments[k]["TRUCK_ID"]);
			wOption.text(assignments[k]["REGISTRATION_NUMBER"]+"|"+assignments[k]["TRUCK_NAME"]+"|"+assignments[k]["CAPACITY"]+" Tonnes");
			dW.append(wOption);	
		}
		
		// let id="d"+num;
		// wOption.attr("id",id);
		
	}
}

let buildDelivery=function(tmp,arr,prodArr)
{
	let tableEntry=$("<tr></tr>");
	let inputCheckbox=$("<input class='classCheck' type='checkbox'>").attr("name",arr[tmp]["SALE_ID"]);
	inputCheckbox.on('change',function(e){
		if($(this).prop("checked")==true)
		{
			console.log("c");
			finalised.push(parseInt($(this).attr("name")));
			console.log(finalised);
		}
		else
		{
			console.log("uc");
			let newFinalised=finalised.filter(element=>element!=parseInt($(this).attr("name")));
			finalised=newFinalised;
			console.log(finalised);

		}
		//console.log(finalised);
	});
	let checkboxEntry=$("<td></td>").append(inputCheckbox);
	let deliveryEntry=$("<td></td>").text("Delivery");
	let saleEntry=$("<td></td>").text(arr[tmp]["SALE_ID"]);
	let dateEntry=$("<td></td>").text(arr[tmp]["EXPECTED_DATE"]);
	let cityEntry=$("<td></td>").text(arr[tmp]["CITY_NAME"]);
	let formEntry=$("<td></td>");
	let viewProd=prodArr.filter(element=>element["DELIVERY_TRUCK_ID"]==arr[tmp]["DELIVERY_TRUCK_ID"]);
	let formView="<form action='finalise-view.php' method='POST'><input type='hidden' name='CUSTOMER_NAME' value='"+arr[tmp]["CUSTOMER_NAME"]+"'>"+"<input type='hidden' name='SURNAME' value='"+arr[tmp]["SURNAME"]+"'>"+"<input type='hidden' name='DCT_STATUS_ID' value='"+arr[tmp]["DCT_STATUS_ID"]+"'>"+"<input type='hidden' name='EMPLOYEE_NAME' value='"+arr[tmp]["EMPLOYEE_NAME"]+"'>"+"<input type='hidden' name='CUSTOMER_ID' value='"+arr[tmp]["CUSTOMER_ID"]+"'>"+"<input type='hidden' name='ADDRESS_NAME' value='"+arr[tmp]["ADDRESS_NAME"]+"'>"+"<input type='hidden' name='EMAIL' value='"+arr[tmp]["EMAIL"]+"'>"+"<input type='hidden' name='CONTACT_NUMBER' value='"+arr[tmp]["CONTACT_NUMBER"]+"'>"+"<input type='hidden' name='SALE_ID' value='"+arr[tmp]["SALE_ID"]+"'>"+"<input type='hidden' name='EXPECTED_DATE' value='"+arr[tmp]["EXPECTED_DATE"]+"'>"+"<input type='hidden' name='PRODUCT_DATA' value='"+JSON.stringify(viewProd)+"'>"+"<button class='btn btn-icon btn-2 btn-success btn-sm' type='submit'><span class='btn-inner--icon'><i class='fas fa-eye'></i></span><span class='btn-inner--text'>View</span></button>"+"</form>";
	tableEntry.append(checkboxEntry);
	tableEntry.append(deliveryEntry);
	tableEntry.append(saleEntry);
	tableEntry.append(dateEntry);
	tableEntry.append(cityEntry);
	formEntry.append(formView);
	tableEntry.append(formEntry);
	//console.log(tableEntry);
	$("#enterProducts").append(tableEntry);

}
$(()=>{
	assignments=JSON.parse($("#adData").text());
	assignmentProducts=JSON.parse($("#adpData").text());
	console.log(assignments);
	console.log(assignmentProducts);
	buildTruck();

	$("#truckSelect").on('change',function(e){
		e.preventDefault();
		truckID=$(this).children(":selected").attr("name");
		$("#enterProducts").html('');
		let truckAssignment=assignments.filter(element=>element["TRUCK_ID"]==truckID);
		console.log(truckAssignment);
		let truckProducts=assignmentProducts.filter(element=>element["TRUCK_ID"]==truckID);
		for(let k=0;k<truckAssignment.length;k++)
		{
			buildDelivery(k,truckAssignment,truckProducts);
		}
	});
	

	$("#btnYes").on('click',function(e){
		e.preventDefault();
		$.ajax({
			url:'PHPcode/assigncode.php',
			type:'POST',
			data:{choice:6,num:finalised.length,SALE_ID:finalised,TRUCK_ID:truckID}
		})
		.done(data=>{
			console.log(data);
			let doneData=data.split(",");
			if(doneData[0]=="T")
			{
				$("#MLabel").text("Success!");
				$("#MMessage").text(doneData[1]);
				$("#btnClose").attr("onclick","window.location='../../delivery_collection.php'");
				$("#displayModal").modal("show");
			}
			else
			{
				$("#MLabel").text("Error!");
				$("#MMessage").text(doneData[1]);
				$("#btnClose").attr("data-dismiss","modal");
				$("#displayModal").modal("show");
			}
		});
	})

	

});

//custom-control-input