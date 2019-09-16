var productsArr;
var sProductsArr;

function setTwoNumberDecimal(el) 
{
    el.value = parseFloat(el.value).toFixed(2);     
};

function numberWithSpaces(x) 
{
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
}

let buildTable=function(tmp)
{
	let tableEntry=$("<tr></tr>");
	let quantityArr=productsArr.find(function(element){
		if(element["PRODUCT_ID"]==sProductsArr[tmp]["PRODUCT_ID"])
		{
			return element;
		}
	});
	let pType="Individual";
	let pNumber=1;
	if(quantityArr["PRODUCT_SIZE_TYPE"]==2)
	{
		pType="Case";
		pNumber=quantityArr["UNITS_PER_CASE"];
	}
	else if(quantityArr["PRODUCT_SIZE_TYPE"]==3)
	{
		pType="Pallet";
		pNumber=quantityArr["CASES_PER_PALLET"];
	}
	pName=quantityArr["NAME"]+" ("+pNumber+" x "+quantityArr["PRODUCT_MEASUREMENT"]+quantityArr["PRODUCT_MEASUREMENT_UNIT"]+")"+" "+pType;
	let productQuantityEntry=$("<td></td>").addClass("py-3 text-center").text(sProductsArr[tmp]["QUANTITY"]);
	let productNameEntry=$("<td></td>").addClass("py-3").text(pName);

	let productUnitPrice = parseFloat(sProductsArr[tmp]["SELLING_PRICE"]);
	productUnitPrice = productUnitPrice.toFixed(2);
	productUnitPrice = numberWithSpaces(productUnitPrice);
	productUnitPrice = "R"+ productUnitPrice;

	let productUnitPriceEntry=$("<td></td>").addClass("text-right py-3").text(productUnitPrice);

	let productTotalPrice = parseFloat(sProductsArr[tmp]["QUANTITY"]).toFixed(2)*parseFloat(sProductsArr[tmp]["SELLING_PRICE"]).toFixed(2);
	productTotalPrice = productTotalPrice.toFixed(2);
	productTotalPrice = numberWithSpaces(productTotalPrice);
	productTotalPrice = "R"+ productTotalPrice;

	let productTotalEntry=$("<td></td>").addClass("text-right py-3").text(productTotalPrice);

	let productReturnQuantityEntry = '<td class="py-2 px-0 table-danger"><input type="hidden" value="'+sProductsArr[tmp]["PRODUCT_ID"]+'"><div class="input-group mx-auto" style="width: 4rem"><input type="number" id="returnQuantity'+sProductsArr[tmp]["PRODUCT_ID"]+'" value="0" max="'+sProductsArr[tmp]["QUANTITY"]+'" min="0" step="1" data-number-stepfactor="10" class="form-control currency pr-0 returnQuantityNumber" style="height: 2rem;" /></div> </td>';

	tableEntry.append(productQuantityEntry);
	tableEntry.append(productNameEntry);
	tableEntry.append(productUnitPriceEntry);
	tableEntry.append(productTotalEntry);
	tableEntry.append(productReturnQuantityEntry);
	$("#tBody").append(tableEntry);

}
///////////////////////////////////////
$(()=>{

	let customerData=JSON.parse($("#CUSTOMER_DATA").val());
	let employeeData=JSON.parse($("#EMPLOYEE_DATA").val());
	productsArr=JSON.parse($("#PRODUCTS_ARRAY").val());
	sProductsArr=JSON.parse($("#SALE_PRODUCTS_ARRAY").val());
	console.log(customerData);
	console.log(employeeData);
	console.log(productsArr);
	console.log(sProductsArr);
	$("#customerName").text(customerData["NAME"]);
	if(customerData["SURNAME"]==null)
	{
		$("#customerSurname").text("Organisation");
	}
	else
	{
		$("#customerSurname").text(customerData["SURNAME"]);
	}
	$("#customerContact").text(customerData["CONTACT_NUMBER"]);
	//////////////////////
	$("#eSalesPerson").text(employeeData["NAME"]);
	for(let k=0;k<sProductsArr.length;k++)
	{
		buildTable(k);
	}
	let total=parseFloat($("#sTotal").text());
	let vat=total*0.15;

	console.log(total);
	total = total.toFixed(2);
	total = numberWithSpaces(total);
	$("#sTotal").text(total);

	vat = vat.toFixed(2);
	vat = numberWithSpaces(vat);

	$("#sTotal").text("R"+total);
	$("#sVAT").text("R"+vat);

	$("button#finaliseReturn").on('click', event => {
		//console.log(SALECUSTOMERID);
		//console.log(SALEPRODUCTIDs);
		if (SALECUSTOMERID == undefined) 
		{
			event.stopPropagation();
			$('#modal-title-default2').text("Error!");
			$('#modalText').text("Please add a customer to the sale");
			$("#modalCloseButton").attr("onclick","");
			$('#successfullyAdded').modal("show");
		}
		else if (SALEPRODUCTIDs.length == 0) 
		{
			event.stopPropagation();
			$('#modal-title-default2').text("Error!");
			$('#modalText').text("Please add products to the sale");
			$("#modalCloseButton").attr("onclick","");
			$('#successfullyAdded').modal("show");
		}
		

	});

});

$("button#confirmSalesManagerPassword").on('click', event => {

	var password = $("#salesManagerPassword").val().trim();
	$.ajax({
        url:'PHPcode/verifySalesManagerPassword.php',
        type:'post',
        data:{ 
        	password:password
        },
        beforeSend: function(){
            $('.loadingModal').modal('show');
        },
        complete: function(){
            //$('.loadingModal').modal('hide');
        }
    })
    .done(response => {

    	console.log(response);
        if (response == "success")
		{
			SALERETURNPRODUCTS = [];
			
			var reasonForReturn = $("#reasonForReturn").val();
			var saleID = $("#SALE_ID").val();
			
			console.log(reasonForReturn)
			for (var i = sProductsArr.length - 1; i >= 0; i--) 
			{
				var thisProductID = sProductsArr[i].PRODUCT_ID;
				var thisProductReturnQuantity = $('#returnQuantity'+thisProductID).val();
				
				

				var productLine = {
				    'PRODUCT_ID': thisProductID,
				    'RETURN_QUANTITY': thisProductReturnQuantity,
				};
				SALERETURNPRODUCTS.push(productLine);
			}
			console.log("Return Quantities");
			console.log(SALERETURNPRODUCTS);
			console.log("Sale ID => "+saleID);


			$.ajax({
			        url:'PHPcode/returnSale_.php',
			        type:'post',
			        data:{ 
			        	saleReturnProducts : SALERETURNPRODUCTS,
			        	saleID : saleID,
			        	reasonForReturn : reasonForReturn
			        },
			        beforeSend: function(){
			            //$('.loadingModal').modal('show');
			            //console.log("Longitude => "+saleDeliveryLongitude+", Latitude => "+saleDeliveryLatitude);

			        },
			        complete: function(){
			            $('.loadingModal').modal('hide');
			        }
			    })
			    .done(response => {

			    	console.log(response);

			        if (response == "success")
					{
						$('#modal-title-default2').text("Success!");
						$('#modalText').text("Correct Password. Sale return successful");
						$("#modalCloseButton").attr("onclick","window.location='../../sales.php'");
						$('#successfullyAdded').modal("show");
					}
					else if(response == "failed")
					{
						$('#modal-title-default2').text("Error!");
						$('#modalText').text("Incorrect password entered");
						$("#modalCloseButton").attr("onclick","");
						$('#successfullyAdded').modal("show");
					}
					else if(response == "Database error")
					{
						$('#modal-title-default2').text("Database Error!");
						$('#modalText').text("Database error whilst verifying password");
						$("#modalCloseButton").attr("onclick","");
						$('#successfullyAdded').modal("show");
					}
					
					ajaxDone = true;
			    });
	
		}
		else if(response == "failed")
		{
			$('.loadingModal').modal('hide');
			$('#modal-title-default2').text("Error!");
			$('#modalText').text("Incorrect password entered");
			$("#modalCloseButton").attr("onclick","");
			$('#successfullyAdded').modal("show");
		}
		else if(response == "Password empty")
		{
			$('.loadingModal').modal('hide');
			$('#modal-title-default2').text("Error!");
			$('#modalText').text("Please enter a password");
			$("#modalCloseButton").attr("onclick","");
			$('#successfullyAdded').modal("show");
		}
		else if(response == "Database error")
		{
			$('.loadingModal').modal('hide');
			$('#modal-title-default2').text("Database Error!");
			$('#modalText').text("Database error whilst verifying password");
			$("#modalCloseButton").attr("onclick","");
			$('#successfullyAdded').modal("show");
		}
		
		ajaxDone = true;
    });
})