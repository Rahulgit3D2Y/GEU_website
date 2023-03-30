
          let _validFileExtensions = [".jpg", ".jpeg"];    
function ValidateinputStudentPhotoInput(oInput) {
    if (oInput.type == "file") {
        let sFileName = oInput.value;
         if (sFileName.length > 0) {
            let blnValid = false;
            for (let j = 0; j < _validFileExtensions.length; j++) {
                let sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }
      let fi = document.getElementById('inputStudentPhoto');
        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (let i = 0; i <= fi.files.length - 1; i++) {
  
                let fsize = fi.files.item(i).size;
                let file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 200) {
                    alert(
                      "File too Big, please select a file less than 200KB");
                   document.getElementById("inputStudentPhoto").value=null; 
                     //return false;
                } 
            }
        }
    return true;
}
      
          let _validFileExtensions1 = [".pdf"];    
function ValidateinputStudentPanInput(oInput) {
    if (oInput.type == "file") {
        let sFileName = oInput.value;
         if (sFileName.length > 0) {
            let blnValid = false;
            for (let j = 0; j < _validFileExtensions1.length; j++) {
                let sCurExtension = _validFileExtensions1[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions1.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }
    let fi = document.getElementById('inputStudentPan');
        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (let i = 0; i <= fi.files.length - 1; i++) {
  
                let fsize = fi.files.item(i).size;
                let file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 600) {
                    alert(
                      "File too Big, please select a file less than 600kb");
                   document.getElementById("inputStudentPan").value=null; 
                     //return false;
                } 
            }
        }
    
    return true;
}
      
          let _validFileExtensions2 = [".pdf"];    
function ValidateiinputStudentAddharInput(oInput) {
    if (oInput.type == "file") {
        let sFileName = oInput.value;
         if (sFileName.length > 0) {
            let blnValid = false;
            for (let j = 0; j < _validFileExtensions2.length; j++) {
                let sCurExtension = _validFileExtensions2[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions2.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }
    let fi = document.getElementById('inputStudentAddhar');
        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (let i = 0; i <= fi.files.length - 1; i++) {
  
                let fsize = fi.files.item(i).size;
                let file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 600) {
                    alert(
                      "File too Big, please select a file less than 600kb");
                   document.getElementById("inputStudentAddhar").value=null; 
                     //return false;
                } 
            }
        }
    
    return true;
}
   

 