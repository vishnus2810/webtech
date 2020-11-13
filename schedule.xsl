<?xml version = "1.0" encoding = "UTF-8"?>
 
<xsl:stylesheet version = "1.0" 
xmlns:xsl = "http://www.w3.org/1999/XSL/Transform">   
   <xsl:template match = "/"> 
      <!-- HTML tags 
         Used for formatting purpose. Processor will skip them and browser 
            will simply render them. 
      --> 
		
      <html> 
         <body style="background-color:#99FFFF" align="center"> 
            <h2>Students</h2> 
				
            <table align="center" style="border:1px solid black;width: 50%;"> 
               <tr > 
                  <th>Name</th> 
                  <th>Email</th> 
                  <th>Doctor Name</th> 
                  <th>Department</th> 
                  <th>Date</th> 
               </tr> 
				
               <!-- for-each processing instruction 
               Looks for each element matching the XPath expression 
               --> 
				
               <xsl:for-each select="schedule"> 
                  <tr> 
                     <td><xsl:value-of select = "patientname"/></td> 						
                     <td><xsl:value-of select = "patientemail"/></td> 
                     <td><xsl:value-of select = "doctorname"/></td> 
                     <td><xsl:value-of select = "department"/></td> 
                     <td><xsl:value-of select = "date"/></td> 
						
                  </tr> 
               </xsl:for-each> 
					
            </table> 
         </body> 
      </html> 
   </xsl:template>  
</xsl:stylesheet>