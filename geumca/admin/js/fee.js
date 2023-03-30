
    function FeeTypeFunction() {
        selectElement_fee = document.querySelector('#inputStudentFeeMode');
        selectElement_fee_output = selectElement_fee.value;
        if(selectElement_fee_output == "Cash")
        {
        document.getElementById("inputStudentTranscationId").disabled = true;
        document.getElementById("inputStudentTranscationId").value=null;
        
         }
         else
         {
            document.getElementById("inputStudentTranscationId").disabled = false; 
            document.getElementById("inputStudentTranscationId").required = true;
         }
    
    }


   
    
    function FeeDiscountTypeFunction() {
        selectElement = document.querySelector('#DiscountType');
        output = selectElement.value;
        selectElement1 = document.querySelector('#inputStudentTotalFee');
        output1 = selectElement1.value;
        studenttwelthmarks = document.querySelector('#discount12percentage');
        outputstudenttwelthmarks1 = studenttwelthmarks.value;
        if(outputstudenttwelthmarks1)
            outputstudenttwelthmarks=outputstudenttwelthmarks1;
else
    outputstudenttwelthmarks=0;


        if(output == "Full Fee Discount")
        {
            Fullfeediscountfee=output1*10/100;
           Fullfeediscountfeeremark= "10% Full Fee Discount";
        //document.getElementById("DiscountAmount").disabled = true;
        document.getElementById("DiscountAmount").value=Fullfeediscountfee;
        document.getElementById("DiscountAmount").readOnly = true;
        document.getElementById("DiscountRemark").required = false;
        document.getElementById("DiscountRemark").value = Fullfeediscountfeeremark;
        
        }
         else if(output == "Special Discount")
         {
            Fullspecialfeediscountfee=output1*15/100;
            Fullspecialfeediscountfeeremark= "15% Special Fee Discount";
           // document.getElementById("DiscountAmount").disabled = false; 
            //document.getElementById("DiscountAmount").required = true;
            document.getElementById("DiscountAmount").value=Fullspecialfeediscountfee;
            document.getElementById("DiscountAmount").readOnly = true;
            document.getElementById("DiscountRemark").required = false;
            document.getElementById("DiscountRemark").value = Fullspecialfeediscountfeeremark;

         }
         else if(output == "Sibling Discount")
         {
                Fullsiblingfeediscountfee=output1*5/100;
              Fullsiblingfeediscountfeeremark= "5% Sibling Discount";
                document.getElementById("DiscountAmount").value=Fullsiblingfeediscountfee;
                document.getElementById("DiscountAmount").readOnly = true;
                document.getElementById("DiscountRemark").required = false;
                 document.getElementById("DiscountRemark").value = Fullsiblingfeediscountfeeremark;
                 
         }
         else if(output == "100% Discount")
         {
                Fullhunderedfeediscountfee=output1*100/100;
                 Fullhunderedfeediscountfeeremark= "100% Fee Discount";
                document.getElementById("DiscountAmount").value=Fullhunderedfeediscountfee;
                document.getElementById("DiscountAmount").readOnly = true;
                document.getElementById("DiscountRemark").required = false;
                document.getElementById("DiscountRemark").value = Fullhunderedfeediscountfeeremark;
         }
         else if(output == "Academic Scholarship")
         {
            scholarshipdiscountamount1=1000;
            scholarshipdiscountamount2=700;
            scholarshipdiscountamount3=500;
            scholarshipremark="ScholarShip On the Basis of "+outputstudenttwelthmarks+"%";
            document.getElementById("DiscountAmount").required = true;
            document.getElementById("DiscountAmount").disabled = false;
            document.getElementById("DiscountAmount").readOnly = true;
            
             document.getElementById("DiscountRemark").value=scholarshipremark; 
            document.getElementById("DiscountRemark").required = true;
            if(outputstudenttwelthmarks>90 && outputstudenttwelthmarks<100)
            {
document.getElementById("DiscountAmount").value=scholarshipdiscountamount1; 
            }
            else if(outputstudenttwelthmarks>80 && outputstudenttwelthmarks<90)
            {
document.getElementById("DiscountAmount").value=scholarshipdiscountamount2; 
            }
              else if(outputstudenttwelthmarks>70 && outputstudenttwelthmarks<80)
            {
document.getElementById("DiscountAmount").value=scholarshipdiscountamount3; 
            }
            else
            {
              document.getElementById("DiscountAmount").value=0;   
            }

            
         }
         
    
    }
  /* function FeeStudentTypeFunction() {
        selectElement_fee_type = document.querySelector('#inputStudentFeeType');
        selectElement_fee_type_output = selectElement_fee_type.value;
        selectElement_Fee_course = document.querySelector('#inputStudentCourseName');
        selectElement_Fee_course_output1 = selectElement_Fee_course.value;
        if(selectElement_fee_type_output == "FULL PAYMENT")
        {
            fullpaymentremark="FULL FEE PAID FOR";
        document.getElementById("inputStudentFeeRemark").disabled = false;
        document.getElementById("inputStudentFeeRemark").value=fullpaymentremark;
        
         }
         else if(selectElement_fee_type_output == "PARTIAL PAYMENT")
         {
            partialfeepaymentremark="PARTIAL FEE PAID FOR "
            document.getElementById("inputStudentFeeRemark").value=partialfeepaymentremark;
            document.getElementById("inputStudentFeeRemark").disabled = false; 
            
         }
         else
         {
             document.getElementById("inputStudentFeeRemark").value=partialfeepaymentremark;
         }
    
    }*/