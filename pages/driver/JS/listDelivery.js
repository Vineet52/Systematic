var assignments;
var assignmentProduct;
let buildTable=function(tmp,assArr,assPArr)
{
	let tableEntry=$("<tr></tr>");
	let form=$("<td></td>");
	let saleID=assArr[tmp]["SALE_ID"];
	let saleArr=assArr.filter(element=>element["SALE_ID"]==saleID);
	let saleProductsArr=assPArr.filter(element=>element["SALE_ID"]==saleID);
	let formEntry="<form action='finalise_delivery.php' method='POST'><input type='hidden' name='ass' value='"+JSON.stringify(saleArr)+"'>"+"<form type='hidden' name='assP' value='"+JSON.stringify(saleProductsArr)+"'>"+"<button class='btn btn-icon btn-2 btn-primary btn-sm' type='submit'><span class='btn-inner--icon'><i class='fas fa-truck'></i></span><span class='btn-inner--text'>Make Delivery</span></button>";
	form.append(formEntry);
	tableEntry.append(form);
	let saleEntry=$("<td></td>").text(assArr[tmp]["SALE_ID"]);
	tableEntry.append(saleEntry);
	$("#tBody").append(tableEntry);
}
$(()=>{
	assignments=JSON.parse($("#aData").text());
	assignmentProduct=JSON.parse($("#aData").text());
	for(let k=0;k<assignments.length;k++)
	{
		buildTable(k,assignments,assignmentProduct);
	}

});