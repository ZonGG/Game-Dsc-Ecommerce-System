function validate()
{
    if(document.myform.pname.value ==""){
        alert("Please fill in the Product Name.");
        document.myform.pname.focus();
        return false;
    }
    if(document.myform.pimage.value ==""){
        alert("Please upload the picture for the product.");
        document.myform.pimage.focus();
        return false;
    }
    if(document.myform.pdes.value ==""){
        alert("Please fill in the product description.");
        document.myform.pdes.focus();
        return false;
    }
    if(document.myform.pprice.value ==""){
        alert("Please fill in the price of product.");
        document.myform.pprice.focus();
        return false;
    }
    if(document.myform.psupp.value ==""){
        alert("Please provide the supplier.");
        document.myform.psupp.focus();
        return false;
    }


}
