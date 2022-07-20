CREATE TABLE  "VISITOR_INFO" 
   (	"REGISTER_ID" VARCHAR2(20) NOT NULL ENABLE, 
	"VISITOR_NAME" VARCHAR2(40), 
	"VISITOR_GENDER" VARCHAR2(10), 
	"VISITOR_EMAIL" VARCHAR2(40), 
	"VISITOR_DOB" VARCHAR2(15), 
	"VISITOR_PASSWORD" VARCHAR2(30) NOT NULL ENABLE, 
	"TOTAL_VISITS" NUMBER(10,0), 
	 CONSTRAINT "VISITOR_INFO_PK" PRIMARY KEY ("REGISTER_ID") ENABLE, 
	 CONSTRAINT "VISITOR_INFO_UK1" UNIQUE ("VISITOR_PASSWORD") ENABLE
   ) ;
