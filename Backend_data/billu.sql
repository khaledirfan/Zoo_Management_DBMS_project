CREATE OR REPLACE FUNCTION E_AGE(E IN DATE)
RETURN NUMBER
AS
Today DATE;
age NUMBER;
	
BEGIN
	Today:=SYSDATE;
        SELECT ROUND((Today-E)/365) INTO age from dual;
RETURN age;

END;



---- Job duration function

