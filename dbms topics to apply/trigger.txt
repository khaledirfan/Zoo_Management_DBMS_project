*** trigger appeare when new research add **
CREATE OR REPLACE TRIGGER R_Trigger
AFTER INSERT OR UPDATE
--OF Paperlink
ON Research
FOR EACH ROW
 
 
BEGIN
	 
	dbms_output.put_line('Thanks for submitting you research work');

 
END;