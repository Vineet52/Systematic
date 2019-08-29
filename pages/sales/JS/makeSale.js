var SALECUSTOMERID;
var SALEUSERID;
var SALEUSERNAME;
var SALEPRODUCTIDs = [];
var SALEPRODUCTS = [];
var SALEDELIVERYADD = false;
var SALEDELIVERYADDRESSID;
var productElementsCount = 1;
var productsArray;

var INVOICE_CUSTOMER_NAME;
var INVOICE_CUSTOMER_ADDRESS;
var INVOICE_CUSTOMER_EMAIL;
var INVOICE_SALE_ID;

var saleDeliveryLongitude = 0.0;
var saleDeliveryLatitude = 0.0;

Array.prototype.remByVal = function(val) {
    for (var i = 0; i < this.length; i++) {
        if (this[i] === val) {
            this.splice(i, 1);
            i--;
        }
    }
    return this;
}

$(()=>{
	

	$.ajax({
		url: 'PHPcode/getProducts_.php',
		type: 'POST',
		data: '' 
	})
	.done(data=>{
		if(data!="False")
		{
			let productsArray = JSON.parse(data);
			//console.log(productsArray);
			buildDropDown(productsArray);

			$("input[id='dropdownItem']").on('click', function(){
				let productIndex = this.name;

				if (!SALEPRODUCTIDs.includes(productsArray[productIndex].PRODUCT_ID)) 
				{

					let pType="Individual";
					let pNumber= 1;
					if(productsArray[productIndex].PRODUCT_SIZE_TYPE==2)
					{
						pType="Case";
						pNumber=productsArray[productIndex].UNITS_PER_CASE;
					}
					else if(productsArray[productIndex].PRODUCT_SIZE_TYPE==3)
					{
						pType="Pallet";
						pNumber=productsArray[productIndex].CASES_PER_PALLET;
					}

					let theProductName = productsArray[productIndex].NAME+" ("+pNumber+" x "+productsArray[productIndex].PRODUCT_MEASUREMENT+productsArray[productIndex].PRODUCT_MEASUREMENT_UNIT+")"+" "+pType;

					let theUnitPrice = productsArray[productIndex].SELLING_PRICE;
					theUnitPrice = theUnitPrice;

					let theGuidePrice = productsArray[productIndex].GUIDE_DISCOUNT;
					theGuidePrice = theGuidePrice;
					theGuidePrice = numberWithSpaces(theGuidePrice);
					theGuidePrice = "R"+ theGuidePrice;

					let theCostPrice = productsArray[productIndex].COST_PRICE;
					theCostPrice = theCostPrice;
					theCostPrice = numberWithSpaces(theCostPrice);
					theCostPrice = "R"+ theCostPrice;

					let theProfit = productsArray[productIndex].SELLING_PRICE - productsArray[productIndex].COST_PRICE;
					theProfit = theProfit.toFixed(2);
					theProfit = numberWithSpaces(theProfit);
					theProfit = "R"+ theProfit;


					$('#productLine'+productElementsCount).html("<input type='hidden' value='"+productsArray[productIndex].PRODUCT_ID+"'><td class='py-2 px-0' id='quantityCol'><div class='input-group mx-auto' style='width: 4rem'><input type='number' value='0' min='0' max='"+productsArray[productIndex].QUANTITY_AVAILABLE+"' step='1' data-number-to-fixed='00.10' data-number-stepfactor='1' class='form-control currency pr-0 quantityBox' onchange='calculateRowTotalQuantity(this)' id='quantity"+productsArray[productIndex].PRODUCT_ID+"' style='height: 2rem;' /></div> </td><td class='py-2 pl-0'>"+ theProductName +"</td><td class='py-2 px-0 float-center unitPrice'><div class='input-group mx-auto' style='width: 6.4rem'> <div class='input-group-prepend'><span class='input-group-text' id='inputGroupFileAddon01' style='height: 2rem; font-size: 0.9rem'>R</span></div><input type='number' value='"+theUnitPrice+"' min='0' step='.10' data-number-to-fixed='00.10' data-number-stepfactor='10' class='form-control currency pr-0 unitPriceSpinBox' onchange='calculateRowTotalUnitPrice(this)' id='unitPrice"+productsArray[productIndex].PRODUCT_ID+"' style='height: 2rem;' onchange='setTwoNumberDecimal(this)' /></div> </td><td class='text-right py-2 pr-1 price'>R0.00</td><td class='pl-2 px-0 py-2'><a class='btn py-0 px-2' id='deleteRow' onclick='removeRow(this)'><i class='fas fa-times-circle' style='color: red;'></i></a></td><td class='text-right py-2 pr-1'>"+theGuidePrice+"</td><td class='text-right py-2 pr-1 pl-2'>"+theCostPrice+"</td><td class='text-right py-2 pr-1 pl-2'>"+theProfit+"</td>");
					let productsTable = $('#productsTable');
					productsTable.append('<tr id="productLine'+(productElementsCount+1)+'"></tr>');
					productElementsCount++;

					calculateVATandTotal();
					SALEPRODUCTIDs.push(productsArray[productIndex].PRODUCT_ID);
				}
				else
				{
					let pType="Individual";
					let pNumber= 1;
					if(productsArray[productIndex].PRODUCT_SIZE_TYPE==2)
					{
						pType="Case";
						pNumber=productsArray[productIndex].UNITS_PER_CASE;
					}
					else if(productsArray[productIndex].PRODUCT_SIZE_TYPE==3)
					{
						pType="Pallet";
						pNumber=productsArray[productIndex].CASES_PER_PALLET;
					}
					let theProductName = productsArray[productIndex].NAME+" ("+pNumber+" x "+productsArray[productIndex].PRODUCT_MEASUREMENT+productsArray[productIndex].PRODUCT_MEASUREMENT_UNIT+")"+" "+pType;

					$('#modal-title-default2').text("Error!");
					$('#modalText').text("The product "+theProductName+" has already been added to the sale.");
					$("#modalCloseButton").attr("onclick","");
					$('#successfullyAdded').modal("show");
				}

				$('.unitPriceSpinBox').on('input', function()
				{
					//console.log(this.value);
					//console.log(this.parentNode.parentNode.nextSibling.nextSibling.nextSibling.nextSibling.innerHTML);
					var costPriceOfRow = this.parentNode.parentNode.nextSibling.nextSibling.nextSibling.nextSibling.innerHTML;
					costPriceOfRow = costPriceOfRow.slice(1);
					costPriceOfRow = costPriceOfRow.replace(/\s/g, '');
					costPriceOfRow = parseFloat(costPriceOfRow);

					var thisPrice = this.value;
					thisPrice = thisPrice.replace(/\s/g, '');
					thisPrice = parseFloat(thisPrice);

					if (thisPrice < costPriceOfRow) 
					{
						this.style.backgroundColor = "red";
					}
					else if (thisPrice == costPriceOfRow) 
					{
						this.style.backgroundColor = "orange";
					}
					else
					{
						this.style.backgroundColor = "white";
					}
				});
				
			});
		}
		else
		{
			alert("Error");
		}
	});

	SALEUSERID = SESSION['userID'];
	SALEUSERNAME = SESSION['name'];
});

$("button#searchCustomerButton").on('click', event => {
	event.preventDefault();
	let form=$('#searchCustomertForm');
	form.validate();
	if(form.valid() === false)
	{
		event.stopPropagation();
	}
	else
	{
		let customerPhoneNumber = $("#customerSearchInput").val();

		$.ajax({
			url: 'PHPcode/getCustomer_.php',
			type: 'POST',
			data: { 
				customerPhone : customerPhoneNumber,
			},
			beforeSend: function() {
	
	    	}
		})
		.done(response => {
			let customerDetails = JSON.parse(response);
			console.log(customerDetails);
			SALECUSTOMERID = customerDetails["CUSTOMER_ID"];
			if (response != "false") 
			{
				$('#customerSearchInput').val("");
				customerDetails["CUSTOMER_ID"]
				let custtomerID = $('#customerSearchInput').val();
				let customerCard = $('#customerCard');
				let customerInfo = '<tr><th style="width: 12rem">Customer ID</th><td >'+customerDetails["CUSTOMER_ID"]+'</td></tr><tr><th>Name</th><td>'+customerDetails["NAME"]+'</td></tr>';
				INVOICE_CUSTOMER_NAME = customerDetails["NAME"];
				INVOICE_CUSTOMER_EMAIL = customerDetails["EMAIL"];
				if (customerDetails["SURNAME"] != null) 
				{
					customerInfo +='<tr><th>Surname</th><td >'+customerDetails["SURNAME"]+'</td></tr>';
					INVOICE_CUSTOMER_NAME += " ";
					INVOICE_CUSTOMER_NAME += customerDetails["SURNAME"];
				}
				else
				{
					customerInfo +='<tr><th>VAT Number</th><td >'+customerDetails["VAT_NUMBER"]+'</td></tr>';
				}
				customerInfo +='<tr><th>Contact No</th><td >'+customerDetails["CONTACT_NUMBER"]+'</td></tr>'
				customerCard.html(customerInfo);	
				
				$.ajax({
					url: 'PHPcode/getSaleDeliveryAddress.php',
					type: 'POST',
					data: { 
						customerID_ : SALECUSTOMERID,
					},
					beforeSend: function() {
			
			    	}
				})
				.done(response => {
					let customerAddressDetails = JSON.parse(response);
					//console.log(customerAddressDetails);
					
					if (response != "false") 
					{
						var addresses = "";
						for (var i = 0; i < customerAddressDetails.length; i++) {
							//console.log(customerAddressDetails[i].ADDRESS_ID);
							var checked = "";
							if (i == 0) 
							{
								checked = "checked";
								INVOICE_CUSTOMER_ADDRESS = customerAddressDetails[i].ADDRESS_LINE_1+', '+customerAddressDetails[i].NAME+', '+customerAddressDetails[i].CITY_NAME+', '+customerAddressDetails[i].ZIPCODE;

							}
							addresses +='<div class="custom-control custom-radio mb-3 col"><input name="custom-radio-2" class="custom-control-input deliveryAddressSelect" array-index="'+i+'" id="addressSelect'+i+'" type="radio" value="'+customerAddressDetails[i].ADDRESS_ID+'"'+checked+'><label class="custom-control-label" for="addressSelect'+i+'">'+customerAddressDetails[i].ADDRESS_LINE_1+', '+customerAddressDetails[i].NAME+', '+customerAddressDetails[i].CITY_NAME+', '+customerAddressDetails[i].ZIPCODE+'</label></div>';
						}
						let addressesDiv = $('#customerAddresses');
						addressesDiv.html(addresses);

						SALEDELIVERYADDRESSID = $('.deliveryAddressSelect:checked').val();
						//console.log(SALEDELIVERYADDRESSID);

						$('.deliveryAddressSelect').on('input', function()
						{
							//console.log(this.value);
							if (this.checked) 
							{
								SALEDELIVERYADDRESSID = this.value;
								i = this.getAttribute("array-index");;
								INVOICE_CUSTOMER_ADDRESS = customerAddressDetails[i].ADDRESS_LINE_1+', '+customerAddressDetails[i].NAME+', '+customerAddressDetails[i].CITY_NAME+', '+customerAddressDetails[i].ZIPCODE;
								//console.log(INVOICE_CUSTOMER_ADDRESS);

							}
							else
							{
								console.log(SALEDELIVERYADDRESSID);
							}
						});	
					}
					else
					{
						var addresses = "";
						let addressesDiv = $('#customerAddresses');
						addressesDiv.html(addresses);
					}
					
					ajaxDone = true;
				});
			}
			else
			{
				$('#customerSearchInput').val("");
				let customerCard = $('#customerCard');
				customerCard.html('<tr><th>No Customer Found</th><td></td></tr>');
				$('#customerSearchInput').val("");

				var addresses = "";
				let addressesDiv = $('#customerAddresses');
				addressesDiv.html(addresses);
			}
			
			ajaxDone = true;
		});
	}	
});  

$("button#finaliseSale").on('click', event => {
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

$("button#confirmSalesManagerPassword").on('click', event => {

	var password = $("#salesManagerPassword").val().trim();
	$.ajax({
        url:'PHPcode/verifySalesManagerPassword.php',
        type:'post',
        data:{ 
        	password:password
        },
        beforeSend: function(){
            //$('.loadingModal').modal('show');
        },
        complete: function(){
            //$('.loadingModal').modal('hide')
        }
    })
    .done(response => {

    	console.log(response);
        if (response == "success")
		{
			SALEPRODUCTS = [];
			for (var i = SALEPRODUCTIDs.length - 1; i >= 0; i--) 
			{
				var thisProductID = SALEPRODUCTIDs[i];
				var thisProductQuantity = $('#quantity'+thisProductID).val();
				var thisSellingPrice = $('#unitPrice'+thisProductID).val();
				
				

				var productLine = {
				    'PRODUCT_ID': thisProductID,
				    'QUANTITY': thisProductQuantity,
				    'SELLING_PRICE': thisSellingPrice
				};
				SALEPRODUCTS.push(productLine);
			}

			$.getJSON("https://geocoder.api.here.com/6.2/geocode.json?searchtext="+INVOICE_CUSTOMER_ADDRESS+"&gen=9&app_id=4ubUBkg0ecyvqIcmRpJw&app_code=R1S3qwnTFxK3FbiK1ucSqw",{
			format:"json"
			})
			.done(data=>{
				coordinates=data;
				saleDeliveryLongitude = coordinates["Response"]["View"][0]["Result"][0]["Location"]["DisplayPosition"]["Latitude"];
				saleDeliveryLatitude = coordinates["Response"]["View"][0]["Result"][0]["Location"]["DisplayPosition"]["Longitude"];

				//console.log("Longitude => "+saleDeliveryLongitude+", Latitude => "+saleDeliveryLatitude);
			});

			$.ajax({
		        url:'PHPcode/makeSale_.php',
		        type:'post',
		        data:{ 
		        	saleProducts : SALEPRODUCTS,
		        	customerID : SALECUSTOMERID,
		        	saleUserID : SALEUSERID,
		        	addSaleDelivery: SALEDELIVERYADD,
		        	saleDeliveryID: SALEDELIVERYADDRESSID,
		        	deliveryLongitude: saleDeliveryLongitude,
		        	deliveryLatitude: saleDeliveryLatitude
		        },
		        beforeSend: function(){
		            //$('.loadingModal').modal('show');
		        },
		        complete: function(){
		            //$('.loadingModal').modal('hide')
		        }
		    })
		    .done(response => {

		    	console.log(response);
		    	var reponseArray = response.split(',');
		    	INVOICE_SALE_ID = reponseArray[1];
		    	var responseText = reponseArray[0];
		    	console.log(reponseArray);

		        if (responseText == "success")
				{
					$('#modal-title-default2').text("Success!");
					$('#modalText').text("Correct Password. Sale is complete. Printing invoice...");
					$("#modalCloseButton").attr("onclick","callTwo()");
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
			$('#modal-title-default2').text("Error!");
			$('#modalText').text("Incorrect password entered");
			$("#modalCloseButton").attr("onclick","");
			$('#successfullyAdded').modal("show");
		}
		else if(response == "Password empty")
		{
			$('#modal-title-default2').text("Error!");
			$('#modalText').text("Please enter a password");
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
});



////////////////////////////CODE FROM PHP///////////////////////////////

function setTwoNumberDecimal(el) 
{
    el.value = parseFloat(el.value).toFixed(2);     
};

function numberWithSpaces(x) 
{
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
}

$('#menuItems').on('click', '.dropdown-item', function()
{
	$("#searchProduct").dropdown('toggle');
	$('#searchProduct').val("");
	filter("");
});

$('#addSaleDeliveryCheckbox').on('input', function()
{
	var makeDelivery = $('#addSaleDeliveryCheckbox').is(":checked");
	if (makeDelivery == true) 
	{
		SALEDELIVERYADD = true;
		//console.log("Adding Delivery => "+makeDelivery);
	}
	else
	{
		SALEDELIVERYADD = false;
		//console.log("Not adding Delivery => "+makeDelivery);
	}
});

if (productElementsCount == 1) {
	//console.log(this.name);
	let productIndex = this.name;

	let productsTable = $('#productsTable');
	productsTable.append('<tr id="productLine'+(productElementsCount+1)+'"></tr>');
	productElementsCount++;
	calculateVATandTotal();
};

$('#searchProduct').on('input', function()
{
	var dropdownShown = $("#menu").hasClass("show");
	if(dropdownShown === false)
	{
		$("#searchProduct").dropdown('toggle');
	}
	let search = $("#searchProduct");
	let searchWord = search.val().trim().toLowerCase()
	filter(searchWord);
});


$('.productDropdownMenuItem').on('click', function()
{
	console.log(this.name);
});

function buildDropDown(arrayOfProducts) 
{
  let contents = []
  let ind = 0;
  for (let product of arrayOfProducts) 
  {
  	let pType="Individual";
	let pNumber= 1;
	if(product.PRODUCT_SIZE_TYPE==2)
	{
		pType="Case";
		pNumber=product.UNITS_PER_CASE;
	}
	else if(product.PRODUCT_SIZE_TYPE==3)
	{
		pType="Pallet";
		pNumber=product.CASES_PER_PALLET;
	}
  	let productName = product.NAME+" ("+pNumber+" x "+product.PRODUCT_MEASUREMENT+product.PRODUCT_MEASUREMENT_UNIT+")"+" "+pType;
  	contents.push('<input type="button" class="dropdown-item productDropdownMenuItem" id="dropdownItem" type="button" value="' + productName + '" name="'+ind+'"/>');
  	ind++;

  }
  $('#menuItems').append(contents.join(""))

  //Hide the row that shows no items were found
  $('#empty').hide()
  //console.log(productDetails);
}

//For every word entered by the user, check if the symbol starts with that word
//If it does show the symbol, else hide it
function filter(word) 
{
	let items = $(".dropdown-item.productDropdownMenuItem");
  	let length = items.length
  	let collection = []
  	let hidden = 0

  	for (let i = 0; i < length; i++) 
	{
	    if (items[i].value.toLowerCase().startsWith(word)) 
	    {
	        $(items[i]).show()
	    }
	    else {
	        $(items[i]).hide()
	        hidden++
	    }
	}

	//If all items are hidden, show the empty view
	if (hidden === length) 
	{
		$('#empty').show()
	}
	else 
	{
		$('#empty').hide()
	}
}


//buildDropDown(productDetails);

function callTwo(){

	//var URL = "invoice/invoice.php";
	//window.open(URL, '_blank');
	var form="<form target='_blank' action='invoice/invoice.php' id='sendSaleInfo' method='POST'><input type='hidden' name='CUSTOMER_NAME' value='"+INVOICE_CUSTOMER_NAME+"'>"+"<input type='hidden' name='ADDRESS' value='"+INVOICE_CUSTOMER_ADDRESS+"'>"+"<input type='hidden' name='SALE_ID' value='"+INVOICE_SALE_ID+"'>"+"<input type='hidden' name='SALESPERSON' value='"+SALEUSERNAME+"'>"+"<input type='hidden' name='EMAIL' value='"+INVOICE_CUSTOMER_EMAIL+"'>"+"<input type='hidden' name='SALE_PRODUCTS' value='"+JSON.stringify(SALEPRODUCTS)+"'>"+"</form>";

	$("body").append(form);
	$( "#sendSaleInfo" ).submit();
	location.reload();
}

// Adding Rows
$(document).ready(function(){
    
});

function calculateRowTotalQuantity(element)
{
	var thisQuantity = element.value;
	var unitPrice = element.parentNode.parentNode.nextSibling.nextSibling.childNodes[0].childNodes[2].value;

	var rowTotal = thisQuantity * unitPrice;
	rowTotal = rowTotal.toFixed(2);
	rowTotal = numberWithSpaces(rowTotal);
	rowTotal = "R"+ rowTotal;

	element.parentNode.parentNode.nextSibling.nextSibling.nextSibling.innerHTML = rowTotal;
	calculateVATandTotal();
}

function calculateRowTotalUnitPrice(element)
{
	var thisUnitPrice = element.value;
	var quantity = element.parentNode.parentNode.previousSibling.previousSibling.childNodes[0].childNodes[0].value;

	var rowTotal2 = thisUnitPrice * quantity;
	rowTotal2 = rowTotal2.toFixed(2);
	rowTotal2 = numberWithSpaces(rowTotal2);
	rowTotal2 = "R"+ rowTotal2;

	element.parentNode.parentNode.nextSibling.innerHTML = rowTotal2;
	calculateVATandTotal();

	var costPrice = element.parentNode.parentNode.nextSibling.nextSibling.nextSibling.nextSibling.innerHTML.replace("R","").replace(/\s/g, "");

	var newProfit = thisUnitPrice - costPrice;
	newProfit = newProfit.toFixed(2);
	newProfit = numberWithSpaces(newProfit);
	newProfit = "R"+ newProfit;

	element.parentNode.parentNode.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.innerHTML = newProfit;
	//console.log(element.parentNode.parentNode.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling);

	setTwoNumberDecimal(element);
}

function calculateVATandTotal()
{
	var sum = 0;
	// iterate through each td based on class and add the values
	$(".price").each(function() 
	{
	    var value = $(this).text().replace("R","").replace(/\s/g, "");
	    // add only if the value is number
	    if(!isNaN(value) && value.length != 0) {
	        sum += parseFloat(value);
	    }
	});
	
	var vat = (sum*0.15).toFixed(2);
	sum = sum.toFixed(2);

	sum = numberWithSpaces(sum);	
	vat = numberWithSpaces(vat);

	$('#totalOfSale').html('<b>R'+sum+'</b>');
	$('#vatOfSale').html('<b>R'+vat+'</b>');
}

function removeRow(src)
{
    /* src refers to the input button that was clicked. 
       to get a reference to the containing <tr> element,
       get the parent of the parent (in this case <tr>)
    */   
    var oRow = src.parentElement.parentElement;  
    //var quantity = element.parentNode.parentNode.previousSibling.previousSibling.childNodes[0].childNodes[0].value;
    var productID = src.parentNode.parentNode.childNodes[0].value;
    //console.log(productID);
    
    //once the row reference is obtained, delete it passing in its rowIndex   
    document.all("productsTable").deleteRow(oRow.rowIndex);  
    calculateVATandTotal();
    SALEPRODUCTIDs = SALEPRODUCTIDs.remByVal(productID);

} 