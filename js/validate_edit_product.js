function validate()
{
    if(document.myform.ProductName.value ==""){
        alert("Please fill in the Product Name.");
        document.myform.ProductName.focus();
        return false;
    }
    if(document.myform.ProductDesc.value ==""){
        alert("Please fill in the product description.");
        document.myform.ProductDesc.focus();
        return false;
    }
    if(document.myform.ProductAmount.value ==""){
        alert("Please fill in the price of product.");
        document.myform.ProductAmount.focus();
        return false;
    }
    if(document.myform.Supplier.value ==""){
        alert("Please provide the supplier.");
        document.myform.Supplier.focus();
        return false;
    }
    else{
        alert("You are successfully edit the product! Thank you.");
		return true;
    }
}