

CREATE or replace VIEW cdetailsview AS
  SELECT COMPLAINT_DETAILS, EMPLOYEE_ID
  FROM EMPLOYEE JOIN EMPLOYEE_COMPLAINT USING(EMPLOYEE_ID) JOIN COMPLAINTS USING (COMPLAINT_NO);