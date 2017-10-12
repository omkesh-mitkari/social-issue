

	function validateForm() {
    var x = document.getElementById("1").value;
    var y = document.getElementById("2").value;    
    var f=0;
    if (x === "") 	
    	{f=1;alert("Title must be filled out");}
    if(f==0 && y== "")    
    	{f=1;alert("Description must be filled out");}        
        return false;
    
}


