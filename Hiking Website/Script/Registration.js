function Validate(){
   
    if(document.getElementById("fN").value === "" || 
    document.getElementById('lN').value === "" || 
    document.getElementById('E').value === "" || 
    document.getElementById('P').value === "" || 
    document.getElementById('cP').value === ""){
    alert("Error U Should Fill All the data");
    return;
   }
   if(document.getElementById('P').value.length != document.getElementById('cP').value.length){
       alert("Error password is Not match");
       cP.value = "";
       return;
   }
   else{
       //The page will user going to
   }
}